@extends('backend.layouts.master')

@section('title', 'Edit Setting - Admin Panel')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">
                <i class="fas fa-edit"></i> Edit Setting
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
                    <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="key">Setting Key</label>
                            <input
                                type="text"
                                class="form-control"
                                id="key"
                                name="key"
                                value="{{ $setting->key }}"
                                disabled
                            >
                            <small class="form-text text-muted">This field cannot be changed</small>
                        </div>

                        <div class="form-group">
                            <label for="value">Value <span class="text-danger">*</span></label>
                            @if ($setting->type === 'textarea')
                                <textarea
                                    class="form-control @error('value') is-invalid @enderror"
                                    id="value"
                                    name="value"
                                    rows="6"
                                    required
                                >{{ old('value', $setting->value) }}</textarea>
                            @elseif ($setting->type === 'email')
                                <input
                                    type="email"
                                    class="form-control @error('value') is-invalid @enderror"
                                    id="value"
                                    name="value"
                                    value="{{ old('value', $setting->value) }}"
                                    required
                                >
                            @elseif ($setting->type === 'number')
                                <input
                                    type="number"
                                    class="form-control @error('value') is-invalid @enderror"
                                    id="value"
                                    name="value"
                                    value="{{ old('value', $setting->value) }}"
                                    required
                                >
                            @elseif ($setting->type === 'boolean')
                                <select class="form-control @error('value') is-invalid @enderror" id="value" name="value" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ old('value', $setting->value) == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('value', $setting->value) == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            @else
                                <input
                                    type="text"
                                    class="form-control @error('value') is-invalid @enderror"
                                    id="value"
                                    name="value"
                                    value="{{ old('value', $setting->value) }}"
                                    required
                                >
                            @endif
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
                                value="{{ old('description', $setting->description) }}"
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
                                    <option value="general" {{ old('category', $setting->category) == 'general' ? 'selected' : '' }}>General</option>
                                    <option value="contact" {{ old('category', $setting->category) == 'contact' ? 'selected' : '' }}>Contact</option>
                                    <option value="email" {{ old('category', $setting->category) == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="social" {{ old('category', $setting->category) == 'social' ? 'selected' : '' }}>Social Media</option>
                                    <option value="seo" {{ old('category', $setting->category) == 'seo' ? 'selected' : '' }}>SEO</option>
                                    <option value="appearance" {{ old('category', $setting->category) == 'appearance' ? 'selected' : '' }}>Appearance</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="type">Type <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required disabled>
                                    <option value="text" {{ $setting->type == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="textarea" {{ $setting->type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                    <option value="email" {{ $setting->type == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="number" {{ $setting->type == 'number' ? 'selected' : '' }}>Number</option>
                                    <option value="boolean" {{ $setting->type == 'boolean' ? 'selected' : '' }}>Boolean (Yes/No)</option>
                                </select>
                                <small class="form-text text-muted">This field cannot be changed</small>
                                <input type="hidden" name="type" value="{{ $setting->type }}">
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Setting
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
