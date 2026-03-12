@extends('frontend.layouts.master')

@section('title', 'Home - Premier Medical Housecall')

@section('description', 'Premier Medical Housecall provides high-quality healthcare services at home. Our experienced doctors and nurses offer convenient, compassionate care for all your medical needs.')

@section('keywords', 'medical housecall, home healthcare, doctor at home, medical services, healthcare at home')

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

        // Function to convert English numerals to Bengali
        function convertToBengaliNumerals(text) {
            const bengaliMap = {
                '0': '০', '1': '১', '2': '২', '3': '৩', '4': '৪',
                '5': '৫', '6': '৬', '7': '৭', '8': '৮', '9': '৯'
            };
            return text.replace(/[0-9]/g, digit => bengaliMap[digit]);
        }

        // Convert purecounter values to Bengali if language is Bengali
        if (currentLang === 'bn') {
            // Wait for DOM to be ready and purecounter to initialize
            document.addEventListener('DOMContentLoaded', function() {
                // Convert existing purecounter values
                const pureCounters = document.querySelectorAll('.purecounter');
                pureCounters.forEach(counter => {
                    // Watch for changes to the counter's text content
                    const observer = new MutationObserver(function(mutations) {
                        const text = counter.textContent;
                        // Check if text contains numbers
                        if (/[0-9]/.test(text)) {
                            counter.textContent = convertToBengaliNumerals(text);
                        }
                    });
                    observer.observe(counter, { childList: true, characterData: true, subtree: true });

                    // Also check periodically for purecounter to finish animating
                    let checkCount = 0;
                    const interval = setInterval(() => {
                        const text = counter.textContent;
                        if (/[0-9]/.test(text) && !text.includes('০') && !text.includes('১')) {
                            counter.textContent = convertToBengaliNumerals(text);
                        }
                        checkCount++;
                        if (checkCount > 30) clearInterval(interval); // Stop after 3 seconds
                    }, 100);
                });
            });
        }
    </script>

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
              <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
                <div class="badge-item">
                  <i class="bi bi-shield-check"></i>
                  <span>{{ getTranslated($heroSection, 'badge_1') }}</span>
                </div>
                <div class="badge-item">
                  <i class="bi bi-clock"></i>
                  <span>{{ getTranslated($heroSection, 'badge_2') }}</span>
                </div>
                <div class="badge-item">
                  <i class="bi bi-star-fill"></i>
                  <span>{{ getTranslated($heroSection, 'badge_3') }}</span>
                </div>
              </div>

              <h1 data-aos="fade-right" data-aos-delay="300" class="hero-title">
                {{ getTranslated($heroSection, 'title') ?? 'Excellence in Healthcare With Compassionate Care' }}
              </h1>

              <p class="hero-description" data-aos="fade-right" data-aos-delay="400" lang="en-description">
                {{ getTranslated($heroSection, 'description') ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.' }}
              </p>

              <div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
                <div class="stat-item">
                  <h3><span data-purecounter-start="0" data-purecounter-end="{{ getLocalizedNumeral($heroSection, 'stat_1') }}" data-purecounter-duration="2"
                      class="purecounter"></span>+</h3>
                  <p class="stat-label-1">
                    {{ getTranslated($heroSection, 'stat_1_label') }}
                  </p>
                </div>
                <div class="stat-item">
                  <h3><span data-purecounter-start="0" data-purecounter-end="{{ getLocalizedNumeral($heroSection, 'stat_2') }}" data-purecounter-duration="2"
                      class="purecounter"></span>+</h3>
                  <p class="stat-label-2">
                    {{ getTranslated($heroSection, 'stat_2_label') }}
                  </p>
                </div>
                <div class="stat-item">
                  <h3><span data-purecounter-start="0" data-purecounter-end="{{ getLocalizedNumeral($heroSection, 'stat_3') }}" data-purecounter-duration="2"
                      class="purecounter"></span>+</h3>
                  <p class="stat-label-3">
                    {{ getTranslated($heroSection, 'stat_3_label') }}
                  </p>
                </div>
              </div>

              {{-- <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
                <a href="appointment.html" class="btn btn-primary">Book Appointment</a>
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-outline glightbox">
                  <i class="bi bi-play-circle me-2"></i>
                  Watch Our Story
                </a>
              </div> --}}

              <div class="emergency-contact" data-aos="fade-right" data-aos-delay="700">
                <div class="emergency-icon">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="emergency-info">
                  <small>@if(request('lang') === 'bn')জরুরি হটলাইন @else Emergency Hotline @endif</small>
                  <strong>{{ $heroSection->emergency_hotline ?? '+1 (555) 911-2468' }}</strong>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
              <div class="main-image">
                <img src="{{ asset($heroSection->image ?? 'frontend/assets/img/health/staff-10.webp') }}" alt="Modern Healthcare Facility" class="img-fluid">
                {{-- <div class="floating-card appointment-card">
                  <div class="card-icon">
                    <i class="bi bi-calendar-check"></i>
                  </div>
                  <div class="card-content">
                    <h6>Next Available</h6>
                    <p>Today 2:30 PM</p>
                    <small>Dr. Sarah Johnson</small>
                  </div>
                </div> --}}
                {{-- <div class="floating-card rating-card">
                  <div class="card-content">
                    <div class="rating-stars">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                    <h6>4.9/5</h6>
                    <small>1,234 Reviews</small>
                  </div>
                </div> --}}
              </div>
              <div class="background-elements">
                <div class="element element-1"></div>
                <div class="element element-2"></div>
                <div class="element element-3"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Problem Section -->
    <section id="problem" class="problem section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">The Challenge</span>
          <h2>Why Traditional Healthcare Falls Short</h2>
          <p>Healthcare on your terms - not the hospital's</p>
        </div>

        <div class="row g-4">

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-hourglass-split"></i>
              </div>
              <h4>Long Wait Times</h4>
              <p>Emergency rooms and clinics mean hours of waiting. Your time is valuable, and illness shouldn't mean wasting your day in a waiting room.</p>
              <div class="problem-stat"><span class="stat-number">3-5</span> <span class="stat-label">Hours Average Wait</span></div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <h4>Inconvenient Locations</h4>
              <p>Traveling to clinics, sometimes far from home, when you're sick or injured. Transportation becomes a challenge when you're not feeling well.</p>
              <div class="problem-stat"><span class="stat-number">30+ min</span> <span class="stat-label">Average Travel Time</span></div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="400">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-virus"></i>
              </div>
              <h4>Hospital-Acquired Infections</h4>
              <p>Exposure to infections and disease in clinical settings. Treatment venues expose you to additional health risks you didn't have before.</p>
              <div class="problem-stat"><span class="stat-number">1 in 31</span> <span class="stat-label">Hospital Patients Infected</span></div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="500">
            <div class="problem-card">
              <div class="problem-icon">
                <i class="bi bi-cash-coin"></i>
              </div>
              <h4>High Treatment Costs</h4>
              <p>Hospital visits mean inflated costs and facility charges. Home-based care can reduce expenses while maintaining quality care.</p>
              <div class="problem-stat"><span class="stat-number">60%</span> <span class="stat-label">Higher Facility Costs</span></div>
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

    <!-- Solution Section -->
    <section id="solution" class="solution section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">The Answer</span>
          <h2>Your Healthcare, Your Way</h2>
          <p>Premier Medical Housecall brings expert care directly to you</p>
        </div>

        <div class="row align-items-center g-5">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="solution-content">

              <div class="solution-item" data-aos="fade-up" data-aos-delay="300">
                <div class="solution-number">1</div>
                <div class="solution-text">
                  <h5>Same-Day Appointments</h5>
                  <p>No waiting rooms. No scheduling nightmares. Get care within hours of your request, not weeks.</p>
                </div>
              </div>

              <div class="solution-item" data-aos="fade-up" data-aos-delay="400">
                <div class="solution-number">2</div>
                <div class="solution-text">
                  <h5>Care in Your Home</h5>
                  <p>Comfortable, private consultation in your own space. Reduce stress and recovery time with familiar surroundings.</p>
                </div>
              </div>

              <div class="solution-item" data-aos="fade-up" data-aos-delay="500">
                <div class="solution-number">3</div>
                <div class="solution-text">
                  <h5>Infection-Free Environment</h5>
                  <p>Sterile medical protocols in your home without exposure to hospital pathogens. Safe treatment for your entire family.</p>
                </div>
              </div>

              <div class="solution-item" data-aos="fade-up" data-aos-delay="600">
                <div class="solution-number">4</div>
                <div class="solution-text">
                  <h5>Affordable Excellence</h5>
                  <p>Direct cost savings through eliminated facility fees. Quality care doesn't require a premium price tag.</p>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="solution-visual">
              <img src="{{ asset('frontend/assets/img/health/consultation-4.webp') }}" alt="In-home medical care" class="img-fluid rounded-lg shadow-lg">
              <div class="floating-badge">
                <div class="badge-icon">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="badge-text">
                  <strong>150K+</strong>
                  <small>Patients Cared For</small>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <style>
        .solution .section-badge {
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

        .solution .section-title h2 {
          font-size: 2.5rem;
          font-weight: 700;
          margin-bottom: 1rem;
          color: #1a1a1a;
        }

        .solution-item {
          display: flex;
          gap: 1.5rem;
          margin-bottom: 2rem;
          padding: 1.5rem;
          background: #f8f9fa;
          border-radius: 12px;
          transition: all 0.3s ease;
        }

        .solution-item:hover {
          background: #f0f4f8;
          transform: translateX(8px);
        }

        .solution-number {
          min-width: 50px;
          width: 50px;
          height: 50px;
          background: linear-gradient(135deg, #00cc88 0%, #00aa66 100%);
          border-radius: 50%;
          color: white;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 1.5rem;
          font-weight: 700;
          flex-shrink: 0;
        }

        .solution-text h5 {
          font-size: 1.1rem;
          font-weight: 600;
          color: #1a1a1a;
          margin-bottom: 0.5rem;
        }

        .solution-text p {
          color: #666;
          line-height: 1.6;
          margin: 0;
          font-size: 0.95rem;
        }

        .floating-badge {
          position: absolute;
          bottom: 30px;
          right: -20px;
          background: white;
          border-radius: 12px;
          padding: 1.5rem;
          box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
          display: flex;
          align-items: center;
          gap: 1rem;
          min-width: 200px;
        }

        .badge-icon {
          display: flex;
          align-items: center;
          justify-content: center;
          width: 50px;
          height: 50px;
          background: linear-gradient(135deg, #00cc88 0%, #00aa66 100%);
          border-radius: 50%;
          color: white;
          font-size: 1.5rem;
          flex-shrink: 0;
        }

        .badge-text strong {
          display: block;
          font-size: 1.3rem;
          color: #1a1a1a;
        }

        .badge-text small {
          display: block;
          font-size: 0.8rem;
          color: #999;
          margin-top: 0.25rem;
        }

        .solution-visual {
          position: relative;
        }

        @media (max-width: 768px) {
          .solution .section-title h2 {
            font-size: 1.8rem;
          }
          .floating-badge {
            position: static;
            margin-top: 2rem;
          }
        }
      </style>

    </section><!-- /Solution Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Featured Departments</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="specialty-card">
              <div class="specialty-content">
                <div class="specialty-meta">
                  <span class="specialty-label">Specialized Care</span>
                </div>
                <h3>Cardiovascular Medicine</h3>
                <p>Advanced diagnostic imaging and interventional procedures for comprehensive heart health management
                  with personalized treatment protocols.</p>
                <div class="specialty-features">
                  <span><i class="bi bi-check-circle-fill"></i>24/7 Emergency Cardiac Care</span>
                  <span><i class="bi bi-check-circle-fill"></i>Minimally Invasive Procedures</span>
                </div>
                <a href="department-details.html" class="specialty-link">
                  Explore Cardiology <i class="bi bi-arrow-right"></i>
                </a>
              </div>
              <div class="specialty-visual">
                <img src="{{ asset('frontend/assets/img/health/cardiology-1.webp') }}" alt="Cardiovascular Medicine" class="img-fluid">
                <div class="visual-overlay">
                  <i class="bi bi-heart-pulse"></i>
                </div>
              </div>
            </div>
          </div><!-- End Specialty Card -->

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="specialty-card">
              <div class="specialty-content">
                <div class="specialty-meta">
                  <span class="specialty-label">Expert Care</span>
                </div>
                <h3>Neurological Sciences</h3>
                <p>Cutting-edge neuroimaging and neurosurgical expertise for complex brain and spinal cord conditions
                  with innovative treatment approaches.</p>
                <div class="specialty-features">
                  <span><i class="bi bi-check-circle-fill"></i>Advanced Brain Imaging</span>
                  <span><i class="bi bi-check-circle-fill"></i>Robotic Surgery</span>
                </div>
                <a href="department-details.html" class="specialty-link">
                  Explore Neurology <i class="bi bi-arrow-right"></i>
                </a>
              </div>
              <div class="specialty-visual">
                <img src="{{ asset('frontend/assets/img/health/neurology-4.webp') }}" alt="Neurological Sciences" class="img-fluid">
                <div class="visual-overlay">
                  <i class="bi bi-cpu"></i>
                </div>
              </div>
            </div>
          </div><!-- End Specialty Card -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="department-highlight">
              <div class="highlight-icon">
                <i class="bi bi-shield-plus"></i>
              </div>
              <h4>Orthopedic Surgery</h4>
              <p>Comprehensive musculoskeletal care utilizing advanced arthroscopic techniques and joint replacement
                procedures.</p>
              <ul class="highlight-list">
                <li>Sports Medicine</li>
                <li>Joint Replacement</li>
                <li>Spine Surgery</li>
              </ul>
              <a href="department-details.html" class="highlight-cta">Learn More</a>
            </div>
          </div><!-- End Department Highlight -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="department-highlight">
              <div class="highlight-icon">
                <i class="bi bi-people"></i>
              </div>
              <h4>Pediatric Care</h4>
              <p>Child-centered healthcare services from newborn to adolescence with family-focused treatment
                approaches.</p>
              <ul class="highlight-list">
                <li>Neonatal Intensive Care</li>
                <li>Developmental Pediatrics</li>
                <li>Pediatric Surgery</li>
              </ul>
              <a href="department-details.html" class="highlight-cta">Learn More</a>
            </div>
          </div><!-- End Department Highlight -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="department-highlight">
              <div class="highlight-icon">
                <i class="bi bi-activity"></i>
              </div>
              <h4>Cancer Treatment</h4>
              <p>Multidisciplinary oncology program offering personalized cancer care with latest therapeutic
                innovations.</p>
              <ul class="highlight-list">
                <li>Precision Medicine</li>
                <li>Immunotherapy</li>
                <li>Radiation Oncology</li>
              </ul>
              <a href="department-details.html" class="highlight-cta">Learn More</a>
            </div>
          </div><!-- End Department Highlight -->

        </div>

        <div class="emergency-banner" data-aos="fade-up" data-aos-delay="400">
          <div class="emergency-content-wrapper">
            <div class="emergency-badge">
              <i class="bi bi-exclamation-triangle-fill"></i>
              <span>24/7 Emergency Response</span>
            </div>
            <div class="row align-items-center g-4">
              <div class="col-lg-7">
                <div class="emergency-text">
                  <h3 class="emergency-title">Critical Care When You Need It Most</h3>
                  <p class="emergency-description">Our emergency department is equipped with state-of-the-art technology and staffed by board-certified emergency physicians ready to provide immediate care.</p>
                  <div class="emergency-features">
                    <div class="feature">
                      <i class="bi bi-clock-history"></i>
                      <span>Immediate Response</span>
                    </div>
                    <div class="feature">
                      <i class="bi bi-hospital"></i>
                      <span>Advanced Equipment</span>
                    </div>
                    <div class="feature">
                      <i class="bi bi-person-check"></i>
                      <span>Expert Team</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="emergency-cta-box">
                  <div class="cta-badge">Available Now</div>
                  <a href="tel:+15551234567" class="emergency-btn">
                    <div class="btn-icon">
                      <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="btn-text">
                      <small>Call Emergency Hotline</small>
                      <strong>(555) 123-4567</strong>
                    </div>
                  </a>
                  <p class="emergency-subtext">Response time: Under 5 minutes</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <style>
          .emergency-banner {
            background: linear-gradient(135deg, #d63031 0%, #e84393 50%, #c23030 100%);
            border-radius: 16px;
            padding: 3rem;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(214, 48, 49, 0.3);
          }

          .emergency-banner::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(100px, -100px);
            pointer-events: none;
          }

          .emergency-banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-100px, 100px);
            pointer-events: none;
          }

          .emergency-content-wrapper {
            position: relative;
            z-index: 1;
          }

          .emergency-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.25);
            color: white;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
          }

          .emergency-badge i {
            font-size: 1rem;
          }

          .emergency-title {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.3;
          }

          .emergency-description {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.7;
            margin-bottom: 1.5rem;
          }

          .emergency-features {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
          }

          .emergency-features .feature {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
          }

          .emergency-features .feature i {
            font-size: 1.3rem;
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
          }

          .emergency-cta-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
          }

          .emergency-cta-box:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
          }

          .cta-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.9);
            color: #d63031;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
          }

          .emergency-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            background: white;
            color: #d63031;
            padding: 1.2rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            margin-bottom: 1rem;
          }

          .emergency-btn:hover {
            background: #f8f9fa;
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
          }

          .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #d63031 0%, #e84393 100%);
            color: white;
            border-radius: 10px;
            font-size: 1.5rem;
          }

          .btn-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
          }

          .btn-text small {
            font-size: 0.8rem;
            font-weight: 600;
            opacity: 0.8;
          }

          .btn-text strong {
            font-size: 1.1rem;
            margin-top: 0.25rem;
          }

          .emergency-subtext {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.85);
            white-space: nowrap;
          }

          @media (max-width: 768px) {
            .emergency-banner {
              padding: 2rem;
            }

            .emergency-title {
              font-size: 1.5rem;
            }

            .emergency-description {
              font-size: 0.95rem;
            }

            .emergency-features {
              gap: 1rem;
            }

            .emergency-features .feature {
              font-size: 0.85rem;
            }

            .emergency-cta-box {
              padding: 1.5rem;
            }

            .emergency-btn {
              flex-direction: column;
              padding: 1rem 1.2rem;
            }

            .btn-icon {
              width: 45px;
              height: 45px;
              font-size: 1.2rem;
            }

            .btn-text {
              align-items: center;
              text-align: center;
            }

            .btn-text small {
              font-size: 0.75rem;
            }

            .btn-text strong {
              font-size: 1rem;
            }

            .emergency-subtext {
              white-space: normal;
            }
          }
        </style>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Home About Section (Why Choose Us) -->
    <section id="home-about" class="home-about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title text-center" data-aos="fade-up">
          <span class="section-badge">Why Choose Us</span>
          <h2>Professional Medical Care <span class="highlight">Delivered to Your Door</span></h2>
        </div>

        <div class="about-content">
          <div class="features-grid">
            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="200">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi bi-lightning-charge"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>Rapid Response</h4>
                <p>No waiting rooms. No delays. Immediate professional medical attention at your convenience.</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">01</span>
              </div>
            </div>

            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="300">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi bi-people-check"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>Experienced Team</h4>
                <p>Board-certified physicians and highly trained medical professionals with extensive clinical expertise.</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">02</span>
              </div>
            </div>

            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="400">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi bi-shield-exclamation"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>Advanced Equipment</h4>
                <p>State-of-the-art mobile medical technology ensures diagnostic accuracy and treatment quality.</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">03</span>
              </div>
            </div>

            <div class="why-choose-card" data-aos="fade-up" data-aos-delay="500">
              <div class="card-header">
                <div class="card-icon">
                  <i class="bi bi-clock-history"></i>
                </div>
              </div>
              <div class="card-body">
                <h4>24/7 Availability</h4>
                <p>Always ready. Round-the-clock emergency services and scheduled visits on your preferred schedule.</p>
              </div>
              <div class="card-footer">
                <span class="badge-number">04</span>
              </div>
            </div>
          </div>

          <div class="stats-section mt-5">
            <div class="stats-row">
              <div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-content">
                  <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="15000"
                    data-purecounter-duration="2"></div>
                  <div class="stat-label">Patients Served</div>
                </div>
              </div>

              <div class="stat-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-content">
                  <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="25"
                    data-purecounter-duration="2"></div>
                  <div class="stat-label">Years of Experience</div>
                </div>
              </div>

              <div class="stat-box" data-aos="zoom-in" data-aos-delay="400">
                <div class="stat-content">
                  <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="50"
                    data-purecounter-duration="2"></div>
                  <div class="stat-label">Medical Specialists</div>
                </div>
              </div>
            </div>
          </div>

          <div class="cta-section mt-5 pt-3" data-aos="fade-up" data-aos-delay="600">
            <a href="{{ route('contact', ['lang' => getCurrentLanguage()]) }}" class="btn-primary btn-lg">
              <i class="bi bi-phone-fill me-2"></i>
              Schedule Your Visit Today
            </a>
            <a href="{{ route('who-we-are', ['lang' => getCurrentLanguage()]) }}" class="btn-outline">
              Learn More About Us
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

    </section><!-- /Home About Section -->

    <!-- How It Works Section -->
    <section id="how-it-works" class="how-it-works section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">Simple Process</span>
          <h2>How to Get Care in 4 Steps</h2>
          <p>From booking to recovery - streamlined for your convenience</p>
        </div>

        <div class="row g-4">

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">1</div>
              </div>
              <h4>Request Appointment</h4>
              <p>Call us or use our online booking system. Tell us your symptoms and preferred time. We'll find an available slot within hours.</p>
              <div class="process-icon">
                <i class="bi bi-calendar-check"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">2</div>
              </div>
              <h4>Doctor Confirmation</h4>
              <p>Our qualified physicians review your case and confirm the appointment. You'll receive a confirmation call and visit details.</p>
              <div class="process-icon">
                <i class="bi bi-person-check"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="400">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">3</div>
              </div>
              <h4>Doctor at Your Door</h4>
              <p>Your doctor arrives on time with complete medical equipment. Comfortable, private consultation in your home.</p>
              <div class="process-icon">
                <i class="bi bi-door-open"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="500">
            <div class="process-card">
              <div class="process-step">
                <div class="step-number">4</div>
              </div>
              <h4>Follow-up Care</h4>
              <p>Prescription and medical records sent digitally. We follow up to ensure you're recovering well and support your ongoing care.</p>
              <div class="process-icon">
                <i class="bi bi-file-medical"></i>
              </div>
            </div>
          </div>

        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="{{ route('contact', ['lang' => getCurrentLanguage()]) }}" class="btn btn-primary btn-lg" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-phone-fill me-2"></i>
              Book Your Appointment Now
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

    </section><!-- /How It Works Section -->

    <!-- Find A Doctor Section -->
    <section id="find-a-doctor" class="find-a-doctor section" style="display: none;">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Find A Doctor</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-8 text-center">
            <div class="search-section">
              <h3 class="search-title">Find Your Perfect Healthcare Provider</h3>
              <p class="search-subtitle">Search through our comprehensive directory of experienced medical professionals
              </p>
              <form class="search-form" action="#!" method="#">
                <div class="search-input-group">
                  <div class="input-wrapper">
                    <i class="bi bi-person"></i>
                    <input type="text" class="form-control" name="doctor_name" placeholder="Enter doctor name">
                  </div>
                  <div class="select-wrapper">
                    <i class="bi bi-heart-pulse"></i>
                    <select class="form-select" name="specialty">
                      <option value="">All Specialties</option>
                      <option value="cardiology">Cardiology</option>
                      <option value="neurology">Neurology</option>
                      <option value="orthopedics">Orthopedics</option>
                      <option value="pediatrics">Pediatrics</option>
                      <option value="dermatology">Dermatology</option>
                      <option value="oncology">Oncology</option>
                    </select>
                  </div>
                  <button type="submit" class="search-btn">
                    <i class="bi bi-search"></i>
                    Find Doctors
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="doctors-grid" data-aos="fade-up" data-aos-delay="300">
          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="100">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ asset('frontend/assets/img/health/staff-2.webp') }}" alt="Dr. Amanda Foster" class="img-fluid">
                <div class="status-indicator available"></div>
              </div>
              <div class="doctor-details">
                <h4>Dr. Amanda Foster</h4>
                <span class="specialty-tag">Cardiology Specialist</span>
                <div class="experience-info">
                  <i class="bi bi-award"></i>
                  <span>14 years experience</span>
                </div>
              </div>
            </div>
            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <span class="rating-score">4.9</span>
              <span class="review-count">(127 reviews)</span>
            </div>
            <div class="action-buttons">
              <a href="#!" class="btn-secondary">View Details</a>
              <a href="#!" class="btn-primary">Book Now</a>
            </div>
          </div><!-- End Doctor Profile -->

          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="200">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ asset('frontend/assets/img/health/staff-6.webp') }}" alt="Dr. Marcus Johnson" class="img-fluid">
                <div class="status-indicator busy"></div>
              </div>
              <div class="doctor-details">
                <h4>Dr. Marcus Johnson</h4>
                <span class="specialty-tag">Neurology Expert</span>
                <div class="experience-info">
                  <i class="bi bi-award"></i>
                  <span>16 years experience</span>
                </div>
              </div>
            </div>
            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <span class="rating-score">4.8</span>
              <span class="review-count">(89 reviews)</span>
            </div>
            <div class="action-buttons">
              <a href="#!" class="btn-secondary">View Details</a>
              <a href="#!" class="btn-primary">Schedule</a>
            </div>
          </div><!-- End Doctor Profile -->

          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="300">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ asset('frontend/assets/img/health/staff-4.webp') }}" alt="Dr. Rachel Williams" class="img-fluid">
                <div class="status-indicator available"></div>
              </div>
              <div class="doctor-details">
                <h4>Dr. Rachel Williams</h4>
                <span class="specialty-tag">Pediatrics Care</span>
                <div class="experience-info">
                  <i class="bi bi-award"></i>
                  <span>11 years experience</span>
                </div>
              </div>
            </div>
            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <span class="rating-score">5.0</span>
              <span class="review-count">(203 reviews)</span>
            </div>
            <div class="action-buttons">
              <a href="#!" class="btn-secondary">View Details</a>
              <a href="#!" class="btn-primary">Book Now</a>
            </div>
          </div><!-- End Doctor Profile -->

          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="400">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ asset('frontend/assets/img/health/staff-8.webp') }}" alt="Dr. David Chen" class="img-fluid">
                <div class="status-indicator offline"></div>
              </div>
              <div class="doctor-details">
                <h4>Dr. David Chen</h4>
                <span class="specialty-tag">Orthopedic Surgery</span>
                <div class="experience-info">
                  <i class="bi bi-award"></i>
                  <span>22 years experience</span>
                </div>
              </div>
            </div>
            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <span class="rating-score">4.7</span>
              <span class="review-count">(156 reviews)</span>
            </div>
            <div class="action-buttons">
              <a href="#!" class="btn-secondary">View Details</a>
              <a href="#!" class="btn-primary">Schedule</a>
            </div>
          </div><!-- End Doctor Profile -->

          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="500">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ asset('frontend/assets/img/health/staff-11.webp') }}" alt="Dr. Victoria Torres" class="img-fluid">
                <div class="status-indicator available"></div>
              </div>
              <div class="doctor-details">
                <h4>Dr. Victoria Torres</h4>
                <span class="specialty-tag">Dermatology Care</span>
                <div class="experience-info">
                  <i class="bi bi-award"></i>
                  <span>9 years experience</span>
                </div>
              </div>
            </div>
            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
              </div>
              <span class="rating-score">4.5</span>
              <span class="review-count">(74 reviews)</span>
            </div>
            <div class="action-buttons">
              <a href="#!" class="btn-secondary">View Details</a>
              <a href="#!" class="btn-primary">Book Now</a>
            </div>
          </div><!-- End Doctor Profile -->

          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="600">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ asset('frontend/assets/img/health/staff-14.webp') }}" alt="Dr. Benjamin Lee" class="img-fluid">
                <div class="status-indicator available"></div>
              </div>
              <div class="doctor-details">
                <h4>Dr. Benjamin Lee</h4>
                <span class="specialty-tag">Oncology Treatment</span>
                <div class="experience-info">
                  <i class="bi bi-award"></i>
                  <span>19 years experience</span>
                </div>
              </div>
            </div>
            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <span class="rating-score">4.9</span>
              <span class="review-count">(194 reviews)</span>
            </div>
            <div class="action-buttons">
              <a href="#!" class="btn-secondary">View Details</a>
              <a href="#!" class="btn-primary">Schedule</a>
            </div>
          </div><!-- End Doctor Profile -->

        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
          <a href="doctors.html" class="btn-view-all">
            View All Doctors
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </section><!-- /Find A Doctor Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title" data-aos="fade-up">
          <span class="section-badge">Patient Stories</span>
          <h2>What Our Patients Say</h2>
          <p>Real experiences from people who chose Premier Medical Housecall</p>
        </div>

        <div class="row g-4">

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

        </div>

        <div class="stats-section mt-5">
          <div class="row text-center">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="500">
              <div class="stat-box">
                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="2"></span>+</h3>
                <p>Happy Patients</p>
              </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="600">
              <div class="stat-box">
                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2"></span>%</h3>
                <p>Satisfaction Rate</p>
              </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="700">
              <div class="stat-box">
                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="2"></span>+</h3>
                <p>Years Experience</p>
              </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="800">
              <div class="stat-box">
                <h3><span class="purecounter" data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="2"></span>/7</h3>
                <p>Available Service</p>
              </div>
            </div>
          </div>
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

    </section><!-- /Testimonials Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-content">
          <div class="row align-items-center">

            <div class="col-lg-6">
              <div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
                <h1>Excellence in Medical Care, Every Day</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>

                <div class="cta-wrapper">
                  <a href="appointment.html" class="primary-cta">
                    <span>Schedule Consultation</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                  <a href="services.html" class="secondary-cta">
                    <span>Explore Services</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="image-container" data-aos="fade-left" data-aos-delay="300">
                <img src="{{ asset('frontend/assets/img/health/facilities-9.webp') }}" alt="Medical Excellence" class="img-fluid">
              </div>
            </div>

          </div>
        </div>

        <div class="features-section">

          <div class="row g-0">

            <div class="col-lg-4">
              <div class="feature-block" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon">
                  <i class="bi bi-shield-check"></i>
                </div>
                <h3>Advanced Technology</h3>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                  laborum.</p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="feature-block" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon">
                  <i class="bi bi-clock"></i>
                </div>
                <h3>24/7 Availability</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                  excepteur.</p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="feature-block" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-icon">
                  <i class="bi bi-people"></i>
                </div>
                <h3>Expert Team</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem.</p>
              </div>
            </div>

          </div>

        </div>

        <div class="contact-block">
          <div class="row">

            <div class="col-lg-8">
              <div class="contact-content" data-aos="fade-up" data-aos-delay="200">
                <h2>Need Immediate Medical Assistance?</h2>
                <p>Our emergency response team is available around the clock to provide immediate medical support when
                  you need it most.</p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="contact-actions" data-aos="fade-up" data-aos-delay="300">
                <a href="tel:5551234567" class="emergency-call">
                  <i class="bi bi-telephone"></i>
                  <span>(555) 123-4567</span>
                </a>
                <a href="contact.html" class="contact-link">Find Location</a>
              </div>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Contact Section -->
    <section id="contact-preview" class="contact-preview section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="contact-info-wrapper">
              <div class="section-badge mb-3">
                <span class="badge-text">Get in Touch</span>
              </div>

              <h2 class="section-heading">Ready to Experience Better Healthcare?</h2>

              <p>Don't wait in hospital queues. Let us bring the care you need to your front door.</p>

              <div class="contact-details">

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

              </div>

              <div class="contact-cta mt-4">
                <a href="{{ route('contact', ['lang' => getCurrentLanguage()]) }}" class="btn btn-primary btn-lg">
                  <i class="bi bi-arrow-right me-2"></i>
                  Request an Appointment
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="contact-form-wrapper">
              <div class="quick-form">
                <h4>Quick Contact</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Your Name" required>
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" required>
                  </div>
                  <div class="mb-3">
                    <input type="tel" class="form-control" placeholder="Phone Number" required>
                  </div>
                  <div class="mb-3">
                    <select class="form-select" required>
                      <option value="">Select Service</option>
                      <option value="checkup">General Check-up</option>
                      <option value="vaccination">Vaccination</option>
                      <option value="emergency">Emergency Care</option>
                      <option value="followup">Follow-up Consultation</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-send me-2"></i>
                    Send Request
                  </button>
                </form>
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

    </section><!-- /Contact Section -->

@endsection
