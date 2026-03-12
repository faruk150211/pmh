@extends('backend.layouts.master')

@section('title', 'Manage Hero Section')

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

        .image-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 6px;
            margin-top: 10px;
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

        .alert {
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .language-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #e9ecef;
        }

        .language-tab {
            padding: 12px 20px;
            background: none;
            border: none;
            color: #666;
            font-weight: 600;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .language-tab.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }

        .language-content {
            display: none;
        }

        .language-content.active {
            display: block;
        }
    </style>

    <div class="page-header mb-4">
        <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Manage Hero Section</h1>
        <p style="color: #666;">Update your website hero section content in English and Bengali</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.hero-section.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Image Section -->
        <div class="form-section">
            <h2 class="section-title">📸 Hero Image</h2>
            <div class="form-group">
                <label for="image">Upload Hero Image</label>
                <input type="file" id="image" name="image" accept="image/*">
                @error('image')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
                @if ($heroSection->image)
                    <br>
                    <img src="{{ asset($heroSection->image) }}" alt="Hero Image" class="image-preview">
                @endif
            </div>
        </div>

        <!-- English Content -->
        <div class="form-section">
            <h2 class="section-title">🇬🇧 English Version</h2>

            <div class="form-group">
                <label for="title_en">Hero Title (English)</label>
                <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $heroSection->title_en) }}"
                    placeholder="e.g., Excellence in Healthcare With Compassionate Care" required>
                @error('title_en')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description_en">Hero Description (English)</label>
                <textarea id="description_en" name="description_en" placeholder="Enter hero section description in English"
                    required>{{ old('description_en', $heroSection->description_en) }}</textarea>
                @error('description_en')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_1_label_en">Stat 1 Label (English)</label>
                    <input type="text" id="stat_1_label_en" name="stat_1_label_en"
                        value="{{ old('stat_1_label_en', $heroSection->stat_1_label_en) }}"
                        placeholder="e.g., Years Experience">
                </div>
                <div class="form-group">
                    <label for="stat_1_en_value">Stat 1 Value (English)</label>
                    <input type="text" id="stat_1_en_value" name="stat_1_en_value"
                        value="{{ old('stat_1_en_value', $heroSection->stat_1_en_value) }}" placeholder="e.g., 15">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_2_label_en">Stat 2 Label (English)</label>
                    <input type="text" id="stat_2_label_en" name="stat_2_label_en"
                        value="{{ old('stat_2_label_en', $heroSection->stat_2_label_en) }}"
                        placeholder="e.g., Patients Treated">
                </div>
                <div class="form-group">
                    <label for="stat_2_en_value">Stat 2 Value (English)</label>
                    <input type="text" id="stat_2_en_value" name="stat_2_en_value"
                        value="{{ old('stat_2_en_value', $heroSection->stat_2_en_value) }}" placeholder="e.g., 5000">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_3_label_en">Stat 3 Label (English)</label>
                    <input type="text" id="stat_3_label_en" name="stat_3_label_en"
                        value="{{ old('stat_3_label_en', $heroSection->stat_3_label_en) }}"
                        placeholder="e.g., Medical Experts">
                </div>
                <div class="form-group">
                    <label for="stat_3_en_value">Stat 3 Value (English)</label>
                    <input type="text" id="stat_3_en_value" name="stat_3_en_value"
                        value="{{ old('stat_3_en_value', $heroSection->stat_3_en_value) }}" placeholder="e.g., 50">
                </div>
            </div>
        </div>

        <!-- Bangla Content -->
        <div class="form-section">
            <h2 class="section-title">🇧🇩 বাংলা সংস্করণ (Bangla Version)</h2>

            <div class="form-group">
                <label for="title_bn">Hero Title (Bangla)</label>
                <input type="text" id="title_bn" name="title_bn" value="{{ old('title_bn', $heroSection->title_bn) }}"
                    placeholder="e.g., স্বাস্থ্যসেবায় উৎকর্ষতা এবং দয়ালু যত্ন" required>
                @error('title_bn')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description_bn">Hero Description (Bangla)</label>
                <textarea id="description_bn" name="description_bn" placeholder="বাংলায় হিরো সেকশন বর্ণনা প্রবেশ করুন"
                    required>{{ old('description_bn', $heroSection->description_bn) }}</textarea>
                @error('description_bn')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_1_label_bn">Stat 1 Label (Bangla)</label>
                    <input type="text" id="stat_1_label_bn" name="stat_1_label_bn"
                        value="{{ old('stat_1_label_bn', $heroSection->stat_1_label_bn) }}"
                        placeholder="e.g., বছরের অভিজ্ঞতা">
                </div>
                <div class="form-group">
                    <label for="stat_1_bn_value">Stat 1 Value (Bangla)</label>
                    <input type="text" id="stat_1_bn_value" name="stat_1_bn_value"
                        value="{{ old('stat_1_bn_value', $heroSection->stat_1_bn_value) }}" placeholder="e.g., 15">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_2_label_bn">Stat 2 Label (Bangla)</label>
                    <input type="text" id="stat_2_label_bn" name="stat_2_label_bn"
                        value="{{ old('stat_2_label_bn', $heroSection->stat_2_label_bn) }}"
                        placeholder="e.g., রোগী চিকিৎসা করা">
                </div>
                <div class="form-group">
                    <label for="stat_2_bn_value">Stat 2 Value (Bangla)</label>
                    <input type="text" id="stat_2_bn_value" name="stat_2_bn_value"
                        value="{{ old('stat_2_bn_value', $heroSection->stat_2_bn_value) }}" placeholder="e.g., 5000">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_3_label_bn">Stat 3 Label (Bangla)</label>
                    <input type="text" id="stat_3_label_bn" name="stat_3_label_bn"
                        value="{{ old('stat_3_label_bn', $heroSection->stat_3_label_bn) }}"
                        placeholder="e.g., চিকিৎসা বিশেষজ্ঞ">
                </div>
                <div class="form-group">
                    <label for="stat_3_bn_value">Stat 3 Value (Bangla)</label>
                    <input type="text" id="stat_3_bn_value" name="stat_3_bn_value"
                        value="{{ old('stat_3_bn_value', $heroSection->stat_3_bn_value) }}" placeholder="e.g., 50">
                </div>
            </div>
        </div>

        <!-- Badges and Other Info -->
        <div class="form-section">
            <h2 class="section-title">🎖️ Badges & Emergency Contact</h2>

            <h3 style="font-size: 16px; font-weight: 600; color: #555; margin-bottom: 15px; margin-top: 15px;">Badge 1</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="badge_1_en">Badge 1 (English)</label>
                    <input type="text" id="badge_1_en" name="badge_1_en" value="{{ old('badge_1_en', $heroSection->badge_1_en) }}"
                        placeholder="e.g., Accredited">
                </div>
                <div class="form-group">
                    <label for="badge_1_bn">Badge 1 (Bangla)</label>
                    <input type="text" id="badge_1_bn" name="badge_1_bn" value="{{ old('badge_1_bn', $heroSection->badge_1_bn) }}"
                        placeholder="e.g., স্বীকৃত">
                </div>
            </div>

            <h3 style="font-size: 16px; font-weight: 600; color: #555; margin-bottom: 15px; margin-top: 15px;">Badge 2</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="badge_2_en">Badge 2 (English)</label>
                    <input type="text" id="badge_2_en" name="badge_2_en" value="{{ old('badge_2_en', $heroSection->badge_2_en) }}"
                        placeholder="e.g., 24/7 Emergency">
                </div>
                <div class="form-group">
                    <label for="badge_2_bn">Badge 2 (Bangla)</label>
                    <input type="text" id="badge_2_bn" name="badge_2_bn" value="{{ old('badge_2_bn', $heroSection->badge_2_bn) }}"
                        placeholder="e.g., ২৪/৭ জরুরি">
                </div>
            </div>

            <h3 style="font-size: 16px; font-weight: 600; color: #555; margin-bottom: 15px; margin-top: 15px;">Badge 3</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="badge_3_en">Badge 3 (English)</label>
                    <input type="text" id="badge_3_en" name="badge_3_en" value="{{ old('badge_3_en', $heroSection->badge_3_en) }}"
                        placeholder="e.g., 4.9/5 Rating">
                </div>
                <div class="form-group">
                    <label for="badge_3_bn">Badge 3 (Bangla)</label>
                    <input type="text" id="badge_3_bn" name="badge_3_bn" value="{{ old('badge_3_bn', $heroSection->badge_3_bn) }}"
                        placeholder="e.g., ৪.৯/৫ রেটিং">
                </div>
            </div>

            <div class="form-group">
                <label for="emergency_hotline">Emergency Hotline</label>
                <input type="text" id="emergency_hotline" name="emergency_hotline"
                    value="{{ old('emergency_hotline', $heroSection->emergency_hotline) }}"
                    placeholder="e.g., +1 (555) 911-2468">
            </div>
        </div>

        <div class="form-section">
            <button type="submit" class="btn-submit">💾 Update Hero Section</button>
        </div>
    </form>
</div>
@endsection
