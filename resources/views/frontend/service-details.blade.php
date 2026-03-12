@extends('frontend.layouts.master')

@php
    $lang = getCurrentLanguage();
@endphp

@section('title', isset($service) ? ($lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en) . ' - Premier Medical Housecall' : 'Service Details - Premier Medical Housecall')

@section('description', isset($service) ? Illuminate\Support\Str::limit(strip_tags($lang === 'bn' ? ($service->description_bn ?? $service->description_en) : $service->description_en), 160) : 'Learn more about our specialized medical services.')

@section('keywords', isset($service) ? ($lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en) . ', medical services, healthcare' : 'service details, medical services, healthcare')

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

    @if(isset($service))
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">{{ $lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}</h1>
              <p class="mb-0">
                {{ Illuminate\Support\Str::limit(strip_tags($lang === 'bn' ? ($service->description_bn ?? $service->description_en) : $service->description_en), 150) }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">{{ $lang === 'bn' ? 'হোম' : 'Home' }}</a></li>
            <li><a href="{{ route('services') }}">{{ $lang === 'bn' ? 'সেবাসমূহ' : 'Services' }}</a></li>
            <li class="current">{{ $lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    @endif

    <!-- Service Details 2 Section -->
    <section id="service-details-2" class="service-details-2 section">

      @if(isset($service))
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <!-- Service Header -->
          <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up" data-aos-delay="150">
              <div class="service-header">
                <h2>{{ $lang === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}</h2>
                <p class="lead">{{ Illuminate\Support\Str::limit(strip_tags($lang === 'bn' ? ($service->description_bn ?? $service->description_en) : $service->description_en), 150) }}</p>
              </div>
            </div>
          </div>

          <!-- Service Visual and Description -->
          <div class="row gy-4 align-items-center">

            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
              <div class="service-details">
                <div class="description-content">
                  {!! $service->description_en !!}
                </div>
              </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
              <div class="service-visual">
                @if($service->banner)
                  <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->title_en }}" class="img-fluid">
                @else
                  <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 450px; display: flex; align-items: center; justify-content: center; border-radius: 10px; color: white;">
                    <i class="fas fa-image" style="font-size: 4rem; opacity: 0.5;"></i>
                  </div>
                @endif
              </div>
            </div>

          </div>

          <!-- Related Services -->
          <div class="row gy-4 mt-5">
            <div class="col-12" data-aos="fade-up" data-aos-delay="250">
              <h3>Other Services</h3>
            </div>

            @php
              $relatedServices = \App\Models\Service::where('id', '!=', $service->id)->limit(3)->get();
            @endphp

            @if($relatedServices->count() > 0)
              @foreach($relatedServices as $index => $related)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 50) }}">
                  <div class="service-item">
                    <div class="service-image">
                      @if($related->banner)
                        <img src="{{ asset('storage/' . $related->banner) }}" alt="{{ $related->title_en }}" class="img-fluid">
                      @else
                        <img src="frontend/assets/img/health/service-placeholder.webp" alt="{{ $related->title_en }}" class="img-fluid">
                      @endif
                      <div class="service-overlay">
                        <i class="fas fa-stethoscope"></i>
                      </div>
                    </div>
                    <div class="service-content">
                      <h4>{{ $related->title_en }}</h4>
                      <p>{{ Illuminate\Support\Str::limit(strip_tags($related->description_en), 80) }}</p>
                      <a href="{{ route('service-details', ['slug' => $related->slug_en]) }}" class="service-btn">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          <!-- Back to Services -->
          <div class="row gy-4 mt-5 pt-5">
            <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="350">
              <a href="{{ route('services') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-left"></i> Back to Services
              </a>
            </div>
          </div>

        </div>
      @else
        <div class="container py-5">
          <div class="row">
            <div class="col-12 text-center">
              <p style="font-size: 1.1rem; color: #999;">Service not found.</p>
              <a href="{{ route('services') }}" class="btn btn-primary">Back to Services</a>
            </div>
          </div>
        </div>
      @endif

    </section><!-- /Service Details 2 Section -->

@endsection
