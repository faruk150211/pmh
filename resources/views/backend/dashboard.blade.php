@extends('backend.layouts.master')

@section('title', 'Dashboard - Premier Medical Housecall')

@section('content')
    <div class="dashboard-cards">
        <div class="manual-section">
            <h2 style="color: #333; margin-bottom: 20px; font-size: 22px; font-weight: 600;">ওয়েবসাইট ম্যানেজমেন্ট গাইড</h2>

            <div style="background: #e3f2fd; border-left: 4px solid #1976d2; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #1976d2; margin-top: 0;">ℹ️ Home Page Sections (হোম পেজ বিভাগ)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Home Page Settings" থেকে সমস্ত ঘোষণা বিভাগ পরিচালনা করুন: Hero, Problem, Solution, Why Choose Us, এবং How It Works, Coverage Areas। প্রতিটি বিভাগের শিরোনাম, বিবরণ এবং ছবি কাস্টমাইজ করুন।
                </p>
            </div>

            <div style="background: #f8f9fa; border-left: 4px solid #007bff; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #007bff; margin-top: 0;">🎨 Hero Section</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Hero Section" মেনু থেকে হোম পেজের ব্যানার আপডেট করতে হবে। নতুন ইমেজ আপলোড করুন এবং ব্যানার টেক্সট পরিবর্তন করুন যা আপনার মেডিকেল সেবা হাইলাইট করে।
                </p>
            </div>

            <div style="background: #f0f8f0; border-left: 4px solid #e83e8c; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #e83e8c; margin-top: 0;">📖 About Us Sections (আমাদের সম্পর্কে)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "About Us" থেকে আপনার সংস্থার তথ্য আপডেট করুন। "Who We Are" এবং "Mission & Vision" বিভাগে আপনার রোগক্ষমতা, মান এবং দৃষ্টিভঙ্গি প্রতিফলিত করুন।
                </p>
            </div>

            <div style="background: #f0f8ff; border-left: 4px solid #28a745; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #28a745; margin-top: 0;">📋 Services (সেবা)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Services" থেকে নতুন সেবা যোগ করুন, বিদ্যমান সেবা সম্পাদনা করুন বা অপ্রয়োজনীয় সেবা মুছে ফেলুন। প্রতিটি সেবার বিবরণ, মূল্য এবং আইকন আপডেট করুন।
                </p>
            </div>

            <div style="background: #f0f8f0; border-left: 4px solid #e83e8c; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #e83e8c; margin-top: 0;">⭐ Testimonials (প্রশংসাপত্র)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Testimonials" থেকে রোগী এবং ক্লায়েন্টের মতামত যোগ করুন। রেটিং, নাম এবং প্রশংসাপত্রের বিবরণ পূরণ করুন যা আপনার সেবার গুণমান প্রদর্শন করে।
                </p>
            </div>

            <div style="background: #e0f7f6; border-left: 4px solid #00897b; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #00897b; margin-top: 0;">💬 Contact Messages (যোগাযোগ বার্তা)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    দর্শকদের থেকে আসা সকল যোগাযোগ বার্তা "Contact Messages" থেকে দেখুন এবং পরিচালনা করুন। বার্তাগুলি পড়ুন, স্ট্যাটাস আপডেট করুন, অভ্যন্তরীণ নোট যোগ করুন এবং দ্রুত সেগুলি মুছে ফেলুন।
                </p>
            </div>

            <div style="background: #f3e5f5; border-left: 4px solid #673ab7; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #673ab7; margin-top: 0;">📅 Service Requests (সেবা অনুরোধ)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    রোগীরা যে সেবা অনুরোধ করেছেন তা "Service Requests" থেকে ট্র্যাক করুন। অনুরোধের অনুমোদন বা প্রত্যাখ্যান করুন, সময়সূচী নির্ধারণ করুন, এবং অনুরোধের বিবরণ সংরক্ষণ করুন।
                </p>
            </div>

            <div style="background: #fff9c4; border-left: 4px solid #fdd835; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #f57f17; margin-top: 0;">🎨 Branding (ব্র্যান্ডিং)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    আপনার ওয়েবসাইটের লোগো এবং ফেভিকন "Branding" থেকে আপলোড এবং পরিচালনা করুন। আপনার ব্র্যান্ডের পরিচয় শক্তিশালী করতে পেশাদার ছবি ব্যবহার করুন।
                </p>
            </div>

            {{-- <div style="background: #e8f5e9; border-left: 4px solid #388e3c; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #388e3c; margin-top: 0;">📊 Coverage Areas (সেবা এলাকা)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    আপনার সেবা প্রদানের এলাকা "Coverage Areas" থেকে পরিচালনা করুন। নতুন এলাকা যোগ করুন, বর্তমান এলাকা সম্পাদনা করুন এবং এলাকা অগ্রাধিকার নির্ধারণ করুন।
                </p>
            </div> --}}

            <div style="background: #fce4ec; border-left: 4px solid #c2185b; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #c2185b; margin-top: 0;">💰 Pricing (মূল্য নির্ধারণ)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    আপনার সেবার মূল্য এবং প্যাকেজ "Pricing" থেকে সংজ্ঞায়িত করুন। বৈশিষ্ট্য, মূল্য এবং বর্ণনা আপডেট করুন যা আপনার গ্রাহকদের আকৃষ্ট করবে।
                </p>
            </div>

            <div style="background: #e0f2f1; border-left: 4px solid #009688; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #009688; margin-top: 0;">👥 Founder Section (প্রতিষ্ঠাতা বিভাগ)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    প্রতিষ্ঠাতা বা নেতার তথ্য "Founder Section" থেকে আপডেট করুন। ছবি, নাম, পেশা এবং সামাজিক লিংক যোগ করুন যা আপনার সংস্থার বিশ্বাসযোগ্যতা বৃদ্ধি করে।
                </p>
            </div>

            <div style="background: #fcf3e9; border-left: 4px solid #ff6f00; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #ff6f00; margin-top: 0;">📞 Get In Touch (যোগাযোগ করুন)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    হোম পেজে যোগাযোগ সেকশনের তথ্য "Get In Touch" থেকে পরিচালনা করুন। ফোন নম্বর, ইমেইল, অফিস ঘন্টা এবং অন্যান্য যোগাযোগ বিবরণ আপডেট করুন।
                </p>
            </div>

            <div style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #ff9800; margin-top: 0;">⚙️ Settings (সেটিংস)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Settings" থেকে আপনার হাসপাতাল বা ক্লিনিকের যোগাযোগ তথ্য, ঠিকানা, ফোন নম্বর এবং ইমেইল আপডেট করুন। সোশ্যাল মিডিয়া লিংক যোগ করুন।
                </p>
            </div>


            {{-- <div style="background: #e0f7f6; border-left: 4px solid #00897b; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <h3 style="color: #00897b; margin-top: 0;">💬 Feedbacks (প্রতিক্রিয়া)</h3>
                <p style="color: #666; line-height: 1.6; margin: 10px 0 0 0;">
                    "Manage Feedbacks" থেকে রোগী এবং ভিজিটরদের প্রতিক্রিয়া দেখুন এবং পরিচালনা করুন। গ্রাহক সন্তুষ্টি উন্নত করতে এবং সেবার মান বৃদ্ধির জন্য প্রতিক্রিয়া বিশ্লেষণ করুন।
                </p>
            </div> --}}

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
