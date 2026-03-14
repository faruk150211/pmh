@extends('frontend.layouts.master')

@section('title', (app()->getLocale() === 'bn' ? 'যোগাযোগ - প্রিমিয়ার মেডিকেল হাউসকল' : 'Contact - Premier Medical Housecall'))

@section('description', (app()->getLocale() === 'bn' ? 'প্রিমিয়ার মেডিকেল হাউসকলের সাথে যোগাযোগ করুন। আমরা আপনার চিকিৎসা সেবা সম্পর্কে যে কোনো প্রশ্নে সহায়তা করতে এখানে আছি।' : 'Get in touch with Premier Medical Housecall. We are here to help you with any inquiries about our medical services.'))

@section('keywords', (app()->getLocale() === 'bn' ? 'যোগাযোগ করুন, চিকিৎসা সেবা, হাউসকল, অ্যাপয়েন্টমেন্ট, ফোন' : 'contact us, medical services, housecall, appointment, phone'))

@section('content')
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">{{ app()->getLocale() === 'bn' ? 'যোগাযোগ' : 'Contact' }}</h1>
              <p class="mb-0">
                {{ app()->getLocale() === 'bn' ? 'প্রশ্ন আছে বা একটি অ্যাপয়েন্টমেন্ট নির্ধারণ করতে হবে? আমাদের দল আপনাকে সাহায্য করতে এখানে আছে। আজই আমাদের সাথে যোগাযোগ করুন এবং আমাদের চমৎকার রোগী যত্নের প্রতিশ্রুতি অনুভব করুন।' : 'Have questions or need to schedule an appointment? Our team is here to help. Contact us today and experience our commitment to excellent patient care.' }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">{{ app()->getLocale() === 'bn' ? 'হোম' : 'Home' }}</a></li>
            <li class="current">{{ app()->getLocale() === 'bn' ? 'যোগাযোগ' : 'Contact' }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5">
          <div class="col-lg-5">
            <div class="contact-info-wrapper">
              <div class="contact-info-item" data-aos="fade-up" data-aos-delay="100">
                <div class="info-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="info-content">
                  <h3>{{ app()->getLocale() === 'bn' ? 'আমাদের ঠিকানা' : 'Our Address' }}</h3>
                  <p>368 Sher-E-Bangla Rd, Khulna 9100</p>
                </div>
              </div>

              <div class="contact-info-item" data-aos="fade-up" data-aos-delay="200">
                <div class="info-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="info-content">
                  <h3>{{ app()->getLocale() === 'bn' ? 'ইমেইল ঠিকানা' : 'Email Address' }}</h3>
                  <p>info@premiermedical.com</p>
                  <p>contact@premiermedical.com</p>
                </div>
              </div>

              <div class="contact-info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="info-icon">
                  <i class="bi bi-headset"></i>
                </div>
                <div class="info-content">
                  <h3>{{ app()->getLocale() === 'bn' ? 'কর্মের সময়' : 'Hours of Operation' }}</h3>
                  <p>{{ app()->getLocale() === 'bn' ? 'রবি-শুক্র: সকাল ৯ টা - সন্ধ্যা ৬ টা' : 'Sunday-Fri: 9 AM - 6 PM' }}</p>
                  <p>{{ app()->getLocale() === 'bn' ? 'শনি: সকাল ৯ টা - বিকেল ৪ টা' : 'Saturday: 9 AM - 4 PM' }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form-card" data-aos="fade-up" data-aos-delay="200">
              <h2>{{ app()->getLocale() === 'bn' ? 'আমাদের কাছে বার্তা পাঠান' : 'Send us a Message' }}</h2>
              <p class="mb-4">{{ app()->getLocale() === 'bn' ? 'প্রশ্ন আছে বা আরও জানতে চান? আমাদের কাছে পৌঁছান এবং আমাদের দল শীঘ্রই আপনার সাথে যোগাযোগ করবে।' : 'Have questions or want to learn more? Reach out to us and our team will get back to you shortly.' }}</p>

              <!-- Success Message -->
              @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <!-- Error Message -->
              @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row g-4">
                  <!-- Name Field -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name" class="form-label">{{ app()->getLocale() === 'bn' ? 'নাম' : 'Name' }} <span class="text-danger">*</span></label>
                      <input type="text"
                             class="form-control @error('name') is-invalid @enderror"
                             name="name"
                             id="name"
                             placeholder="{{ app()->getLocale() === 'bn' ? 'আপনার সম্পূর্ণ নাম' : 'Your Full Name' }}"
                             value="{{ old('name') }}"
                             pattern="[a-zA-Z\s\'-]+"
                             maxlength="255"
                             required>
                      <div class="form-text" id="nameHelp" style="display:none;"></div>
                      @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- Email Field -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email" class="form-label">{{ app()->getLocale() === 'bn' ? 'ইমেইল' : 'Email' }} <span class="text-danger">*</span></label>
                      <input type="email"
                             class="form-control @error('email') is-invalid @enderror"
                             name="email"
                             id="email"
                             placeholder="{{ app()->getLocale() === 'bn' ? 'আপনার@ইমেইল.কম' : 'your@email.com' }}"
                             value="{{ old('email') }}"
                             maxlength="255"
                             required>
                      <div class="form-text" id="emailHelp" style="display:none;"></div>
                      @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- Phone Field -->
                  <div class="col-12">
                    <div class="form-group">
                      <label for="phone" class="form-label">{{ app()->getLocale() === 'bn' ? 'ফোন' : 'Phone' }} <span class="text-muted">({{ app()->getLocale() === 'bn' ? 'ঐচ্ছিক' : 'Optional' }})</span></label>
                      <input type="tel"
                             class="form-control @error('phone') is-invalid @enderror"
                             name="phone"
                             id="phone"
                             placeholder="+1 (555) 000-0000"
                             value="{{ old('phone') }}"
                             maxlength="20">
                      {{-- <div class="form-text">Format: Numbers, spaces, hyphens, and parentheses only</div> --}}
                      @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- Subject Field -->
                  <div class="col-12">
                    <div class="form-group">
                      <label for="subject" class="form-label">
                        {{ app()->getLocale() === 'bn' ? 'বিষয়' : 'Subject' }} <span class="text-danger">*</span>
                        <small class="text-muted">(<span id="subjectCount">0</span>/255)</small>
                      </label>
                      <input type="text"
                             class="form-control @error('subject') is-invalid @enderror"
                             name="subject"
                             id="subject"
                             placeholder="{{ app()->getLocale() === 'bn' ? 'এটি কি সম্পর্কে?' : 'What is this about?' }}"
                             value="{{ old('subject') }}"
                             maxlength="255"
                             minlength="5"
                             required>
                      {{-- <div class="form-text">Minimum 5 characters required</div> --}}
                      @error('subject')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- Message Field -->
                  <div class="col-12">
                    <div class="form-group">
                      <label for="message" class="form-label">
                        {{ app()->getLocale() === 'bn' ? 'বার্তা' : 'Message' }} <span class="text-danger">*</span>
                        <small class="text-muted">(<span id="messageCount">0</span>/5000)</small>
                      </label>
                      <textarea class="form-control @error('message') is-invalid @enderror"
                                name="message"
                                id="message"
                                placeholder="{{ app()->getLocale() === 'bn' ? 'আপনার বার্তা এখানে...' : 'Your message here...' }}"
                                rows="6"
                                minlength="10"
                                maxlength="5000"
                                required>{{ old('message') }}</textarea>
                      {{-- <div class="form-text">Minimum 10 characters required</div> --}}
                      @error('message')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- Loading & Status Messages -->
                  <div class="col-12">
                    <div class="loading d-none" id="loadingSpinner">
                      <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                      {{ app()->getLocale() === 'bn' ? 'আপনার বার্তা পাঠানো হচ্ছে...' : 'Sending your message...' }}
                    </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-submit" id="submitBtn">
                      <span id="submitText">{{ app()->getLocale() === 'bn' ? 'বার্তা পাঠান' : 'Send Message' }}</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="container-fluid map-container" data-aos="fade-up" data-aos-delay="200">
        <div class="map-overlay"></div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
          width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div> --}}

    </section><!-- /Contact Section -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const subjectInput = document.getElementById('subject');
    const messageInput = document.getElementById('message');
    const submitBtn = document.getElementById('submitBtn');
    const loadingSpinner = document.getElementById('loadingSpinner');

    // Character counters
    const subjectCount = document.getElementById('subjectCount');
    const messageCount = document.getElementById('messageCount');

    // Update subject character count
    subjectInput.addEventListener('input', function() {
        subjectCount.textContent = this.value.length;
    });

    // Update message character count
    messageInput.addEventListener('input', function() {
        messageCount.textContent = this.value.length;
    });

    // Real-time validation for name field
    nameInput.addEventListener('blur', function() {
        if (this.value.trim().length === 0) {
            this.classList.add('is-invalid');
        } else if (!/^[a-zA-Z\s\'-]+$/.test(this.value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    // Real-time validation for email field
    emailInput.addEventListener('blur', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (this.value.trim().length === 0) {
            this.classList.add('is-invalid');
        } else if (!emailRegex.test(this.value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    // Real-time validation for phone field
    phoneInput.addEventListener('blur', function() {
        if (this.value.trim().length > 0) {
            if (!/^[0-9\-\+\(\)\s]+$/.test(this.value)) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        }
    });

    // Real-time validation for subject field
    subjectInput.addEventListener('blur', function() {
        if (this.value.trim().length < 5) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    // Real-time validation for message field
    messageInput.addEventListener('blur', function() {
        if (this.value.trim().length < 10) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    // Form submission with validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate all fields before submission
        const isNameValid = /^[a-zA-Z\s\'-]+$/.test(nameInput.value) && nameInput.value.trim().length > 0;
        const isEmailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
        const isPhoneValid = phoneInput.value.trim().length === 0 || /^[0-9\-\+\(\)\s]+$/.test(phoneInput.value);
        const isSubjectValid = subjectInput.value.trim().length >= 5;
        const isMessageValid = messageInput.value.trim().length >= 10;

        if (!isNameValid) {
            nameInput.classList.add('is-invalid');
            alert('Please enter a valid name.');
            return false;
        }

        if (!isEmailValid) {
            emailInput.classList.add('is-invalid');
            alert('Please enter a valid email address.');
            return false;
        }

        if (!isPhoneValid) {
            phoneInput.classList.add('is-invalid');
            alert('Please enter a valid phone number.');
            return false;
        }

        if (!isSubjectValid) {
            subjectInput.classList.add('is-invalid');
            alert('Subject must be at least 5 characters long.');
            return false;
        }

        if (!isMessageValid) {
            messageInput.classList.add('is-invalid');
            alert('Message must be at least 10 characters long.');
            return false;
        }

        // Show loading state
        loadingSpinner.classList.remove('d-none');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...';

        // Submit the form normally (let Laravel handle the rest)
        form.submit();
    });

    // Initialize field counts
    subjectCount.textContent = subjectInput.value.length;
    messageCount.textContent = messageInput.value.length;
});
</script>

<style>
.form-control.is-valid,
.form-control.is-valid:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.form-control.is-invalid,
.form-control.is-invalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.btn-submit:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.form-group {
    margin-bottom: 1rem;
}
</style>

@endsection
