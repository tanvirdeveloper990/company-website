<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\CoreValue;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Page;
use App\Models\PortfolioCategory;
use App\Models\SectionTitle;
use App\Models\Service;
use App\Models\ServiceOne;
use App\Models\ServiceTwo;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Welcome;
use App\Models\WhyChoose;
use App\Models\WorkingArea;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $setting = Setting::first();
        $banner = Banner::where('status', 1)->first();
        $welcome = Welcome::where('status', 1)->first();
        $title = SectionTitle::first();
        $services = Service::with('serviceItems')->where('status', 1)->get();
        $whychooses = WhyChoose::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.index', compact('setting', 'banner', 'welcome', 'title', 'services', 'whychooses', 'blogs', 'testimonials'));
    }
    public function blog()
    {
        $blogs = Blog::where('status', 1)->get();
        $title = SectionTitle::first();
        $setting = Setting::first();
        return view('frontend.blogs', compact('title', 'blogs', 'setting'));
    }

    public function portfolio()
    {
        $data = PortfolioCategory::with('portfolio')->where('status', 1)->get();
        $teams = Team::where('status', 1)->get();
        $title = SectionTitle::first();
        $setting = Setting::first();
        return view('frontend.portfolio', compact('data', 'title', 'teams', 'setting'));
    }


    public function faq()
    {
        $data = FaqCategory::with('category')->where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        $setting = Setting::first();
        return view('frontend.faq', compact('data', 'faqs', 'setting'));
    }

    public function serviceSingle($title)
    {
        $service = Service::where('title', $title)->firstOrFail();
        $tools = ServiceOne::where('status',1)->where('service_type','Tools & Technologies')->get();
        $process = ServiceOne::where('status',1)->where('service_type','Our Process')->get();
        $webbuild = ServiceOne::where('status',1)->where('service_type','Types of Websites We Build')->get();
        $title = SectionTitle::first();

        $what = ServiceTwo::where('status',1)->where('service_type','What We Are Doing')->get();
        $workflow = ServiceTwo::where('status',1)->where('service_type','Our Processing Workflow')->get();
        $worktype = ServiceTwo::where('status',1)->where('service_type','Work Type')->get();
        $workarea = WorkingArea::where('status',1)->get();


        return view('frontend.service-signle', compact('service','tools','process','webbuild','title','what','workflow','worktype','workarea'));
    }


    public function contact()
    {
        $data = Contact::where('status', 1)->get();
        $title = SectionTitle::first();
        $setting = Setting::first();
        return view('frontend.contact', compact('data', 'title', 'setting'));
    }

    public function contactStore(Request $request)
    {
        $data = $request->all();
        $data['status'] = '0';
        Contact::create($data);
        return back()->with('success','Your Contact Sudmission Successfully');
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $setting = Setting::first();
        return view('frontend.page', compact('page', 'setting'));
    }


    public function aboutUs()
    {
        $about = AboutUs::first();
        $setting = Setting::first();
        $core = CoreValue::where('status', 1)->get();

        return view('frontend.about', compact('about', 'setting', 'core'));
    }
}
