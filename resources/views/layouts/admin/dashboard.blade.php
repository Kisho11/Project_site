<?php
$title = 'Admin Dashboard';
?>
@extends('layouts.admin.app')

@section('content')
    <div class="card bg-light mb-4">
        <div class="card-body">
            <h2 class="card-title">Admin Dashboard</h2>
            <p class="card-text">Welcome, {{ Auth::user()->name }}!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 bg-primary text-white h-100">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold mb-3">Total News & Events</h5>
                    <p class="card-text text-white display-4">{{ $newsEventsCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 bg-success text-white h-100">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold mb-3">Total Achievements</h5>
                    <p class="card-text text-white display-4">{{ $achievementsCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 bg-info text-white h-100">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold mb-3">Total Images</h5>
                    <p class="card-text text-white display-4">{{ $galleriesCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'news' ? 'active' : '' }}" id="news-tab" data-toggle="tab" href="#news"
                role="tab" aria-controls="news" aria-selected="{{ $activeTab == 'news' ? 'true' : 'false' }}">News &
                Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'achievements' ? 'active' : '' }}" id="achievements-tab" data-toggle="tab"
                href="#achievements" role="tab" aria-controls="achievements"
                aria-selected="{{ $activeTab == 'achievements' ? 'true' : 'false' }}">Achievements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'gallery' ? 'active' : '' }}" id="gallery-tab" data-toggle="tab"
                href="#gallery" role="tab" aria-controls="gallery"
                aria-selected="{{ $activeTab == 'gallery' ? 'true' : 'false' }}">Gallery</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="dashboardTabContent">
        <!-- News & Events Tab -->
        <div class="tab-pane fade {{ $activeTab == 'news' ? 'show active' : '' }}" id="news" role="tabpanel"
            aria-labelledby="news-tab">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Manage News & Events</h5>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createNewsEventModal">Add
                    News/Event</button>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped" id="newsEventsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($newsEvents as $index => $newsEvent)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $newsEvent->title ?? ($newsEvent->title_ta ?? 'Untitled') }}</td>
                            <td>
                                @if ($newsEvent->image && Storage::disk('public')->exists('news_events/' . $newsEvent->image))
                                    <img src="{{ asset('storage/news_events/' . $newsEvent->image) }}"
                                        alt="News/Event Image" width="80">
                                @else
                                    <span>Image not found - Debug: {{ $newsEvent->image }} | Exists:
                                        {{ Storage::disk('public')->exists('news_events/' . $newsEvent->image) ? 'Yes' : 'No' }}</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($newsEvent->date)->format('Y-m-d') }}</td>
                            <td>{{ $newsEvent->user->name ?? 'Unknown' }}</td>
                            <td>{{ \Carbon\Carbon::parse($newsEvent->created_at)->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info view-news-event"
                                    data-id="{{ $newsEvent->id }}" data-toggle="modal"
                                    data-target="#viewNewsEventModal">View</button>
                                <button type="button" class="btn btn-sm btn-warning edit-news-event"
                                    data-id="{{ $newsEvent->id }}" data-toggle="modal"
                                    data-target="#editNewsEventModal">Edit</button>
                                <form action="{{ route('news-events.destroy', $newsEvent->id) }}" method="POST"
                                    style="display:inline;" class="delete-form-news-event">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No news/events available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Achievements Tab -->
        <div class="tab-pane fade {{ $activeTab == 'achievements' ? 'show active' : '' }}" id="achievements"
            role="tabpanel" aria-labelledby="achievements-tab">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Manage Achievements</h5>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createAchievementModal">Add
                    Achievement</button>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped" id="achievementsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($achievements as $index => $achievement)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $achievement->title ?? ($achievement->title_ta ?? 'Untitled') }}</td>
                            <td>
                                @if ($achievement->image && Storage::disk('public')->exists('achievements/' . $achievement->image))
                                    <img src="{{ asset('storage/achievements/' . $achievement->image) }}"
                                        alt="Achievement Image" width="80">
                                @else
                                    <span>Image not found - Debug: {{ $achievement->image }} | Exists:
                                        {{ Storage::disk('public')->exists('achievements/' . $achievement->image) ? 'Yes' : 'No' }}</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($achievement->date)->format('Y-m-d') }}</td>
                            <td>{{ $achievement->user->name ?? 'Unknown' }}</td>
                            <td>{{ \Carbon\Carbon::parse($achievement->created_at)->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info view-achievement"
                                    data-id="{{ $achievement->id }}" data-toggle="modal"
                                    data-target="#viewAchievementModal">View</button>
                                <button type="button" class="btn btn-sm btn-warning edit-achievement"
                                    data-id="{{ $achievement->id }}" data-toggle="modal"
                                    data-target="#editAchievementModal">Edit</button>
                                <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST"
                                    style="display:inline;" class="delete-form-achievement">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No achievements available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Gallery Tab -->
        <div class="tab-pane fade {{ $activeTab == 'gallery' ? 'show active' : '' }}" id="gallery" role="tabpanel"
            aria-labelledby="gallery-tab">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Manage Gallery</h5>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createGalleryModal">Add
                    Image</button>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped" id="galleryTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Uploaded By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $index => $gallery)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if ($gallery->image && Storage::disk('public')->exists('gallery/' . $gallery->image))
                                    <img src="{{ asset('storage/gallery/' . $gallery->image) }}" alt="Gallery Image"
                                        width="80">
                                @else
                                    <span>Image not found - Debug: {{ $gallery->image }} | Exists:
                                        {{ Storage::disk('public')->exists('gallery/' . $gallery->image) ? 'Yes' : 'No' }}</span>
                                @endif
                            </td>
                            <td>{{ $gallery->user->name ?? 'Unknown' }}</td>
                            <td>{{ $gallery->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info view-gallery"
                                    data-id="{{ $gallery->id }}" data-toggle="modal"
                                    data-target="#viewGalleryModal">View</button>
                                <button type="button" class="btn btn-sm btn-warning edit-gallery"
                                    data-id="{{ $gallery->id }}" data-toggle="modal"
                                    data-target="#editGalleryModal">Edit</button>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                                    style="display:inline;" class="delete-form-gallery">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No images available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Achievement Modal -->
    <div class="modal fade" id="createAchievementModal" tabindex="-1" role="dialog"
        aria-labelledby="createAchievementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAchievementModalLabel">Add New Achievement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <form id="createAchievementForm" action="{{ route('achievements.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form_set">
                                                <h3>Achievement Information</h3>
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title"
                                                        class="form-control" value="{{ old('title') }}">
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_ta">Title (Tamil)</label>
                                                    <input type="text" name="title_ta" id="title_ta"
                                                        class="form-control" value="{{ old('title_ta') }}">
                                                    @error('title_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_ta">Description (Tamil)</label>
                                                    <textarea name="description_ta" id="description_ta" class="form-control" rows="5">{{ old('description_ta') }}</textarea>
                                                    @error('description_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" id="image"
                                                        class="form-control"
                                                        accept="image/jpeg,image/png,image/jpg,image/gif" required>
                                                    <small class="form-text text-muted">Max 2MB, required.</small>
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date" id="date"
                                                        class="form-control" value="{{ date('Y-m-d') }}" required>
                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="default-btn btn send_btn">Add Achievement
                                                    <span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Achievement Modal -->
    <div class="modal fade" id="editAchievementModal" tabindex="-1" role="dialog"
        aria-labelledby="editAchievementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAchievementModalLabel">Edit Achievement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <form id="editAchievementForm" action="" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form_set">
                                                <h3>Achievement Information</h3>
                                                <div class="form-group">
                                                    <label for="edit_title">Title</label>
                                                    <input type="text" name="title" id="edit_title"
                                                        class="form-control">
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_title_ta">Title (Tamil)</label>
                                                    <input type="text" name="title_ta" id="edit_title_ta"
                                                        class="form-control">
                                                    @error('title_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_description">Description</label>
                                                    <textarea name="description" id="edit_description" class="form-control" rows="5"></textarea>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_description_ta">Description (Tamil)</label>
                                                    <textarea name="description_ta" id="edit_description_ta" class="form-control" rows="5"></textarea>
                                                    @error('description_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_image">Image</label>
                                                    <img id="editAchievementImagePreview" src=""
                                                        alt="Current Image" width="200" class="img-thumbnail mb-2">
                                                    <input type="file" name="image" id="edit_image"
                                                        class="form-control"
                                                        accept="image/jpeg,image/png,image/jpg,image/gif">
                                                    <input type="hidden" name="id" id="editAchievementId">
                                                    <small class="form-text text-muted">Max 2MB, leave blank to keep
                                                        current image.</small>
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_date">Date</label>
                                                    <input type="date" name="date" id="edit_date"
                                                        class="form-control" required>
                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="default-btn btn send_btn">Update Achievement
                                                    <span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Achievement Modal -->
    <div class="modal fade" id="viewAchievementModal" tabindex="-1" role="dialog"
        aria-labelledby="viewAchievementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewAchievementModalLabel">View Achievement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <div class="form_set">
                                            <h3>Achievement Details</h3>
                                            <div class="form-group">
                                                <div id="viewAchievementImageContainer">
                                                    <img id="viewAchievementImage" src="" alt="Achievement Image"
                                                        class="img-fluid mb-2">
                                                </div>
                                                <p><strong>Title:</strong> <span id="viewAchievementTitle"></span></p>
                                                <p><strong>Title (Tamil):</strong> <span
                                                        id="viewAchievementTitleTa"></span></p>
                                                <p><strong>Description:</strong> <span
                                                        id="viewAchievementDescription"></span></p>
                                                <p><strong>Description (Tamil):</strong> <span
                                                        id="viewAchievementDescriptionTa"></span></p>
                                                <p><strong>Date:</strong> <span id="viewAchievementDate"></span></p>
                                                <p><strong>Created By:</strong> <span id="viewAchievementCreator"></span>
                                                </p>
                                                <p><strong>Created At:</strong> <span id="viewAchievementCreatedAt"></span>
                                                </p>
                                                {{-- <p><strong>Debug Info:</strong> <span id="viewAchievementDebug"></span></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Gallery Modal -->
    <div class="modal fade" id="createGalleryModal" tabindex="-1" role="dialog"
        aria-labelledby="createGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createGalleryModalLabel">Add New Gallery Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <form id="createGalleryForm" action="{{ route('gallery.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form_set">
                                                <h3>Image Information</h3>
                                                <div class="form-group">
                                                    <input type="file" name="images[]" class="form-control" multiple
                                                        accept="image/jpeg,image/png,image/jpg,image/gif" required>
                                                    <small class="form-text text-muted">Max 20 images, 2MB each. At least
                                                        one image is required.</small>
                                                    @error('images')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    @error('images.*')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="default-btn btn send_btn">Upload Images
                                                    <span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Gallery Modal -->
    <div class="modal fade" id="editGalleryModal" tabindex="-1" role="dialog" aria-labelledby="editGalleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGalleryModalLabel">Edit Gallery Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <form id="editGalleryForm" action="" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form_set">
                                                <h3>Image Information</h3>
                                                <div class="form-group">
                                                    <img id="editImagePreview" src="" alt="Current Image"
                                                        width="200" class="img-thumbnail mb-2">
                                                    <input type="file" name="image" class="form-control"
                                                        accept="image/jpeg,image/png,image/jpg,image/gif">
                                                    <input type="hidden" name="id" id="editGalleryId">
                                                    <small class="form-text text-muted">Max 2MB, leave blank to keep
                                                        current image.</small>
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="default-btn btn send_btn">Update Image
                                                    <span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Gallery Modal -->
    <div class="modal fade" id="viewGalleryModal" tabindex="-1" role="dialog" aria-labelledby="viewGalleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewGalleryModalLabel">View Gallery Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <div class="form_set">
                                            <h3>Image Details</h3>
                                            <div class="form-group">
                                                <div id="viewImageContainer">
                                                    <img id="viewImage" src="" alt="Gallery Image"
                                                        class="img-fluid mb-2">
                                                </div>
                                                <p><strong>Uploaded By:</strong> <span id="viewUploader"></span></p>
                                                <p><strong>Uploaded At:</strong> <span id="viewCreatedAt"></span></p>
                                                {{-- <p><strong>Debug Info:</strong> <span id="viewDebug"></span></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create News/Event Modal -->
    <div class="modal fade" id="createNewsEventModal" tabindex="-1" role="dialog"
        aria-labelledby="createNewsEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewsEventModalLabel">Add New News/Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <form id="createNewsEventForm" action="{{ route('news-events.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form_set">
                                                <h3>News/Event Information</h3>
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title"
                                                        class="form-control" value="{{ old('title') }}">
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_ta">Title (Tamil)</label>
                                                    <input type="text" name="title_ta" id="title_ta"
                                                        class="form-control" value="{{ old('title_ta') }}">
                                                    @error('title_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_ta">Description (Tamil)</label>
                                                    <textarea name="description_ta" id="description_ta" class="form-control" rows="5">{{ old('description_ta') }}</textarea>
                                                    @error('description_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" id="image"
                                                        class="form-control"
                                                        accept="image/jpeg,image/png,image/jpg,image/gif" required>
                                                    <small class="form-text text-muted">Max 2MB, required.</small>
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date" id="date"
                                                        class="form-control" value="{{ date('Y-m-d') }}" required>
                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="default-btn btn send_btn">Add News/Event
                                                    <span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit News/Event Modal -->
    <div class="modal fade" id="editNewsEventModal" tabindex="-1" role="dialog" aria-labelledby="editNewsEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNewsEventModalLabel">Edit News/Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <form id="editNewsEventForm" action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form_set">
                                                <h3>News/Event Information</h3>
                                                <div class="form-group">
                                                    <label for="edit_title">Title</label>
                                                    <input type="text" name="title" id="edit_title" class="form-control">
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_title_ta">Title (Tamil)</label>
                                                    <input type="text" name="title_ta" id="edit_title_ta" class="form-control">
                                                    @error('title_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_description">Description</label>
                                                    <textarea name="description" id="edit_description" class="form-control" rows="5"></textarea>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_description_ta">Description (Tamil)</label>
                                                    <textarea name="description_ta" id="edit_description_ta" class="form-control" rows="5"></textarea>
                                                    @error('description_ta')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_image">Image</label>
                                                    <img id="editNewsEventImagePreview" src="" alt="Current Image" width="200" class="img-thumbnail mb-2" style="display: none;">
                                                    <input type="file" name="image" id="edit_image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif">
                                                    <input type="hidden" name="id" id="editNewsEventId">
                                                    <small class="form-text text-muted">Max 2MB, leave blank to keep current image.</small>
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_date">Date</label>
                                                    <input type="date" name="date" id="edit_date" class="form-control" required>
                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="default-btn btn send_btn">Update News/Event <span></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- view News/Event Modal -->
    <div class="modal fade" id="viewNewsEventModal" tabindex="-1" role="dialog"
        aria-labelledby="viewNewsEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewNewsEventModalLabel">View News/Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="innerContent-wrap">
                        <div class="container">
                            <div class="login-wrap">
                                <div class="contact-info login_box">
                                    <div class="contact-form loginWrp registerWrp">
                                        <div class="form_set">
                                            <h3>News/Event Details</h3>
                                            <div class="form-group">
                                                <div id="viewNewsEventImageContainer" style="display: none;">
                                                    <img id="viewNewsEventImage" src="" alt="News/Event Image"
                                                        class="img-fluid mb-2">
                                                </div>
                                                <p><strong>Title:</strong> <span id="viewNewsEventTitle"></span></p>
                                                <p><strong>Title (Tamil):</strong> <span id="viewNewsEventTitleTa"></span>
                                                </p>
                                                <p><strong>Description:</strong> <span
                                                        id="viewNewsEventDescription"></span></p>
                                                <p><strong>Description (Tamil):</strong> <span
                                                        id="viewNewsEventDescriptionTa"></span></p>
                                                <p><strong>Date:</strong> <span id="viewNewsEventDate"></span></p>
                                                <p><strong>Created By:</strong> <span id="viewNewsEventCreator"></span></p>
                                                <p><strong>Created At:</strong> <span id="viewNewsEventCreatedAt"></span>
                                                </p>
                                                {{-- <p><strong>Debug Info:</strong> <span id="viewNewsEventDebug"></span></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
