@extends('frontend.layouts.master')

@section('title', 'Home - Premier Medical Housecall')

@section('description', 'Premier Medical Housecall provides high-quality healthcare services at home. Our experienced doctors and nurses offer convenient, compassionate care for all your medical needs.')

@section('keywords', 'medical housecall, home healthcare, doctor at home, medical services, healthcare at home')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
    <style>
        /* Ensure hero section appears below fixed header */
        #hero {
            position: relative;
            z-index: 1;
            margin-top: 0;
        }

        .hero-visual {
            position: relative;
            z-index: 1;
        }

        .hero-visual .main-image {
            position: relative;
            z-index: 1;
        }

        /* Ensure fixed header is above all content */
        .navbar-fixed-top,
        header.fixed-top,
        [class*="fixed-top"] {
            z-index: 1030;
        }

        /* Remove any negative margins that could pull content up */
        .hero.section {
            margin-top: 0 !important;
        }

        /* Justify hero title and description text */


        .hero-description {
            text-align: justify;
        }
    </style>

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content">
              <h1 data-aos="fade-right" data-aos-delay="300" class="hero-title">
                {{app()->getLocale() === 'bn' ? $heroSection->title_bn : $heroSection->title_en}}
              </h1>
              <p class="hero-description" data-aos="fade-right" data-aos-delay="400" lang="en-description">
                {{app()->getLocale() === 'bn' ? $heroSection->description_bn : $heroSection->description_en}}
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
              <div class="main-image">
                <img src="{{ asset($heroSection->image ?? 'frontend/assets/img/health/staff-10.webp') }}" alt="Modern Healthcare Facility" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Problem Section -->
    @if($problemSection)
    <section id="problem" class="problem section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">{{ app()->getLocale() === 'bn' ? $problemSection->badge_bn : $problemSection->badge_en }}</span>
          <h2>{{ app()->getLocale() === 'bn' ? $problemSection->title_bn : $problemSection->title_en }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? $problemSection->description_bn : $problemSection->description_en }}</p>
        </div>
        <div class="row g-4">
          @if($problemSection->problem_1_title_en || $problemSection->problem_1_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi {{ $problemSection->problem_1_icon ?? 'bi-hourglass-split' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $problemSection->problem_1_title_bn : $problemSection->problem_1_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $problemSection->problem_1_description_bn : $problemSection->problem_1_description_en }}</p>
            </div>
          </div>
          @endif

          @if($problemSection->problem_2_title_en || $problemSection->problem_2_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi {{ $problemSection->problem_2_icon ?? 'bi-geo-alt' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $problemSection->problem_2_title_bn : $problemSection->problem_2_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $problemSection->problem_2_description_bn : $problemSection->problem_2_description_en }}</p>
            </div>
          </div>
          @endif

          @if($problemSection->problem_3_title_en || $problemSection->problem_3_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="400">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi {{ $problemSection->problem_3_icon ?? 'bi-virus' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $problemSection->problem_3_title_bn : $problemSection->problem_3_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $problemSection->problem_3_description_bn : $problemSection->problem_3_description_en }}</p>
            </div>
          </div>
          @endif

          @if($problemSection->problem_4_title_en || $problemSection->problem_4_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="500">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi {{ $problemSection->problem_4_icon ?? 'bi-cash-coin' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $problemSection->problem_4_title_bn : $problemSection->problem_4_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $problemSection->problem_4_description_bn : $problemSection->problem_4_description_en }}</p>
            </div>
          </div>
          @endif

        </div>

      </div>

      <style>
        .problem .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        .problem .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 1rem;
          color: #1a1a1a;
        }

        .problem-card {
          background: white;
          padding: 2rem;
          border-radius: 12px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
          transition: all 0.3s ease;
          border-left: 4px solid #ff6b6b;
        }

        .problem-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .problem-icon {
          width: 60px;
          height: 60px;
          background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(238, 90, 111, 0.2) 100%);
          border-radius: 12px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 1.8rem;
          color: #ff6b6b;
          margin-bottom: 1.5rem;
        }

        .problem-card h4 {
          font-size: 1.3rem;
          font-weight: 600;
          color: #1a1a1a;
          margin-bottom: 0.8rem;
        }

        .problem-card p {
          color: #666;
          line-height: 1.6;
          margin-bottom: 1.5rem;
          font-size: 0.95rem;
        }

        .problem-stat {
          padding-top: 1rem;
          border-top: 1px solid #eee;
          display: flex;
          align-items: center;
          gap: 0.5rem;
        }

        .stat-number {
          font-size: 1.8rem;
          font-weight: 700;
          color: #ff6b6b;
        }

        .stat-label {
          font-size: 0.85rem;
          color: #999;
          font-weight: 600;
        }

        @media (max-width: 768px) {
          .problem .section-title h2 {
            font-size: 1.8rem;
          }
          .problem-card {
            margin-bottom: 1rem;
          }
        }
      </style>

    </section><!-- /Problem Section -->
    @else
    <!-- Problem Section - Fallback when no data in database -->
    <section id="problem" class="problem section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">{{ __('problem-section.the-challenge')}}</span>
          <h2>{{ __('problem-section.Healthcare') }}</h2>
          <p>{{ __('problem-section.Many-families') }}</p>
        </div>
        <div class="row g-4">
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-hourglass-split"></i>
              </div>
              <h4>{{ __('problem-section.Long') }}</h4>
              <p>{{ __('problem-section.Emergency') }}</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <h4>{{ __('problem-section.Inconvenient') }}</h4>
              <p>{{ __('problem-section.Traveling') }}</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="400">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-virus"></i>
              </div>
              <h4>{{ __('problem-section.Hospital') }}</h4>
              <p>{{ __('problem-section.Exposure') }}</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="500">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-cash-coin"></i>
              </div>
              <h4>{{ __('problem-section.Difficulty') }}</h4>
              <p>{{ __('problem-section.Hospital-visits') }}</p>
            </div>
          </div>

        </div>

      </div>

      <style>
        .problem .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        .problem .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 1rem;
          color: #1a1a1a;
        }

        .problem-card {
          background: white;
          padding: 2rem;
          border-radius: 12px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
          transition: all 0.3s ease;
          border-left: 4px solid #ff6b6b;
        }

        .problem-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .problem-icon {
          width: 60px;
          height: 60px;
          background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(238, 90, 111, 0.2) 100%);
          border-radius: 12px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 1.8rem;
          color: #ff6b6b;
          margin-bottom: 1.5rem;
        }

        .problem-card h4 {
          font-size: 1.3rem;
          font-weight: 600;
          color: #1a1a1a;
          margin-bottom: 0.8rem;
        }

        .problem-card p {
          color: #666;
          line-height: 1.6;
          margin-bottom: 1.5rem;
          font-size: 0.95rem;
        }

        @media (max-width: 768px) {
          .problem .section-title h2 {
            font-size: 1.8rem;
          }
          .problem-card {
            margin-bottom: 1rem;
          }
        }
      </style>

    </section><!-- /Problem Section - Fallback -->
    @endif

    <!-- Solution Section -->
    @if($solutionSection)
    <section id="solution" class="solution section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title text-center" data-aos="fade-up">
          <span class="section-badge">{{ app()->getLocale() === 'bn' ? $solutionSection->badge_bn : $solutionSection->badge_en }}</span>
          <h2>{{ app()->getLocale() === 'bn' ? $solutionSection->title_bn : $solutionSection->title_en }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? $solutionSection->description_bn : $solutionSection->description_en }}</p>
        </div>

        <div class="row g-4">

          <!-- Solution 1: Same-Day Appointments -->
          @if($solutionSection->solution_1_title_en || $solutionSection->solution_1_title_bn)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="solution-card">
              <div class="solution-icon">
                <i class="bi {{ $solutionSection->solution_1_icon ?? 'bi-calendar2-check' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_1_title_bn : $solutionSection->solution_1_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_1_description_bn : $solutionSection->solution_1_description_en }}</p>
            </div>
          </div>
          @endif

          <!-- Solution 2: Care in Your Home -->
          @if($solutionSection->solution_2_title_en || $solutionSection->solution_2_title_bn)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="solution-card">
              <div class="solution-icon">
                <i class="bi {{ $solutionSection->solution_2_icon ?? 'bi-house-heart' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_2_title_bn : $solutionSection->solution_2_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_2_description_bn : $solutionSection->solution_2_description_en }}</p>
            </div>
          </div>
          @endif

          <!-- Solution 3: Infection-Free Environment -->
          @if($solutionSection->solution_3_title_en || $solutionSection->solution_3_title_bn)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="solution-card">
              <div class="solution-icon">
                <i class="bi {{ $solutionSection->solution_3_icon ?? 'bi-shield-check' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_3_title_bn : $solutionSection->solution_3_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_3_description_bn : $solutionSection->solution_3_description_en }}</p>
            </div>
          </div>
          @endif

          <!-- Solution 4: ECG and Monitoring -->
          @if($solutionSection->solution_4_title_en || $solutionSection->solution_4_title_bn)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="solution-card">
              <div class="solution-icon">
                <i class="bi {{ $solutionSection->solution_4_icon ?? 'bi-activity' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_4_title_bn : $solutionSection->solution_4_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_4_description_bn : $solutionSection->solution_4_description_en }}</p>
            </div>
          </div>
          @endif

          <!-- Solution 5: Point-of-Care Diagnostics -->
          @if($solutionSection->solution_5_title_en || $solutionSection->solution_5_title_bn)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="solution-card">
              <div class="solution-icon">
                <i class="bi {{ $solutionSection->solution_5_icon ?? 'bi-hospital' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_5_title_bn : $solutionSection->solution_5_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_5_description_bn : $solutionSection->solution_5_description_en }}</p>
            </div>
          </div>
          @endif

          <!-- Solution 6: Electronic Medical Record Documentation -->
          @if($solutionSection->solution_6_title_en || $solutionSection->solution_6_title_bn)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="solution-card">
              <div class="solution-icon">
                <i class="bi {{ $solutionSection->solution_6_icon ?? 'bi-file-earmark-medical' }}"></i>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_6_title_bn : $solutionSection->solution_6_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $solutionSection->solution_6_description_bn : $solutionSection->solution_6_description_en }}</p>
            </div>
          </div>
          @endif

        </div>

      </div>

      <style>
        #solution .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #00cc88 0%, #00aa66 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        #solution .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 0.5rem;
          color: #1a1a1a;
        }

        #solution .section-title p {
          font-size: 1.1rem;
          color: #666;
          margin-bottom: 3rem;
        }

        .solution-card {
          background: white;
          padding: 2rem;
          border-radius: 12px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
          transition: all 0.3s ease;
          text-align: center;
          height: 100%;
          display: flex;
          flex-direction: column;
          border-top: 4px solid #00cc88;
          position: relative;
          overflow: hidden;
        }

        .solution-card::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 4px;
          background: linear-gradient(90deg, #00cc88 0%, #00aa66 100%);
        }

        .solution-card:hover {
          transform: translateY(-8px);
          box-shadow: 0 12px 35px rgba(0, 204, 136, 0.15);
        }

        .solution-icon {
          width: 70px;
          height: 70px;
          background: linear-gradient(135deg, rgba(0, 204, 136, 0.2) 0%, rgba(0, 170, 102, 0.2) 100%);
          border-radius: 12px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 2.2rem;
          color: #00cc88;
          margin: 0 auto 1.5rem;
          transition: all 0.3s ease;
        }

        .solution-card:hover .solution-icon {
          transform: scale(1.1);
          background: linear-gradient(135deg, #00cc88 0%, #00aa66 100%);
          color: white;
        }

        .solution-card h4 {
          font-size: 1.2rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 1rem;
          margin-top: 0;
        }

        .solution-card p {
          color: #666;
          line-height: 1.6;
          font-size: 0.95rem;
          margin: 0;
          flex-grow: 1;
        }

        @media (max-width: 768px) {
          #solution .section-title h2 {
            font-size: 1.8rem;
          }

          #solution .section-title p {
            font-size: 1rem;
          }

          .solution-card {
            padding: 1.5rem;
          }

          .solution-icon {
            width: 60px;
            height: 60px;
            font-size: 1.8rem;
          }

          .solution-card h4 {
            font-size: 1.1rem;
          }

          .solution-card p {
            font-size: 0.9rem;
          }
        }
      </style>

    </section><!-- /Solution Section -->
    @endif
    <!-- Why Choose Us Section -->
    @if($whyChooseUsSection)
    <section id="home-about" class="home-about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title text-center" data-aos="fade-up">
          <span class="section-badge">{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->badge_bn : $whyChooseUsSection->badge_en }}</span>
          <h2>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->title_bn : $whyChooseUsSection->title_en }}</h2>
        </div>

        <div class="about-content">
          <div class="features-grid">
            @if($whyChooseUsSection->card_1_title_en || $whyChooseUsSection->card_1_title_bn)
            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="200">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi {{ $whyChooseUsSection->card_1_icon ?? 'bi-lightning-charge' }}"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_1_title_bn : $whyChooseUsSection->card_1_title_en }}</h4>
                <p>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_1_description_bn : $whyChooseUsSection->card_1_description_en }}</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">01</span>
              </div>
            </div>
            @endif

            @if($whyChooseUsSection->card_2_title_en || $whyChooseUsSection->card_2_title_bn)
            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="300">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi {{ $whyChooseUsSection->card_2_icon ?? 'bi-people-check' }}"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_2_title_bn : $whyChooseUsSection->card_2_title_en }}</h4>
                <p>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_2_description_bn : $whyChooseUsSection->card_2_description_en }}</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">02</span>
              </div>
            </div>
            @endif

            @if($whyChooseUsSection->card_3_title_en || $whyChooseUsSection->card_3_title_bn)
            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="400">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi {{ $whyChooseUsSection->card_3_icon ?? 'bi-shield-exclamation' }}"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_3_title_bn : $whyChooseUsSection->card_3_title_en }}</h4>
                <p>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_3_description_bn : $whyChooseUsSection->card_3_description_en }}</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">03</span>
              </div>
            </div>
            @endif

            @if($whyChooseUsSection->card_4_title_en || $whyChooseUsSection->card_4_title_bn)
            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="500">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi {{ $whyChooseUsSection->card_4_icon ?? 'bi-clock-history' }}"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_4_title_bn : $whyChooseUsSection->card_4_title_en }}</h4>
                <p>{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->card_4_description_bn : $whyChooseUsSection->card_4_description_en }}</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">04</span>
              </div>
            </div>
            @endif
          </div>

          <div class="stats-section mt-5">
            <div class="stats-row">
              @if($whyChooseUsSection->stat_1_number || $whyChooseUsSection->stat_1_label_en || $whyChooseUsSection->stat_1_label_bn)
              <div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-content">
                  <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="{{ $whyChooseUsSection->stat_1_number ?? 15000 }}"
                    data-purecounter-duration="2"></div>
                  <div class="stat-label">{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->stat_1_label_bn : $whyChooseUsSection->stat_1_label_en }}</div>
                </div>
              </div>
              @endif

              @if($whyChooseUsSection->stat_2_number || $whyChooseUsSection->stat_2_label_en || $whyChooseUsSection->stat_2_label_bn)
              <div class="stat-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-content">
                  <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="{{ $whyChooseUsSection->stat_2_number ?? 25 }}"
                    data-purecounter-duration="2"></div>
                  <div class="stat-label">{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->stat_2_label_bn : $whyChooseUsSection->stat_2_label_en }}</div>
                </div>
              </div>
              @endif

              @if($whyChooseUsSection->stat_3_number || $whyChooseUsSection->stat_3_label_en || $whyChooseUsSection->stat_3_label_bn)
              <div class="stat-box" data-aos="zoom-in" data-aos-delay="400">
                <div class="stat-content">
                  <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="{{ $whyChooseUsSection->stat_3_number ?? 50 }}"
                    data-purecounter-duration="2"></div>
                  <div class="stat-label">{{ app()->getLocale() === 'bn' ? $whyChooseUsSection->stat_3_label_bn : $whyChooseUsSection->stat_3_label_en }}</div>
                </div>
              </div>
              @endif
            </div>
          </div>

          <div class="cta-section mt-5 pt-3" data-aos="fade-up" data-aos-delay="600">
            <a href="{{ route('contact') }}" class="btn-primary btn-lg">
              <i class="bi bi-phone-fill me-2"></i>
              {{app()->getLocale() === 'bn' ? 'যোগাযোগ করুন' : 'Schedule Your Visit Today'}}
            </a>
            <a href="{{ route('who-we-are') }}" class="btn-outline">
                {{app()->getLocale() === 'bn' ? 'আরও জানুন' : 'Learn More About Us'}}
            </a>
          </div>
        </div>

      </div>

      <style>
        #home-about .section-title {
          text-align: center;
          margin-bottom: 3rem;
        }

        #home-about .section-title .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        #home-about .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 1.5rem;
          color: #1a1a1a;
          white-space: nowrap;
          overflow: visible;
        }

        #home-about .section-title h2 .highlight {
          color: #0084d6;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          background-clip: text;
        }

        .about-content {
          text-align: center;
          width: 100%;
        }

        .features-grid {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
          gap: 2rem;
          margin: 2rem 0 3rem 0;
        }

        .why-choose-card {
          background: white;
          border-radius: 12px;
          padding: 2rem 1.5rem;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
          transition: all 0.3s ease;
          position: relative;
          overflow: hidden;
          display: flex;
          flex-direction: column;
          height: 100%;
          border-top: 4px solid #0084d6;
        }

        .why-choose-card::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 4px;
          background: linear-gradient(90deg, #0084d6 0%, #005fa3 100%);
        }

        .why-choose-card:hover {
          transform: translateY(-8px);
          box-shadow: 0 12px 35px rgba(0, 132, 214, 0.15);
        }

        .card-header {
          margin-bottom: 1.5rem;
          flex-shrink: 0;
        }

        .card-icon {
          display: inline-flex;
          align-items: center;
          justify-content: center;
          width: 60px;
          height: 60px;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          border-radius: 12px;
          color: white;
          font-size: 1.8rem;
          transition: all 0.3s ease;
        }

        .why-choose-card:hover .card-icon {
          transform: scale(1.1);
        }

        .card-body {
          flex-grow: 1;
          text-align: center;
          margin-bottom: 1.5rem;
        }

        .card-body h4 {
          font-size: 1.1rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 0.8rem;
          letter-spacing: -0.3px;
        }

        .card-body p {
          font-size: 0.9rem;
          color: #666;
          line-height: 1.6;
          margin: 0;
        }

        .card-footer {
          flex-shrink: 0;
        }

        .badge-number {
          display: inline-block;
          width: 40px;
          height: 40px;
          background: linear-gradient(135deg, rgba(0, 132, 214, 0.1) 0%, rgba(0, 95, 163, 0.1) 100%);
          color: #0084d6;
          border-radius: 8px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: 700;
          font-size: 0.9rem;
        }

        .stats-section {
          margin: 4rem 0;
          padding: 3rem 2rem;
          background: linear-gradient(135deg, rgba(0, 132, 214, 0.05) 0%, rgba(0, 95, 163, 0.05) 100%);
          border-radius: 16px;
          border: 1px solid rgba(0, 132, 214, 0.1);
        }

        .stats-row {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
          gap: 2rem;
        }

        .stat-box {
          text-align: center;
          padding: 1.5rem;
          border-radius: 12px;
          background: white;
          box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
          transition: all 0.3s ease;
        }

        .stat-box:hover {
          transform: translateY(-4px);
          box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-content {
          padding: 1rem 0;
        }

        .stat-number {
          font-size: 2.5rem;
          font-weight: 700;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          background-clip: text;
          display: block;
          margin-bottom: 0.5rem;
        }

        .stat-label {
          font-size: 0.95rem;
          color: #666;
          font-weight: 600;
          text-transform: capitalize;
        }

        .cta-section {
          margin-top: 3rem;
          display: flex;
          justify-content: center;
          gap: 1.5rem;
          flex-wrap: wrap;
        }

        .btn-primary {
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          color: white !important;
          padding: 14px 32px !important;
          border-radius: 8px;
          text-decoration: none;
          font-weight: 600;
          font-size: 1rem;
          transition: all 0.3s ease;
          display: inline-flex;
          align-items: center;
          border: none;
          cursor: pointer;
        }

        .btn-primary:hover {
          transform: translateY(-2px);
          box-shadow: 0 8px 25px rgba(0, 132, 214, 0.3);
        }

        .btn-lg {
          padding: 14px 32px !important;
        }

        .btn-outline {
          border: 2px solid #0084d6;
          color: #0084d6 !important;
          padding: 12px 30px !important;
          border-radius: 8px;
          text-decoration: none;
          font-weight: 600;
          font-size: 1rem;
          transition: all 0.3s ease;
          display: inline-flex;
          align-items: center;
        }

        .btn-outline:hover {
          background-color: #0084d6;
          color: white !important;
          transform: translateY(-2px);
          box-shadow: 0 8px 25px rgba(0, 132, 214, 0.2);
        }

        @media (max-width: 1024px) {
          .features-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
          }
        }

        @media (max-width: 768px) {
          #home-about .section-title h2 {
            font-size: 1.8rem;
            white-space: normal;
          }

          .features-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
          }

          .why-choose-card {
            padding: 1.5rem 1.2rem;
          }

          .card-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
          }

          .card-body h4 {
            font-size: 1rem;
          }

          .card-body p {
            font-size: 0.85rem;
          }

          .stats-row {
            grid-template-columns: 1fr;
            gap: 1.5rem;
          }

          .stat-box {
            padding: 1.5rem 1rem;
          }

          .stat-number {
            font-size: 2rem;
          }

          .cta-section {
            flex-direction: column;
            gap: 1rem;
          }

          .cta-section a {
            width: 100%;
            justify-content: center;
          }

          .btn-outline {
            margin-left: 0 !important;
          }
        }
      </style>

    </section>
    @endif
    <!-- /Why Choose Us Section -->

    <!-- Service Section -->
    <section id="services" class="services section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title text-center" data-aos="fade-up">
          <span class="section-badge">{{ app()->getLocale() === 'bn' ? 'আমাদের সেবা' : 'Our Services' }}</span>
          <h2>{{ app()->getLocale() === 'bn' ? 'আমাদের মেডিকেল সেবামুহ' : 'Our Medical Services' }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? 'আমাদের মেডিকেল সেবা আপনার ডাক্তারের সাথে আপনার ঘরে পৌঁছে যায়' : 'Our medical services come to your doorstep with your doctor' }}</p>
        </div>

        <div class="row g-4">
          @if($services && $services->count() > 0)
            @php
              $aosDelay = 200;
            @endphp
            @foreach($services as $service)
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $aosDelay }}">
                <div class="service-card">
                  <div class="service-icon">
                    <i class="bi bi-person-check"></i>
                  </div>
                  <h4>{{ app()->getLocale() === 'bn' ? ($service->title_bn ?? $service->title_en) : $service->title_en }}</h4>
                  <p>{{ app()->getLocale() === 'bn' ? ($service->short_description_bn ?? $service->description_bn) : ($service->short_description_en ?? $service->description_en) }}</p>
                </div>
              </div>
              @php
                $aosDelay += 100;
              @endphp
            @endforeach
          @else
            <!-- Fallback Hardcoded Services -->
            <!-- Service 1: Doctor Home Visit -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="service-card">
                <div class="service-icon">
                  <i class="bi bi-person-check"></i>
                </div>
                <h4>Doctor Home Visit</h4>
                <p>Professional physician visit directly to your home with complete medical evaluation.</p>
              </div>
            </div>

            <!-- Service 2: Bedside Diagnostics -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="service-card">
                <div class="service-icon">
                  <i class="bi bi-hospital"></i>
                </div>
                <h4>Bedside Diagnostics</h4>
                <p>Essential medical tests performed at home for quick and accurate diagnosis.</p>
              </div>
            </div>

            <!-- Service 3: Home Treatment -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
              <div class="service-card">
                <div class="service-icon">
                  <i class="bi bi-bandaid"></i>
                </div>
                <h4>Home Treatment</h4>
                <p>Minor procedures and treatments without the need for hospital visit.</p>
              </div>
            </div>

            <!-- Service 4: Medication Support -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
              <div class="service-card">
                <div class="service-icon">
                  <i class="bi bi-capsule"></i>
                </div>
                <h4>Medication Support</h4>
                <p>Expert medication guidance and management tailored to your health needs.</p>
              </div>
            </div>

            <!-- Service 5: Elderly Care -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
              <div class="service-card">
                <div class="service-icon">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <h4>Elderly Care</h4>
                <p>Specialized medical care designed specifically for senior patients.</p>
              </div>
            </div>

            <!-- Service 6: Follow-up Visits -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
              <div class="service-card">
                <div class="service-icon">
                  <i class="bi bi-calendar-check"></i>
                </div>
                <h4>Follow-up Visits</h4>
                <p>Ongoing treatment and monitoring to ensure optimal health recovery.</p>
              </div>
            </div>
          @endif
        </div>

      </div>

      <style>
        #services .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        #services .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 0.5rem;
          color: #1a1a1a;
        }

        #services .section-title p {
          font-size: 1.1rem;
          color: #666;
          margin-bottom: 3rem;
        }

        .service-card {
          background: white;
          padding: 2rem;
          border-radius: 12px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
          transition: all 0.3s ease;
          text-align: center;
          height: 100%;
          display: flex;
          flex-direction: column;
          border-top: 4px solid #17a2b8;
          position: relative;
          overflow: hidden;
        }

        .service-card::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 4px;
          background: linear-gradient(90deg, #17a2b8 0%, #138496 100%);
        }

        .service-card:hover {
          transform: translateY(-8px);
          box-shadow: 0 12px 35px rgba(23, 162, 184, 0.15);
        }

        .service-icon {
          width: 70px;
          height: 70px;
          background: linear-gradient(135deg, rgba(23, 162, 184, 0.2) 0%, rgba(19, 132, 150, 0.2) 100%);
          border-radius: 12px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 2.2rem;
          color: #17a2b8;
          margin: 0 auto 1.5rem;
          transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
          transform: scale(1.1);
          background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
          color: white;
        }

        .service-card h4 {
          font-size: 1.2rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 1rem;
          margin-top: 0;
        }

        .service-card p {
          color: #666;
          line-height: 1.6;
          font-size: 0.95rem;
          margin: 0;
          flex-grow: 1;
        }

        @media (max-width: 768px) {
          #services .section-title h2 {
            font-size: 1.8rem;
          }

          #services .section-title p {
            font-size: 1rem;
          }

          .service-card {
            padding: 1.5rem;
          }

          .service-icon {
            width: 60px;
            height: 60px;
            font-size: 1.8rem;
          }

          .service-card h4 {
            font-size: 1.1rem;
          }

          .service-card p {
            font-size: 0.9rem;
          }
        }
      </style>

    </section>
    <!-- End of Service Section -->

    <!-- How It Works Section -->
    @if($howItWorksSection)
    <section id="how-it-works" class="how-it-works section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">{{ app()->getLocale() === 'bn' ? $howItWorksSection->badge_bn : $howItWorksSection->badge_en }}</span>
          <h2>{{ app()->getLocale() === 'bn' ? $howItWorksSection->title_bn : $howItWorksSection->title_en }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? $howItWorksSection->description_bn : $howItWorksSection->description_en }}</p>
        </div>

        <div class="row g-4">

          @if($howItWorksSection->step_1_title_en || $howItWorksSection->step_1_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">1</div>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_1_title_bn : $howItWorksSection->step_1_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_1_description_bn : $howItWorksSection->step_1_description_en }}</p>
              <div class="process-icon">
                <i class="bi {{ $howItWorksSection->step_1_icon ?? 'bi-calendar-check' }}"></i>
              </div>
            </div>
          </div>
          @endif

          @if($howItWorksSection->step_2_title_en || $howItWorksSection->step_2_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">2</div>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_2_title_bn : $howItWorksSection->step_2_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_2_description_bn : $howItWorksSection->step_2_description_en }}</p>
              <div class="process-icon">
                <i class="bi {{ $howItWorksSection->step_2_icon ?? 'bi-person-check' }}"></i>
              </div>
            </div>
          </div>
          @endif

          @if($howItWorksSection->step_3_title_en || $howItWorksSection->step_3_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="400">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">3</div>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_3_title_bn : $howItWorksSection->step_3_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_3_description_bn : $howItWorksSection->step_3_description_en }}</p>
              <div class="process-icon">
                <i class="bi {{ $howItWorksSection->step_3_icon ?? 'bi-door-open' }}"></i>
              </div>
            </div>
          </div>
          @endif

          @if($howItWorksSection->step_4_title_en || $howItWorksSection->step_4_title_bn)
          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="500">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">4</div>
              </div>
              <h4>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_4_title_bn : $howItWorksSection->step_4_title_en }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? $howItWorksSection->step_4_description_bn : $howItWorksSection->step_4_description_en }}</p>
              <div class="process-icon">
                <i class="bi {{ $howItWorksSection->step_4_icon ?? 'bi-file-medical' }}"></i>
              </div>
            </div>
          </div>
          @endif

        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-phone-fill me-2"></i>
              {{ app()->getLocale() === 'bn' ? 'আজই আপনার ভিজিট নির্ধারণ করুন' : 'Book Your Appointment Now' }}
            </a>
          </div>
        </div>

      </div>

      <style>
        .how-it-works .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #5b7cff 0%, #4558dd 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        .how-it-works .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 1rem;
          color: #1a1a1a;
        }

        .process-card {
          background: white;
          padding: 2rem;
          border-radius: 12px;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
          position: relative;
          transition: all 0.3s ease;
          text-align: center;
        }

        .process-card:hover {
          box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
          transform: translateY(-5px);
        }

        .process-step {
          margin-bottom: 1.5rem;
        }

        .step-number {
          width: 60px;
          height: 60px;
          background: linear-gradient(135deg, #5b7cff 0%, #4558dd 100%);
          border-radius: 50%;
          color: white;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 1.8rem;
          font-weight: 700;
          margin: 0 auto;
        }

        .process-icon {
          font-size: 2.5rem;
          color: #5b7cff;
          margin-bottom: 1rem;
        }

        .process-card h4 {
          font-size: 1.2rem;
          font-weight: 600;
          color: #1a1a1a;
          margin-bottom: 0.8rem;
        }

        .process-card p {
          color: #666;
          line-height: 1.6;
          margin: 0;
          font-size: 0.95rem;
        }

        @media (max-width: 768px) {
          .how-it-works .section-title h2 {
            font-size: 1.8rem;
          }
          .process-card {
            margin-bottom: 1rem;
          }
        }
      </style>

    </section>
    @endif
    <!-- /How It Works Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">{{ app()->getLocale() === 'bn' ? 'রোগীদের মতামত' : 'Patient Stories' }}</span>
          <h2>{{ app()->getLocale() === 'bn' ? 'আমাদের রোগীরা কি বলেন' : 'What Our Patients Say' }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? 'প্রিমিয়ার মেডিকেল হাউসকল বেছে নেওয়া মানুষদের বাস্তব অভিজ্ঞতা' : 'Real experiences from people who chose Premier Medical Housecall' }}</p>
        </div>
        <div class="row g-4">
          @forelse($testimonials as $index => $testimonial)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 200 + ($index * 100) }}">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="testimonial-text">
                "{{ app()->getLocale() === 'bn' ? $testimonial->content_bn : $testimonial->content_en }}"
              </p>
              <div class="testimonial-author">
                <div class="author-avatar">
                  @if($testimonial->picture)
                    <img src="{{ asset($testimonial->picture) }}" alt="{{ app()->getLocale() === 'bn' ? $testimonial->author_bn : $testimonial->author_en }}">
                  @else
                    <div class="avatar-placeholder">
                      <i class="bi bi-person-circle"></i>
                    </div>
                  @endif
                </div>
                <div class="author-info">
                  <h5>{{ app()->getLocale() === 'bn' ? $testimonial->author_bn : $testimonial->author_en }}</h5>
                  <small>{{ app()->getLocale() === 'bn' ? 'যাচাইকৃত রোগী' : 'Verified Patient' }}</small>
                </div>
              </div>
            </div>
          </div>
          @empty
          <!-- Fallback testimonials if no database records exist -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="testimonial-text">"The doctors were professional, compassionate, and I didn't have to leave my home. No hospital visits, no waiting. This is how healthcare should be!"</p>
              <div class="testimonial-author">
                <div class="author-avatar">
                  <img src="{{ asset('frontend/assets/img/health/staff-2.webp') }}" alt="Sarah Mitchell" class="img-fluid">
                </div>
                <div class="author-info">
                  <h5>Sarah Mitchell</h5>
                  <small>Verified Patient</small>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="testimonial-text">"As a busy professional, I couldn't afford hours at a clinic. Premier Medical came to my home, diagnosed my condition, and had me back to work the next day."</p>
              <div class="testimonial-author">
                <div class="author-avatar">
                  <img src="{{ asset('frontend/assets/img/health/staff-6.webp') }}" alt="James Anderson" class="img-fluid">
                </div>
                <div class="author-info">
                  <h5>James Anderson</h5>
                  <small>Verified Patient</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <p class="testimonial-text">"My elderly mother felt safe and comfortable with the doctor visiting us at home. It was such a relief not to worry about her traveling while ill."</p>
              <div class="testimonial-author">
                <div class="author-avatar">
                  <img src="{{ asset('frontend/assets/img/health/staff-4.webp') }}" alt="Michael Chen" class="img-fluid">
                </div>
                <div class="author-info">
                  <h5>Michael Chen</h5>
                  <small>Verified Patient</small>
                </div>
              </div>
            </div>
          </div>
          @endforelse
        </div>
      </div>
      <style>
        .testimonials .section-badge {
          display: inline-block;
          background: linear-gradient(135deg, #ffa500 0%, #ff8c00 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          margin-bottom: 1rem;
        }

        .testimonials .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 1rem;
          color: #1a1a1a;
        }

        .testimonial-card {
          background: white;
          padding: 2rem;
          border-radius: 12px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
          transition: all 0.3s ease;
          height: 100%;
          display: flex;
          flex-direction: column;
        }

        .testimonial-card:hover {
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
          transform: translateY(-8px);
        }

        .stars {
          margin-bottom: 1rem;
          font-size: 1.1rem;
          color: #ffa500;
        }

        .testimonial-text {
          color: #666;
          line-height: 1.8;
          margin-bottom: 1.5rem;
          flex-grow: 1;
          font-size: 0.95rem;
          font-style: italic;
        }

        .testimonial-author {
          display: flex;
          align-items: center;
          gap: 1rem;
          padding-top: 1rem;
          border-top: 1px solid #eee;
        }

        .author-avatar {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          overflow: hidden;
          flex-shrink: 0;
        }

        .author-avatar img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        .avatar-placeholder {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 2rem;
          color: white;
        }

        .author-info h5 {
          font-size: 0.95rem;
          font-weight: 600;
          color: #1a1a1a;
          margin: 0;
        }

        .author-info small {
          color: #999;
          font-size: 0.8rem;
          display: block;
        }

        .stats-section {
          margin-top: 3rem;
          padding-top: 3rem;
          border-top: 2px solid #eee;
        }

        .stat-box {
          padding: 2rem 1rem;
        }

        .stat-box h3 {
          font-size: 2rem;
          font-weight: 700;
          color: #0084d6;
          margin-bottom: 0.5rem;
        }

        .stat-box p {
          color: #666;
          font-size: 0.95rem;
          margin: 0;
        }

        @media (max-width: 768px) {
          .testimonials .section-title h2 {
            font-size: 1.8rem;
          }
        }
      </style>
    </section>
    <!-- /Testimonials Section -->

    <!-- About the Founder Section -->
    <section id="about-founder" class="about-founder section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title text-center" data-aos="fade-up">
          <h2>{{ app()->getLocale() === 'bn' ? ($founder->title_bn ?? 'About the Founder') : ($founder->title_en ?? 'About the Founder') }}</h2>
          <p class="founder-subtitle">{{ app()->getLocale() === 'bn' ? ($founder->subtitle_bn ?? 'Medical Leadership with Purpose') : ($founder->subtitle_en ?? 'Medical Leadership with Purpose') }}</p>
        </div>

        <div class="row align-items-center g-5">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="founder-quote-box">
              <p class="founder-quote">❝ {{ app()->getLocale() === 'bn' ? ($founder->quote_bn ?? 'Healthcare should be timely, structured, dignified, and accessible — especially when patients are most vulnerable.') : ($founder->quote_en ?? 'Healthcare should be timely, structured, dignified, and accessible — especially when patients are most vulnerable.') }} ❞</p>
            </div>

            <div class="founder-details mt-4">
              <h4>{{ app()->getLocale() === 'bn' ? ($founder->vision_heading_bn ?? 'Visionary Leadership') : ($founder->vision_heading_en ?? 'Visionary Leadership') }}</h4>
              <p>{{ app()->getLocale() === 'bn' ? ($founder->vision_description_bn ?? 'Our founder\'s commitment to revolutionizing healthcare delivery stems from decades of clinical experience and a profound understanding of patients\' needs. Through Premier Medical Housecall, this vision translates into accessible, compassionate, and professional home-based medical care that prioritizes patient dignity and convenience.') : ($founder->vision_description_en ?? 'Our founder\'s commitment to revolutionizing healthcare delivery stems from decades of clinical experience and a profound understanding of patients\' needs. Through Premier Medical Housecall, this vision translates into accessible, compassionate, and professional home-based medical care that prioritizes patient dignity and convenience.') }}</p>

              <div class="founder-highlights mt-4">
                <div class="highlight-item">
                  <div class="highlight-icon">
                    <i class="bi bi-check-circle-fill"></i>
                  </div>
                  <div class="highlight-content">
                    <h5>{{ app()->getLocale() === 'bn' ? ($founder->highlight_1_title_bn ?? '25+ Years Medical Experience') : ($founder->highlight_1_title_en ?? '25+ Years Medical Experience') }}</h5>
                    <p>{{ app()->getLocale() === 'bn' ? ($founder->highlight_1_description_bn ?? 'Pioneering innovations in home healthcare delivery') : ($founder->highlight_1_description_en ?? 'Pioneering innovations in home healthcare delivery') }}</p>
                  </div>
                </div>

                <div class="highlight-item">
                  <div class="highlight-icon">
                    <i class="bi bi-check-circle-fill"></i>
                  </div>
                  <div class="highlight-content">
                    <h5>{{ app()->getLocale() === 'bn' ? ($founder->highlight_2_title_bn ?? 'Patient-Centric Philosophy') : ($founder->highlight_2_title_en ?? 'Patient-Centric Philosophy') }}</h5>
                    <p>{{ app()->getLocale() === 'bn' ? ($founder->highlight_2_description_bn ?? 'Dedicated to making healthcare accessible and dignified') : ($founder->highlight_2_description_en ?? 'Dedicated to making healthcare accessible and dignified') }}</p>
                  </div>
                </div>

                <div class="highlight-item">
                  <div class="highlight-icon">
                    <i class="bi bi-check-circle-fill"></i>
                  </div>
                  <div class="highlight-content">
                    <h5>{{ app()->getLocale() === 'bn' ? ($founder->highlight_3_title_bn ?? 'Trusted by Thousands') : ($founder->highlight_3_title_en ?? 'Trusted by Thousands') }}</h5>
                    <p>{{ app()->getLocale() === 'bn' ? ($founder->highlight_3_description_bn ?? 'Leading the transformation in home-based medical care') : ($founder->highlight_3_description_en ?? 'Leading the transformation in home-based medical care') }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="founder-image-box">
              @if ($founder && $founder->picture && Storage::disk('public')->exists('founders/' . $founder->picture))
                <img src="{{ asset('storage/founders/' . $founder->picture) }}" alt="Founder Portrait" class="img-fluid">
              @else
                <img src="{{ asset('frontend/assets/img/health/staff-2.webp') }}" alt="Founder Portrait" class="img-fluid">
              @endif
              <div class="founder-badge">
                <span class="badge-label">{{ app()->getLocale() === 'bn' ? ($founder->badge_label_bn ?? 'Founder & CEO') : ($founder->badge_label_en ?? 'Founder & CEO') }}</span>
              </div>
            </div>
          </div>

        </div>

      </div>

      <style>
        #about-founder {
          padding: 5rem 0;
          background: white;
        }

        .about-founder .section-title {
          margin-bottom: 3rem;
        }

        .about-founder .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 0.5rem;
        }

        .founder-subtitle {
          font-size: 1.25rem;
          color: #0084d6;
          font-weight: 600;
        }

        .founder-quote-box {
          background: linear-gradient(135deg, rgba(0, 132, 214, 0.05) 0%, rgba(0, 95, 163, 0.05) 100%);
          padding: 2.5rem;
          border-radius: 12px;
          border-left: 4px solid #0084d6;
          position: relative;
        }

        .quote-icon {
          font-size: 2.5rem;
          color: #0084d6;
          opacity: 0.3;
          margin-bottom: 1rem;
        }

        .founder-quote {
          font-size: 1.1rem;
          font-style: italic;
          color: #1a1a1a;
          line-height: 1.8;
          margin: 0;
          font-weight: 500;
        }

        .founder-details h4 {
          font-size: 1.4rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 1rem;
        }

        .founder-details p {
          color: #666;
          line-height: 1.8;
          font-size: 0.95rem;
        }

        .founder-highlights {
          display: flex;
          flex-direction: column;
          gap: 1.5rem;
        }

        .highlight-item {
          display: flex;
          gap: 1rem;
        }

        .highlight-icon {
          flex-shrink: 0;
          width: 40px;
          height: 40px;
          display: flex;
          align-items: center;
          justify-content: center;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          color: white;
          border-radius: 50%;
          font-size: 1.2rem;
        }

        .highlight-content h5 {
          font-size: 0.95rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 0.3rem;
        }

        .highlight-content p {
          color: #666;
          font-size: 0.85rem;
          margin: 0;
          line-height: 1.6;
        }

        .founder-image-box {
          position: relative;
          border-radius: 12px;
          overflow: hidden;
          box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .founder-image-box img {
          width: 100%;
          display: block;
          border-radius: 12px;
        }

        .founder-badge {
          position: absolute;
          bottom: 20px;
          right: 20px;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          color: white;
          padding: 10px 20px;
          border-radius: 25px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .badge-label {
          font-weight: 600;
          font-size: 0.9rem;
        }

        @media (max-width: 768px) {
          #about-founder {
            padding: 3rem 0;
          }

          .about-founder .section-title h2 {
            font-size: 1.8rem;
          }

          .founder-subtitle {
            font-size: 1.1rem;
          }

          .founder-quote-box {
            padding: 1.5rem;
          }

          .quote-icon {
            font-size: 2rem;
          }

          .founder-quote {
            font-size: 0.95rem;
          }

          .founder-details h4 {
            font-size: 1.2rem;
          }

          .founder-details p {
            font-size: 0.9rem;
          }

          .highlight-content h5 {
            font-size: 0.85rem;
          }

          .highlight-content p {
            font-size: 0.8rem;
          }
        }
      </style>

    </section>
    <!-- /About the Founder Section -->

    <!-- Contact Section -->
    <section id="contact-preview" class="contact-preview section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center g-5">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="contact-info-wrapper">
              <div class="section-badge mb-3">
                <span class="badge-text">{{ app()->getLocale() === 'bn' ? ($getInTouch->badge_bn ?? 'Quick Connect') : ($getInTouch->badge_en ?? 'Quick Connect') }}</span>
              </div>
              <h2 class="section-heading">{{ app()->getLocale() === 'bn' ? ($getInTouch->heading_bn ?? 'Ready to Experience Better Healthcare?') : ($getInTouch->heading_en ?? 'Ready to Experience Better Healthcare?') }}</h2>
              <p>{{ app()->getLocale() === 'bn' ? ($getInTouch->description_bn ?? 'Don\'t wait in hospital queues. Let us bring the care you need to your front door.') : ($getInTouch->description_en ?? 'Don\'t wait in hospital queues. Let us bring the care you need to your front door.') }}</p>
              <div class="contact-details">

                @if($getInTouch && ($getInTouch->contact_1_title_en || $getInTouch->contact_1_title_bn))
                <div class="detail-item" data-aos="fade-up" data-aos-delay="300">
                  <div class="detail-icon">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="detail-content">
                    <h5>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_1_title_bn ?? $getInTouch->contact_1_title_en) : $getInTouch->contact_1_title_en }}</h5>
                    <a href="tel:{{ str_replace(' ', '', $getInTouch->contact_1_value_en) }}">{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_1_value_bn ?? $getInTouch->contact_1_value_en) : $getInTouch->contact_1_value_en }}</a>
                    <p>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_1_description_bn ?? $getInTouch->contact_1_description_en) : $getInTouch->contact_1_description_en }}</p>
                  </div>
                </div>
                @else
                <div class="detail-item" data-aos="fade-up" data-aos-delay="300">
                  <div class="detail-icon">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="detail-content">
                    <h5>Emergency Hotline</h5>
                    <a href="tel:+1555911246">+1 (555) 911-2468</a>
                    <p>Available 24/7 for urgent medical needs</p>
                  </div>
                </div>
                @endif

                @if($getInTouch && ($getInTouch->contact_2_title_en || $getInTouch->contact_2_title_bn))
                <div class="detail-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="detail-icon">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="detail-content">
                    <h5>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_2_title_bn ?? $getInTouch->contact_2_title_en) : $getInTouch->contact_2_title_en }}</h5>
                    <a href="mailto:{{ $getInTouch->contact_2_value_en }}">{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_2_value_bn ?? $getInTouch->contact_2_value_en) : $getInTouch->contact_2_value_en }}</a>
                    <p>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_2_description_bn ?? $getInTouch->contact_2_description_en) : $getInTouch->contact_2_description_en }}</p>
                  </div>
                </div>
                @else
                <div class="detail-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="detail-icon">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="detail-content">
                    <h5>Email Us</h5>
                    <a href="mailto:info@example.com">info@premiermedicalhousecall.com</a>
                    <p>Response within 2 hours on business days</p>
                  </div>
                </div>
                @endif

                @if($getInTouch && ($getInTouch->contact_3_title_en || $getInTouch->contact_3_title_bn))
                <div class="detail-item" data-aos="fade-up" data-aos-delay="500">
                  <div class="detail-icon">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="detail-content">
                    <h5>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_3_title_bn ?? $getInTouch->contact_3_title_en) : $getInTouch->contact_3_title_en }}</h5>
                    <p>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_3_value_bn ?? $getInTouch->contact_3_value_en) : $getInTouch->contact_3_value_en }}</p>
                    <p>{{ app()->getLocale() === 'bn' ? ($getInTouch->contact_3_description_bn ?? $getInTouch->contact_3_description_en) : $getInTouch->contact_3_description_en }}</p>
                  </div>
                </div>
                @else
                <div class="detail-item" data-aos="fade-up" data-aos-delay="500">
                  <div class="detail-icon">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="detail-content">
                    <h5>Hours</h5>
                    <p>24/7 Emergency Services</p>
                    <p>Business Hours: Mon-Fri 8AM-6PM</p>
                  </div>
                </div>
                @endif

              </div>

              {{-- <div class="contact-cta mt-4">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                  <i class="bi bi-arrow-right me-2"></i>
                  Request an Appointment
                </a>
              </div> --}}
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="contact-form-wrapper">
              <div class="quick-form">
                <h4>{{ app()->getLocale() === 'bn' ? $getInTouch->badge_bn : $getInTouch->badge_en }}</h4>

                {{-- Error Messages --}}
                @if($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                {{-- Success Message --}}
                @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <form method="POST" action="{{ route('service-request.store') }}" id="serviceRequestForm">
                  @csrf

                  {{-- Loading Indicator --}}
                  <div id="loadingIndicator" class="d-none mb-3">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center">
                        <div class="spinner-border spinner-border-sm text-info me-3" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                        <div>
                          <strong>Processing Your Request...</strong>
                          <p class="mb-0 small mt-1">Sending confirmation emails and saving your request. Please wait...</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Your Name"
                           value="{{ old('name') }}"
                           id="formName">
                    @error('name')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email Address"
                           value="{{ old('email') }}"
                           id="formEmail">
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <input type="tel"
                           name="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           placeholder="Phone Number"
                           value="{{ old('phone') }}"
                           id="formPhone">
                    @error('phone')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <select name="service"
                            class="form-select @error('service') is-invalid @enderror"
                            id="formService">
                      <option value="">Select Service</option>
                      <option value="checkup" {{ old('service') === 'checkup' ? 'selected' : '' }}>General Check-up</option>
                      <option value="vaccination" {{ old('service') === 'vaccination' ? 'selected' : '' }}>Vaccination</option>
                      <option value="emergency" {{ old('service') === 'emergency' ? 'selected' : '' }}>Emergency Care</option>
                      <option value="followup" {{ old('service') === 'followup' ? 'selected' : '' }}>Follow-up Consultation</option>
                    </select>
                    @error('service')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <textarea name="message"
                              class="form-control @error('message') is-invalid @enderror"
                              rows="3"
                              placeholder="Your Message"
                              id="formMessage">{{ old('message') }}</textarea>
                    @error('message')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                    <i class="bi bi-send me-2"></i>
                    Send Request
                  </button>
                </form>

                <script>
                  document.getElementById('serviceRequestForm').addEventListener('submit', function(e) {
                    // Show loading indicator
                    document.getElementById('loadingIndicator').classList.remove('d-none');

                    // Disable submit button and show spinner
                    const submitBtn = document.getElementById('submitBtn');
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...';
                  });
                </script>
              </div>
            </div>
          </div>

        </div>

      </div>

      <style>
        .contact-preview {
          padding: 5rem 0;
        }

        .section-badge {
          display: inline-block;
        }

        .badge-text {
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          color: white;
          padding: 6px 16px;
          border-radius: 25px;
          font-size: 12px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.5px;
        }

        .section-heading {
          font-size: 2.5rem;
          font-weight: 700;
          line-height: 1.3;
          margin-bottom: 1.5rem;
          color: #1a1a1a;
        }

        .contact-info-wrapper > p {
          font-size: 1.1rem;
          color: #666;
          line-height: 1.8;
          margin-bottom: 2.5rem;
        }

        .contact-details {
          margin-bottom: 2rem;
        }

        .detail-item {
          display: flex;
          gap: 1.5rem;
          margin-bottom: 2rem;
          padding-bottom: 1.5rem;
          border-bottom: 1px solid #eee;
        }

        .detail-item:last-child {
          border-bottom: none;
        }

        .detail-icon {
          min-width: 50px;
          width: 50px;
          height: 50px;
          background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          color: white;
          font-size: 1.5rem;
          flex-shrink: 0;
        }

        .detail-content h5 {
          font-size: 1rem;
          font-weight: 600;
          color: #1a1a1a;
          margin-bottom: 0.3rem;
        }

        .detail-content a {
          color: #0084d6;
          text-decoration: none;
          font-weight: 600;
          display: block;
          margin-bottom: 0.3rem;
        }

        .detail-content a:hover {
          text-decoration: underline;
        }

        .detail-content p {
          color: #666;
          font-size: 0.9rem;
          margin: 0;
        }

        .quick-form {
          background: #f8f9fa;
          padding: 2rem;
          border-radius: 12px;
          border: 1px solid #eee;
        }

        .quick-form h4 {
          font-size: 1.3rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 1.5rem;
        }

        .quick-form .form-control,
        .quick-form .form-select {
          border: 1px solid #ddd;
          border-radius: 6px;
          padding: 0.8rem;
          font-size: 0.95rem;
        }

        .quick-form .form-control:focus,
        .quick-form .form-select:focus {
          border-color: #0084d6;
          box-shadow: 0 0 0 0.2rem rgba(0, 132, 214, 0.25);
        }

        @media (max-width: 768px) {
          .section-heading {
            font-size: 1.8rem;
          }
        }
      </style>

    </section>
    <!-- /Contact Section -->

    <!-- Coverage Area Section -->
    <section id="coverage-area" class="coverage-area section">
      <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="100">
          <h2>{{ app()->getLocale() === 'bn' ? 'কভারেজ এরিয়া' : 'Coverage Areas' }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? 'আমরা যেখানে সেবা প্রদান করি' : 'Where We Serve' }}</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            @if($coverageAreas && $coverageAreas->count() > 0)
              <div class="coverage-grid" data-aos="fade-up" data-aos-delay="200">
                @php
                  $aosDelay = 200;
                @endphp
                @foreach($coverageAreas as $area)
                  <div class="coverage-item" data-aos="fade-up" data-aos-delay="{{ $aosDelay }}">
                    <div class="coverage-icon">
                      <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="coverage-content">
                      <div class="coverage-name">{{ app()->getLocale() === 'bn' ? ($area->title_bn ?? $area->title_en) : $area->title_en }}</div>
                      @if($area->description_en || $area->description_bn)
                        <p class="coverage-description">{{ app()->getLocale() === 'bn' ? ($area->description_bn ?? $area->description_en) : ($area->description_en ?? $area->description_bn) }}</p>
                      @endif
                    </div>
                  </div>
                  @php
                    $aosDelay += 100;
                  @endphp
                @endforeach
              </div>
            @else
              <!-- Fallback: Hardcoded Coverage Areas -->
              <div class="coverage-grid" data-aos="fade-up" data-aos-delay="200">
                <div class="coverage-item">
                  <div class="coverage-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="coverage-content">
                    <div class="coverage-name">Sonadanga</div>
                  </div>
                </div>

                <div class="coverage-item">
                  <div class="coverage-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="coverage-content">
                    <div class="coverage-name">Khalishpur</div>
                  </div>
                </div>

                <div class="coverage-item">
                  <div class="coverage-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="coverage-content">
                    <div class="coverage-name">Daulatpur</div>
                  </div>
                </div>

                <div class="coverage-item">
                  <div class="coverage-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="coverage-content">
                    <div class="coverage-name">Khulna Sadar</div>
                  </div>
                </div>

                <div class="coverage-item">
                  <div class="coverage-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="coverage-content">
                    <div class="coverage-name">Boyra</div>
                  </div>
                </div>

                <div class="coverage-item">
                  <div class="coverage-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="coverage-content">
                    <div class="coverage-name">Rupsha</div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>

      <style>
        #coverage-area {
          padding: 5rem 0;
          background: linear-gradient(135deg, rgba(23, 162, 184, 0.03) 0%, rgba(0, 132, 214, 0.03) 100%);
        }

        .coverage-area .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 0.5rem;
        }

        .coverage-area .section-title p {
          font-size: 1.1rem;
          color: #17a2b8;
          font-weight: 600;
          margin: 0;
        }

        .section-subtitle p {
          font-size: 1rem;
          color: #666;
          margin: 0;
        }

        .coverage-grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 2rem;
        }

        .coverage-item {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          text-align: center;
          padding: 2rem 1.5rem;
          background: white;
          border-radius: 12px;
          border: 2px solid transparent;
          border-top: 3px solid #17a2b8;
          transition: all 0.3s ease;
          box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .coverage-item:hover {
          transform: translateY(-8px);
          box-shadow: 0 8px 20px rgba(23, 162, 184, 0.15);
          border-top-color: #0084d6;
        }

        .coverage-content {
          width: 100%;
        }

        .coverage-icon {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          background: linear-gradient(135deg, #17a2b8 0%, #0084d6 100%);
          display: flex;
          align-items: center;
          justify-content: center;
          color: white;
          font-size: 1.5rem;
          margin-bottom: 1rem;
          transition: all 0.3s ease;
        }

        .coverage-item:hover .coverage-icon {
          transform: scale(1.1);
          box-shadow: 0 4px 15px rgba(0, 132, 214, 0.3);
        }

        .coverage-name {
          font-size: 1rem;
          font-weight: 600;
          color: #1a1a1a;
          letter-spacing: 0.3px;
          margin-bottom: 0.5rem;
        }

        .coverage-description {
          font-size: 0.85rem;
          color: #666;
          margin: 0;
          line-height: 1.5;
          display: none;
        }

        .coverage-item:hover .coverage-description {
          display: block;
        }

        @media (max-width: 768px) {
          #coverage-area {
            padding: 3rem 0;
          }

          .coverage-area .section-title h2 {
            font-size: 1.8rem;
          }

          .coverage-area .section-title p {
            font-size: 0.95rem;
          }

          .section-subtitle p {
            font-size: 0.9rem;
          }

          .coverage-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
          }

          .coverage-item {
            padding: 1.5rem 1rem;
          }

          .coverage-icon {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
          }

          .coverage-name {
            font-size: 0.9rem;
          }
        }
      </style>

    </section>
    <!-- /Coverage Area Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">
      <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="100">
          <h2>{{ app()->getLocale() === 'bn' ? ($pricing->title_bn ?? 'মূল্য নির্ধারণ') : ($pricing->title_en ?? 'Pricing') }}</h2>
          <p>{{ app()->getLocale() === 'bn' ? ($pricing->description_bn ?? 'আপনার দোরগোড়ায় সাশ্রয়ী স্বাস্থ্যসেবা') : ($pricing->description_en ?? 'Affordable Healthcare at Your Doorstep') }}</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="pricing-card" data-aos="fade-up" data-aos-delay="200">
              <div class="pricing-header">
                <div class="price-amount">
                  <span class="currency">{{ $pricing->currency ?? '৳' }}</span>
                  <span class="amount">{{ number_format($pricing->price ?? 5000, 0) }}</span>
                </div>
                <p class="price-label">{{ app()->getLocale() === 'bn' ? ($pricing->price_label_bn ?? 'প্রতি পরিদর্শন') : ($pricing->price_label_en ?? 'Per Visit') }}</p>
                <p class="price-subtitle">{{ app()->getLocale() === 'bn' ? ($pricing->price_subtitle_bn ?? 'শুরু থেকে') : ($pricing->price_subtitle_en ?? 'Starting from') }}</p>
              </div>

              <div class="pricing-features">
                <h4 class="features-title">{{ app()->getLocale() === 'bn' ? ($pricing->features_title_bn ?? 'অন্তর্ভুক্ত:') : ($pricing->features_title_en ?? 'Includes:') }}</h4>
                <ul class="features-list">
                  @forelse([1, 2, 3, 4, 5] as $i)
                    @php
                      $feature_en_key = 'feature_' . $i . '_en';
                      $feature_bn_key = 'feature_' . $i . '_bn';
                      $featureText = app()->getLocale() === 'bn'
                        ? ($pricing->{$feature_bn_key} ?? $pricing->{$feature_en_key})
                        : ($pricing->{$feature_en_key} ?? $pricing->{$feature_bn_key});
                    @endphp
                    @if($featureText)
                      <li>
                        <i class="bi bi-check-circle-fill"></i>
                        <span>{{ $featureText }}</span>
                      </li>
                    @endif
                  @empty
                    <!-- Fallback features if none stored -->
                    <li>
                      <i class="bi bi-check-circle-fill"></i>
                      <span>{{ app()->getLocale() === 'bn' ? '৩০-৪৫ মিনিটের ডাক্তার পরামর্শ' : '30-45 minute physician consultation' }}</span>
                    </li>
                    <li>
                      <i class="bi bi-check-circle-fill"></i>
                      <span>{{ app()->getLocale() === 'bn' ? 'বিস্তারিত পরীক্ষা' : 'Detailed examination' }}</span>
                    </li>
                    <li>
                      <i class="bi bi-check-circle-fill"></i>
                      <span>{{ app()->getLocale() === 'bn' ? 'ডিজিটাল প্রেসক্রিপশন' : 'Digital prescription' }}</span>
                    </li>
                    <li>
                      <i class="bi bi-check-circle-fill"></i>
                      <span>{{ app()->getLocale() === 'bn' ? 'চিকিৎসা পরিকল্পনা' : 'Treatment planning' }}</span>
                    </li>
                    <li>
                      <i class="bi bi-check-circle-fill"></i>
                      <span>{{ app()->getLocale() === 'bn' ? 'ফলো-আপ সহায়তা' : 'Follow-up support' }}</span>
                    </li>
                  @endforelse
                </ul>
              </div>

              <div class="pricing-action">
                <a href="{{ route('contact', ['lang' => getCurrentLanguage()]) }}" class="btn btn-primary btn-lg w-100">
                  <i class="bi bi-calendar2-check me-2"></i>
                  {{ app()->getLocale() === 'bn' ? 'এখনই বুক করুন' : 'Book Now' }}
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="pricing-note text-center mt-5" data-aos="fade-up" data-aos-delay="300">
          <p>
            <i class="bi bi-info-circle me-2"></i>
            @if($pricing && ($pricing->note_en || $pricing->note_bn))
              {{ app()->getLocale() === 'bn' ? ($pricing->note_bn ?? $pricing->note_en) : ($pricing->note_en ?? $pricing->note_bn) }}
            @else
              {{ app()->getLocale() === 'bn' ? 'সেবার ধরন এবং জটিলতার উপর ভিত্তি করে মূল্য পরিবর্তিত হতে পারে। বিস্তারিত মূল্য তথ্যের জন্য আমাদের সাথে যোগাযোগ করুন।' : 'Prices may vary based on service type and complexity. Contact us for detailed pricing information.' }}
            @endif
          </p>
        </div>
      </div>

      <style>
        #pricing {
          padding: 5rem 0;
        }

        .pricing .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 0.5rem;
        }

        .pricing .section-title p {
          font-size: 1.1rem;
          color: #666;
          margin: 0;
        }

        .pricing-card {
          background: white;
          border-radius: 16px;
          overflow: hidden;
          box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
          transition: all 0.3s ease;
          border-top: 4px solid #00cc88;
          position: relative;
        }

        .pricing-card::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 4px;
          background: linear-gradient(90deg, #00cc88 0%, #00aa66 100%);
        }

        .pricing-card:hover {
          transform: translateY(-8px);
          box-shadow: 0 15px 45px rgba(0, 204, 136, 0.2);
        }

        .pricing-header {
          background: linear-gradient(135deg, rgba(0, 204, 136, 0.08) 0%, rgba(0, 170, 102, 0.08) 100%);
          padding: 3rem 2rem;
          text-align: center;
          border-bottom: 1px solid rgba(0, 204, 136, 0.1);
        }

        .price-amount {
          display: flex;
          align-items: flex-start;
          justify-content: center;
          gap: 0.5rem;
          margin-bottom: 1rem;
        }

        .currency {
          font-size: 1.8rem;
          font-weight: 600;
          color: #00cc88;
        }

        .amount {
          font-size: 3.5rem;
          font-weight: 700;
          color: #1a1a1a;
        }

        .price-label {
          font-size: 1.2rem;
          font-weight: 600;
          color: #1a1a1a;
          margin-bottom: 0.3rem;
        }

        .price-subtitle {
          font-size: 0.95rem;
          color: #666;
          margin: 0;
        }

        .pricing-features {
          padding: 2.5rem 2rem;
        }

        .features-title {
          font-size: 1.1rem;
          font-weight: 700;
          color: #1a1a1a;
          margin-bottom: 1.5rem;
          text-transform: uppercase;
          letter-spacing: 0.5px;
        }

        .features-list {
          list-style: none;
          padding: 0;
          margin: 0;
        }

        .features-list li {
          display: flex;
          align-items: flex-start;
          gap: 1rem;
          margin-bottom: 1.2rem;
          font-size: 0.95rem;
          color: #666;
          line-height: 1.6;
        }

        .features-list li:last-child {
          margin-bottom: 0;
        }

        .features-list i {
          flex-shrink: 0;
          width: 24px;
          height: 24px;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #00cc88;
          margin-top: 0.2rem;
          font-size: 1.1rem;
        }

        .features-list span {
          color: #1a1a1a;
          font-weight: 500;
        }

        .pricing-action {
          padding: 0 2rem 2rem;
        }

        .btn {
          display: inline-block;
          padding: 12px 24px;
          border-radius: 8px;
          text-decoration: none;
          font-weight: 600;
          transition: all 0.3s ease;
          cursor: pointer;
        }

        .btn-primary {
          background: linear-gradient(135deg, #00cc88 0%, #00aa66 100%);
          color: white !important;
          border: none;
          padding: 14px 32px !important;
          font-size: 1rem;
        }

        .btn-primary:hover {
          transform: translateY(-2px);
          box-shadow: 0 8px 25px rgba(0, 204, 136, 0.3);
        }

        .w-100 {
          width: 100%;
        }

        .pricing-note {
          margin-top: 2rem;
          padding: 1.5rem 2rem;
          background: linear-gradient(135deg, rgba(0, 204, 136, 0.05) 0%, rgba(0, 170, 102, 0.05) 100%);
          border-radius: 12px;
          border-left: 4px solid #00cc88;
          color: #666;
          font-size: 0.95rem;
          line-height: 1.6;
        }

        .pricing-note i {
          color: #00cc88;
        }

        @media (max-width: 768px) {
          #pricing {
            padding: 3rem 0;
          }

          .pricing .section-title h2 {
            font-size: 1.8rem;
          }

          .pricing .section-title p {
            font-size: 1rem;
          }

          .pricing-header {
            padding: 2.5rem 1.5rem;
          }

          .amount {
            font-size: 2.8rem;
          }

          .price-label {
            font-size: 1rem;
          }

          .pricing-features {
            padding: 2rem 1.5rem;
          }

          .features-title {
            font-size: 1rem;
          }

          .features-list li {
            font-size: 0.9rem;
            margin-bottom: 1rem;
          }

          .pricing-action {
            padding: 0 1.5rem 1.5rem;
          }

          .pricing-note {
            margin-top: 1.5rem;
            padding: 1.2rem 1.5rem;
            font-size: 0.9rem;
          }
        }
      </style>

    </section>
    <!-- /Pricing Section -->

    <script>
        // Smooth scroll to contact section after form submission
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#contact-preview') {
                const contactSection = document.getElementById('contact-preview');
                if (contactSection) {
                    setTimeout(function() {
                        contactSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 100);
                }
            }
        });
    </script>

@endsection
