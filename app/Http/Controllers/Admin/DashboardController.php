<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Gallery;
use App\Models\Leader;
use App\Models\Member;
use App\Models\VisitorLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'leaders' => Leader::where('status', true)->count(),
            'members' => Member::count(),
            'activities' => Activity::count(),
            'galleries' => Gallery::count(),
            'visitors' => VisitorLog::count(),
            'visitors_today' => VisitorLog::whereDate('created_at', today())->count(),
        ];

        $visitor_chart = VisitorLog::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact('stats', 'visitor_chart'));
    }
}
