# Contact Form Email Notification Setup Guide

## 📧 Current Configuration

**Environment**: Development/Testing  
**Mail Driver**: `log` (file-based logging)  
**Log Location**: `storage/logs/laravel.log`  
**From Address**: Set in `.env` (`MAIL_FROM_ADDRESS`)  

---

## ✅ System Components

### 1. **ContactController** → Validates & Sends Email
- File: `app/Http/Controllers/ContactController.php`
- Process:
  - Validates form data (strict rules)
  - Creates a `ContactFormMail` instance
  - Sends to `config('mail.from.address')`
  - Returns success/error to user

### 2. **ContactFormMail** → Email Template Class
- File: `app/Mail/ContactFormMail.php`
- Dynamic subject: "New Contact Form Submission: {subject}"
- Passes validated data to template

### 3. **Email Template** → Admin Notification
- File: `resources/views/emails/contact-form.blade.php`
- Displays:
  - Sender name, email, phone
  - Subject
  - Message body

---

## 🧪 How to Test Email Notifications

### Test 1: Submit a Contact Form Message

1. Go to: `http://localhost/contact`
2. Fill out the form with valid data:
   - **Name**: John Doe
   - **Email**: user@example.com
   - **Phone**: (555) 123-4567
   - **Subject**: Website Inquiry
   - **Message**: This is a test message about your services.

3. Click "Send Message"

4. **Expected Result**:
   - ✅ Success message displayed
   - ✅ Email logged to `storage/logs/laravel.log`

### Test 2: View the Logged Email

After submitting, check the log file:

```bash
# Windows Command (in project root):
tailf storage/logs/laravel.log

# Or using PowerShell:
Get-Content storage/logs/laravel.log -Tail 100
```

**Expected Output**: You'll see the email content with:
```
[timestamp] local.INFO: Message sent

Subject: New Contact Form Submission: Website Inquiry

To: hello@example.com (or your configured address)

Message body with sender info...
```

---

## 📧 How to Enable Real Email Sending

If you want the form to send **actual emails** instead of just logging:

### Option 1: Using SMTP (Gmail, Outlook, etc.)

Update `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Option 2: Using SendGrid

Update `.env`:
```env
MAIL_MAILER=sendmail
MAIL_SENDMAIL_PATH="/usr/sbin/sendmail -bs -i"
MAIL_FROM_ADDRESS=noreply@yourdomain.com
```

### Option 3: Using Mailgun

Update `.env`:
```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=your-domain.mailgun.org
MAILGUN_SECRET=your-mailgun-api-key
MAIL_FROM_ADDRESS=noreply@yourdomain.com
```

---

## 🔒 Security Features Implemented

✅ **CSRF Protection** - Form token validation  
✅ **Server-Side Validation** - Strict regex patterns  
✅ **Client-Side Validation** - Real-time feedback  
✅ **XSS Prevention** - Blade templating escapes output  
✅ **Email Sanitization** - Input validated before sending  
✅ **Rate Limiting** - Can be added if needed  

---

## 📝 Validation Rules

| Field | Required | Rules |
|-------|----------|-------|
| **Name** | Yes | Letters, spaces, hyphens, apostrophes only (max 255) |
| **Email** | Yes | Valid email format (max 255) |
| **Phone** | No | Numbers, spaces, hyphens, parentheses (max 20) |
| **Subject** | Yes | 5-255 characters |
| **Message** | Yes | 10-5000 characters |

---

## 🐛 Troubleshooting

### No email appears in the admin inbox?
1. Check if `MAIL_MAILER=log` in `.env` (means it's logging, not sending)
2. Check `storage/logs/laravel.log` for logged emails
3. Update `.env` with real SMTP credentials

### Form shows "An error occurred"?
1. Check `.env` mail configuration
2. Review `storage/logs/laravel.log` for error details
3. Verify MAIL_FROM_ADDRESS is valid

### Emails not being logged?
1. Check folder permissions: `storage/logs/` must be writable
2. Run: `php artisan storage:link`
3. Clear cache: `php artisan cache:clear`

---

## 📞 Next Steps (Optional)

- [ ] Add **rate limiting** to prevent spam
- [ ] Implement **CAPTCHA** (hCaptcha, reCAPTCHA)
- [ ] Add **database storage** for submissions
- [ ] Create **admin panel** to view submissions
- [ ] Add **auto-reply** to user's email
- [ ] Set up **email queue** for better performance
