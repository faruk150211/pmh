@extends('backend.layouts.master')

@section('title', 'Manage Why Choose Us Section')

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

        .subsection {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
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
            min-height: 80px;
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

        .alert-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .icon-hint {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>

    <div class="page-header mb-4">
        <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Manage Why Choose Us Section</h1>
        <p style="color: #666;">Update your website "Why Choose Us" section content in English and Bengali</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

    <form method="POST" action="{{ route('admin.why-choose-us-section.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Header Section -->
        <div class="form-section">
            <h2 class="section-title">📋 Section Header</h2>

            <div class="form-group">
                <label for="badge_en">Badge (English)</label>
                <input type="text" name="badge_en" id="badge_en"
                    value="{{ old('badge_en', $whyChooseUsSection->badge_en ?? '') }}"
                    placeholder="e.g., Why Choose Us">
                @error('badge_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="badge_bn">Badge (Bengali)</label>
                <input type="text" name="badge_bn" id="badge_bn"
                    value="{{ old('badge_bn', $whyChooseUsSection->badge_bn ?? '') }}"
                    placeholder="বাংলায় উদাহরণ">
                @error('badge_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="title_en">Main Title (English)</label>
                    <input type="text" name="title_en" id="title_en" required
                        value="{{ old('title_en', $whyChooseUsSection->title_en ?? '') }}"
                        placeholder="e.g., Professional Medical Care Delivered to Your Door">
                    @error('title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="title_bn">Main Title (Bengali)</label>
                    <input type="text" name="title_bn" id="title_bn" required
                        value="{{ old('title_bn', $whyChooseUsSection->title_bn ?? '') }}"
                        placeholder="বাংলায় শিরোনাম">
                    @error('title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Card 1 -->
        <div class="form-section">
            <h2 class="section-title">⚡ Card 1 - Rapid Response</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="card_1_title_en">Title (English)</label>
                        <input type="text" name="card_1_title_en" id="card_1_title_en"
                            value="{{ old('card_1_title_en', $whyChooseUsSection->card_1_title_en ?? '') }}"
                            placeholder="e.g., Rapid Response">
                        @error('card_1_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="card_1_title_bn">Title (Bengali)</label>
                        <input type="text" name="card_1_title_bn" id="card_1_title_bn"
                            value="{{ old('card_1_title_bn', $whyChooseUsSection->card_1_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('card_1_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="card_1_description_en">Description (English)</label>
                    <textarea name="card_1_description_en" id="card_1_description_en"
                        placeholder="Card description in English">{{ old('card_1_description_en', $whyChooseUsSection->card_1_description_en ?? '') }}</textarea>
                    @error('card_1_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_1_description_bn">Description (Bengali)</label>
                    <textarea name="card_1_description_bn" id="card_1_description_bn"
                        placeholder="বাংলায় কার্ডের বর্ণনা">{{ old('card_1_description_bn', $whyChooseUsSection->card_1_description_bn ?? '') }}</textarea>
                    @error('card_1_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_1_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="card_1_icon" id="card_1_icon"
                        value="{{ old('card_1_icon', $whyChooseUsSection->card_1_icon ?? 'bi-lightning-charge') }}"
                        placeholder="e.g., bi-lightning-charge">
                    <div class="icon-hint">Use Bootstrap Icons classes like: bi-lightning-charge, bi-people-check, bi-shield-exclamation, bi-clock-history</div>
                    @error('card_1_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="form-section">
            <h2 class="section-title">👥 Card 2 - Experienced Team</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="card_2_title_en">Title (English)</label>
                        <input type="text" name="card_2_title_en" id="card_2_title_en"
                            value="{{ old('card_2_title_en', $whyChooseUsSection->card_2_title_en ?? '') }}"
                            placeholder="e.g., Experienced Team">
                        @error('card_2_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="card_2_title_bn">Title (Bengali)</label>
                        <input type="text" name="card_2_title_bn" id="card_2_title_bn"
                            value="{{ old('card_2_title_bn', $whyChooseUsSection->card_2_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('card_2_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="card_2_description_en">Description (English)</label>
                    <textarea name="card_2_description_en" id="card_2_description_en"
                        placeholder="Card description in English">{{ old('card_2_description_en', $whyChooseUsSection->card_2_description_en ?? '') }}</textarea>
                    @error('card_2_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_2_description_bn">Description (Bengali)</label>
                    <textarea name="card_2_description_bn" id="card_2_description_bn"
                        placeholder="বাংলায় কার্ডের বর্ণনা">{{ old('card_2_description_bn', $whyChooseUsSection->card_2_description_bn ?? '') }}</textarea>
                    @error('card_2_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_2_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="card_2_icon" id="card_2_icon"
                        value="{{ old('card_2_icon', $whyChooseUsSection->card_2_icon ?? 'bi-people-check') }}"
                        placeholder="e.g., bi-people-check">
                    @error('card_2_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="form-section">
            <h2 class="section-title">🛡️ Card 3 - Advanced Equipment</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="card_3_title_en">Title (English)</label>
                        <input type="text" name="card_3_title_en" id="card_3_title_en"
                            value="{{ old('card_3_title_en', $whyChooseUsSection->card_3_title_en ?? '') }}"
                            placeholder="e.g., Advanced Equipment">
                        @error('card_3_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="card_3_title_bn">Title (Bengali)</label>
                        <input type="text" name="card_3_title_bn" id="card_3_title_bn"
                            value="{{ old('card_3_title_bn', $whyChooseUsSection->card_3_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('card_3_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="card_3_description_en">Description (English)</label>
                    <textarea name="card_3_description_en" id="card_3_description_en"
                        placeholder="Card description in English">{{ old('card_3_description_en', $whyChooseUsSection->card_3_description_en ?? '') }}</textarea>
                    @error('card_3_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_3_description_bn">Description (Bengali)</label>
                    <textarea name="card_3_description_bn" id="card_3_description_bn"
                        placeholder="বাংলায় কার্ডের বর্ণনা">{{ old('card_3_description_bn', $whyChooseUsSection->card_3_description_bn ?? '') }}</textarea>
                    @error('card_3_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_3_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="card_3_icon" id="card_3_icon"
                        value="{{ old('card_3_icon', $whyChooseUsSection->card_3_icon ?? 'bi-shield-exclamation') }}"
                        placeholder="e.g., bi-shield-exclamation">
                    @error('card_3_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="form-section">
            <h2 class="section-title">🕐 Card 4 - 24/7 Availability</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="card_4_title_en">Title (English)</label>
                        <input type="text" name="card_4_title_en" id="card_4_title_en"
                            value="{{ old('card_4_title_en', $whyChooseUsSection->card_4_title_en ?? '') }}"
                            placeholder="e.g., 24/7 Availability">
                        @error('card_4_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="card_4_title_bn">Title (Bengali)</label>
                        <input type="text" name="card_4_title_bn" id="card_4_title_bn"
                            value="{{ old('card_4_title_bn', $whyChooseUsSection->card_4_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('card_4_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="card_4_description_en">Description (English)</label>
                    <textarea name="card_4_description_en" id="card_4_description_en"
                        placeholder="Card description in English">{{ old('card_4_description_en', $whyChooseUsSection->card_4_description_en ?? '') }}</textarea>
                    @error('card_4_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_4_description_bn">Description (Bengali)</label>
                    <textarea name="card_4_description_bn" id="card_4_description_bn"
                        placeholder="বাংলায় কার্ডের বর্ণনা">{{ old('card_4_description_bn', $whyChooseUsSection->card_4_description_bn ?? '') }}</textarea>
                    @error('card_4_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="card_4_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="card_4_icon" id="card_4_icon"
                        value="{{ old('card_4_icon', $whyChooseUsSection->card_4_icon ?? 'bi-clock-history') }}"
                        placeholder="e.g., bi-clock-history">
                    @error('card_4_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="form-section">
            <h2 class="section-title">📊 Stats Section</h2>

            <!-- Stat 1 -->
            <div class="subsection">
                <h4 style="margin-bottom: 15px;">Statistic 1</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stat_1_number">Number</label>
                        <input type="number" name="stat_1_number" id="stat_1_number"
                            value="{{ old('stat_1_number', $whyChooseUsSection->stat_1_number ?? '') }}"
                            placeholder="e.g., 15000">
                        @error('stat_1_number') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stat_1_label_en">Label (English)</label>
                        <input type="text" name="stat_1_label_en" id="stat_1_label_en"
                            value="{{ old('stat_1_label_en', $whyChooseUsSection->stat_1_label_en ?? '') }}"
                            placeholder="e.g., Patients Served">
                        @error('stat_1_label_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="stat_1_label_bn">Label (Bengali)</label>
                        <input type="text" name="stat_1_label_bn" id="stat_1_label_bn"
                            value="{{ old('stat_1_label_bn', $whyChooseUsSection->stat_1_label_bn ?? '') }}"
                            placeholder="বাংলায় লেবেল">
                        @error('stat_1_label_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="subsection">
                <h4 style="margin-bottom: 15px;">Statistic 2</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stat_2_number">Number</label>
                        <input type="number" name="stat_2_number" id="stat_2_number"
                            value="{{ old('stat_2_number', $whyChooseUsSection->stat_2_number ?? '') }}"
                            placeholder="e.g., 25">
                        @error('stat_2_number') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stat_2_label_en">Label (English)</label>
                        <input type="text" name="stat_2_label_en" id="stat_2_label_en"
                            value="{{ old('stat_2_label_en', $whyChooseUsSection->stat_2_label_en ?? '') }}"
                            placeholder="e.g., Years of Experience">
                        @error('stat_2_label_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="stat_2_label_bn">Label (Bengali)</label>
                        <input type="text" name="stat_2_label_bn" id="stat_2_label_bn"
                            value="{{ old('stat_2_label_bn', $whyChooseUsSection->stat_2_label_bn ?? '') }}"
                            placeholder="বাংলায় লেবেল">
                        @error('stat_2_label_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="subsection">
                <h4 style="margin-bottom: 15px;">Statistic 3</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stat_3_number">Number</label>
                        <input type="number" name="stat_3_number" id="stat_3_number"
                            value="{{ old('stat_3_number', $whyChooseUsSection->stat_3_number ?? '') }}"
                            placeholder="e.g., 50">
                        @error('stat_3_number') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="stat_3_label_en">Label (English)</label>
                        <input type="text" name="stat_3_label_en" id="stat_3_label_en"
                            value="{{ old('stat_3_label_en', $whyChooseUsSection->stat_3_label_en ?? '') }}"
                            placeholder="e.g., Medical Specialists">
                        @error('stat_3_label_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="stat_3_label_bn">Label (Bengali)</label>
                        <input type="text" name="stat_3_label_bn" id="stat_3_label_bn"
                            value="{{ old('stat_3_label_bn', $whyChooseUsSection->stat_3_label_bn ?? '') }}"
                            placeholder="বাংলায় লেবেল">
                        @error('stat_3_label_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-section">
            <button type="submit" class="btn-submit">💾 Save Why Choose Us Section</button>
        </div>
    </form>
</div>
@endsection
