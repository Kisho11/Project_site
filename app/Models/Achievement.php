<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ta',
        'description',
        'description_ta',
        'image',
        'date',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected $casts = [
        'date' => 'datetime', // Casts the date field to a DateTime object
    ];
}
