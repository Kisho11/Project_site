<!-- Js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('web/assets/js/jquery.min.js') }}"
    onerror="this.src='https://code.jquery.com/jquery-3.5.1.min.js'"></script>
<script src="{{ asset('web/assets/js/bootstrap.min.js') }}"
    onerror="this.src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'"></script>
<script src="{{ asset('web/assets/js/popper.min.js') }}"
    onerror="this.src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'"></script>
<script src="{{ asset('web/assets/rs-plugin/js/jquery.themepunch.tools.min.js') }}"
    onerror="console.error('Failed to load Revolution Slider Tools')"></script>
<script src="{{ asset('web/assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"
    onerror="console.error('Failed to load Revolution Slider')"></script>
<!-- Jquery Fancybox -->
<script src="{{ asset('web/assets/js/jquery.fancybox.min.js') }}"
    onerror="this.src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'"></script>
<!-- Animate js -->
<script src="{{ asset('web/assets/js/animate.js') }}" onerror="console.error('Failed to load animate.js')"></script>
<script src="{{ asset('web/assets/js/wow.js') }}"
    onerror="this.src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js'"></script>
<script>
    new WOW().init();
</script>
<!-- DataTables -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- general script file -->
<script src="{{ asset('web/assets/js/owl.carousel.js') }}"
    onerror="this.src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'"></script>
<script src="{{ asset('web/assets/js/script.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            document.getElementById("loader").style.display = "none";
        }, 1500);
    });
</script>

