<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Under Construction - Premier Medical Housecall</title>
    <meta name="description" content="We are currently working on something amazing. Please check back soon!">
    <meta name="keywords" content="under construction, coming soon, medical services">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        .under-construction-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #eff6ff 0%, #e0e7ff 100%);
            padding: 1rem;
        }

        .under-construction-content {
            text-align: center;
            max-width: 40rem;
        }

        .construction-icon {
            width: 6rem;
            height: 6rem;
            margin: 0 auto 2rem;
            color: #4f46e5;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-0.5rem); }
        }

        .construction-spinner {
            width: 1.25rem;
            height: 1.25rem;
            color: #4f46e5;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 0.5rem;
            vertical-align: middle;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        h1 {
            font-size: 2.25rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        @media (min-width: 768px) {
            h1 {
                font-size: 3rem;
            }
        }

        .construction-message {
            font-size: 1.25rem;
            color: #4b5563;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .coming-soon {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #4f46e5;
            font-weight: 600;
            margin-bottom: 3rem;
        }

        .contact-section {
            margin-top: 3rem;
        }

        .contact-text {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .contact-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #4f46e5;
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1rem;
        }

        .contact-btn:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>
    <div class="under-construction-container">
        <div class="under-construction-content">
            <div style="margin-bottom: 2rem;">
                <svg class="construction-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4v2m0 4v2M6.343 3.665c-.256-.256-.595-.382-.936-.382H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2h-.407c-.341 0-.68.126-.936.382L12 9m0 0l5.414-5.414M12 9l-5.414-5.414"></path>
                </svg>
            </div>

            <h1>Under Construction</h1>

            <p class="construction-message">
                We are currently working on something amazing. Please check back soon!
            </p>

            <div class="coming-soon">
                <svg class="construction-spinner" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Coming Soon...</span>
            </div>
        </div>
    </div>
</body>
</html>
