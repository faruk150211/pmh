@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">Edit Service</h1>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✓ Success!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>⚠ Validation Errors!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

        <!-- Service Title Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-heading" style="color: #3498db;"></i> Service Title
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (English) <span style="color: #e74c3c;">*</span></label>
                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $service->title_en) }}" placeholder="Enter service title in English" required>
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (Bengali)</label>
                        <input type="text" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" name="title_bn" value="{{ old('title_bn', $service->title_bn) }}" placeholder="সেবার শিরোনাম লিখুন">
                        @error('title_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Slug Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-link" style="color: #16a34a;"></i> URL Slug
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="slug_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Slug (English)</label>
                        <input type="text" class="form-control @error('slug_en') is-invalid @enderror" id="slug_en" name="slug_en" value="{{ old('slug_en', $service->slug_en) }}" placeholder="e.g., cardiology" autocomplete="off">
                        <small class="text-muted">URL-friendly format (use hyphens, no spaces)</small>
                        @error('slug_en')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Slug (Bengali)</label>
                        <input type="text" class="form-control @error('slug_bn') is-invalid @enderror" id="slug_bn" name="slug_bn" value="{{ old('slug_bn', $service->slug_bn) }}" placeholder="e.g., হৃদরোগ">
                        <small class="text-muted">Bengali URL slug</small>
                        @error('slug_bn')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Short Description Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-file-alt" style="color: #f39c12;"></i> Short Description
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="short_description_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Short Description (English)</label>
                        <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en" name="short_description_en" rows="2" placeholder="Enter a brief description in English (max 500 characters)">{{ old('short_description_en', $service->short_description_en) }}</textarea>
                        <small class="text-muted">Brief summary for homepage display</small>
                        @error('short_description_en')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="short_description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Short Description (Bengali)</label>
                        <textarea class="form-control @error('short_description_bn') is-invalid @enderror" id="short_description_bn" name="short_description_bn" rows="2" placeholder="সংক্ষিপ্ত বর্ণনা (সর্বোচ্চ ৫০০ অক্ষর)">{{ old('short_description_bn', $service->short_description_bn) }}</textarea>
                        <small class="text-muted">হোমপেজ প্রদর্শনের জন্য সংক্ষিপ্ত সারসংক্ষেপ</small>
                        @error('short_description_bn')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-file-alt" style="color: #f39c12;"></i> Description
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="description_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (English)</label>
                        <textarea class="form-control tinymce @error('description_en') is-invalid @enderror" id="description_en" name="description_en" placeholder="Enter service description in English">{{ old('description_en', $service->description_en) }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (Bengali)</label>
                        <textarea class="form-control tinymce @error('description_bn') is-invalid @enderror" id="description_bn" name="description_bn" placeholder="সেবার বিবরণ লিখুন">{{ old('description_bn', $service->description_bn) }}</textarea>
                        @error('description_bn')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Image Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-image" style="color: #e74c3c;"></i> Service Banner Image
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-12">
                        <label for="banner" class="form-label" style="font-weight: 500; color: #2c3e50;">Update Banner</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control @error('banner') is-invalid @enderror" id="banner" name="banner" accept="image/*">
                            <label class="input-group-text" for="banner" style="cursor: pointer; background-color: #3498db; border-color: #3498db; color: white;">
                                <i class="fas fa-cloud-upload-alt"></i> Choose File
                            </label>
                        </div>
                        <small class="text-muted">Formats: JPEG, PNG, JPG, GIF, WEBP (Max: 2MB) | Leave empty to keep current image</small>
                        @error('banner')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <div id="imagePreview" style="margin-top: 15px;">
                            @if($service->banner)
                                <div style="position: relative; display: inline-block;">
                                    <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->title_en }}" style="max-width: 200px; max-height: 200px; border-radius: 8px; border: 2px solid #e9ecef; padding: 5px; object-fit: cover;">
                                    <small style="display: block; margin-top: 8px; color: #666;">Current Image</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Settings -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-eye" style="color: #9b59b6;"></i> Display Settings
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="mb-3">
                    <div class="form-check" style="padding-left: 1.5rem;">
                        <input class="form-check-input" type="checkbox" id="show_on_home" name="show_on_home" value="1" {{ $service->show_on_home ? 'checked' : '' }} style="width: 20px; height: 20px; cursor: pointer;">
                        <label class="form-check-label" for="show_on_home" style="font-weight: 500; color: #2c3e50; margin-left: 8px; cursor: pointer;">
                            Show on Homepage
                        </label>
                        <small class="form-text text-muted d-block" style="margin-left: 0; margin-top: 8px;">Check this box to display this service on the homepage services section</small>
                    </div>
                </div>
                <div class="mb-0">
                    <label for="order" class="form-label" style="font-weight: 500; color: #2c3e50; margin-bottom: 8px;">Display Order</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $service->order) }}" min="0" placeholder="Enter order number (0, 1, 2, ...)">
                    <small class="form-text text-muted">Lower numbers appear first. Services with the same order are sorted by creation date.</small>
                    @error('order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-lg" style="padding: 10px 30px; border-radius: 6px; font-weight: 600;">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 40px; border-radius: 6px; font-weight: 600; background-color: #3498db; border-color: #3498db;">
                <i class="fas fa-save"></i> Update Service
            </button>
        </div>
    </form>
</div>

<style>
    .form-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12) !important;
    }

    .form-label {
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.15);
    }

    .form-control {
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 10px 15px;
        font-size: 0.95rem;
        transition: all 0.2s;
    }

    .form-control:hover {
        border-color: #3498db;
    }

    .tinymce {
        min-height: 300px;
    }

    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.875rem;
        margin-top: 5px;
    }

    .alert {
        border-radius: 8px;
        border: none;
    }

    .btn {
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 6px;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .input-group-text {
        cursor: pointer;
        user-select: none;
    }

    #imagePreview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    #imagePreview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 5px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 0 10px;
        }

        .btn-lg {
            padding: 8px 20px !important;
            font-size: 0.95rem !important;
        }

        h1.h3 {
            font-size: 1.3rem;
        }
    }
</style>

<script src="https://cdn.tiny.cloud/1/6pprakf1g0xrv7b2h7gqr2wv60t0d9gm1y8fu4k8owwh6orf/tinymce/6/tinymce.min.js"></script>
<script>
    // Image preview functionality
    document.getElementById('banner').addEventListener('change', function(e) {
        const preview = document.getElementById('imagePreview');

        if (this.files.length > 0) {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                // Remove the current image display
                const currentImg = preview.querySelector('div:not(.new-preview)');
                if (currentImg) {
                    currentImg.remove();
                }

                // Create new preview
                let newPreviewDiv = preview.querySelector('.new-preview');
                if (!newPreviewDiv) {
                    newPreviewDiv = document.createElement('div');
                    newPreviewDiv.className = 'new-preview';
                    newPreviewDiv.style.position = 'relative';
                    newPreviewDiv.style.display = 'inline-block';
                    preview.appendChild(newPreviewDiv);
                }

                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                img.style.borderRadius = '8px';
                img.style.border = '2px solid #e9ecef';
                img.style.padding = '5px';
                img.style.objectFit = 'cover';

                newPreviewDiv.innerHTML = '';
                newPreviewDiv.appendChild(img);

                const small = document.createElement('small');
                small.style.display = 'block';
                small.style.marginTop = '8px';
                small.style.color = '#27ae60';
                small.textContent = 'New Image Preview';
                newPreviewDiv.appendChild(small);
            };

            reader.readAsDataURL(file);
        }
    });

    // TinyMCE initialization
    tinymce.init({
        selector: '.tinymce',
        plugins: 'autolink lists link image charmap print preview anchor searchreplace visualblocks fullscreen insertdatetime media table paste help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image | help',
        height: 350,
        menubar: false,
        branding: false,
        content_style: "body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }",
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        }
    });
</script>
@endsection
