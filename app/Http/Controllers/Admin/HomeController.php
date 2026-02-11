<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Donation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_projects = DB::table('ongoing_project')->count();
        $total_donations = Donation::count();
        $total_members = DB::table('team_members')->count();
        $total_news = DB::table('latest_news')->count();
        
        $pending_donations_count = Donation::where('status', 'pending')->count();
        $recent_donations = Donation::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.home', compact(
            'total_projects', 
            'total_donations', 
            'total_members', 
            'total_news',
            'pending_donations_count',
            'recent_donations'
        ));
    }
}
