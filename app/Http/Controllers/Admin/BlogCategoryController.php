<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog-category.index');
        // return view('admin.blog-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'status' => ['required', 'boolean'],
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = str()->slug($request->name);
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.blog-category.index')->with('success', __('Categoría creada con éxito'));
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
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog-category.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:200',
            'status' => 'required|boolean',
        ]);

        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = str()->slug($request->name);
        $category->status = $request->status;
        $category->save();

        flash()->success(__('Categoría actualizada correctamente.'));
        return redirect()->route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id); // No podemos hacer DD aquí porque estamos haciendo una petición AJAX

        try{

            $blogCategory = BlogCategory::findOrFail($id);
            // $blogCategory->delete();


            $hasItems = Blog::where('category', $blogCategory->id)->count();
            // return $hasItems;

            if($hasItems == 0){
                $blogCategory->delete();
                return response(['status' => 'success', 'titulo' => __('Categoría Eliminada'), 'message' => __('Deleted successfully!')]);
            }

            return response(['status' => 'error', 'titulo' => __('No se puede eliminar!'), 'message' => __('Esta categoría esta asociada a un articulo del blog!')]);
            
        }catch(\Exception $e){
            // return response(['status' => 'error', 'message' => $e->getMessage()]);
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }

    }
}
