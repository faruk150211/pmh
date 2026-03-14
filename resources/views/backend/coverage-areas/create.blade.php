@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">Create New Coverage Area</h1>
        </div>
    </div>

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

    <form method="POST" action="{{ route('admin.coverage-areas.store') }}" class="form-container">
        @csrf

        <!-- Title Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-heading" style="color: #3498db;"></i> Coverage Area Title
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (English) <span style="color: #e74c3c;">*</span></label>
                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en') }}" placeholder="Enter coverage area title in English" required>
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (Bengali)</label>
                        <input type="text" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" name="title_bn" value="{{ old('title_bn') }}" placeholder="কভারেজ এরিয়ার শিরোনাম">
                        @error('title_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
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
                        <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en" rows="3" placeholder="Enter coverage area description in English">{{ old('description_en') }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (Bengali)</label>
                        <textarea class="form-control @error('description_bn') is-invalid @enderror" id="description_bn" name="description_bn" rows="3" placeholder="কভারেজ এরিয়ার বর্ণনা লিখুন">{{ old('description_bn') }}</textarea>
                        @error('description_bn')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
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
                        <input class="form-check-input" type="checkbox" id="show_on_home" name="show_on_home" value="1" {{ old('show_on_home') ? 'checked' : '' }} style="width: 20px; height: 20px; cursor: pointer;">
                        <label class="form-check-label" for="show_on_home" style="font-weight: 500; color: #2c3e50; margin-left: 8px; cursor: pointer;">
                            Show on Homepage
                        </label>
                        <small class="form-text text-muted d-block" style="margin-left: 0; margin-top: 8px;">Check this box to display this coverage area on the homepage</small>
                    </div>
                </div>
                <div class="mb-0">
                    <label for="order" class="form-label" style="font-weight: 500; color: #2c3e50; margin-bottom: 8px;">Display Order</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', 0) }}" min="0" placeholder="Enter order number (0, 1, 2, ...)">
                    <small class="form-text text-muted">Lower numbers appear first. Areas with the same order are sorted by creation date.</small>
                    @error('order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.coverage-areas.index') }}" class="btn btn-secondary btn-lg" style="padding: 10px 30px; border-radius: 6px; font-weight: 600;">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-success btn-lg" style="padding: 10px 40px; border-radius: 6px; font-weight: 600; background-color: #27ae60; border-color: #27ae60;">
                <i class="fas fa-plus"></i> Create Coverage Area
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
</style>
@endsection
