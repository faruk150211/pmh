<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .content { margin-bottom: 20px; }
        .section { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .footer { border-top: 1px solid #ddd; padding-top: 20px; margin-top: 20px; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
            <p>You have received a new message from the contact form.</p>
        </div>

        <div class="content">
            <div class="section">
                <p><span class="label">Name:</span> {{ $data['name'] }}</p>
                <p><span class="label">Email:</span> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
                @if(!empty($data['phone']))
                <p><span class="label">Phone:</span> {{ $data['phone'] }}</p>
                @endif
            </div>

            <div class="section">
                <p><span class="label">Subject:</span> {{ $data['subject'] }}</p>
            </div>

            <div class="section">
                <p><span class="label">Message:</span></p>
                <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; border-left: 4px solid #007bff;">
                    {!! nl2br(e($data['message'])) !!}
                </div>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated email. Please do not reply to this address.</p>
        </div>
    </div>
</body>
</html>
