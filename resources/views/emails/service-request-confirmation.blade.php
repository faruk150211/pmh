<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #0084d6 0%, #005fa3 100%); color: white; padding: 30px; border-radius: 8px 8px 0 0; text-align: center; }
        .header h2 { margin: 0; font-size: 24px; }
        .content { background-color: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; border: 1px solid #eee; border-top: none; }
        .section { margin-bottom: 25px; }
        .section-title { font-weight: bold; color: #0084d6; margin-bottom: 10px; font-size: 14px; text-transform: uppercase; }
        .info-row { display: flex; margin-bottom: 12px; }
        .info-label { font-weight: 600; color: #555; width: 120px; }
        .info-value { color: #333; }
        .service-badge { display: inline-block; background-color: #0084d6; color: white; padding: 8px 12px; border-radius: 4px; font-weight: 600; margin-top: 10px; }
        .cta-button { display: inline-block; background-color: #0084d6; color: white; padding: 12px 30px; text-decoration: none; border-radius: 4px; font-weight: 600; margin-top: 15px; }
        .cta-button:hover { background-color: #005fa3; }
        .message-box { background-color: #f0f8ff; padding: 15px; border-left: 4px solid #0084d6; border-radius: 4px; margin-top: 10px; }
        .footer { text-align: center; border-top: 1px solid #eee; padding-top: 20px; margin-top: 30px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>✓ Request Received</h2>
            <p style="margin: 10px 0 0 0; opacity: 0.95;">Your service request has been submitted</p>
        </div>

        <div class="content">
            <p style="font-size: 16px; margin-bottom: 20px;">Dear {{ $serviceRequest->name }},</p>

            <p style="margin-bottom: 25px;">Thank you for choosing Premier Medical Housecall! We have successfully received your service request and will contact you shortly to confirm your appointment details.</p>

            <div class="section">
                <div class="section-title">📋 Request Summary</div>
                <div class="info-row">
                    <span class="info-label">Request ID:</span>
                    <span class="info-value">#{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Service:</span>
                    <span class="info-value">
                        <span class="service-badge">{{ ucfirst(str_replace('_', ' ', $serviceRequest->service)) }}</span>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Contact Email:</span>
                    <span class="info-value">{{ $serviceRequest->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Contact Phone:</span>
                    <span class="info-value">{{ $serviceRequest->phone }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Submitted:</span>
                    <span class="info-value">{{ $serviceRequest->created_at->format('F d, Y \a\t H:i A') }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">💬 Your Message</div>
                <div class="message-box">
                    {{ $serviceRequest->message }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">⏱️ What's Next?</div>
                <ul style="margin: 10px 0; padding-left: 20px; line-height: 1.8;">
                    <li>Our team will review your request immediately</li>
                    <li>We'll contact you within 2-4 hours to confirm your appointment</li>
                    <li>You can also call us directly for urgent requests</li>
                    <li>Keep your request ID #{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }} for reference</li>
                </ul>
            </div>

            <p style="margin-top: 25px;">If you have any questions or need to make changes, please don't hesitate to contact us.</p>

            <div style="text-align: center;">
                <a href="{{ route('home') }}" class="cta-button">Visit Our Website</a>
            </div>

            <div class="footer">
                <p>This is an automated confirmation email. Please do not reply to this address.<br>
                Premier Medical Housecall | Bringing Healthcare to Your Doorstep</p>
            </div>
        </div>
    </div>
</body>
</html>
