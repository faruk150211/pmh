# Service Request Email Troubleshooting Guide

## Last Updated

March 15, 2026

## Problem Summary

Emails send successfully locally but fail on shared hosting (Mailtrap emails not sent, admin notifications not received).

---

## Step 1: Check Current Configuration

Run this command on your hosting server:

```bash
php artisan email:check
```

This will show you what mail driver is currently being used.

---

## Step 2: Configure `.env` on Shared Hosting

### **Best Option: Use Sendmail (No Configuration Needed)**

Most shared hosting providers support sendmail. SSH into your hosting and edit `.env`:

```bash
MAIL_MAILER=sendmail
MAIL_SENDMAIL_PATH=/usr/sbin/sendmail -bs -i
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="PMH - Premier Medical HouseCalls"
```

Then run:

```bash
php artisan config:cache
```

---

### **Alternative Option: Use Mailgun (Free tier available)**

1. Sign up at https://mailgun.com (free tier: 100 emails/day)
2. Get your domain and API key
3. Update `.env`:

```bash
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=mg.yourdomain.com
MAILGUN_SECRET=your_api_key_here
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="PMH - Premier Medical HouseCalls"
```

---

### **Alternative Option: SendGrid (Free tier available)**

1. Sign up at https://sendgrid.com (free tier: 100 emails/day)
2. Get your API key
3. Update `.env`:

```bash
MAIL_MAILER=sendgrid
SENDGRID_API_KEY=your_api_key_here
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="PMH - Premier Medical HouseCalls"
```

---

## Step 3: Check Email Logs

After updating, emails should start sending. To track what's happening:

1. **Run migration on hosting:**

```bash
php artisan migrate --step
```

2. **Check database logs:**
   Access your phpMyAdmin → `email_logs` table to see all email attempts

3. **Check Laravel logs:**

```bash
tail -f storage/logs/laravel.log
```

---

## Step 4: Fix Common Issues

### Issue: Still Not Sending?

- **Check SMTP Port**: Shared hosting often blocks port 25, 2525. Sendmail or port 587 usually works.
- **Check "From" Address**: Must be from a domain on the hosting server
- **Check Hosting Firewall**: Ask your hosting provider to whitelist outgoing SMTP

### Issue: `.env` File Not Present on Hosting?

The deploy script excludes it. You must:

1. Manually FTP/SFTP the `.env` file to hosting
2. Or ask hosting provider for SSH access to edit it
3. Or create `.env.example` in deploy and copy it

### Issue: Queue Jobs Not Running?

You have `QUEUE_CONNECTION=database` set. Either:

- **Remove queue** (simplest):
    ```env
    QUEUE_CONNECTION=sync
    ```
- **Or set up queue worker** (contact hosting support for cron job help)

---

## Step 5: Test Email Sending

Create a test route to verify emails work. Edit [routes/web.php](../routes/web.php):

```php
Route::get('/test-email', function () {
    try {
        \Mail::raw('Test email', function ($message) {
            $message->to('your-email@gmail.com')
                ->subject('Email Test - ' . now());
        });
        return 'Email sent! Check your inbox.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
```

Visit: `https://yourdomain.com/test-email`

---

## Recommended Setup for Shared Hosting

**Best approach:**

1. Use **Sendmail** (simple, no external service needed)
2. Change `MAIL_FROM_ADDRESS` to a real email on your domain
3. Set `QUEUE_CONNECTION=sync` (no background jobs)
4. Monitor `email_logs` table for failures

**Files Modified:**

- `.env` - mail configuration
- `database/migrations/2026_03_15_000000_create_email_logs_table.php` - tracks emails
- `app/Http/Controllers/ServiceRequestController.php` - logs all attempts
- `app/Console/Commands/CheckEmailConfiguration.php` - diagnosis tool

---

## Still Not Working?

1. **Check hosting provider limits** - Some hosts block outgoing email
2. **Verify DNS records** - Add SPF/DKIM records for better email delivery
3. **Use Email Testing Service** - Try https://mailtrap.io with your hosting SMTP
4. **Contact hosting support** - Ask them to enable outgoing SMTP on port 587

---

## Quick Checklist

- [ ] SSH into hosting and edit `.env`
- [ ] Set `MAIL_MAILER=sendmail` or use Mailgun/SendGrid
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan migrate` (for email_logs table)
- [ ] Test sending via dashboard form
- [ ] Check `email_logs` table in database
- [ ] Check `storage/logs/laravel.log`
