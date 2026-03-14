@extends('backend.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Get In Touch Section</h2>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>✓ Success!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.get-in-touch.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- English Content Section -->
            <div class="mb-5">
                <h4 class="border-bottom pb-2 mb-4" style="color: #2c3e50;">English Content</h4>

                <div class="mb-3">
                    <label for="badge_en" class="form-label">Badge Text (EN)</label>
                    <input type="text" class="form-control @error('badge_en') is-invalid @enderror"
                           id="badge_en" name="badge_en" value="{{ old('badge_en', $getInTouch->badge_en ?? '') }}"
                           placeholder="e.g., Get in Touch">
                    @error('badge_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="heading_en" class="form-label">Heading (EN)</label>
                    <input type="text" class="form-control @error('heading_en') is-invalid @enderror"
                           id="heading_en" name="heading_en" value="{{ old('heading_en', $getInTouch->heading_en ?? '') }}"
                           placeholder="e.g., Ready to Experience Better Healthcare?">
                    @error('heading_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description_en" class="form-label">Description (EN)</label>
                    <textarea class="form-control @error('description_en') is-invalid @enderror"
                              id="description_en" name="description_en" rows="3"
                              placeholder="Main description text">{{ old('description_en', $getInTouch->description_en ?? '') }}</textarea>
                    @error('description_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact 1 (Phone) EN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #007bff;">
                    <h5 class="mb-3">Contact 1 - Phone (EN)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_1_title_en" class="form-label">Title</label>
                            <input type="text" class="form-control @error('contact_1_title_en') is-invalid @enderror"
                                   id="contact_1_title_en" name="contact_1_title_en"
                                   value="{{ old('contact_1_title_en', $getInTouch->contact_1_title_en ?? '') }}"
                                   placeholder="e.g., Emergency Hotline">
                            @error('contact_1_title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_1_value_en" class="form-label">Value</label>
                            <input type="text" class="form-control @error('contact_1_value_en') is-invalid @enderror"
                                   id="contact_1_value_en" name="contact_1_value_en"
                                   value="{{ old('contact_1_value_en', $getInTouch->contact_1_value_en ?? '') }}"
                                   placeholder="e.g., +1 (555) 911-2468">
                            @error('contact_1_value_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0">
                        <label for="contact_1_description_en" class="form-label">Description</label>
                        <textarea class="form-control @error('contact_1_description_en') is-invalid @enderror"
                                  id="contact_1_description_en" name="contact_1_description_en" rows="2"
                                  placeholder="e.g., Available 24/7 for urgent medical needs">{{ old('contact_1_description_en', $getInTouch->contact_1_description_en ?? '') }}</textarea>
                        @error('contact_1_description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Contact 2 (Email) EN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #28a745;">
                    <h5 class="mb-3">Contact 2 - Email (EN)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_2_title_en" class="form-label">Title</label>
                            <input type="text" class="form-control @error('contact_2_title_en') is-invalid @enderror"
                                   id="contact_2_title_en" name="contact_2_title_en"
                                   value="{{ old('contact_2_title_en', $getInTouch->contact_2_title_en ?? '') }}"
                                   placeholder="e.g., Email Us">
                            @error('contact_2_title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_2_value_en" class="form-label">Value</label>
                            <input type="email" class="form-control @error('contact_2_value_en') is-invalid @enderror"
                                   id="contact_2_value_en" name="contact_2_value_en"
                                   value="{{ old('contact_2_value_en', $getInTouch->contact_2_value_en ?? '') }}"
                                   placeholder="e.g., info@example.com">
                            @error('contact_2_value_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0">
                        <label for="contact_2_description_en" class="form-label">Description</label>
                        <textarea class="form-control @error('contact_2_description_en') is-invalid @enderror"
                                  id="contact_2_description_en" name="contact_2_description_en" rows="2"
                                  placeholder="e.g., Response within 2 hours on business days">{{ old('contact_2_description_en', $getInTouch->contact_2_description_en ?? '') }}</textarea>
                        @error('contact_2_description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Contact 3 (Hours) EN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #ffc107;">
                    <h5 class="mb-3">Contact 3 - Hours (EN)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_3_title_en" class="form-label">Title</label>
                            <input type="text" class="form-control @error('contact_3_title_en') is-invalid @enderror"
                                   id="contact_3_title_en" name="contact_3_title_en"
                                   value="{{ old('contact_3_title_en', $getInTouch->contact_3_title_en ?? '') }}"
                                   placeholder="e.g., Hours">
                            @error('contact_3_title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_3_value_en" class="form-label">Value</label>
                        <textarea class="form-control @error('contact_3_value_en') is-invalid @enderror"
                                  id="contact_3_value_en" name="contact_3_value_en" rows="2"
                                  placeholder="e.g., 24/7 Emergency Services">{{ old('contact_3_value_en', $getInTouch->contact_3_value_en ?? '') }}</textarea>
                        @error('contact_3_value_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label for="contact_3_description_en" class="form-label">Description</label>
                        <textarea class="form-control @error('contact_3_description_en') is-invalid @enderror"
                                  id="contact_3_description_en" name="contact_3_description_en" rows="2"
                                  placeholder="e.g., Business Hours: Mon-Fri 8AM-6PM">{{ old('contact_3_description_en', $getInTouch->contact_3_description_en ?? '') }}</textarea>
                        @error('contact_3_description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <!-- Bengali Content Section -->
            <div class="mb-5">
                <h4 class="border-bottom pb-2 mb-4" style="color: #2c3e50;">Bengali Content</h4>

                <div class="mb-3">
                    <label for="badge_bn" class="form-label">Badge Text (BN)</label>
                    <input type="text" class="form-control @error('badge_bn') is-invalid @enderror"
                           id="badge_bn" name="badge_bn" value="{{ old('badge_bn', $getInTouch->badge_bn ?? '') }}"
                           placeholder="বাংলা ব্যাজ">
                    @error('badge_bn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="heading_bn" class="form-label">Heading (BN)</label>
                    <input type="text" class="form-control @error('heading_bn') is-invalid @enderror"
                           id="heading_bn" name="heading_bn" value="{{ old('heading_bn', $getInTouch->heading_bn ?? '') }}"
                           placeholder="বাংলা শিরোনাম">
                    @error('heading_bn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description_bn" class="form-label">Description (BN)</label>
                    <textarea class="form-control @error('description_bn') is-invalid @enderror"
                              id="description_bn" name="description_bn" rows="3"
                              placeholder="বাংলা বর্ণনা">{{ old('description_bn', $getInTouch->description_bn ?? '') }}</textarea>
                    @error('description_bn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact 1 (Phone) BN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #007bff;">
                    <h5 class="mb-3">Contact 1 - Phone (BN)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_1_title_bn" class="form-label">Title</label>
                            <input type="text" class="form-control @error('contact_1_title_bn') is-invalid @enderror"
                                   id="contact_1_title_bn" name="contact_1_title_bn"
                                   value="{{ old('contact_1_title_bn', $getInTouch->contact_1_title_bn ?? '') }}"
                                   placeholder="শিরোনাম">
                            @error('contact_1_title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_1_value_bn" class="form-label">Value</label>
                            <input type="text" class="form-control @error('contact_1_value_bn') is-invalid @enderror"
                                   id="contact_1_value_bn" name="contact_1_value_bn"
                                   value="{{ old('contact_1_value_bn', $getInTouch->contact_1_value_bn ?? '') }}"
                                   placeholder="মূল্য/যোগাযোগ তথ্য">
                            @error('contact_1_value_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0">
                        <label for="contact_1_description_bn" class="form-label">Description</label>
                        <textarea class="form-control @error('contact_1_description_bn') is-invalid @enderror"
                                  id="contact_1_description_bn" name="contact_1_description_bn" rows="2"
                                  placeholder="বর্ণনা">{{ old('contact_1_description_bn', $getInTouch->contact_1_description_bn ?? '') }}</textarea>
                        @error('contact_1_description_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Contact 2 (Email) BN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #28a745;">
                    <h5 class="mb-3">Contact 2 - Email (BN)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_2_title_bn" class="form-label">Title</label>
                            <input type="text" class="form-control @error('contact_2_title_bn') is-invalid @enderror"
                                   id="contact_2_title_bn" name="contact_2_title_bn"
                                   value="{{ old('contact_2_title_bn', $getInTouch->contact_2_title_bn ?? '') }}"
                                   placeholder="শিরোনাম">
                            @error('contact_2_title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_2_value_bn" class="form-label">Value</label>
                            <input type="email" class="form-control @error('contact_2_value_bn') is-invalid @enderror"
                                   id="contact_2_value_bn" name="contact_2_value_bn"
                                   value="{{ old('contact_2_value_bn', $getInTouch->contact_2_value_bn ?? '') }}"
                                   placeholder="ইমেইল ঠিকানা">
                            @error('contact_2_value_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-0">
                        <label for="contact_2_description_bn" class="form-label">Description</label>
                        <textarea class="form-control @error('contact_2_description_bn') is-invalid @enderror"
                                  id="contact_2_description_bn" name="contact_2_description_bn" rows="2"
                                  placeholder="বর্ণনা">{{ old('contact_2_description_bn', $getInTouch->contact_2_description_bn ?? '') }}</textarea>
                        @error('contact_2_description_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Contact 3 (Hours) BN -->
                <div class="p-3 mb-3" style="background-color: #f8f9fa; border-left: 3px solid #ffc107;">
                    <h5 class="mb-3">Contact 3 - Hours (BN)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_3_title_bn" class="form-label">Title</label>
                            <input type="text" class="form-control @error('contact_3_title_bn') is-invalid @enderror"
                                   id="contact_3_title_bn" name="contact_3_title_bn"
                                   value="{{ old('contact_3_title_bn', $getInTouch->contact_3_title_bn ?? '') }}"
                                   placeholder="শিরোনাম">
                            @error('contact_3_title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_3_value_bn" class="form-label">Value</label>
                        <textarea class="form-control @error('contact_3_value_bn') is-invalid @enderror"
                                  id="contact_3_value_bn" name="contact_3_value_bn" rows="2"
                                  placeholder="মূল্য/সময়">{{ old('contact_3_value_bn', $getInTouch->contact_3_value_bn ?? '') }}</textarea>
                        @error('contact_3_value_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label for="contact_3_description_bn" class="form-label">Description</label>
                        <textarea class="form-control @error('contact_3_description_bn') is-invalid @enderror"
                                  id="contact_3_description_bn" name="contact_3_description_bn" rows="2"
                                  placeholder="বর্ণনা">{{ old('contact_3_description_bn', $getInTouch->contact_3_description_bn ?? '') }}</textarea>
                        @error('contact_3_description_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update Get In Touch Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
