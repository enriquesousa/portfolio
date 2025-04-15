<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\PortfolioItem;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // flash()->success('Panel de Control!');

        $totalBlogs = Blog::count();
        $totalSkills = SkillItem::count();
        $totalPorfolio = PortfolioItem::count();
        $totalFeedback = Feedback::count();
        return view('admin.dashboard', compact('totalBlogs', 'totalSkills', 'totalPorfolio', 'totalFeedback'));
    }

    
}
