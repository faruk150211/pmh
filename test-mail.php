<?php

Use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

require __DIR__.'/bootstrap/app.php';

$app = app();

// Test data
$testData = [
    'name' => 'Test User',
    'email' => 'test@example.com',
    'phone' => '(555) 123-4567',
    'subject' => 'Test Subject from Development',
    'message' => 'This is a test message to verify the email sending works correctly.'
];

$adminEmail = env('ADMIN_EMAIL', config('mail.from.address'));

echo "Testing email sending...\n";
echo "To: $adminEmail\n";
echo "---\n";

try {
    Mail::to($adminEmail)->send(new ContactFormMail($testData));
    echo "✅ Email sent successfully!\n";
    echo "Check your Mailtrap inbox.\n";
} catch (Exception $e) {
    echo "❌ Email failed: " . $e->getMessage() . "\n";
}
