  <header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a
              href="mailto:{{ setting('contact_email', 'contact@example.com') }}">{{ setting('contact_email', 'contact@example.com') }}</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ setting('contact_phone', '+1 5589 55488 55') }}</span></i>
        </div>
        <div class="d-none d-md-flex align-items-center gap-4">
          <!-- Language Switcher Toggle -->
          <div class="language-toggle-wrapper">
            <input type="checkbox" id="language-toggle" class="language-toggle-checkbox" 
              {{ app()->getLocale() === 'bn' ? 'checked' : '' }}>
            <label for="language-toggle" class="language-toggle-label">
              <span class="toggle-text toggle-en">EN</span>
              <span class="toggle-slider"></span>
              <span class="toggle-text toggle-bn">বাং</span>
            </label>
          </div>
          <!-- Social Links -->
          <div class="social-links d-flex align-items-center">
            <a href="{{ setting('social_twitter', '#!') }}" target="_blank" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ setting('social_facebook', '#!') }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{{ setting('social_instagram', '#!') }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{{ setting('social_linkedin', '#!') }}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
            
        </div>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <style>
      .language-toggle-wrapper {
        display: flex;
        align-items: center;
        padding-right: 15px;
        border-right: 1px solid rgba(255, 255, 255, 0.15);
      }

      .language-toggle-checkbox {
        display: none;
      }

      .language-toggle-label {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 90px;
        height: 38px;
        background: linear-gradient(135deg, rgba(34, 139, 34, 0.25) 0%, rgba(34, 139, 34, 0.15) 100%);
        border: 1px solid rgba(34, 139, 34, 0.35);
        border-radius: 24px;
        cursor: pointer;
        position: relative;
        transition: all 0.35s cubic-bezier(0.4, 0.0, 0.2, 1);
        box-shadow: inset 0 2px 4px rgba(34, 139, 34, 0.15), 0 2px 8px rgba(34, 139, 34, 0.15);
        overflow: hidden;
      }

      .language-toggle-label:hover {
        background: linear-gradient(135deg, rgba(34, 139, 34, 0.35) 0%, rgba(34, 139, 34, 0.25) 100%);
        box-shadow: inset 0 2px 4px rgba(34, 139, 34, 0.2), 0 4px 12px rgba(34, 139, 34, 0.3);
      }

      .language-toggle-checkbox:checked ~ .language-toggle-label {
        background: linear-gradient(135deg, rgba(34, 139, 34, 0.35) 0%, rgba(34, 139, 34, 0.25) 100%);
        border-color: rgba(34, 139, 34, 0.5);
      }

      .toggle-slider {
        position: absolute;
        width: 32px;
        height: 32px;
        background: linear-gradient(180deg, #228b22 0%, #1a6b1a 100%);
        border-radius: 50%;
        left: 3px;
        transition: all 0.35s cubic-bezier(0.4, 0.0, 0.2, 1);
        box-shadow: 0 3px 8px rgba(34, 139, 34, 0.4), inset 0 1px 2px rgba(255, 255, 255, 0.3);
      }

      .language-toggle-checkbox:checked ~ .language-toggle-label .toggle-slider {
        left: 55px;
      }

      .toggle-text {
        position: absolute;
        font-size: 11px;
        font-weight: 700;
        color: #fff;
        transition: opacity 0.35s cubic-bezier(0.4, 0.0, 0.2, 1);
        letter-spacing: 0.5px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      .toggle-en {
        left: 12px;
        opacity: 0.95;
      }

      .toggle-bn {
        right: 8px;
        opacity: 0.4;
        font-size: 10px;
      }

      .language-toggle-checkbox:checked ~ .language-toggle-label .toggle-en {
        opacity: 0.4;
      }

      .language-toggle-checkbox:checked ~ .language-toggle-label .toggle-bn {
        opacity: 0.95;
      }

      @media (max-width: 768px) {
        .language-toggle-wrapper {
          padding-right: 0;
          border-right: none;
        }

        .language-toggle-label {
          width: 85px;
          height: 36px;
        }

        .toggle-slider {
          width: 30px;
          height: 30px;
        }

        .language-toggle-checkbox:checked ~ .language-toggle-label .toggle-slider {
          left: 52px;
        }
      }
    </style>

    

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('language-toggle');
        
        toggle.addEventListener('change', function() {
          const locale = this.checked ? 'bn' : 'en';
          window.location.href = "{{ url('/language') }}/" + locale;
        });
      });
    </script>

    

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
          <img src="{{ asset(setting('logo_url', '/frontend/assets/img/logo.webp')) }}" alt="{{ setting('site_logo_alt_text', 'Premier Medical HouseCall Logo') }}" style="max-height: 50px; margin-right: 10px;">
          <h1 class="sitename">{{ __('messages.premier_medical_housecalls') }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/" class="active">{{ __('messages.home')}}</a></li>
            <li class="dropdown"><a href="#"><span>{{ __('messages.about_us') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="{{ route('who-we-are') }}">{{ __('messages.who_we_are') }}</a></li>
                <li><a href="{{ route('mission-and-vision') }}">{{ __('messages.mission_and_vision') }}</a></li>
              </ul>
            </li>
            <li><a href="{{ route('services') }}">{{ __('messages.services') }}</a></li>
            <li><a href="{{ route('contact') }}">{{ __('messages.contact_us') }}</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>
