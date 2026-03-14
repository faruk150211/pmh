@extends('frontend.layouts.master')

@section('title', 'Mission & Vision - Premier Medical Housecall')

@section('description', 'Discover the mission and vision of Premier Medical Housecall and our commitment to transforming healthcare delivery.')

@section('keywords', 'mission, vision, our purpose, healthcare excellence, patient care')

@section('content')

@php
    $missionVision = \App\Models\MissionAndVision::first();
@endphp



    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">
                {{ app()->getLocale() === 'bn' ? ($missionVision?->heading_bn ?? 'আমাদের মিশন এবং ভিশন') : ($missionVision?->heading_en ?? 'Mission & Vision') }}
              </h1>
              <p class="mb-0">
                {{ app()->getLocale() === 'bn' ? ($missionVision?->description_bn ?? 'আমাদের মিশন এবং ভিশন আমরা যে প্রতিটি সিদ্ধান্ত নিই এবং প্রতিটি রোগীর সেবা করি তার গাইড করে। আমরা উদ্ভাবন, সহানুভূতি এবং উৎকর্ষতার মাধ্যমে স্বাস্থ্যসেবা রূপান্তরিত করতে প্রতিশ্রুতিবদ্ধ।') : ($missionVision?->description_en ?? 'Our mission and vision guide every decision we make and every patient we serve. We are committed to transforming healthcare through innovation, compassion, and excellence.') }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">{{ app()->getLocale() === 'bn' ? 'মিশন এবং ভিশন' : 'Mission & Vision' }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Mission & Vision Section -->
    <section id="mission-vision" class="mission-vision section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center mb-5">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="mission-content">
              <div class="section-badge">
                <span>{{ app()->getLocale() === 'bn' ? 'আমাদের উদ্দেশ্য' : 'Our Purpose' }}</span>
              </div>
              <h2>{{ app()->getLocale() === 'bn' ? ($missionVision?->mission_heading_bn ?? 'আমাদের মিশন') : ($missionVision?->mission_heading_en ?? 'Our Mission') }}</h2>
              <p class="lead">{!! app()->getLocale() === 'bn' ? ($missionVision?->mission_content_bn ?? 'প্রিমিয়ার মেডিকেল হাউসকলে আমাদের মিশন আমাদের সম্প্রদায়ের রোগী এবং পরিবারগুলির জীবনযাত্রার মান বৃদ্ধি করে এমন অ্যাক্সেসযোগ্য, করুণাময় এবং প্রমাণ-ভিত্তিক স্বাস্থ্যসেবা পরিষেবা প্রদান করা।') : ($missionVision?->mission_content_en ?? 'To deliver accessible, compassionate, and evidence-based healthcare services that enhance the quality of life for patients and families in our community.') !!}</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="mission-image">
              <img src="{{ $missionVision?->mission_image ? asset('storage/' . $missionVision->mission_image) : 'frontend/assets/img/health/facilities-6.webp' }}" class="img-fluid" alt="Mission">
            </div>
          </div>

        </div>

        <div class="row align-items-center">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
            <div class="vision-image">
              <img src="{{ $missionVision?->vision_image ? asset('storage/' . $missionVision->vision_image) : 'frontend/assets/img/health/staff-8.webp' }}" class="img-fluid" alt="Vision">
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="vision-content">
              <div class="section-badge">
                <span>{{ app()->getLocale() === 'bn' ? 'আমাদের ভবিষ্যৎ' : 'Our Future' }}</span>
              </div>
              <h2>{{ app()->getLocale() === 'bn' ? ($missionVision?->vision_heading_bn ?? 'আমাদের ভিশন') : ($missionVision?->vision_heading_en ?? 'Our Vision') }}</h2>
              <p class="lead">{!! app()->getLocale() === 'bn' ? ($missionVision?->vision_content_bn ?? 'গুণমান, অ্যাক্সেসযোগ্যতা এবং করুণাময় যত্নের মান নির্ধারণ করে এমন উদ্ভাবনী, রোগী-কেন্দ্রিক স্বাস্থ্যসেবা সমাধানের শীর্ষস্থানীয় প্রদানকারী হওয়া।') : ($missionVision?->vision_content_en ?? 'To become the leading provider of innovative, patient-centered healthcare solutions that set the standard for quality, accessibility, and compassionate care.') !!}</p>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Mission & Vision Section -->

    <!-- Our Commitment Section -->
    {{-- <section class="our-commitment section-bg section">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-8 text-center mb-5">
            <h2 class="section-title">{{ app()->getLocale() === 'bn' ? ($missionVision?->commitment_heading_bn ?? 'আমাদের প্রতিশ্রুতি') : ($missionVision?->commitment_heading_en ?? 'Our Commitment') }}</h2>
            <p class="text-gray">
              {{ app()->getLocale() === 'bn' ? ($missionVision?->commitment_description_bn ?? 'আমরা অনন্যতা এবং উৎকর্ষতার জন্য প্রতিশ্রুতিবদ্ধ।') : ($missionVision?->commitment_description_en ?? 'We are committed to excellence and compassion.') }}
            </p>
          </div>
        </div>

        <div class="row g-4">
          @for ($i = 1; $i <= 4; $i++)
            @php
              $iconClass = $missionVision?->{'commitment_' . $i . '_icon'} ?? 'fas fa-check';
              $titleEn = $missionVision?->{'commitment_' . $i . '_title_en'} ?? '';
              $titleBn = $missionVision?->{'commitment_' . $i . '_title_bn'} ?? '';
              $descEn = $missionVision?->{'commitment_' . $i . '_description_en'} ?? '';
              $descBn = $missionVision?->{'commitment_' . $i . '_description_bn'} ?? '';
              $title = app()->getLocale() === 'bn' ? $titleBn : $titleEn;
              $desc = app()->getLocale() === 'bn' ? $descBn : $descEn;
            @endphp
            @if ($title)
              <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="commitment-card text-center" style="padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                  <div style="font-size: 3rem; color: #3498db; margin-bottom: 15px;">
                    <i class="{{ $iconClass }}"></i>
                  </div>
                  <h5 style="color: #2c3e50; margin-bottom: 10px; font-weight: 600;">{{ $title }}</h5>
                  <p style="color: #666; font-size: 0.95rem; margin: 0;">{!! $desc !!}</p>
                </div>
              </div>
            @endif
          @endfor
        </div>

      </div>
    </section> --}}
    <!-- /Our Commitment Section -->

@endsection
