@extends('backend.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>About The Founder</h2>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.founder.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- English Content Section -->
            <div class="mb-5">
                <h4 class="border-bottom pb-2 mb-4" style="color: #2c3e50;">English Content</h4>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title_en" class="form-label">Title (EN)</label>
                        <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                               id="title_en" name="title_en" value="{{ old('title_en', $founder->title_en ?? '') }}" placeholder="e.g., Meet Our Founder & CEO">
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="subtitle_en" class="form-label">Subtitle (EN)</label>
                        <input type="text" class="form-control @error('subtitle_en') is-invalid @enderror"
                               id="subtitle_en" name="subtitle_en" value="{{ old('subtitle_en', $founder->subtitle_en ?? '') }}" placeholder="e.g., Visionary Leadership in Healthcare">
                        @error('subtitle_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="quote_en" class="form-label">Quote (EN)</label>
                    <textarea class="form-control @error('quote_en') is-invalid @enderror"
                              id="quote_en" name="quote_en" rows="3" placeholder="Main quote from the founder">{{ old('quote_en', $founder->quote_en ?? '') }}</textarea>
                    @error('quote_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vision_heading_en" class="form-label">Vision Heading (EN)</label>
                        <input type="text" class="form-control @error('vision_heading_en') is-invalid @enderror"
                               id="vision_heading_en" name="vision_heading_en" value="{{ old('vision_heading_en', $founder->vision_heading_en ?? '') }}" placeholder="e.g., Visionary Leadership">
                        @error('vision_heading_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="vision_description_en" class="form-label">Vision Description (EN)</label>
                        <textarea class="form-control @error('vision_description_en') is-invalid @enderror"
                                  id="vision_description_en" name="vision_description_en" rows="2" placeholder="Vision description">{{ old('vision_description_en', $founder->vision_description_en ?? '') }}</textarea>
                        @error('vision_description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Highlight 1 EN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #007bff;">
                    <h5 class="mb-3">Highlight 1 (EN)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="highlight_1_title_en" class="form-label">Title</label>
                            <input type="text" class="form-control @error('highlight_1_title_en') is-invalid @enderror"
                                   id="highlight_1_title_en" name="highlight_1_title_en" value="{{ old('highlight_1_title_en', $founder->highlight_1_title_en ?? '') }}" placeholder="e.g., 25+ Years">
                            @error('highlight_1_title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="highlight_1_description_en" class="form-label">Description</label>
                            <textarea class="form-control @error('highlight_1_description_en') is-invalid @enderror"
                                      id="highlight_1_description_en" name="highlight_1_description_en" rows="2" placeholder="Description">{{ old('highlight_1_description_en', $founder->highlight_1_description_en ?? '') }}</textarea>
                            @error('highlight_1_description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Highlight 2 EN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #28a745;">
                    <h5 class="mb-3">Highlight 2 (EN)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="highlight_2_title_en" class="form-label">Title</label>
                            <input type="text" class="form-control @error('highlight_2_title_en') is-invalid @enderror"
                                   id="highlight_2_title_en" name="highlight_2_title_en" value="{{ old('highlight_2_title_en', $founder->highlight_2_title_en ?? '') }}" placeholder="e.g., Patient-Centric">
                            @error('highlight_2_title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="highlight_2_description_en" class="form-label">Description</label>
                            <textarea class="form-control @error('highlight_2_description_en') is-invalid @enderror"
                                      id="highlight_2_description_en" name="highlight_2_description_en" rows="2" placeholder="Description">{{ old('highlight_2_description_en', $founder->highlight_2_description_en ?? '') }}</textarea>
                            @error('highlight_2_description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Highlight 3 EN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #ffc107;">
                    <h5 class="mb-3">Highlight 3 (EN)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="highlight_3_title_en" class="form-label">Title</label>
                            <input type="text" class="form-control @error('highlight_3_title_en') is-invalid @enderror"
                                   id="highlight_3_title_en" name="highlight_3_title_en" value="{{ old('highlight_3_title_en', $founder->highlight_3_title_en ?? '') }}" placeholder="e.g., Trusted by Thousands">
                            @error('highlight_3_title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="highlight_3_description_en" class="form-label">Description</label>
                            <textarea class="form-control @error('highlight_3_description_en') is-invalid @enderror"
                                      id="highlight_3_description_en" name="highlight_3_description_en" rows="2" placeholder="Description">{{ old('highlight_3_description_en', $founder->highlight_3_description_en ?? '') }}</textarea>
                            @error('highlight_3_description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="badge_label_en" class="form-label">Badge Label (EN)</label>
                    <input type="text" class="form-control @error('badge_label_en') is-invalid @enderror"
                           id="badge_label_en" name="badge_label_en" value="{{ old('badge_label_en', $founder->badge_label_en ?? '') }}" placeholder="e.g., Founder & CEO">
                    @error('badge_label_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-5">

            <!-- Bengali Content Section -->
            <div class="mb-5">
                <h4 class="border-bottom pb-2 mb-4" style="color: #2c3e50;">Bengali Content</h4>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title_bn" class="form-label">Title (BN)</label>
                        <input type="text" class="form-control @error('title_bn') is-invalid @enderror"
                               id="title_bn" name="title_bn" value="{{ old('title_bn', $founder->title_bn ?? '') }}" placeholder="বাংলা শিরোনাম">
                        @error('title_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="subtitle_bn" class="form-label">Subtitle (BN)</label>
                        <input type="text" class="form-control @error('subtitle_bn') is-invalid @enderror"
                               id="subtitle_bn" name="subtitle_bn" value="{{ old('subtitle_bn', $founder->subtitle_bn ?? '') }}" placeholder="বাংলা উপশিরোনাম">
                        @error('subtitle_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="quote_bn" class="form-label">Quote (BN)</label>
                    <textarea class="form-control @error('quote_bn') is-invalid @enderror"
                              id="quote_bn" name="quote_bn" rows="3" placeholder="প্রতিষ্ঠাতার উদ্ধৃতি">{{ old('quote_bn', $founder->quote_bn ?? '') }}</textarea>
                    @error('quote_bn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vision_heading_bn" class="form-label">Vision Heading (BN)</label>
                        <input type="text" class="form-control @error('vision_heading_bn') is-invalid @enderror"
                               id="vision_heading_bn" name="vision_heading_bn" value="{{ old('vision_heading_bn', $founder->vision_heading_bn ?? '') }}" placeholder="দূরদর্শী নেতৃত্ব">
                        @error('vision_heading_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="vision_description_bn" class="form-label">Vision Description (BN)</label>
                        <textarea class="form-control @error('vision_description_bn') is-invalid @enderror"
                                  id="vision_description_bn" name="vision_description_bn" rows="2" placeholder="দূরদর্শিতা বর্ণনা">{{ old('vision_description_bn', $founder->vision_description_bn ?? '') }}</textarea>
                        @error('vision_description_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Highlight 1 BN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #007bff;">
                    <h5 class="mb-3">Highlight 1 (BN)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="highlight_1_title_bn" class="form-label">Title</label>
                            <input type="text" class="form-control @error('highlight_1_title_bn') is-invalid @enderror"
                                   id="highlight_1_title_bn" name="highlight_1_title_bn" value="{{ old('highlight_1_title_bn', $founder->highlight_1_title_bn ?? '') }}" placeholder="শিরোনাম">
                            @error('highlight_1_title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="highlight_1_description_bn" class="form-label">Description</label>
                            <textarea class="form-control @error('highlight_1_description_bn') is-invalid @enderror"
                                      id="highlight_1_description_bn" name="highlight_1_description_bn" rows="2" placeholder="বর্ণনা">{{ old('highlight_1_description_bn', $founder->highlight_1_description_bn ?? '') }}</textarea>
                            @error('highlight_1_description_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Highlight 2 BN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #28a745;">
                    <h5 class="mb-3">Highlight 2 (BN)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="highlight_2_title_bn" class="form-label">Title</label>
                            <input type="text" class="form-control @error('highlight_2_title_bn') is-invalid @enderror"
                                   id="highlight_2_title_bn" name="highlight_2_title_bn" value="{{ old('highlight_2_title_bn', $founder->highlight_2_title_bn ?? '') }}" placeholder="শিরোনাম">
                            @error('highlight_2_title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="highlight_2_description_bn" class="form-label">Description</label>
                            <textarea class="form-control @error('highlight_2_description_bn') is-invalid @enderror"
                                      id="highlight_2_description_bn" name="highlight_2_description_bn" rows="2" placeholder="বর্ণনা">{{ old('highlight_2_description_bn', $founder->highlight_2_description_bn ?? '') }}</textarea>
                            @error('highlight_2_description_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Highlight 3 BN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #ffc107;">
                    <h5 class="mb-3">Highlight 3 (BN)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="highlight_3_title_bn" class="form-label">Title</label>
                            <input type="text" class="form-control @error('highlight_3_title_bn') is-invalid @enderror"
                                   id="highlight_3_title_bn" name="highlight_3_title_bn" value="{{ old('highlight_3_title_bn', $founder->highlight_3_title_bn ?? '') }}" placeholder="শিরোনাম">
                            @error('highlight_3_title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="highlight_3_description_bn" class="form-label">Description</label>
                            <textarea class="form-control @error('highlight_3_description_bn') is-invalid @enderror"
                                      id="highlight_3_description_bn" name="highlight_3_description_bn" rows="2" placeholder="বর্ণনা">{{ old('highlight_3_description_bn', $founder->highlight_3_description_bn ?? '') }}</textarea>
                            @error('highlight_3_description_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="badge_label_bn" class="form-label">Badge Label (BN)</label>
                    <input type="text" class="form-control @error('badge_label_bn') is-invalid @enderror"
                           id="badge_label_bn" name="badge_label_bn" value="{{ old('badge_label_bn', $founder->badge_label_bn ?? '') }}" placeholder="ব্যাজ লেবেল">
                    @error('badge_label_bn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-5">

            <!-- Picture Upload Section -->
            <div class="mb-5">
                <h4 class="border-bottom pb-2 mb-4" style="color: #2c3e50;">Founder Picture</h4>

                <div class="mb-3">
                    @if ($founder->picture && Storage::disk('public')->exists('founders/' . $founder->picture))
                        <div class="mb-3">
                            <label class="form-label">Current Picture</label>
                            <div>
                                <img src="{{ asset('storage/founders/' . $founder->picture) }}" alt="Founder Picture"
                                     style="max-width: 200px; border-radius: 8px; object-fit: cover;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn btn-sm btn-warning" id="changePictureBtn" onclick="togglePictureInput()">
                                Change Picture
                            </button>
                        </div>

                        <div id="pictureInputContainer" style="display: none;">
                            <label for="picture" class="form-label">Upload New Picture</label>
                            <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                   id="picture" name="picture" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                            @error('picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Allowed formats: JPEG, PNG, JPG, GIF, WEBP (Max 2MB)</small>
                        </div>
                    @else
                        <label for="picture" class="form-label">Upload Founder Picture</label>
                        <input type="file" class="form-control @error('picture') is-invalid @enderror"
                               id="picture" name="picture" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                        @error('picture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Allowed formats: JPEG, PNG, JPG, GIF, WEBP (Max 2MB)</small>
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update Founder
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePictureInput() {
    const container = document.getElementById('pictureInputContainer');
    container.style.display = container.style.display === 'none' ? 'block' : 'none';
}
</script>
@endsection
