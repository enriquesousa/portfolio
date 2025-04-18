<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\LogTime;
use App\Models\PortfolioItem;
use App\Models\SkillItem;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // flash()->success('Panel de Control!');
        $user = Auth::user();

        $totalBlogs = Blog::count();
        $totalSkills = SkillItem::count();
        $totalPorfolio = PortfolioItem::count();
        $totalFeedback = Feedback::count();
        $totalActivities =   Auth::check() ? LogTime::where('user_id', $user->id)->count() : 0;
        return view('admin.dashboard', compact('totalBlogs', 'totalSkills', 'totalPorfolio', 'totalFeedback', 'totalActivities'));
    }

    
}
