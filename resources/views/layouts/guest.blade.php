<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <!-- Favicons -->
        <link href="http://pmh.test/storage/branding/favicons/favicon-1772779489.ico" rel="icon">
        <title>{{ config('app.name', 'PMH - Premier Medical HouseCalls') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Figtree', sans-serif;
                background: #f5f5f5;
            }

            .login-container {
                display: flex;
                min-height: 100vh;
                overflow: hidden;
            }

            .login-image-section {
                flex: 1;
                background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .login-image-section::before {
                content: '';
                position: absolute;
                width: 400px;
                height: 400px;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 50%;
                top: -100px;
                right: -100px;
            }

            .login-image-section::after {
                content: '';
                position: absolute;
                width: 300px;
                height: 300px;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 50%;
                bottom: -50px;
                left: -50px;
            }

            .login-image-content {
                position: relative;
                z-index: 2;
                text-align: center;
                color: white;
                padding: 40px;
            }

            .login-image-content img {
                display: block;
                max-width: 100%;
                height: auto;
                margin: 0 auto 30px auto;
                drop-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                animation: float 3s ease-in-out infinite;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            .login-image-content h2 {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 15px;
            }

            .login-image-content p {
                font-size: 1.1rem;
                opacity: 0.9;
                line-height: 1.6;
            }

            .login-form-section {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px;
                background: white;
            }

            .login-form-wrapper {
                width: 100%;
                max-width: 450px;
            }

            .login-form-header {
                text-align: center;
                margin-bottom: 40px;
            }

            .login-form-header h3 {
                font-size: 1.8rem;
                font-weight: 700;
                color: #1a1a1a;
                margin-bottom: 10px;
            }

            .login-form-header p {
                color: #666;
                font-size: 0.95rem;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: #333;
                font-size: 0.95rem;
            }

            .form-group input {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid #ddd;
                border-radius: 6px;
                font-size: 0.95rem;
                transition: all 0.3s ease;
            }

            .form-group input:focus {
                outline: none;
                border-color: #0084d6;
                box-shadow: 0 0 0 3px rgba(0, 132, 214, 0.1);
            }

            .remember-forgot {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 20px 0 25px 0;
                font-size: 0.9rem;
            }

            .remember-forgot a {
                color: #0084d6;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .remember-forgot a:hover {
                color: #005fa3;
                text-decoration: underline;
            }

            .checkbox-wrapper {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .checkbox-wrapper input[type="checkbox"] {
                width: auto;
                margin: 0;
                cursor: pointer;
            }

            .checkbox-wrapper label {
                margin: 0;
                cursor: pointer;
                color: #666;
            }

            .btn-login {
                width: 100%;
                padding: 12px;
                background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%);
                color: white;
                border: none;
                border-radius: 6px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 132, 214, 0.3);
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 132, 214, 0.4);
            }

            .btn-login:active {
                transform: translateY(0);
            }

            .error-message {
                color: #dc3545;
                font-size: 0.85rem;
                margin-top: 5px;
            }

            .session-status {
                background: #d4edda;
                border: 1px solid #c3e6cb;
                color: #155724;
                padding: 12px 15px;
                border-radius: 6px;
                margin-bottom: 20px;
                font-size: 0.9rem;
            }

            @media (max-width: 768px) {
                .login-container {
                    flex-direction: column;
                }

                .login-image-section {
                    display: none;
                }

                .login-form-section {
                    min-height: 100vh;
                    padding: 20px;
                }

                .login-form-wrapper {
                    max-width: 100%;
                }

                .login-image-content h2 {
                    font-size: 1.8rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <!-- Left Side - Image -->
            <div class="login-image-section">
                <div class="login-image-content">
                    <img src="{{ asset(setting('logo_url', '/frontend/assets/img/logo.webp')) }}" alt="Logo" style="max-width: 200px;">
                    <h2>{{ config('app.name', 'Premier Medical HouseCall') }}</h2>
                    <p>Professional Healthcare Services at Your Doorstep</p>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="login-form-section">
                <div class="login-form-wrapper">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
