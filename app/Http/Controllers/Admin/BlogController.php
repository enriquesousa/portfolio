<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use FileUpload;
    
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
        // return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => ['required', 'image', 'max:500'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'category' => ['required', 'numeric'],
            'status' => ['required', 'boolean'],
        ]); 

        // $imagePath = handleUpload('image'); // otra manera de hacerlo
        $imagePath = $this->uploadFile($request->file('image'), 'uploads', 'blog');

        $portfolioItem = new Blog();
        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category = (int)$request->category;
        $portfolioItem->status = $request->status;
        $portfolioItem->save();

        flash()->success( __('Blog creado correctamente!') );
        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $blogItem = Blog::find($id);

        $request->validate([
            'image' => ['image', 'max:100'],
            'foto1' => ['nullable', 'max:100'],
            'foto2' => ['nullable', 'max:100'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'category' => ['required', 'numeric'],
            'status' => ['required', 'boolean'],
        ]); 

        $blog = Blog::findOrFail($id);
        $imagePath = handleUpload('image', $blog); 

        if ($request->hasFile('foto1')) {
            $this->deleteFile($blogItem->foto1);
            $imagePathFoto1 = $this->uploadFile($request->file('foto1'), 'uploads', 'blog');
        }else{
            $imagePathFoto1 = $blogItem->foto1; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        }

        if ($request->hasFile('foto2')) {
            $this->deleteFile($blogItem->foto2);
            $imagePathFoto2 = $this->uploadFile($request->file('foto2'), 'uploads', 'blog');
        }else{
            $imagePathFoto2 = $blogItem->foto2; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        }

        $blog->image = (!empty($imagePath)) ? $imagePath : $blog->image;
        $blog->foto1 = $imagePathFoto1;
        $blog->foto2 = $imagePathFoto2;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = (int)$request->category;
        $blog->status = $request->status;
        $blog->save();

        flash()->success( __('Blog actualizado correctamente!') );
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id); // No podemos hacer DD aquí porque estamos haciendo una petición AJAX
        try{

            $item = Blog::find($id);
            deleteFileIfExists($item->image);
            $item->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully!')]);

        }catch(\Exception $e){
            // return response(['status' => 'error', 'message' => $e->getMessage()]);
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
