@extends('backend.layouts.master')

@section('title', 'Dashboard - Premier Medical Housecall')

@section('content')
    <div class="dashboard-cards">
        <div class="manual-section">
            <h2 style="color: #333; margin-bottom: 20px; font-size: 22px; font-weight: 600;">ওয়েবসাইট ম্যানেজমেন্ট গাইড</h2>

            <div style="background: #f8f9fa; border-left: 4px solid #007bff; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #007bff; margin-top: 0;">🎨 Hero Section</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Hero Section" মেনু থেকে হোম পেজের ব্যানার আপডেট করতে হবে। নতুন ইমেজ আপলোড করুন এবং ব্যানার টেক্সট পরিবর্তন করুন যা আপনার মেডিকেল সেবা হাইলাইট করে।
                </p>
            </div>

            <div style="background: #f0f8ff; border-left: 4px solid #28a745; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #28a745; margin-top: 0;">📋 Services (সেবা)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Services" থেকে নতুন সেবা যোগ করুন, বিদ্যমান সেবা সম্পাদনা করুন বা অপ্রয়োজনীয় সেবা মুছে ফেলুন। প্রতিটি সেবার বিবরণ, মূল্য এবং আইকন আপডেট করুন।
                </p>
            </div>

            <div style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #ff9800; margin-top: 0;">⚙️ Settings (সেটিংস)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Settings" থেকে আপনার হাসপাতাল বা ক্লিনিকের যোগাযোগ তথ্য, ঠিকানা, ফোন নম্বর এবং ইমেইল আপডেট করুন। সোশ্যাল মিডিয়া লিংক যোগ করুন।
                </p>
            </div>

            <div style="background: #f0f8f0; border-left: 4px solid #e83e8c; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #e83e8c; margin-top: 0;">⭐ Testimonials (প্রশংসাপত্র)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Testimonials" থেকে রোগী এবং ক্লায়েন্টের মতামত যোগ করুন। রেটিং, নাম এবং প্রশংসাপত্রের বিবরণ পূরণ করুন যা আপনার সেবার গুণমান প্রদর্শন করে।
                </p>
            </div>

            <div style="background: #e0f7f6; border-left: 4px solid #00897b; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #00897b; margin-top: 0;">💬 Feedbacks (প্রতিক্রিয়া)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Feedbacks" থেকে রোগী এবং ভিজিটরদের প্রতিক্রিয়া দেখুন এবং পরিচালনা করুন। গ্রাহক সন্তুষ্টি উন্নত করতে এবং সেবার মান বৃদ্ধির জন্য প্রতিক্রিয়া বিশ্লেষণ করুন।
                </p>
            </div>

            <div style="background: #f3e5f5; border-left: 4px solid #9c27b0; padding: 15px; border-radius: 4px;">
                <h3 style="color: #9c27b0; margin-top: 0;">📝 পরামর্শ (Tips)</h3>
                <ul style="color: #666; line-height: 1.8; margin: 10px 0 0 0; padding-left: 20px;">
                    <li>নিয়মিত আপনার ওয়েবসাইট কন্টেন্ট আপডেট রাখুন</li>
                    <li>উচ্চ মানের ছবি এবং ভিডিও ব্যবহার করুন</li>
                    <li>সেবার সঠিক বিবরণ প্রদান করুন যাতে রোগীরা সহজে বুঝতে পারেন</li>
                    <li>নিয়মিত প্রশংসাপত্র যোগ করে আপনার বিশ্বাসযোগ্যতা বৃদ্ধি করুন</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
