@extends('frontend.layouts.master')
@section('title', (app()->getLocale() === 'bn' ? 'আমরা কারা - প্রিমিয়ার মেডিকেল হাউসকল' : 'Who We Are - Premier Medical Housecall'))

@section('description', (app()->getLocale() === 'bn' ? 'প্রিমিয়ার মেডিকেল হাউসকল সম্পর্কে জানুন, আমাদের মিশন, মূল্যবোধ এবং ব্যতিক্রমী স্বাস্থ্যসেবা প্রদানের প্রতিশ্রুতি।' : 'Learn about Premier Medical Housecall, our mission, values, and commitment to providing exceptional healthcare services.'))

@section('keywords', (app()->getLocale() === 'bn' ? 'আমাদের সম্পর্কে, মেডিকেল হাউসকল, স্বাস্থ্যসেবা, আমাদের মিশন, আমাদের মূল্যবোধ' : 'about us, medical housecall, healthcare services, our mission, our values'))

@section('content')
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">{{ app()->getLocale() === 'bn' ? 'আমাদের সম্পর্কে' : 'About' }}</h1>
              <p class="mb-0">
                {{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->description_bn ?? 'প্রিমিয়ার মেডিকেল হাউসকল সহানুভূতি, সততা এবং উদ্ভাবনের সাথে ব্যতিক্রমী স্বাস্থ্যসেবা প্রদান করতে প্রতিশ্রুতিবদ্ধ।')
                    : ($aboutUs?->description_en ?? 'Premier Medical Housecall is dedicated to delivering exceptional healthcare services with compassion, integrity, and innovation.')
                }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">{{ app()->getLocale() === 'bn' ? 'হোম' : 'Home' }}</a></li>
            <li class="current">{{ app()->getLocale() === 'bn' ? 'আমাদের সম্পর্কে' : 'About' }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="about-content">
              <h2>{{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->main_title_bn ?? 'প্রতিটি পরিবারের জন্য সহানুভূতিশীল যত্ন')
                    : ($aboutUs?->main_title_en ?? 'Compassionate Care for Every Family')
              }}</h2>
              <p class="lead">
                {{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->main_lead_bn ?? 'দুই দশকেরও বেশি সময় ধরে, আমরা আমাদের সম্প্রদায়ে ব্যতিক্রমী স্বাস্থ্যসেবা প্রদান করতে প্রতিশ্রুতিবদ্ধ।')
                    : ($aboutUs?->main_lead_en ?? 'For over two decades, we have been dedicated to providing exceptional healthcare services to our community.')
                }}
              </p>

              <p>
                {{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->main_description_bn ?? 'প্রিমিয়ার মেডিকেল হাউসকলে, আমরা বুঝি যে গুণমানের স্বাস্থ্যসেবা সুবিধাজনক এবং অ্যাক্সেসযোগ্য হওয়া উচিত।')
                    : ($aboutUs?->main_description_en ?? 'At Premier Medical Housecall, we understand that quality healthcare should be convenient and accessible.')
                }}
              </p>

              <div class="stats-grid">
                <div class="stat-item">
                  <span class="stat-number" data-purecounter-start="0" data-purecounter-end="{{ $aboutUs?->stat_1_value ?? '15000' }}"
                    data-purecounter-duration="2">{{ $aboutUs?->stat_1_value ?? '15000' }}</span>
                  <span class="stat-label">{{ app()->getLocale() === 'bn'
                        ? ($aboutUs?->stat_1_label_bn ?? 'চিকিৎসা করা রোগী')
                        : ($aboutUs?->stat_1_label_en ?? 'Patients Treated')
                  }}</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-purecounter-start="0" data-purecounter-end="{{ $aboutUs?->stat_2_value ?? '25' }}"
                    data-purecounter-duration="2">{{ $aboutUs?->stat_2_value ?? '25' }}</span>
                  <span class="stat-label">{{ app()->getLocale() === 'bn'
                        ? ($aboutUs?->stat_2_label_bn ?? 'বছরের অভিজ্ঞতা')
                        : ($aboutUs?->stat_2_label_en ?? 'Years Experience')
                  }}</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-purecounter-start="0" data-purecounter-end="{{ $aboutUs?->stat_3_value ?? '50' }}"
                    data-purecounter-duration="2">{{ $aboutUs?->stat_3_value ?? '50' }}</span>
                  <span class="stat-label">{{ app()->getLocale() === 'bn'
                        ? ($aboutUs?->stat_3_label_bn ?? 'চিকিৎসা বিশেষজ্ঞ')
                        : ($aboutUs?->stat_3_label_en ?? 'Medical Specialists')
                  }}</span>
                </div>
              </div><!-- End Stats Grid -->
            </div><!-- End About Content -->
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="image-wrapper">
              <img src="{{ $aboutUs?->main_image ?? 'frontend/assets/img/health/facilities-6.webp' }}" class="img-fluid main-image" alt="Healthcare facility">
              <div class="floating-image" data-aos="zoom-in" data-aos-delay="400">
                <img src="{{ $aboutUs?->floating_image ?? 'frontend/assets/img/health/staff-8.webp' }}" class="img-fluid" alt="Medical team">
              </div>
            </div><!-- End Image Wrapper -->
          </div>
        </div>

        <div class="values-section" data-aos="fade-up" data-aos-delay="300">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h3>{{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->values_heading_bn ?? 'আমাদের মূল মূল্যবোধ')
                    : ($aboutUs?->values_heading_en ?? 'Our Core Values')
              }}</h3>
              <p class="section-description">
                {{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->values_description_bn ?? 'এই নীতিগুলি ব্যতিক্রমী স্বাস্থ্যসেবার প্রতি আমাদের প্রতিশ্রুতি নির্দেশনা দেয়।')
                    : ($aboutUs?->values_description_en ?? 'These principles guide everything we do in our commitment to exceptional healthcare')
                }}
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="value-item">
                <div class="value-icon">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <h4>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_1_title_bn ?? 'সহানুভূতি')
                      : ($aboutUs?->value_1_title_en ?? 'Compassion')
                }}</h4>
                <p>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_1_description_bn ?? 'প্রতিটি রোগীর অনন্য চাহিদা এবং পরিস্থিতির জন্য সহানুভূতি এবং বোঝাপড়ার সাথে যত্ন প্রদান করা।')
                      : ($aboutUs?->value_1_description_en ?? 'Providing care with empathy and understanding for every patient\'s unique needs and circumstances.')
                }}</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="value-item">
                <div class="value-icon">
                  <i class="bi bi-shield-check"></i>
                </div>
                <h4>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_2_title_bn ?? 'উৎকর্ষতা')
                      : ($aboutUs?->value_2_title_en ?? 'Excellence')
                }}</h4>
                <p>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_2_description_bn ?? 'চিকিৎসা সেবায় সর্বোচ্চ মান বজায় রাখা এবং ক্রমাগত উন্নতি।')
                      : ($aboutUs?->value_2_description_en ?? 'Maintaining the highest standards of medical care through continuous learning and innovation.')
                }}</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="value-item">
                <div class="value-icon">
                  <i class="bi bi-people"></i>
                </div>
                <h4>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_3_title_bn ?? 'সততা')
                      : ($aboutUs?->value_3_title_en ?? 'Integrity')
                }}</h4>
                <p>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_3_description_bn ?? 'সৎ যোগাযোগ এবং সকল মিথস্ক্রিয়ায় নৈতিক অনুশীলনের মাধ্যমে বিশ্বাস গড়ে তোলা।')
                      : ($aboutUs?->value_3_description_en ?? 'Building trust through honest communication and ethical practices in all our interactions.')
                }}</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
              <div class="value-item">
                <div class="value-icon">
                  <i class="bi bi-lightbulb"></i>
                </div>
                <h4>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_4_title_bn ?? 'উদ্ভাবন')
                      : ($aboutUs?->value_4_title_en ?? 'Innovation')
                }}</h4>
                <p>{{ app()->getLocale() === 'bn'
                      ? ($aboutUs?->value_4_description_bn ?? 'রোগীর ফলাফল উন্নত করতে অত্যাধুনিক প্রযুক্তি এবং চিকিৎসা গ্রহণ।')
                      : ($aboutUs?->value_4_description_en ?? 'Embracing cutting-edge technology and treatments to improve patient outcomes.')
                }}</p>
              </div>
            </div>
          </div><!-- End Values Row -->
        </div><!-- End Values Section -->

        <div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h3>{{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->certifications_heading_bn ?? 'স্বীকৃতি এবং সার্টিফিকেশন')
                    : ($aboutUs?->certifications_heading_en ?? 'Accreditations & Certifications')
              }}</h3>
              <p class="section-description">
                {{ app()->getLocale() === 'bn'
                    ? ($aboutUs?->certifications_description_bn ?? 'গুণমান যত্নের প্রতি আমাদের প্রতিশ্রুতির জন্য শীর্ষস্থানীয় স্বাস্থ্যসেবা সংস্থা দ্বারা স্বীকৃত।')
                    : ($aboutUs?->certifications_description_en ?? 'Recognized by leading healthcare organizations for our commitment to quality care')
                }}
              </p>
            </div>
          </div>

          <div class="row justify-content-center">
            @for ($i = 1; $i <= 5; $i++)
              @php
                $certField = 'cert_' . $i . '_image';
                $certImage = $aboutUs->{$certField} ?? 'frontend/assets/img/clients/clients-' . $i . '.webp';
              @endphp
              <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="{{ ($i - 1) * 100 + 100 }}">
                <div class="certification-item">
                  <img src="{{ $certImage }}" class="img-fluid" alt="Healthcare certification">
                </div>
              </div>
            @endfor
          </div><!-- End Certifications Row -->
        </div><!-- End Certifications Section -->

      </div>

    </section><!-- /About Section -->

@endsection
