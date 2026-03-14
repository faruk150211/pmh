@extends('backend.layouts.master')

@section('title', 'Manage How It Works Section')

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
        <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Manage How It Works Section</h1>
        <p style="color: #666;">Update your website "How It Works" section content in English and Bengali</p>
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

    <form method="POST" action="{{ route('admin.how-it-works-section.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Header Section -->
        <div class="form-section">
            <h2 class="section-title">📋 Section Header</h2>

            <div class="form-group">
                <label for="badge_en">Badge (English)</label>
                <input type="text" name="badge_en" id="badge_en"
                    value="{{ old('badge_en', $howItWorksSection->badge_en ?? '') }}"
                    placeholder="e.g., Simple Process">
                @error('badge_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="badge_bn">Badge (Bengali)</label>
                <input type="text" name="badge_bn" id="badge_bn"
                    value="{{ old('badge_bn', $howItWorksSection->badge_bn ?? '') }}"
                    placeholder="বাংলায় উদাহরণ">
                @error('badge_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="title_en">Main Title (English)</label>
                    <input type="text" name="title_en" id="title_en" required
                        value="{{ old('title_en', $howItWorksSection->title_en ?? '') }}"
                        placeholder="e.g., How to Get Care in 4 Steps">
                    @error('title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="title_bn">Main Title (Bengali)</label>
                    <input type="text" name="title_bn" id="title_bn" required
                        value="{{ old('title_bn', $howItWorksSection->title_bn ?? '') }}"
                        placeholder="বাংলায় শিরোনাম">
                    @error('title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description_en">Description (English)</label>
                <textarea name="description_en" id="description_en"
                    placeholder="Description">{{ old('description_en', $howItWorksSection->description_en ?? '') }}</textarea>
                @error('description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="description_bn">Description (Bengali)</label>
                <textarea name="description_bn" id="description_bn"
                    placeholder="বাংলায় বর্ণনা">{{ old('description_bn', $howItWorksSection->description_bn ?? '') }}</textarea>
                @error('description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Step 1 -->
        <div class="form-section">
            <h2 class="section-title">📅 Step 1 - Request Appointment</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="step_1_title_en">Title (English)</label>
                        <input type="text" name="step_1_title_en" id="step_1_title_en"
                            value="{{ old('step_1_title_en', $howItWorksSection->step_1_title_en ?? '') }}"
                            placeholder="e.g., Request Appointment">
                        @error('step_1_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="step_1_title_bn">Title (Bengali)</label>
                        <input type="text" name="step_1_title_bn" id="step_1_title_bn"
                            value="{{ old('step_1_title_bn', $howItWorksSection->step_1_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('step_1_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_1_description_en">Description (English)</label>
                    <textarea name="step_1_description_en" id="step_1_description_en"
                        placeholder="Step description in English">{{ old('step_1_description_en', $howItWorksSection->step_1_description_en ?? '') }}</textarea>
                    @error('step_1_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_1_description_bn">Description (Bengali)</label>
                    <textarea name="step_1_description_bn" id="step_1_description_bn"
                        placeholder="বাংলায় স্টেপের বর্ণনা">{{ old('step_1_description_bn', $howItWorksSection->step_1_description_bn ?? '') }}</textarea>
                    @error('step_1_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_1_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="step_1_icon" id="step_1_icon"
                        value="{{ old('step_1_icon', $howItWorksSection->step_1_icon ?? 'bi-calendar-check') }}"
                        placeholder="e.g., bi-calendar-check">
                    <div class="icon-hint">Use Bootstrap Icons classes like: bi-calendar-check, bi-person-check, bi-door-open, bi-file-medical</div>
                    @error('step_1_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="form-section">
            <h2 class="section-title">👨‍⚕️ Step 2 - Doctor Confirmation</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="step_2_title_en">Title (English)</label>
                        <input type="text" name="step_2_title_en" id="step_2_title_en"
                            value="{{ old('step_2_title_en', $howItWorksSection->step_2_title_en ?? '') }}"
                            placeholder="e.g., Doctor Confirmation">
                        @error('step_2_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="step_2_title_bn">Title (Bengali)</label>
                        <input type="text" name="step_2_title_bn" id="step_2_title_bn"
                            value="{{ old('step_2_title_bn', $howItWorksSection->step_2_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('step_2_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_2_description_en">Description (English)</label>
                    <textarea name="step_2_description_en" id="step_2_description_en"
                        placeholder="Step description in English">{{ old('step_2_description_en', $howItWorksSection->step_2_description_en ?? '') }}</textarea>
                    @error('step_2_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_2_description_bn">Description (Bengali)</label>
                    <textarea name="step_2_description_bn" id="step_2_description_bn"
                        placeholder="বাংলায় স্টেপের বর্ণনা">{{ old('step_2_description_bn', $howItWorksSection->step_2_description_bn ?? '') }}</textarea>
                    @error('step_2_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_2_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="step_2_icon" id="step_2_icon"
                        value="{{ old('step_2_icon', $howItWorksSection->step_2_icon ?? 'bi-person-check') }}"
                        placeholder="e.g., bi-person-check">
                    @error('step_2_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="form-section">
            <h2 class="section-title">🚪 Step 3 - Doctor at Your Door</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="step_3_title_en">Title (English)</label>
                        <input type="text" name="step_3_title_en" id="step_3_title_en"
                            value="{{ old('step_3_title_en', $howItWorksSection->step_3_title_en ?? '') }}"
                            placeholder="e.g., Doctor at Your Door">
                        @error('step_3_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="step_3_title_bn">Title (Bengali)</label>
                        <input type="text" name="step_3_title_bn" id="step_3_title_bn"
                            value="{{ old('step_3_title_bn', $howItWorksSection->step_3_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('step_3_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_3_description_en">Description (English)</label>
                    <textarea name="step_3_description_en" id="step_3_description_en"
                        placeholder="Step description in English">{{ old('step_3_description_en', $howItWorksSection->step_3_description_en ?? '') }}</textarea>
                    @error('step_3_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_3_description_bn">Description (Bengali)</label>
                    <textarea name="step_3_description_bn" id="step_3_description_bn"
                        placeholder="বাংলায় স্টেপের বর্ণনা">{{ old('step_3_description_bn', $howItWorksSection->step_3_description_bn ?? '') }}</textarea>
                    @error('step_3_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_3_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="step_3_icon" id="step_3_icon"
                        value="{{ old('step_3_icon', $howItWorksSection->step_3_icon ?? 'bi-door-open') }}"
                        placeholder="e.g., bi-door-open">
                    @error('step_3_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="form-section">
            <h2 class="section-title">📋 Step 4 - Follow-up Care</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="step_4_title_en">Title (English)</label>
                        <input type="text" name="step_4_title_en" id="step_4_title_en"
                            value="{{ old('step_4_title_en', $howItWorksSection->step_4_title_en ?? '') }}"
                            placeholder="e.g., Follow-up Care">
                        @error('step_4_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="step_4_title_bn">Title (Bengali)</label>
                        <input type="text" name="step_4_title_bn" id="step_4_title_bn"
                            value="{{ old('step_4_title_bn', $howItWorksSection->step_4_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('step_4_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="step_4_description_en">Description (English)</label>
                    <textarea name="step_4_description_en" id="step_4_description_en"
                        placeholder="Step description in English">{{ old('step_4_description_en', $howItWorksSection->step_4_description_en ?? '') }}</textarea>
                    @error('step_4_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_4_description_bn">Description (Bengali)</label>
                    <textarea name="step_4_description_bn" id="step_4_description_bn"
                        placeholder="বাংলায় স্টেপের বর্ণনা">{{ old('step_4_description_bn', $howItWorksSection->step_4_description_bn ?? '') }}</textarea>
                    @error('step_4_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="step_4_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="step_4_icon" id="step_4_icon"
                        value="{{ old('step_4_icon', $howItWorksSection->step_4_icon ?? 'bi-file-medical') }}"
                        placeholder="e.g., bi-file-medical">
                    @error('step_4_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-section">
            <button type="submit" class="btn-submit">💾 Save How It Works Section</button>
        </div>
    </form>
</div>
@endsection
