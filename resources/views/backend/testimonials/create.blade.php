@extends('backend.layouts.master')

@section('title', 'Create Testimonial')

@section('content')
<div class="container-custom">
    <style>
        .form-section {
            background: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #667eea;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-cancel {
            background: #e9ecef;
            color: #333;
            padding: 12px 40px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        .btn-cancel:hover {
            background: #dee2e6;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .error-text {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        .upload-area {
            border: 2px dashed #667eea;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9ff;
        }

        .upload-area:hover {
            background: #eef2ff;
            border-color: #764ba2;
        }

        .upload-area input[type="file"] {
            display: none;
        }

        .upload-icon {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 10px;
        }

        .upload-text {
            color: #333;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .upload-hint {
            color: #999;
            font-size: 0.85rem;
        }

        .image-preview {
            margin-top: 15px;
            display: none;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .existing-image {
            margin-top: 15px;
        }

        .existing-image img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .remove-image {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            margin-top: 10px;
        }

        .remove-image:hover {
            background: #c82333;
        }
    </style>

    <div class="page-header mb-4">
        <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Create New Testimonial</h1>
        <p style="color: #666;">Add a new customer testimonial with bilingual content</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Please fix the following errors:</strong>
            <ul style="margin: 10px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- English Content -->
        <div class="form-section">
            <h2 class="section-title">🇬🇧 English Content</h2>

            <div class="form-group">
                <label for="title_en">Title (Optional)</label>
                <input type="text" name="title_en" id="title_en"
                    value="{{ old('title_en') }}"
                    placeholder="e.g., Professional and Caring Service">
                @error('title_en') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="content_en">Testimonial Content*</label>
                <textarea name="content_en" id="content_en" required
                    placeholder="Enter testimonial content in English">{{ old('content_en') }}</textarea>
                @error('content_en') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="author_en">Author Name*</label>
                <input type="text" name="author_en" id="author_en" required
                    value="{{ old('author_en') }}"
                    placeholder="e.g., John Smith">
                @error('author_en') <div class="error-text">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- Bengali Content -->
        <div class="form-section">
            <h2 class="section-title">🇧🇩 Bengali Content</h2>

            <div class="form-group">
                <label for="title_bn">Title (Optional)</label>
                <input type="text" name="title_bn" id="title_bn"
                    value="{{ old('title_bn') }}"
                    placeholder="উপাদান শিরোনাম">
                @error('title_bn') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="content_bn">Testimonial Content*</label>
                <textarea name="content_bn" id="content_bn" required
                    placeholder="বাংলায় সাক্ষ্যের বিষয়বস্তু">{{ old('content_bn') }}</textarea>
                @error('content_bn') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="author_bn">Author Name*</label>
                <input type="text" name="author_bn" id="author_bn" required
                    value="{{ old('author_bn') }}"
                    placeholder="eg. জন স্মিথ">
                @error('author_bn') <div class="error-text">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- Picture Upload -->
        <div class="form-section">
            <h2 class="section-title">📷 Customer Picture</h2>

            <div class="form-group">
                <div id="uploadAreaContainer">
                    <div class="upload-area" onclick="document.getElementById('picture').click()">
                        <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <div class="upload-text">Click to upload or drag and drop</div>
                        <div class="upload-hint">PNG, JPG, GIF, WEBP up to 2MB</div>
                        <input type="file" name="picture" id="picture" accept="image/*">
                    </div>
                    <div class="image-preview" id="imagePreview">
                        <img id="previewImage" src="" alt="Preview">
                        <br>
                        <button type="button" class="remove-image" onclick="removeImage()">Remove Image</button>
                    </div>
                </div>
                @error('picture') <div class="error-text">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- Options -->
        <div class="form-section">
            <h2 class="section-title">⚙️ Options</h2>

            <div class="checkbox-group">
                <input type="checkbox" name="show_on_home" id="show_on_home" value="1"
                    {{ old('show_on_home') ? 'checked' : '' }}>
                <label for="show_on_home" style="margin: 0;">Display this testimonial on home page</label>
            </div>
            @error('show_on_home') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <!-- Submit Buttons -->
        <div class="form-section">
            <button type="submit" class="btn-submit">✅ Create Testimonial</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>

    <script>
        // Handle file input change
        document.getElementById('picture').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('previewImage').src = event.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Remove image
        function removeImage() {
            document.getElementById('picture').value = '';
            document.getElementById('imagePreview').style.display = 'none';
            document.getElementById('previewImage').src = '';
        }

        // Change existing image
        function removeExistingImage() {
            document.getElementById('uploadAreaContainer').style.display = 'block';
            const existingImage = document.querySelector('.existing-image');
            if (existingImage) {
                existingImage.style.display = 'none';
            }
        }

        // Handle drag and drop
        const uploadArea = document.querySelector('.upload-area');
        if (uploadArea) {
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.style.background = '#eef2ff';
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.style.background = '#f8f9ff';
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.style.background = '#f8f9ff';
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    document.getElementById('picture').files = files;
                    const event = new Event('change', { bubbles: true });
                    document.getElementById('picture').dispatchEvent(event);
                }
            });
        }
    </script>
</div>
@endsection
