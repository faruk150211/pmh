@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">Pricing Section</h1>
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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pricing.update') }}" class="form-container">
        @csrf
        @method('PUT')

        <!-- Title & Description Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-heading" style="color: #3498db;"></i> Section Title & Description
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (English)</label>
                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $pricing->title_en) }}" placeholder="e.g., Pricing">
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Title (Bengali)</label>
                        <input type="text" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" name="title_bn" value="{{ old('title_bn', $pricing->title_bn) }}" placeholder="e.g., মূল্য নির্ধারণ">
                        @error('title_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="description_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (English)</label>
                        <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en" rows="2" placeholder="Section description">{{ old('description_en', $pricing->description_en) }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Description (Bengali)</label>
                        <textarea class="form-control @error('description_bn') is-invalid @enderror" id="description_bn" name="description_bn" rows="2" placeholder="সেকশন বর্ণনা">{{ old('description_bn', $pricing->description_bn) }}</textarea>
                        @error('description_bn')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Price Information Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-tags" style="color: #27ae60;"></i> Price Information
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label" style="font-weight: 500; color: #2c3e50;">Price Amount</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $pricing->price) }}" placeholder="e.g., 5000" step="0.01" min="0">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="currency" class="form-label" style="font-weight: 500; color: #2c3e50;">Currency</label>
                        <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ old('currency', $pricing->currency) }}" placeholder="e.g., ৳" maxlength="10">
                        @error('currency')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price_label_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Price Label (English)</label>
                        <input type="text" class="form-control @error('price_label_en') is-invalid @enderror" id="price_label_en" name="price_label_en" value="{{ old('price_label_en', $pricing->price_label_en) }}" placeholder="e.g., Per Visit">
                        @error('price_label_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price_label_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Price Label (Bengali)</label>
                        <input type="text" class="form-control @error('price_label_bn') is-invalid @enderror" id="price_label_bn" name="price_label_bn" value="{{ old('price_label_bn', $pricing->price_label_bn) }}" placeholder="e.g., প্রতি পরিদর্শন">
                        @error('price_label_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price_subtitle_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Price Subtitle (English)</label>
                        <input type="text" class="form-control @error('price_subtitle_en') is-invalid @enderror" id="price_subtitle_en" name="price_subtitle_en" value="{{ old('price_subtitle_en', $pricing->price_subtitle_en) }}" placeholder="e.g., Starting from">
                        @error('price_subtitle_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price_subtitle_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Price Subtitle (Bengali)</label>
                        <input type="text" class="form-control @error('price_subtitle_bn') is-invalid @enderror" id="price_subtitle_bn" name="price_subtitle_bn" value="{{ old('price_subtitle_bn', $pricing->price_subtitle_bn) }}" placeholder="e.g., শুরু থেকে">
                        @error('price_subtitle_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-list-check" style="color: #e74c3c;"></i> Features
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="features_title_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Features Title (English)</label>
                        <input type="text" class="form-control" id="features_title_en" name="features_title_en" value="{{ old('features_title_en', $pricing->features_title_en) }}" placeholder="e.g., Includes:">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="features_title_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Features Title (Bengali)</label>
                        <input type="text" class="form-control" id="features_title_bn" name="features_title_bn" value="{{ old('features_title_bn', $pricing->features_title_bn) }}" placeholder="e.g., অন্তর্ভুক্ত:">
                    </div>
                </div>

                <!-- Features 1-5 -->
                @for ($i = 1; $i <= 5; $i++)
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="feature_{{ $i }}_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Feature {{ $i }} (English)</label>
                            <input type="text" class="form-control" id="feature_{{ $i }}_en" name="feature_{{ $i }}_en" value="{{ old('feature_' . $i . '_en', $pricing->{'feature_' . $i . '_en'}) }}" placeholder="Enter feature {{ $i }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feature_{{ $i }}_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Feature {{ $i }} (Bengali)</label>
                            <input type="text" class="form-control" id="feature_{{ $i }}_bn" name="feature_{{ $i }}_bn" value="{{ old('feature_' . $i . '_bn', $pricing->{'feature_' . $i . '_bn'}) }}" placeholder="ফিচার {{ $i }} লিখুন">
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Pricing Note Section -->
        <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-note-sticky" style="color: #f39c12;"></i> Pricing Note
                </h5>
            </div>
            <div class="card-body" style="padding: 20px;">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="note_en" class="form-label" style="font-weight: 500; color: #2c3e50;">Note (English)</label>
                        <textarea class="form-control" id="note_en" name="note_en" rows="2" placeholder="Disclaimer or additional pricing information">{{ old('note_en', $pricing->note_en) }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="note_bn" class="form-label" style="font-weight: 500; color: #2c3e50;">Note (Bengali)</label>
                        <textarea class="form-control" id="note_bn" name="note_bn" rows="2" placeholder="অস্বীকরণ বা অতিরিক্ত মূল্য তথ্য">{{ old('note_bn', $pricing->note_bn) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg" style="padding: 10px 30px; border-radius: 6px; font-weight: 600;">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <button type="submit" class="btn btn-primary btn-lg" style="padding: 10px 40px; border-radius: 6px; font-weight: 600;">
                <i class="fas fa-save"></i> Update Pricing
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
