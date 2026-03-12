<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::first();
        $currentLanguage = getCurrentLanguage();
        return view('frontend.home', compact('heroSection', 'currentLanguage'));
    }

    public function whoWeAre()
    {
        return view('frontend.who-we-are');
    }

    public function services()
    {
        $services = Service::all();
        return view('frontend.services', compact('services'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug_en', $slug)->orWhere('slug_bn', $slug)->firstOrFail();
        return view('frontend.service-details', compact('service', 'slug'));
    }

    public function missionAndVision()
    {
        return view('frontend.mission-and-vision');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
