<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\HomeSetting;
use App\Models\Leader;
use App\Models\Member;
use App\Models\VisitorLog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function logVisitor(Request $request, string $page = '/')
    {
        VisitorLog::create([
            'ip_address' => $request->ip(),
            'browser' => $request->userAgent(),
            'device' => $request->header('User-Agent'),
            'page' => $page,
        ]);
    }

    public function index(Request $request)
    {
        $this->logVisitor($request, '/');
        $home = HomeSetting::first();
        $about = About::first();
        $leaders = Leader::where('status', true)->orderBy('group')->orderBy('order_number')->get();
        $members = Member::where('status', 'aktif')->get();
        $activities = Activity::where('status', true)->with('category')->latest('activity_date')->get();
        $galleries = Gallery::latest()->get();
        $contact = Contact::first();

        return view('public.home', compact('home', 'about', 'leaders', 'members', 'activities', 'galleries', 'contact'));
    }

    public function about(Request $request)
    {
        $this->logVisitor($request, '/tentang');
        $about = About::first();
        $contact = Contact::first();
        return view('public.about', compact('about', 'contact'));
    }

    public function leaders(Request $request)
    {
        $this->logVisitor($request, '/pengurus');
        $leaders = Leader::where('status', true)->orderBy('group')->orderBy('order_number')->get();
        $contact = Contact::first();
        return view('public.leaders', compact('leaders', 'contact'));
    }

    public function members(Request $request)
    {
        $this->logVisitor($request, '/anggota');
        $query = Member::query();

        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $members = $query->paginate(12);
        $contact = Contact::first();
        return view('public.members', compact('members', 'contact'));
    }

    public function activities(Request $request)
    {
        $this->logVisitor($request, '/kegiatan');
        $query = Activity::where('status', true)->with('category');

        if ($request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        if ($request->year) {
            $query->whereYear('activity_date', $request->year);
        }

        $activities = $query->latest('activity_date')->paginate(9);
        $categories = Category::all();
        $years = Activity::selectRaw('YEAR(activity_date) as year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $contact = Contact::first();
        return view('public.activities', compact('activities', 'categories', 'years', 'contact'));
    }

    public function activityDetail(Request $request, $slug)
    {
        $this->logVisitor($request, '/kegiatan/'.$slug);
        $activity = Activity::where('slug', $slug)->where('status', true)->with(['category', 'galleries'])->firstOrFail();
        $contact = Contact::first();
        return view('public.activity-detail', compact('activity', 'contact'));
    }

    public function gallery(Request $request)
    {
        $this->logVisitor($request, '/galeri');
        $galleries = Gallery::with('activity')->latest()->paginate(16);
        $contact = Contact::first();
        return view('public.gallery', compact('galleries', 'contact'));
    }

    public function contact(Request $request)
    {
        $this->logVisitor($request, '/kontak');
        $contact = Contact::first();
        return view('public.contact', compact('contact'));
    }
}
