@extends('backend.layouts.master')

@section('title', 'Manage About Us - Who We Are')

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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .image-preview {
            margin-top: 10px;
            max-width: 200px;
        }

        .image-preview img {
            width: 100%;
            border-radius: 6px;
            border: 1px solid #e9ecef;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @if ($message = Session::get('success'))
        <div class="success-message">
            ✓ {{ $message }}
        </div>
    @endif

    <form action="{{ route('admin.about-us.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Page Title Section -->
        <div class="form-section">
            <h2 class="section-title">📄 Page Title Section</h2>

            <div class="form-group">
                <label for="heading_en">Page Heading (English)</label>
                <input type="text" id="heading_en" name="heading_en"
                    value="{{ old('heading_en', $aboutUs->heading_en ?? 'About') }}"
                    placeholder="e.g., About">
                @error('heading_en')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="heading_bn">Page Heading (Bangla)</label>
                <input type="text" id="heading_bn" name="heading_bn"
                    value="{{ old('heading_bn', $aboutUs->heading_bn ?? 'আমাদের সম্পর্কে') }}"
                    placeholder="e.g., আমাদের সম্পর্কে">
                @error('heading_bn')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description_en">Page Description (English)</label>
                <textarea id="description_en" name="description_en"
                    placeholder="Enter page description in English">{{ old('description_en', $aboutUs->description_en ?? '') }}</textarea>
                @error('description_en')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description_bn">Page Description (Bangla)</label>
                <textarea id="description_bn" name="description_bn"
                    placeholder="বাংলায় পৃষ্ঠা বর্ণনা প্রবেশ করুন">{{ old('description_bn', $aboutUs->description_bn ?? '') }}</textarea>
                @error('description_bn')
                    <small style="color: #dc3545;">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="form-section">
            <h2 class="section-title">🏥 Main Content Section</h2>

            <div class="form-group">
                <label for="main_title_en">Main Title (English)</label>
                <input type="text" id="main_title_en" name="main_title_en"
                    value="{{ old('main_title_en', $aboutUs->main_title_en ?? 'Compassionate Care for Every Family') }}"
                    placeholder="e.g., Compassionate Care for Every Family">
            </div>

            <div class="form-group">
                <label for="main_title_bn">Main Title (Bangla)</label>
                <input type="text" id="main_title_bn" name="main_title_bn"
                    value="{{ old('main_title_bn', $aboutUs->main_title_bn ?? 'প্রতিটি পরিবারের জন্য সহানুভূতিশীল যত্ন') }}"
                    placeholder="e.g., প্রতিটি পরিবারের জন্য সহানুভূতিশীল যত্ন">
            </div>

            <div class="form-group">
                <label for="main_lead_en">Main Lead (English)</label>
                <textarea id="main_lead_en" name="main_lead_en"
                    placeholder="Enter main lead in English">{{ old('main_lead_en', $aboutUs->main_lead_en ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="main_lead_bn">Main Lead (Bangla)</label>
                <textarea id="main_lead_bn" name="main_lead_bn"
                    placeholder="বাংলায় মূল লিড প্রবেশ করুন">{{ old('main_lead_bn', $aboutUs->main_lead_bn ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="main_description_en">Main Description (English)</label>
                <textarea id="main_description_en" name="main_description_en" placeholder="Enter description in English">{{ old('main_description_en', $aboutUs->main_description_en ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="main_description_bn">Main Description (Bangla)</label>
                <textarea id="main_description_bn" name="main_description_bn"
                    placeholder="বাংলায় বর্ণনা প্রবেশ করুন">{{ old('main_description_bn', $aboutUs->main_description_bn ?? '') }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="main_image">Main Image</label>
                    <input type="file" id="main_image" name="main_image" accept="image/*">
                    @if ($aboutUs->main_image)
                        <div class="image-preview">
                            <img src="{{ asset('storage/' . $aboutUs->main_image) }}" alt="Main Image">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="floating_image">Floating Image</label>
                    <input type="file" id="floating_image" name="floating_image" accept="image/*">
                    @if ($aboutUs->floating_image)
                        <div class="image-preview">
                            <img src="{{ asset('storage/' . $aboutUs->floating_image) }}" alt="Floating Image">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="form-section">
            <h2 class="section-title">📊 Statistics</h2>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_1_value">Stat 1 Value</label>
                    <input type="text" id="stat_1_value" name="stat_1_value"
                        value="{{ old('stat_1_value', $aboutUs->stat_1_value ?? '15000') }}" placeholder="e.g., 15000">
                </div>
                <div class="form-group">
                    <label for="stat_1_label_en">Stat 1 Label (English)</label>
                    <input type="text" id="stat_1_label_en" name="stat_1_label_en"
                        value="{{ old('stat_1_label_en', $aboutUs->stat_1_label_en ?? 'Patients Treated') }}"
                        placeholder="e.g., Patients Treated">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_1_label_bn">Stat 1 Label (Bangla)</label>
                    <input type="text" id="stat_1_label_bn" name="stat_1_label_bn"
                        value="{{ old('stat_1_label_bn', $aboutUs->stat_1_label_bn ?? 'চিকিৎসা করা রোগী') }}"
                        placeholder="e.g., চিকিৎসা করা রোগী">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_2_value">Stat 2 Value</label>
                    <input type="text" id="stat_2_value" name="stat_2_value"
                        value="{{ old('stat_2_value', $aboutUs->stat_2_value ?? '25') }}" placeholder="e.g., 25">
                </div>
                <div class="form-group">
                    <label for="stat_2_label_en">Stat 2 Label (English)</label>
                    <input type="text" id="stat_2_label_en" name="stat_2_label_en"
                        value="{{ old('stat_2_label_en', $aboutUs->stat_2_label_en ?? 'Years Experience') }}"
                        placeholder="e.g., Years Experience">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_2_label_bn">Stat 2 Label (Bangla)</label>
                    <input type="text" id="stat_2_label_bn" name="stat_2_label_bn"
                        value="{{ old('stat_2_label_bn', $aboutUs->stat_2_label_bn ?? 'বছরের অভিজ্ঞতা') }}"
                        placeholder="e.g., বছরের অভিজ্ঞতা">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_3_value">Stat 3 Value</label>
                    <input type="text" id="stat_3_value" name="stat_3_value"
                        value="{{ old('stat_3_value', $aboutUs->stat_3_value ?? '50') }}" placeholder="e.g., 50">
                </div>
                <div class="form-group">
                    <label for="stat_3_label_en">Stat 3 Label (English)</label>
                    <input type="text" id="stat_3_label_en" name="stat_3_label_en"
                        value="{{ old('stat_3_label_en', $aboutUs->stat_3_label_en ?? 'Medical Specialists') }}"
                        placeholder="e.g., Medical Specialists">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stat_3_label_bn">Stat 3 Label (Bangla)</label>
                    <input type="text" id="stat_3_label_bn" name="stat_3_label_bn"
                        value="{{ old('stat_3_label_bn', $aboutUs->stat_3_label_bn ?? 'চিকিৎসা বিশেষজ্ঞ') }}"
                        placeholder="e.g., চিকিৎসা বিশেষজ্ঞ">
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="form-section">
            <h2 class="section-title">💎 Core Values Section</h2>

            <div class="form-group">
                <label for="values_heading_en">Values Heading (English)</label>
                <input type="text" id="values_heading_en" name="values_heading_en"
                    value="{{ old('values_heading_en', $aboutUs->values_heading_en ?? 'Our Core Values') }}"
                    placeholder="e.g., Our Core Values">
            </div>

            <div class="form-group">
                <label for="values_heading_bn">Values Heading (Bangla)</label>
                <input type="text" id="values_heading_bn" name="values_heading_bn"
                    value="{{ old('values_heading_bn', $aboutUs->values_heading_bn ?? 'আমাদের মূল মূল্যবোধ') }}"
                    placeholder="e.g., আমাদের মূল মূল্যবোধ">
            </div>

            <div class="form-group">
                <label for="values_description_en">Values Description (English)</label>
                <textarea id="values_description_en" name="values_description_en"
                    placeholder="Enter values description in English">{{ old('values_description_en', $aboutUs->values_description_en ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="values_description_bn">Values Description (Bangla)</label>
                <textarea id="values_description_bn" name="values_description_bn"
                    placeholder="বাংলায় মূল্যবোধ বর্ণনা প্রবেশ করুন">{{ old('values_description_bn', $aboutUs->values_description_bn ?? '') }}</textarea>
            </div>

            <!-- Value 1: Compassion -->
            <div class="form-row">
                <div class="form-group">
                    <label for="value_1_title_en">Value 1 Title (English)</label>
                    <input type="text" id="value_1_title_en" name="value_1_title_en"
                        value="{{ old('value_1_title_en', $aboutUs->value_1_title_en ?? 'Compassion') }}"
                        placeholder="e.g., Compassion">
                </div>
                <div class="form-group">
                    <label for="value_1_title_bn">Value 1 Title (Bangla)</label>
                    <input type="text" id="value_1_title_bn" name="value_1_title_bn"
                        value="{{ old('value_1_title_bn', $aboutUs->value_1_title_bn ?? 'সহানুভূতি') }}"
                        placeholder="e.g., সহানুভূতি">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="value_1_description_en">Value 1 Description (English)</label>
                    <textarea id="value_1_description_en" name="value_1_description_en"
                        placeholder="Enter description in English">{{ old('value_1_description_en', $aboutUs->value_1_description_en ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="value_1_description_bn">Value 1 Description (Bangla)</label>
                    <textarea id="value_1_description_bn" name="value_1_description_bn"
                        placeholder="বাংলায় বর্ণনা প্রবেশ করুন">{{ old('value_1_description_bn', $aboutUs->value_1_description_bn ?? '') }}</textarea>
                </div>
            </div>

            <!-- Value 2: Excellence -->
            <div class="form-row">
                <div class="form-group">
                    <label for="value_2_title_en">Value 2 Title (English)</label>
                    <input type="text" id="value_2_title_en" name="value_2_title_en"
                        value="{{ old('value_2_title_en', $aboutUs->value_2_title_en ?? 'Excellence') }}"
                        placeholder="e.g., Excellence">
                </div>
                <div class="form-group">
                    <label for="value_2_title_bn">Value 2 Title (Bangla)</label>
                    <input type="text" id="value_2_title_bn" name="value_2_title_bn"
                        value="{{ old('value_2_title_bn', $aboutUs->value_2_title_bn ?? 'উৎকর্ষতা') }}"
                        placeholder="e.g., উৎকর্ষতা">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="value_2_description_en">Value 2 Description (English)</label>
                    <textarea id="value_2_description_en" name="value_2_description_en"
                        placeholder="Enter description in English">{{ old('value_2_description_en', $aboutUs->value_2_description_en ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="value_2_description_bn">Value 2 Description (Bangla)</label>
                    <textarea id="value_2_description_bn" name="value_2_description_bn"
                        placeholder="বাংলায় বর্ণনা প্রবেশ করুন">{{ old('value_2_description_bn', $aboutUs->value_2_description_bn ?? '') }}</textarea>
                </div>
            </div>

            <!-- Value 3: Integrity -->
            <div class="form-row">
                <div class="form-group">
                    <label for="value_3_title_en">Value 3 Title (English)</label>
                    <input type="text" id="value_3_title_en" name="value_3_title_en"
                        value="{{ old('value_3_title_en', $aboutUs->value_3_title_en ?? 'Integrity') }}"
                        placeholder="e.g., Integrity">
                </div>
                <div class="form-group">
                    <label for="value_3_title_bn">Value 3 Title (Bangla)</label>
                    <input type="text" id="value_3_title_bn" name="value_3_title_bn"
                        value="{{ old('value_3_title_bn', $aboutUs->value_3_title_bn ?? 'সততা') }}"
                        placeholder="e.g., সততা">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="value_3_description_en">Value 3 Description (English)</label>
                    <textarea id="value_3_description_en" name="value_3_description_en"
                        placeholder="Enter description in English">{{ old('value_3_description_en', $aboutUs->value_3_description_en ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="value_3_description_bn">Value 3 Description (Bangla)</label>
                    <textarea id="value_3_description_bn" name="value_3_description_bn"
                        placeholder="বাংলায় বর্ণনা প্রবেশ করুন">{{ old('value_3_description_bn', $aboutUs->value_3_description_bn ?? '') }}</textarea>
                </div>
            </div>

            <!-- Value 4: Innovation -->
            <div class="form-row">
                <div class="form-group">
                    <label for="value_4_title_en">Value 4 Title (English)</label>
                    <input type="text" id="value_4_title_en" name="value_4_title_en"
                        value="{{ old('value_4_title_en', $aboutUs->value_4_title_en ?? 'Innovation') }}"
                        placeholder="e.g., Innovation">
                </div>
                <div class="form-group">
                    <label for="value_4_title_bn">Value 4 Title (Bangla)</label>
                    <input type="text" id="value_4_title_bn" name="value_4_title_bn"
                        value="{{ old('value_4_title_bn', $aboutUs->value_4_title_bn ?? 'উদ্ভাবন') }}"
                        placeholder="e.g., উদ্ভাবন">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="value_4_description_en">Value 4 Description (English)</label>
                    <textarea id="value_4_description_en" name="value_4_description_en"
                        placeholder="Enter description in English">{{ old('value_4_description_en', $aboutUs->value_4_description_en ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="value_4_description_bn">Value 4 Description (Bangla)</label>
                    <textarea id="value_4_description_bn" name="value_4_description_bn"
                        placeholder="বাংলায় বর্ণনা প্রবেশ করুন">{{ old('value_4_description_bn', $aboutUs->value_4_description_bn ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Certifications Section -->
        <div class="form-section">
            <h2 class="section-title">🎖️ Certifications Section</h2>

            <div class="form-group">
                <label for="certifications_heading_en">Certifications Heading (English)</label>
                <input type="text" id="certifications_heading_en" name="certifications_heading_en"
                    value="{{ old('certifications_heading_en', $aboutUs->certifications_heading_en ?? 'Accreditations & Certifications') }}"
                    placeholder="e.g., Accreditations & Certifications">
            </div>

            <div class="form-group">
                <label for="certifications_heading_bn">Certifications Heading (Bangla)</label>
                <input type="text" id="certifications_heading_bn" name="certifications_heading_bn"
                    value="{{ old('certifications_heading_bn', $aboutUs->certifications_heading_bn ?? 'স্বীকৃতি এবং সার্টিফিকেশন') }}"
                    placeholder="e.g., স্বীকৃতি এবং সার্টিফিকেশন">
            </div>

            <div class="form-group">
                <label for="certifications_description_en">Certifications Description (English)</label>
                <textarea id="certifications_description_en" name="certifications_description_en"
                    placeholder="Enter description in English">{{ old('certifications_description_en', $aboutUs->certifications_description_en ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="certifications_description_bn">Certifications Description (Bangla)</label>
                <textarea id="certifications_description_bn" name="certifications_description_bn"
                    placeholder="বাংলায় বর্ণনা প্রবেশ করুন">{{ old('certifications_description_bn', $aboutUs->certifications_description_bn ?? '') }}</textarea>
            </div>

            <div class="form-row">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="form-group">
                        <label for="cert_{{ $i }}_image">Certification {{ $i }} Image</label>
                        <input type="file" id="cert_{{ $i }}_image" name="cert_{{ $i }}_image" accept="image/*">
                        @php $certField = 'cert_' . $i . '_image'; @endphp
                        @if ($aboutUs->{$certField})
                            <div class="image-preview">
                                <img src="{{ asset('storage/' . $aboutUs->{$certField}) }}" alt="Certification {{ $i }}">
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <div class="form-section">
            <button type="submit" class="btn-submit">💾 Update About Us</button>
        </div>
    </form>
</div>
@endsection
