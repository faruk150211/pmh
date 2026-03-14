@extends('backend.layouts.master')

@section('title', 'Manage Solution Section')

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

        .solution-icon-hint {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>

    <div class="page-header mb-4">
        <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Manage Solution Section</h1>
        <p style="color: #666;">Update your website solution section content in English and Bengali</p>
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

    <form method="POST" action="{{ route('admin.solution-section.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Header Section -->
        <div class="form-section">
            <h2 class="section-title">💡 Section Header</h2>

            <div class="form-group">
                <label for="badge_en">Badge (English)</label>
                <input type="text" name="badge_en" id="badge_en"
                    value="{{ old('badge_en', $solutionSection->badge_en ?? '') }}"
                    placeholder="e.g., Our Solutions">
                @error('badge_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="badge_bn">Badge (Bengali)</label>
                <input type="text" name="badge_bn" id="badge_bn"
                    value="{{ old('badge_bn', $solutionSection->badge_bn ?? '') }}"
                    placeholder="বাংলায় উদাহরণ">
                @error('badge_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="title_en">Main Title (English)</label>
                    <input type="text" name="title_en" id="title_en" required
                        value="{{ old('title_en', $solutionSection->title_en ?? '') }}"
                        placeholder="Healthcare solutions headline">
                    @error('title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="title_bn">Main Title (Bengali)</label>
                    <input type="text" name="title_bn" id="title_bn" required
                        value="{{ old('title_bn', $solutionSection->title_bn ?? '') }}"
                        placeholder="স্বাস্থ্যসেবা সমাধান শিরোনাম">
                    @error('title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description_en">Description (English)</label>
                <textarea name="description_en" id="description_en" required
                    placeholder="Description of healthcare solutions">{{ old('description_en', $solutionSection->description_en ?? '') }}</textarea>
                @error('description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="description_bn">Description (Bengali)</label>
                <textarea name="description_bn" id="description_bn" required
                    placeholder="স্বাস্থ্যসেবা সমাধানের বর্ণনা">{{ old('description_bn', $solutionSection->description_bn ?? '') }}</textarea>
                @error('description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Solution 1 -->
        <div class="form-section">
            <h2 class="section-title">⏰ Solution 1 - Same-Day Appointments</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="solution_1_title_en">Title (English)</label>
                        <input type="text" name="solution_1_title_en" id="solution_1_title_en"
                            value="{{ old('solution_1_title_en', $solutionSection->solution_1_title_en ?? '') }}"
                            placeholder="e.g., Same-Day Appointments">
                        @error('solution_1_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="solution_1_title_bn">Title (Bengali)</label>
                        <input type="text" name="solution_1_title_bn" id="solution_1_title_bn"
                            value="{{ old('solution_1_title_bn', $solutionSection->solution_1_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('solution_1_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="solution_1_description_en">Description (English)</label>
                    <textarea name="solution_1_description_en" id="solution_1_description_en"
                        placeholder="Solution description in English">{{ old('solution_1_description_en', $solutionSection->solution_1_description_en ?? '') }}</textarea>
                    @error('solution_1_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_1_description_bn">Description (Bengali)</label>
                    <textarea name="solution_1_description_bn" id="solution_1_description_bn"
                        placeholder="বাংলায় সমাধানের বর্ণনা">{{ old('solution_1_description_bn', $solutionSection->solution_1_description_bn ?? '') }}</textarea>
                    @error('solution_1_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_1_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="solution_1_icon" id="solution_1_icon"
                        value="{{ old('solution_1_icon', $solutionSection->solution_1_icon ?? 'bi-calendar-check') }}"
                        placeholder="e.g., bi-calendar-check">
                    <div class="solution-icon-hint">Use Bootstrap Icons classes like: bi-calendar-check, bi-house-heart, bi-shield-check, bi-activity, bi-beaker, bi-file-text</div>
                    @error('solution_1_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Solution 2 -->
        <div class="form-section">
            <h2 class="section-title">🏥 Solution 2 - Care in Your Home</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="solution_2_title_en">Title (English)</label>
                        <input type="text" name="solution_2_title_en" id="solution_2_title_en"
                            value="{{ old('solution_2_title_en', $solutionSection->solution_2_title_en ?? '') }}"
                            placeholder="e.g., Care in Your Home">
                        @error('solution_2_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="solution_2_title_bn">Title (Bengali)</label>
                        <input type="text" name="solution_2_title_bn" id="solution_2_title_bn"
                            value="{{ old('solution_2_title_bn', $solutionSection->solution_2_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('solution_2_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="solution_2_description_en">Description (English)</label>
                    <textarea name="solution_2_description_en" id="solution_2_description_en"
                        placeholder="Solution description in English">{{ old('solution_2_description_en', $solutionSection->solution_2_description_en ?? '') }}</textarea>
                    @error('solution_2_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_2_description_bn">Description (Bengali)</label>
                    <textarea name="solution_2_description_bn" id="solution_2_description_bn"
                        placeholder="বাংলায় সমাধানের বর্ণনা">{{ old('solution_2_description_bn', $solutionSection->solution_2_description_bn ?? '') }}</textarea>
                    @error('solution_2_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_2_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="solution_2_icon" id="solution_2_icon"
                        value="{{ old('solution_2_icon', $solutionSection->solution_2_icon ?? 'bi-house-heart') }}"
                        placeholder="e.g., bi-house-heart">
                    @error('solution_2_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Solution 3 -->
        <div class="form-section">
            <h2 class="section-title">🛡️ Solution 3 - Infection-Free Environment</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="solution_3_title_en">Title (English)</label>
                        <input type="text" name="solution_3_title_en" id="solution_3_title_en"
                            value="{{ old('solution_3_title_en', $solutionSection->solution_3_title_en ?? '') }}"
                            placeholder="e.g., Infection-Free Environment">
                        @error('solution_3_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="solution_3_title_bn">Title (Bengali)</label>
                        <input type="text" name="solution_3_title_bn" id="solution_3_title_bn"
                            value="{{ old('solution_3_title_bn', $solutionSection->solution_3_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('solution_3_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="solution_3_description_en">Description (English)</label>
                    <textarea name="solution_3_description_en" id="solution_3_description_en"
                        placeholder="Solution description in English">{{ old('solution_3_description_en', $solutionSection->solution_3_description_en ?? '') }}</textarea>
                    @error('solution_3_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_3_description_bn">Description (Bengali)</label>
                    <textarea name="solution_3_description_bn" id="solution_3_description_bn"
                        placeholder="বাংলায় সমাধানের বর্ণনা">{{ old('solution_3_description_bn', $solutionSection->solution_3_description_bn ?? '') }}</textarea>
                    @error('solution_3_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_3_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="solution_3_icon" id="solution_3_icon"
                        value="{{ old('solution_3_icon', $solutionSection->solution_3_icon ?? 'bi-shield-check') }}"
                        placeholder="e.g., bi-shield-check">
                    @error('solution_3_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Solution 4 -->
        <div class="form-section">
            <h2 class="section-title">🫀 Solution 4 - ECG and Monitoring</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="solution_4_title_en">Title (English)</label>
                        <input type="text" name="solution_4_title_en" id="solution_4_title_en"
                            value="{{ old('solution_4_title_en', $solutionSection->solution_4_title_en ?? '') }}"
                            placeholder="e.g., ECG and Monitoring">
                        @error('solution_4_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="solution_4_title_bn">Title (Bengali)</label>
                        <input type="text" name="solution_4_title_bn" id="solution_4_title_bn"
                            value="{{ old('solution_4_title_bn', $solutionSection->solution_4_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('solution_4_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="solution_4_description_en">Description (English)</label>
                    <textarea name="solution_4_description_en" id="solution_4_description_en"
                        placeholder="Solution description in English">{{ old('solution_4_description_en', $solutionSection->solution_4_description_en ?? '') }}</textarea>
                    @error('solution_4_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_4_description_bn">Description (Bengali)</label>
                    <textarea name="solution_4_description_bn" id="solution_4_description_bn"
                        placeholder="বাংলায় সমাধানের বর্ণনা">{{ old('solution_4_description_bn', $solutionSection->solution_4_description_bn ?? '') }}</textarea>
                    @error('solution_4_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_4_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="solution_4_icon" id="solution_4_icon"
                        value="{{ old('solution_4_icon', $solutionSection->solution_4_icon ?? 'bi-activity') }}"
                        placeholder="e.g., bi-activity">
                    @error('solution_4_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Solution 5 -->
        <div class="form-section">
            <h2 class="section-title">🧪 Solution 5 - Point-of-Care Diagnostics</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="solution_5_title_en">Title (English)</label>
                        <input type="text" name="solution_5_title_en" id="solution_5_title_en"
                            value="{{ old('solution_5_title_en', $solutionSection->solution_5_title_en ?? '') }}"
                            placeholder="e.g., Point-of-Care Diagnostics">
                        @error('solution_5_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="solution_5_title_bn">Title (Bengali)</label>
                        <input type="text" name="solution_5_title_bn" id="solution_5_title_bn"
                            value="{{ old('solution_5_title_bn', $solutionSection->solution_5_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('solution_5_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="solution_5_description_en">Description (English)</label>
                    <textarea name="solution_5_description_en" id="solution_5_description_en"
                        placeholder="Solution description in English">{{ old('solution_5_description_en', $solutionSection->solution_5_description_en ?? '') }}</textarea>
                    @error('solution_5_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_5_description_bn">Description (Bengali)</label>
                    <textarea name="solution_5_description_bn" id="solution_5_description_bn"
                        placeholder="বাংলায় সমাধানের বর্ণনা">{{ old('solution_5_description_bn', $solutionSection->solution_5_description_bn ?? '') }}</textarea>
                    @error('solution_5_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_5_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="solution_5_icon" id="solution_5_icon"
                        value="{{ old('solution_5_icon', $solutionSection->solution_5_icon ?? 'bi-beaker') }}"
                        placeholder="e.g., bi-beaker">
                    @error('solution_5_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Solution 6 -->
        <div class="form-section">
            <h2 class="section-title">📄 Solution 6 - Electronic Medical Record Documentation</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="solution_6_title_en">Title (English)</label>
                        <input type="text" name="solution_6_title_en" id="solution_6_title_en"
                            value="{{ old('solution_6_title_en', $solutionSection->solution_6_title_en ?? '') }}"
                            placeholder="e.g., Electronic Medical Record Documentation">
                        @error('solution_6_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="solution_6_title_bn">Title (Bengali)</label>
                        <input type="text" name="solution_6_title_bn" id="solution_6_title_bn"
                            value="{{ old('solution_6_title_bn', $solutionSection->solution_6_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('solution_6_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="solution_6_description_en">Description (English)</label>
                    <textarea name="solution_6_description_en" id="solution_6_description_en"
                        placeholder="Solution description in English">{{ old('solution_6_description_en', $solutionSection->solution_6_description_en ?? '') }}</textarea>
                    @error('solution_6_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_6_description_bn">Description (Bengali)</label>
                    <textarea name="solution_6_description_bn" id="solution_6_description_bn"
                        placeholder="বাংলায় সমাধানের বর্ণনা">{{ old('solution_6_description_bn', $solutionSection->solution_6_description_bn ?? '') }}</textarea>
                    @error('solution_6_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="solution_6_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="solution_6_icon" id="solution_6_icon"
                        value="{{ old('solution_6_icon', $solutionSection->solution_6_icon ?? 'bi-file-text') }}"
                        placeholder="e.g., bi-file-text">
                    @error('solution_6_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-section">
            <button type="submit" class="btn-submit">💾 Save Solution Section</button>
        </div>
    </form>
</div>
@endsection
