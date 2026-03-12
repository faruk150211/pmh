@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">Mission & Vision Management</h1>
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

    <form method="POST" action="{{ route('admin.mission-vision.update') }}" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

        <!-- Page Heading Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-heading" style="color: #3498db;"></i> Page Heading
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="heading_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Heading (English)</label>
                        <input type="text" class="form-control @error('heading_en') is-invalid @enderror" id="heading_en" name="heading_en" value="{{ $missionVision->heading_en ?? 'Our Mission & Vision' }}" placeholder="Enter heading in English">
                        @error('heading_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="heading_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Heading (Bengali)</label>
                        <input type="text" class="form-control @error('heading_bn') is-invalid @enderror" id="heading_bn" name="heading_bn" value="{{ $missionVision->heading_bn ?? 'আমাদের মিশন এবং ভিশন' }}" placeholder="বাংলায় শিরোনাম লিখুন">
                        @error('heading_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="description_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (English)</label>
                        <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en" rows="3" placeholder="Enter description in English">{{ $missionVision->description_en ?? '' }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (Bengali)</label>
                        <textarea class="form-control @error('description_bn') is-invalid @enderror" id="description_bn" name="description_bn" rows="3" placeholder="বাংলায় বিবরণ লিখুন">{{ $missionVision->description_bn ?? '' }}</textarea>
                        @error('description_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-target" style="color: #e74c3c;"></i> Our Mission
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mission_heading_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Mission Heading (English)</label>
                        <input type="text" class="form-control @error('mission_heading_en') is-invalid @enderror" id="mission_heading_en" name="mission_heading_en" value="{{ $missionVision->mission_heading_en ?? 'Our Mission' }}" placeholder="Our Mission">
                        @error('mission_heading_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mission_heading_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Mission Heading (Bengali)</label>
                        <input type="text" class="form-control @error('mission_heading_bn') is-invalid @enderror" id="mission_heading_bn" name="mission_heading_bn" value="{{ $missionVision->mission_heading_bn ?? 'আমাদের মিশন' }}" placeholder="আমাদের মিশন">
                        @error('mission_heading_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="mission_content_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Mission Content (English)</label>
                        <textarea class="form-control tinymce @error('mission_content_en') is-invalid @enderror" id="mission_content_en" name="mission_content_en">{{ $missionVision->mission_content_en ?? '' }}</textarea>
                        @error('mission_content_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="mission_content_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Mission Content (Bengali)</label>
                        <textarea class="form-control tinymce @error('mission_content_bn') is-invalid @enderror" id="mission_content_bn" name="mission_content_bn">{{ $missionVision->mission_content_bn ?? '' }}</textarea>
                        @error('mission_content_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="mission_image" class="form-label" style="font-weight: 500; color: #2c3e50;">Mission Image</label>
                        <input type="file" class="form-control @error('mission_image') is-invalid @enderror" id="mission_image" name="mission_image" accept="image/*">
                        <small class="text-muted">Formats: JPEG, PNG, JPG, GIF, WEBP (Max: 2MB)</small>
                        @error('mission_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @if ($missionVision->mission_image)
                            <div class="mt-2">
                                <strong>Current Image:</strong><br>
                                <img src="{{ asset('storage/' . $missionVision->mission_image) }}" alt="Mission Image" style="max-width: 200px; border-radius: 8px; margin-top: 10px;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-lightbulb" style="color: #f39c12;"></i> Our Vision
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vision_heading_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Vision Heading (English)</label>
                        <input type="text" class="form-control @error('vision_heading_en') is-invalid @enderror" id="vision_heading_en" name="vision_heading_en" value="{{ $missionVision->vision_heading_en ?? 'Our Vision' }}" placeholder="Our Vision">
                        @error('vision_heading_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vision_heading_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Vision Heading (Bengali)</label>
                        <input type="text" class="form-control @error('vision_heading_bn') is-invalid @enderror" id="vision_heading_bn" name="vision_heading_bn" value="{{ $missionVision->vision_heading_bn ?? 'আমাদের ভিশন' }}" placeholder="আমাদের ভিশন">
                        @error('vision_heading_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="vision_content_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Vision Content (English)</label>
                        <textarea class="form-control tinymce @error('vision_content_en') is-invalid @enderror" id="vision_content_en" name="vision_content_en">{{ $missionVision->vision_content_en ?? '' }}</textarea>
                        @error('vision_content_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="vision_content_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Vision Content (Bengali)</label>
                        <textarea class="form-control tinymce @error('vision_content_bn') is-invalid @enderror" id="vision_content_bn" name="vision_content_bn">{{ $missionVision->vision_content_bn ?? '' }}</textarea>
                        @error('vision_content_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="vision_image" class="form-label" style="font-weight: 500; color: #2c3e50;">Vision Image</label>
                        <input type="file" class="form-control @error('vision_image') is-invalid @enderror" id="vision_image" name="vision_image" accept="image/*">
                        <small class="text-muted">Formats: JPEG, PNG, JPG, GIF, WEBP (Max: 2MB)</small>
                        @error('vision_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @if ($missionVision->vision_image)
                            <div class="mt-2">
                                <strong>Current Image:</strong><br>
                                <img src="{{ asset('storage/' . $missionVision->vision_image) }}" alt="Vision Image" style="max-width: 200px; border-radius: 8px; margin-top: 10px;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Commitment Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-hands-helping" style="color: #16a34a;"></i> Our Commitment
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="commitment_heading_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Commitment Heading (English)</label>
                        <input type="text" class="form-control @error('commitment_heading_en') is-invalid @enderror" id="commitment_heading_en" name="commitment_heading_en" value="{{ $missionVision->commitment_heading_en ?? 'Our Commitment' }}" placeholder="Our Commitment">
                        @error('commitment_heading_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="commitment_heading_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Commitment Heading (Bengali)</label>
                        <input type="text" class="form-control @error('commitment_heading_bn') is-invalid @enderror" id="commitment_heading_bn" name="commitment_heading_bn" value="{{ $missionVision->commitment_heading_bn ?? 'আমাদের প্রতিশ্রুতি' }}" placeholder="আমাদের প্রতিশ্রুতি">
                        @error('commitment_heading_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="commitment_description_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Commitment Description (English)</label>
                        <textarea class="form-control" id="commitment_description_en" name="commitment_description_en" rows="2" placeholder="Enter commitment description in English">{{ $missionVision->commitment_description_en ?? '' }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="commitment_description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Commitment Description (Bengali)</label>
                        <textarea class="form-control" id="commitment_description_bn" name="commitment_description_bn" rows="2" placeholder="বাংলায় প্রতিশ্রুতির বিবরণ লিখুন">{{ $missionVision->commitment_description_bn ?? '' }}</textarea>
                    </div>
                </div>

                <!-- Commitment Items -->
                @for ($i = 1; $i <= 4; $i++)
                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                        <h6 style="color: #2c3e50; font-weight: 600; margin-bottom: 15px;">
                            <i class="fas fa-star" style="color: #3498db;"></i> Commitment #{{ $i }}
                        </h6>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="commitment_{{ $i }}_icon" class="form-label" style="font-weight: 500; color: #2c3e50;">Icon Class</label>
                                <input type="text" class="form-control" id="commitment_{{ $i }}_icon" name="commitment_{{ $i }}_icon" value="{{ $missionVision->{'commitment_' . $i . '_icon'} ?? 'fas fa-check' }}" placeholder="e.g., fas fa-check">
                                <small class="text-muted">Use Font Awesome class names</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="commitment_{{ $i }}_title_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (English)</label>
                                <input type="text" class="form-control" id="commitment_{{ $i }}_title_en" name="commitment_{{ $i }}_title_en" value="{{ $missionVision->{'commitment_' . $i . '_title_en'} ?? '' }}" placeholder="Enter title in English">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="commitment_{{ $i }}_title_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (Bengali)</label>
                                <input type="text" class="form-control" id="commitment_{{ $i }}_title_bn" name="commitment_{{ $i }}_title_bn" value="{{ $missionVision->{'commitment_' . $i . '_title_bn'} ?? '' }}" placeholder="বাংলায় শিরোনাম লিখুন">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="commitment_{{ $i }}_description_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (English)</label>
                                <textarea class="form-control" id="commitment_{{ $i }}_description_en" name="commitment_{{ $i }}_description_en" rows="2" placeholder="Enter description in English">{{ $missionVision->{'commitment_' . $i . '_description_en'} ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="commitment_{{ $i }}_description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (Bengali)</label>
                                <textarea class="form-control" id="commitment_{{ $i }}_description_bn" name="commitment_{{ $i }}_description_bn" rows="2" placeholder="বাংলায় বিবরণ লিখুন">{{ $missionVision->{'commitment_' . $i . '_description_bn'} ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg" style="padding: 10px 30px; border-radius: 6px;">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 40px; border-radius: 6px;">
                <i class="fas fa-save"></i> Save Changes
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
    }

    .btn:hover {
        transform: translateY(-2px);
    }
</style>

<script src="https://cdn.tiny.cloud/1/6pprakf1g0xrv7b2h7gqr2wv60t0d9gm1y8fu4k8owwh6orf/tinymce/6/tinymce.min.js"></script>
<script>
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
