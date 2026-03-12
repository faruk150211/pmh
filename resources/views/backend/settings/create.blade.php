@extends('backend.layouts.master')

@section('title', 'Create New Setting - Admin Panel')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">
                <i class="fas fa-plus-circle"></i> Create New Setting
            </h1>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Validation Error!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="key">Setting Key <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('key') is-invalid @enderror"
                                id="key"
                                name="key"
                                placeholder="e.g., site_name, site_email"
                                value="{{ old('key') }}"
                                required
                            >
                            @error('key')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Use lowercase with underscores</small>
                        </div>

                        <div class="form-group">
                            <label for="value">Value <span class="text-danger">*</span></label>
                            <textarea
                                class="form-control @error('value') is-invalid @enderror"
                                id="value"
                                name="value"
                                rows="4"
                                placeholder="Enter the setting value"
                                required
                            >{{ old('value') }}</textarea>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input
                                type="text"
                                class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                name="description"
                                placeholder="What is this setting for?"
                                value="{{ old('description') }}"
                            >
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="category">Category <span class="text-danger">*</span></label>
                                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                    <option value="">-- Select Category --</option>
                                    <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                                    <option value="contact" {{ old('category') == 'contact' ? 'selected' : '' }}>Contact</option>
                                    <option value="email" {{ old('category') == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="social" {{ old('category') == 'social' ? 'selected' : '' }}>Social Media</option>
                                    <option value="seo" {{ old('category') == 'seo' ? 'selected' : '' }}>SEO</option>
                                    <option value="appearance" {{ old('category') == 'appearance' ? 'selected' : '' }}>Appearance</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="type">Type <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                    <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="number" {{ old('type') == 'number' ? 'selected' : '' }}>Number</option>
                                    <option value="boolean" {{ old('type') == 'boolean' ? 'selected' : '' }}>Boolean (Yes/No)</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Create Setting
                            </button>
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
