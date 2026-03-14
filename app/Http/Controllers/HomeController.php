<?php

namespace App\Http\Controllers;

use App\Models\CoverageArea;
use App\Models\Founder;
use App\Models\GetInTouch;
use App\Models\HeroSection;
use App\Models\ProblemSection;
use App\Models\Pricing;
use App\Models\SolutionSection;
use App\Models\WhyChooseUsSection;
use App\Models\HowItWorksSection;
use App\Models\Testimonial;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::first();
        $problemSection = ProblemSection::first();
        $solutionSection = SolutionSection::first();
        $whyChooseUsSection = WhyChooseUsSection::first();
        $howItWorksSection = HowItWorksSection::first();
        $founder = Founder::first();
        $services = Service::where('show_on_home', true)->orderBy('order', 'asc')->get();
        $coverageAreas = CoverageArea::where('show_on_home', true)->orderBy('order', 'asc')->get();
        $getInTouch = GetInTouch::first();
        $pricing = Pricing::first();
        $testimonials = Testimonial::where('show_on_home', true)->get();
        $currentLanguage = getCurrentLanguage();
        return view('frontend.home', compact('heroSection', 'problemSection', 'solutionSection', 'whyChooseUsSection', 'howItWorksSection', 'founder', 'services', 'coverageAreas', 'getInTouch', 'pricing', 'testimonials', 'currentLanguage'));
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
