@extends('backend.layouts.master')

@section('title', 'Manage Problem Section')

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

        .problem-icon-hint {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>

    <div class="page-header mb-4">
        <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Manage Problem Section</h1>
        <p style="color: #666;">Update your website problem section content in English and Bengali</p>
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

    <form method="POST" action="{{ route('admin.problem-section.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Header Section -->
        <div class="form-section">
            <h2 class="section-title">🎯 Section Header</h2>

            <div class="form-group">
                <label for="badge_en">Badge (English)</label>
                <input type="text" name="badge_en" id="badge_en"
                    value="{{ old('badge_en', $problemSection->badge_en ?? '') }}"
                    placeholder="e.g., The Challenge">
                @error('badge_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="badge_bn">Badge (Bengali)</label>
                <input type="text" name="badge_bn" id="badge_bn"
                    value="{{ old('badge_bn', $problemSection->badge_bn ?? '') }}"
                    placeholder="বাংলায় উদাহরণ">
                @error('badge_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="title_en">Main Title (English)</label>
                    <input type="text" name="title_en" id="title_en" required
                        value="{{ old('title_en', $problemSection->title_en ?? '') }}"
                        placeholder="Healthcare challenges headline">
                    @error('title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="title_bn">Main Title (Bengali)</label>
                    <input type="text" name="title_bn" id="title_bn" required
                        value="{{ old('title_bn', $problemSection->title_bn ?? '') }}"
                        placeholder="স্বাস্থ্যসেবা চ্যালেঞ্জ শিরোনাম">
                    @error('title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description_en">Description (English)</label>
                <textarea name="description_en" id="description_en" required
                    placeholder="Description of healthcare problems">{{ old('description_en', $problemSection->description_en ?? '') }}</textarea>
                @error('description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="description_bn">Description (Bengali)</label>
                <textarea name="description_bn" id="description_bn" required
                    placeholder="স্বাস্থ্যসেবা সমস্যাগুলির বর্ণনা">{{ old('description_bn', $problemSection->description_bn ?? '') }}</textarea>
                @error('description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Problem 1 -->
        <div class="form-section">
            <h2 class="section-title">⏰ Problem 1 - Long Wait Times</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="problem_1_title_en">Title (English)</label>
                        <input type="text" name="problem_1_title_en" id="problem_1_title_en"
                            value="{{ old('problem_1_title_en', $problemSection->problem_1_title_en ?? '') }}"
                            placeholder="e.g., Long Wait Times">
                        @error('problem_1_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="problem_1_title_bn">Title (Bengali)</label>
                        <input type="text" name="problem_1_title_bn" id="problem_1_title_bn"
                            value="{{ old('problem_1_title_bn', $problemSection->problem_1_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('problem_1_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="problem_1_description_en">Description (English)</label>
                    <textarea name="problem_1_description_en" id="problem_1_description_en"
                        placeholder="Problem description in English">{{ old('problem_1_description_en', $problemSection->problem_1_description_en ?? '') }}</textarea>
                    @error('problem_1_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_1_description_bn">Description (Bengali)</label>
                    <textarea name="problem_1_description_bn" id="problem_1_description_bn"
                        placeholder="বাংলায় সমস্যার বর্ণনা">{{ old('problem_1_description_bn', $problemSection->problem_1_description_bn ?? '') }}</textarea>
                    @error('problem_1_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_1_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="problem_1_icon" id="problem_1_icon"
                        value="{{ old('problem_1_icon', $problemSection->problem_1_icon ?? 'bi-hourglass-split') }}"
                        placeholder="e.g., bi-hourglass-split">
                    <div class="problem-icon-hint">Use Bootstrap Icons classes like: bi-hourglass-split, bi-geo-alt, bi-virus, bi-cash-coin</div>
                    @error('problem_1_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Problem 2 -->
        <div class="form-section">
            <h2 class="section-title">🗺️ Problem 2 - Inconvenient Location</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="problem_2_title_en">Title (English)</label>
                        <input type="text" name="problem_2_title_en" id="problem_2_title_en"
                            value="{{ old('problem_2_title_en', $problemSection->problem_2_title_en ?? '') }}"
                            placeholder="e.g., Inconvenient Location">
                        @error('problem_2_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="problem_2_title_bn">Title (Bengali)</label>
                        <input type="text" name="problem_2_title_bn" id="problem_2_title_bn"
                            value="{{ old('problem_2_title_bn', $problemSection->problem_2_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('problem_2_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="problem_2_description_en">Description (English)</label>
                    <textarea name="problem_2_description_en" id="problem_2_description_en"
                        placeholder="Problem description in English">{{ old('problem_2_description_en', $problemSection->problem_2_description_en ?? '') }}</textarea>
                    @error('problem_2_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_2_description_bn">Description (Bengali)</label>
                    <textarea name="problem_2_description_bn" id="problem_2_description_bn"
                        placeholder="বাংলায় সমস্যার বর্ণনা">{{ old('problem_2_description_bn', $problemSection->problem_2_description_bn ?? '') }}</textarea>
                    @error('problem_2_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_2_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="problem_2_icon" id="problem_2_icon"
                        value="{{ old('problem_2_icon', $problemSection->problem_2_icon ?? 'bi-geo-alt') }}"
                        placeholder="e.g., bi-geo-alt">
                    @error('problem_2_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Problem 3 -->
        <div class="form-section">
            <h2 class="section-title">🦠 Problem 3 - Hospital Infections</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="problem_3_title_en">Title (English)</label>
                        <input type="text" name="problem_3_title_en" id="problem_3_title_en"
                            value="{{ old('problem_3_title_en', $problemSection->problem_3_title_en ?? '') }}"
                            placeholder="e.g., Hospital Infections">
                        @error('problem_3_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="problem_3_title_bn">Title (Bengali)</label>
                        <input type="text" name="problem_3_title_bn" id="problem_3_title_bn"
                            value="{{ old('problem_3_title_bn', $problemSection->problem_3_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('problem_3_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="problem_3_description_en">Description (English)</label>
                    <textarea name="problem_3_description_en" id="problem_3_description_en"
                        placeholder="Problem description in English">{{ old('problem_3_description_en', $problemSection->problem_3_description_en ?? '') }}</textarea>
                    @error('problem_3_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_3_description_bn">Description (Bengali)</label>
                    <textarea name="problem_3_description_bn" id="problem_3_description_bn"
                        placeholder="বাংলায় সমস্যার বর্ণনা">{{ old('problem_3_description_bn', $problemSection->problem_3_description_bn ?? '') }}</textarea>
                    @error('problem_3_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_3_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="problem_3_icon" id="problem_3_icon"
                        value="{{ old('problem_3_icon', $problemSection->problem_3_icon ?? 'bi-virus') }}"
                        placeholder="e.g., bi-virus">
                    @error('problem_3_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <!-- Problem 4 -->
        <div class="form-section">
            <h2 class="section-title">💰 Problem 4 - Difficulty Transporting Elderly Patients</h2>

            <div class="subsection">
                <div class="form-row">
                    <div class="form-group">
                        <label for="problem_4_title_en">Title (English)</label>
                        <input type="text" name="problem_4_title_en" id="problem_4_title_en"
                            value="{{ old('problem_4_title_en', $problemSection->problem_4_title_en ?? '') }}"
                            placeholder="e.g., Difficulty Transporting Elderly Patients">
                        @error('problem_4_title_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="problem_4_title_bn">Title (Bengali)</label>
                        <input type="text" name="problem_4_title_bn" id="problem_4_title_bn"
                            value="{{ old('problem_4_title_bn', $problemSection->problem_4_title_bn ?? '') }}"
                            placeholder="বাংলায় শিরোনাম">
                        @error('problem_4_title_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="problem_4_description_en">Description (English)</label>
                    <textarea name="problem_4_description_en" id="problem_4_description_en"
                        placeholder="Problem description in English">{{ old('problem_4_description_en', $problemSection->problem_4_description_en ?? '') }}</textarea>
                    @error('problem_4_description_en') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_4_description_bn">Description (Bengali)</label>
                    <textarea name="problem_4_description_bn" id="problem_4_description_bn"
                        placeholder="বাংলায় সমস্যার বর্ণনা">{{ old('problem_4_description_bn', $problemSection->problem_4_description_bn ?? '') }}</textarea>
                    @error('problem_4_description_bn') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="problem_4_icon">Icon Class (Bootstrap Icons)</label>
                    <input type="text" name="problem_4_icon" id="problem_4_icon"
                        value="{{ old('problem_4_icon', $problemSection->problem_4_icon ?? 'bi-cash-coin') }}"
                        placeholder="e.g., bi-cash-coin">
                    @error('problem_4_icon') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn-submit">
                💾 Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
