<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Achievement;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin ?? false) {
                return redirect()->route('admin.dashboard');
            }
            Auth::logout();
            return back()->withErrors(['email' => 'You are not an admin.']);
        }
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $otp = rand(100000, 999999);
        $otp_expires_at = now()->addMinutes(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $otp,
            'otp_expires_at' => $otp_expires_at,
        ]);

        // Send OTP via email (implement Mail facade)
        Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Email Verification OTP');
        });

        // Store email in session for OTP verification
        session(['email' => $user->email]);

        return redirect()->route('verify.otp')->with('status', 'OTP sent to your email.');
    }

    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric']);

        $user = User::where('email', session('email'))->first();
        if ($user && $user->otp == $request->otp && now()->lessThan($user->otp_expires_at)) {
            $user->update(['otp' => null, 'otp_expires_at' => null]);
            Auth::login($user);
            session()->forget('email');
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = Str::random(60);
            $otp = rand(100000, 999999);
            $otp_expires_at = now()->addMinutes(10);

            // Update user with OTP
            $user->update([
                'otp' => $otp,
                'otp_expires_at' => $otp_expires_at,
            ]);

            // Delete any existing reset token for this email
            DB::table('password_resets')->where('email', $user->email)->delete();

            // Insert the new reset token
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            // Send reset link and OTP via email
            $resetUrl = url('/reset-password/' . $token);
            Mail::raw("Use this OTP to reset your password: $otp\nReset link: $resetUrl", function ($message) use ($user) {
                $message->to($user->email)->subject('Password Reset Link');
            });

            return back()->with('status', 'Reset link and OTP sent to your email.');
        }

        return back()->withErrors(['email' => 'No user found with this email.']);
    }

    public function showResetForm($token)
    {
        $reset = DB::table('password_resets')->where('token', $token)->first();
        if (!$reset) {
            return redirect()->route('password.request')->withErrors(['email' => 'Invalid reset link.']);
        }
        return view('auth.reset-password', ['token' => $token, 'email' => $reset->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'otp' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $reset = DB::table('password_resets')->where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();

        if ($reset && $user && $reset->token == $request->token) {
            // Validate OTP
            if ($user->otp == $request->otp && now()->lessThan($user->otp_expires_at)) {
                $user->update([
                    'password' => Hash::make($request->password),
                    'otp' => null,
                    'otp_expires_at' => null,
                ]);
                DB::table('password_resets')->where('email', $request->email)->delete();
                return redirect()->route('login')->with('status', 'Password reset successful.');
            }
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }
        return back()->withErrors(['email' => 'Invalid reset link.']);
    }

    public function dashboard()
    {
        $newsEvents = NewsEvent::where('created_by', Auth::id())->with('user')->get();
        $newsEventsCount = NewsEvent::where('created_by', Auth::id())->count();
        $achievements = Achievement::where('created_by', Auth::id())->with('user')->get();
        $achievementsCount = Achievement::where('created_by', Auth::id())->count();
        $galleries = Gallery::where('created_by', Auth::id())->with('user')->get();
        $galleriesCount = Gallery::where('created_by', Auth::id())->count();
        $activeTab = session('activeTab', 'news'); // Default to 'news' tab

        return view('layouts.admin.dashboard', compact('newsEvents', 'newsEventsCount', 'achievements', 'achievementsCount', 'galleries', 'galleriesCount', 'activeTab'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }
}
