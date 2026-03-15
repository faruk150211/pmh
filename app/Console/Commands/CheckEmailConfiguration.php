<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckEmailConfiguration extends Command
{
    protected $signature = 'email:check';
    protected $description = 'Check email configuration and test sending';

    public function handle()
    {
        $this->info('=== Email Configuration Check ===');
        $this->info('MAIL_MAILER: ' . env('MAIL_MAILER', 'not set'));
        $this->info('MAIL_HOST: ' . env('MAIL_HOST', 'not set'));
        $this->info('MAIL_PORT: ' . env('MAIL_PORT', 'not set'));
        $this->info('MAIL_FROM_ADDRESS: ' . env('MAIL_FROM_ADDRESS', 'not set'));
        $this->info('QUEUE_CONNECTION: ' . env('QUEUE_CONNECTION', 'not set'));
        $this->info('');
        $this->info('Testing email send...');

        try {
            Mail::raw('Test email from Laravel', function ($message) {
                $message->to(env('ADMIN_EMAIL', 'admin@example.com'))
                    ->subject('Email Test - ' . now());
            });
            $this->info('✓ Email sent successfully!');
        } catch (\Exception $e) {
            $this->error('✗ Email failed: ' . $e->getMessage());
        }
    }
}
