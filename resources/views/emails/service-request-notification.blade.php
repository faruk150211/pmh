<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 700px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); color: white; padding: 30px; border-radius: 8px 8px 0 0; text-align: center; }
        .header h2 { margin: 0; font-size: 24px; }
        .content { background-color: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; border: 1px solid #eee; border-top: none; }
        .section { margin-bottom: 25px; }
        .section-title { font-weight: bold; color: #ff6b6b; margin-bottom: 10px; font-size: 14px; text-transform: uppercase; }
        .info-row { display: flex; margin-bottom: 12px; border-bottom: 1px solid #eee; padding-bottom: 8px; }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-weight: 600; color: #555; width: 130px; }
        .info-value { color: #333; flex-grow: 1; }
        .service-badge { display: inline-block; background-color: #ff6b6b; color: white; padding: 6px 12px; border-radius: 4px; font-weight: 600; font-size: 12px; }
        .priority-badge { display: inline-block; background-color: #ffa500; color: white; padding: 6px 12px; border-radius: 4px; font-weight: 600; font-size: 12px; }
        .message-box { background-color: #fffacd; padding: 15px; border-left: 4px solid #ff6b6b; border-radius: 4px; margin-top: 10px; font-style: italic; }
        .action-button { display: inline-block; background-color: #0084d6; color: white; padding: 10px 25px; text-decoration: none; border-radius: 4px; font-weight: 600; margin-top: 15px; margin-right: 10px; }
        .action-button:hover { background-color: #005fa3; }
        .footer { text-align: center; border-top: 1px solid #eee; padding-top: 20px; margin-top: 30px; font-size: 12px; color: #999; }
        .detail-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .detail-table th { background-color: #f0f0f0; padding: 10px; text-align: left; font-weight: 600; border-bottom: 2px solid #ddd; }
        .detail-table td { padding: 10px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>🔔 New Service Request</h2>
            <p style="margin: 10px 0 0 0; opacity: 0.95;">Action Required: Review and Respond</p>
        </div>

        <div class="content">
            <p style="font-size: 16px; margin-bottom: 10px; color: #ff6b6b; font-weight: 600;">You have received a new service request!</p>

            <div class="section">
                <div class="section-title">👤 Customer Information</div>
                <div class="info-row">
                    <span class="info-label">Name:</span>
                    <span class="info-value">{{ $serviceRequest->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value"><a href="mailto:{{ $serviceRequest->email }}" style="color: #0084d6;">{{ $serviceRequest->email }}</a></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone:</span>
                    <span class="info-value"><a href="tel:{{ $serviceRequest->phone }}" style="color: #0084d6;">{{ $serviceRequest->phone }}</a></span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">📋 Request Details</div>
                <div class="info-row">
                    <span class="info-label">Request ID:</span>
                    <span class="info-value"><strong>#{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Service Requested:</span>
                    <span class="info-value">
                        <span class="service-badge">{{ ucfirst(str_replace('_', ' ', $serviceRequest->service)) }}</span>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value">
                        <span class="priority-badge">PENDING</span>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Received:</span>
                    <span class="info-value">{{ $serviceRequest->created_at->format('F d, Y \a\t H:i A') }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">💬 Customer Message</div>
                <div class="message-box">
                    {{ $serviceRequest->message }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">⚡ Quick Actions</div>
                <p style="margin-bottom: 15px;">Log into your admin dashboard to:</p>
                <ul style="margin: 10px 0; padding-left: 20px; line-height: 1.8;">
                    <li>View detailed service request information</li>
                    <li>Update the request status (approved/rejected)</li>
                    <li>Add internal notes and schedule dates</li>
                    <li>Contact the customer directly</li>
                </ul>
            </div>

            <div style="text-align: center; background-color: #f0f8ff; padding: 20px; border-radius: 4px; margin-top: 25px;">
                <a href="{{ route('admin.service-requests.index') ?? route('admin.dashboard') }}" class="action-button">View in Admin Panel</a>
                <a href="mailto:{{ $serviceRequest->email }}?subject=Re:%20Your%20Service%20Request%20%23{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}" class="action-button" style="background-color: #27ae60;">Reply to Customer</a>
            </div>

            <div class="footer">
                <p>This is an automated notification email from Premier Medical Housecall Admin System.<br>
                Please do not reply to this address. Use the admin panel to manage requests.</p>
            </div>
        </div>
    </div>
</body>
</html>
