<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSectionSetting;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skill = SkillSectionSetting::first();
        $skillItems = SkillItem::all();
        $experience = Experience::first();
        $feedbackTestimonials = Feedback::all();
        $feedbackTitleTestimonial = FeedbackSectionSetting::first();
        $blogs = Blog::latest()->where('status', 1)->take(5)->get();
        $blogsTitle = BlogSectionSetting::first();
        return view('frontend.home', compact('hero', 'typerTitles', 'services', 'about', 'portfolioTitle', 'portfolioCategories', 'portfolioItems', 'skill', 'skillItems', 'experience', 'feedbackTestimonials', 'feedbackTitleTestimonial', 'blogs', 'blogsTitle'));
    }

    public function showPortfolio($id){
        $portfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function showBlog($id){
        $blog = Blog::findOrFail($id);

        $previousPost = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        // if previousPost is the first post, previousPost will be last post
        // if (empty($previousPost)) {
        //     $previousPost = Blog::latest()->first();
        // }

        $nextPost = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        // if nextPost is the last post, nextPost will be first post
        // if (empty($nextPost)) {
        //     $nextPost = Blog::first();
        // }

        return view('frontend.blog-details', compact('blog', 'previousPost', 'nextPost'));
    }

    public function showBlogImage($image){
        $blogImage = $image;
        return view('frontend.blog-show-image', compact('blogImage'));
        // return response()->file(public_path('storage/blog/'.$image));
    }

    public function blogs(Request $request){

        $tieneBúsqueda = false;

        $blogs = Blog::with(['getCategory'])->where(['status' => 1]);

        // dd($request->has('category'));
        // if($request->has('category') && $request->filled('category')) {
        //     dd($request->category);
        // }

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
            $tieneBúsqueda = true;
        }

        if ($request->has('category') && $request->filled('category')) {
            $blogs->whereHas('getCategory', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
            // dd($blogs->get());
            $tieneBúsqueda = true;
        }

        $blogs = $blogs->latest()->paginate(9);
        $categories = BlogCategory::where(['status' => 1])->get();
        
        return view('frontend.blog', compact('blogs', 'categories', 'tieneBúsqueda'));
    }

    public function contact(Request $request){
        // dd($request->all()); // Ver los resultados en la consola

        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:200'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:2000'],
        ]);
        
        Mail::send(new ContactMail($request->all()));
     
        return response(['status' => 'success', 'message' => __('Mensaje enviado correctamente!')]);
    }

}
