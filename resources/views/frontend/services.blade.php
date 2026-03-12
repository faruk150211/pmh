@extends('frontend.layouts.master')

@php
    $lang = getCurrentLanguage();
@endphp

@section('title', ($lang === 'bn' ? 'সেবাসমূহ - প্রিমিয়ার মেডিকেল হাউসকল' : 'Services - Premier Medical Housecall'))

@section('description', ($lang === 'bn' ? 'আমাদের বিস্তৃত চিকিৎসা সেবা অন্বেষণ করুন যার মধ্যে রয়েছে কার্ডিওলজি, নিউরোলজি, অর্থোপেডিক্স, পেডিয়াট্রিক্স, জরুরি যত্ন এবং ল্যাবরেটরি পরীক্ষা।' : 'Explore our comprehensive medical services including Cardiology, Neurology, Orthopedics, Pediatrics, Emergency Care, and Laboratory Testing.'))

@section('keywords', ($lang === 'bn' ? 'চিকিৎসা সেবা, কার্ডিওলজি, নিউরোলজি, অর্থোপেডিক্স, স্বাস্থ্যসেবা' : 'medical services, cardiology, neurology, orthopedics, healthcare services'))

@section('content')
    <script>
        // Get language from URL or localStorage
        const urlParams = new URLSearchParams(window.location.search);
        const langParam = urlParams.get('lang');
        const savedLang = localStorage.getItem('language') || 'en';
        const currentLang = langParam || savedLang;

        // Store language preference
        localStorage.setItem('language', currentLang);
        document.documentElement.lang = currentLang;
    </script>
    <!-- Page Title -->
    <div class="page-title">
      {{-- <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Services</h1>
              <p class="mb-0">
                Our clinic offers comprehensive medical services delivered with excellence and care. We provide specialized treatment across multiple disciplines to ensure you receive the best possible healthcare.
              </p>
            </div>
          </div>
        </div>
      </div> --}}
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">{{ $lang === 'bn' ? 'হোম' : 'Home' }}</a></li>
            <li class="current">{{ $lang === 'bn' ? 'সেবাসমূহ' : 'Services' }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          @if($services->count() > 0)
            @foreach($services as $index => $service)
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 200 + ($index * 50) }}">
                <div class="service-item">
                  <div class="service-image">
                    @if($service->banner)
                      <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}" class="img-fluid">
                    @else
                      <img src="frontend/assets/img/health/service-placeholder.webp" alt="{{ $lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}" class="img-fluid">
                    @endif
                    <div class="service-overlay">
                      <i class="fas fa-stethoscope"></i>
                    </div>
                  </div>
                  <div class="service-content">
                    <h3>{{ $lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}</h3>
                    <p>{{ Illuminate\Support\Str::limit(strip_tags($lang === 'bn' ? ($service->description_bn ?? $service->description_en) : $service->description_en), 100) }}</p>
                    <div class="service-features">
                      <span class="feature-item"><i class="fas fa-check"></i> {{ $lang === 'bn' ? 'পেশাদার যত্ন' : 'Professional Care' }}</span>
                      <span class="feature-item"><i class="fas fa-check"></i> {{ $lang === 'bn' ? 'বিশেষজ্ঞ দল' : 'Expert Team' }}</span>
                    </div>
                    <a href="{{ route('service-details', ['slug' => $lang === 'bn' ? ($service->slug_bn ?? 'service-' . $service->id) : ($service->slug_en ?? 'service-' . $service->id), 'lang' => $lang]) }}" class="service-btn">
                      <span>{{ $lang === 'bn' ? 'আরও জানুন' : 'Learn More' }}</span>
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div><!-- End Service Item -->
            @endforeach
          @else
            <div class="col-12">
              <div style="text-align: center; padding: 40px 20px; color: #999;">
                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 20px; display: block;"></i>
                <p style="font-size: 1.1rem;">No services available at the moment.</p>
              </div>
            </div>
          @endif

        </div>

      </div>

    </section><!-- /Services Section -->

@endsection