<script>
    jQuery(document).ready(function($) {
        // Initialize DataTable for Gallery only if not already initialized
        if (!$.fn.DataTable.isDataTable('#galleryTable')) {
            $('#galleryTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                responsive: true,
                columnDefs: [{
                    targets: [1],
                    orderable: false
                }]
            });
        }

        // Initialize DataTable for Achievements only if not already initialized
        if (!$.fn.DataTable.isDataTable('#achievementsTable')) {
            $('#achievementsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                responsive: true,
                columnDefs: [{
                    targets: [2],
                    orderable: false
                }]
            });
        }

        // View Gallery Modal
        $('.view-gallery').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log('Fetching gallery view data for ID:', id);
            $.ajax({
                url: '/gallery/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log('Gallery view data received:', data);
                    if (data.image && data.image !== '') {
                        $('#viewImage').attr('src', '{{ asset('storage/gallery') }}/' +
                            data.image);
                        $('#viewImageContainer').show();
                    } else {
                        $('#viewImageContainer').hide();
                        $('#viewUploader').text('No image available');
                    }
                    $('#viewUploader').text(data.user || 'Unknown');
                    $('#viewCreatedAt').text(data.created_at || 'Not available');
                    $('#viewDebug').text('ID: ' + (data.id || 'N/A') + ', Image: ' + (data
                        .image || 'None'));
                    $('#viewGalleryModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading gallery view data:', xhr.status, xhr
                        .responseText);
                    $('#viewImageContainer').hide();
                    $('#viewUploader').text('Error loading data');
                    $('#viewCreatedAt').text('Not available');
                    $('#viewDebug').text('Error: ' + xhr.statusText);
                    $('#viewGalleryModal').modal('show');
                }
            });
        });

        // Edit Gallery Modal (similar changes as needed)
        $('.edit-gallery').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log('Fetching gallery edit data for ID:', id);
            $.ajax({
                url: '/gallery/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log('Gallery edit data received:', data);
                    $('#editGalleryId').val(data.id);
                    if (data.image && data.image !== '') {
                        $('#editImagePreview').attr('src',
                            '{{ asset('storage/gallery') }}/' + data.image);
                        $('#editImagePreview').show();
                    } else {
                        $('#editImagePreview').hide();
                    }
                    $('#editGalleryForm').attr('action',
                        '{{ route('gallery.update', ':id') }}'.replace(':id', data.id));
                    $('#editGalleryModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading gallery edit data:', xhr.responseText);
                    alert('Failed to load image for editing.');
                }
            });
        });

        // Delete Confirmation with SweetAlert for Gallery
        $(document).on('submit', '.delete-form-gallery', function(e) {
            e.preventDefault();
            // console.log('Gallery delete form submit triggered for ID:', $(this).find(
                // 'input[name="_method"]').val());
            var form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // View Achievement Modal
        $('.view-achievement').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log('Fetching achievement view data for ID:', id);
            $.ajax({
                url: '/achievements/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log('Achievement view data received:', data);
                    if (data.image && data.image !== '') {
                        $('#viewAchievementImage').attr('src',
                            '{{ asset('storage/achievements') }}/' + data.image);
                        $('#viewAchievementImageContainer').show();
                    } else {
                        $('#viewAchievementImageContainer').hide();
                    }
                    $('#viewAchievementTitle').text(data.title || 'Not available');
                    $('#viewAchievementTitleTa').text(data.title_ta || 'Not available');
                    $('#viewAchievementDescription').text(data.description ||
                        'Not available');
                    $('#viewAchievementDescriptionTa').text(data.description_ta ||
                        'Not available');
                    $('#viewAchievementDate').text(data.date || 'Not available');
                    $('#viewAchievementCreator').text(data.user || 'Unknown');
                    $('#viewAchievementCreatedAt').text(data.created_at || 'Not available');
                    $('#viewAchievementDebug').text('ID: ' + (data.id || 'N/A') +
                        ', Image: ' + (data.image || 'None'));
                    $('#viewAchievementModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading achievement view data:', xhr.status, xhr
                        .responseText);
                    $('#viewAchievementImageContainer').hide();
                    $('#viewAchievementTitle').text('Error loading data');
                    $('#viewAchievementTitleTa').text('Error loading data');
                    $('#viewAchievementDescription').text('Error loading data');
                    $('#viewAchievementDescriptionTa').text('Error loading data');
                    $('#viewAchievementDate').text('Not available');
                    $('#viewAchievementCreator').text('Error loading data');
                    $('#viewAchievementCreatedAt').text('Not available');
                    $('#viewAchievementDebug').text('Error: ' + xhr.statusText);
                    $('#viewAchievementModal').modal('show');
                }
            });
        });

        // Edit Achievement Modal
        $('.edit-achievement').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log('Fetching achievement edit data for ID:', id);
            $.ajax({
                url: '/achievements/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log('Achievement edit data received:', data);
                    $('#editAchievementId').val(data.id);
                    $('#edit_title').val(data.title || '');
                    $('#edit_title_ta').val(data.title_ta || '');
                    $('#edit_description').val(data.description || '');
                    $('#edit_description_ta').val(data.description_ta || '');
                    if (data.image && data.image !== '') {
                        $('#editAchievementImagePreview').attr('src',
                            '{{ asset('storage/achievements') }}/' + data.image);
                        $('#editAchievementImagePreview').show();
                    } else {
                        $('#editAchievementImagePreview').hide();
                    }
                    $('#edit_date').val(data.date || '');
                    $('#editAchievementForm').attr('action',
                        '{{ route('achievements.update', ':id') }}'.replace(':id', data
                            .id));
                    $('#editAchievementModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading achievement edit data:', xhr.responseText);
                    alert('Failed to load achievement for editing.');
                }
            });
        });

        // Edit Achievement Form Submission
        $('#editAchievementForm').on('submit', function(e) {
            // console.log('Achievement edit form submitted to:', $(this).attr('action'));
        });

        // Delete Confirmation with SweetAlert for Achievement
        $(document).on('submit', '.delete-form-achievement', function(e) {
            e.preventDefault();
            // console.log('Achievement delete form submit triggered for ID:', $(this).find(
                // 'input[name="_method"]').val());
            var form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Initialize DataTable for News & Events only if not already initialized
        if (!$.fn.DataTable.isDataTable('#newsEventsTable')) {
            $('#newsEventsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                responsive: true,
                columnDefs: [{
                    targets: [2],
                    orderable: false
                }]
            });
        }

        // View News/Event Modal
        $('.view-news-event').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log('Fetching news/event view data for ID:', id);
            $.ajax({
                url: '/news-events/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log('News/Event view data received:', data);
                    if (data.image && data.image !== '') {
                        $('#viewNewsEventImage').attr('src',
                            '{{ asset('storage/news_events') }}/' + data.image);
                        $('#viewNewsEventImageContainer').show();
                    } else {
                        $('#viewNewsEventImageContainer').hide();
                    }
                    $('#viewNewsEventTitle').text(data.title || 'Not available');
                    $('#viewNewsEventTitleTa').text(data.title_ta || 'Not available');
                    $('#viewNewsEventDescription').text(data.description ||
                        'Not available');
                    $('#viewNewsEventDescriptionTa').text(data.description_ta ||
                        'Not available');
                    $('#viewNewsEventDate').text(data.date || 'Not available');
                    $('#viewNewsEventCreator').text(data.user || 'Unknown');
                    $('#viewNewsEventCreatedAt').text(data.created_at || 'Not available');
                    $('#viewNewsEventDebug').text('ID: ' + (data.id || 'N/A') +
                        ', Image: ' + (data.image || 'None'));
                    $('#viewNewsEventModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading news/event view data:', xhr.status, xhr
                        .responseText);
                    $('#viewNewsEventImageContainer').hide();
                    $('#viewNewsEventTitle').text('Error loading data');
                    $('#viewNewsEventTitleTa').text('Error loading data');
                    $('#viewNewsEventDescription').text('Error loading data');
                    $('#viewNewsEventDescriptionTa').text('Error loading data');
                    $('#viewNewsEventDate').text('Not available');
                    $('#viewNewsEventCreator').text('Error loading data');
                    $('#viewNewsEventCreatedAt').text('Not available');
                    $('#viewNewsEventDebug').text('Error: ' + xhr.statusText);
                    $('#viewNewsEventModal').modal('show');
                }
            });
        });

        // Edit News/Event Modal
        $('.edit-news-event').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log('Fetching news/event edit data for ID:', id);
            $.ajax({
                url: '/news-events/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // console.log('News/Event edit data received:', data);
                    // Clear previous modal content
                    $('#editNewsEventModal .modal-body').html(''); // Reset modal body
                    // Rebuild modal body with new content
                    var modalBody = `
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
                                                <input type="text" name="title" id="edit_title" class="form-control" value="${data.title || ''}">
                                                <div class="text-danger edit-title-error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_title_ta">Title (Tamil)</label>
                                                <input type="text" name="title_ta" id="edit_title_ta" class="form-control" value="${data.title_ta || ''}">
                                                <div class="text-danger edit-title-ta-error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_description">Description</label>
                                                <textarea name="description" id="edit_description" class="form-control" rows="5">${data.description || ''}</textarea>
                                                <div class="text-danger edit-description-error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_description_ta">Description (Tamil)</label>
                                                <textarea name="description_ta" id="edit_description_ta" class="form-control" rows="5">${data.description_ta || ''}</textarea>
                                                <div class="text-danger edit-description-ta-error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_image">Image</label>
                                                <img id="editNewsEventImagePreview" src="${data.image ? '{{ asset('storage/news_events') }}/' + data.image : ''}" alt="Current Image" width="200" class="img-thumbnail mb-2" style="display: ${data.image ? 'block' : 'none'}" onerror="this.style.display='none'; this.src='{{ asset('web/assets/images/main/placeholder.png') }}'; this.alt='Image not found';">
                                                <input type="file" name="image" id="edit_image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif">
                                                <input type="hidden" name="id" id="editNewsEventId" value="${data.id}">
                                                <small class="form-text text-muted">Max 2MB, leave blank to keep current image.</small>
                                                <div class="text-danger edit-image-error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_date">Date</label>
                                                <input type="date" name="date" id="edit_date" class="form-control" value="${data.date || ''}" required>
                                                <div class="text-danger edit-date-error"></div>
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
            `;
                    $('#editNewsEventModal .modal-body').html(modalBody);
                    // Set the form action dynamically
                    $('#editNewsEventForm').attr('action',
                        '{{ route('news-events.update', ':id') }}'.replace(':id', data
                            .id));
                    // console.log('Form action set to:', $('#editNewsEventForm').attr(
                        // 'action'));
                    // Verify field values after population
                    // console.log('Title:', $('#edit_title').val());
                    // console.log('Date:', $('#edit_date').val());
                    $('#editNewsEventModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading news/event edit data:', xhr.responseText);
                    $('#editNewsEventModal .modal-body').html(
                        '<div class="alert alert-danger">Failed to load data.</div>');
                    $('#editNewsEventModal').modal('show');
                }
            });
        });

        // Edit News/Event Form Submission (for debugging)
        $('#editNewsEventForm').on('submit', function(e) {
            // console.log('News/Event edit form submitted to:', $(this).attr('action'));
            // Add form submission logic if needed (e.g., AJAX submission)
        });

        // Delete Confirmation with SweetAlert for News/Event
        $(document).on('submit', '.delete-form-news-event', function(e) {
            e.preventDefault();
            // console.log('News/Event delete form submit triggered for ID:', $(this).find(
                // 'input[name="_method"]').val());
            var form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
{{-- @endsection --}}
