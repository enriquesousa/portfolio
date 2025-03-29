<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-category.index');
        // return view('admin.portfolio-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = str()->slug($request->name);
        $category->save();

        return redirect()->route('admin.category.index')->with('success', __('Categoría creada con éxito'));
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
        $category = Category::findOrFail($id);
        return view('admin.portfolio-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:200',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = str()->slug($request->name);
        $category->save();

        flash()->success('Categoría actualizada correctamente.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id); // No podemos hacer DD aquí porque estamos haciendo una petición AJAX

        try{

            $category = Category::findOrFail($id);

            $hasItems = PortfolioItem::where('category_id', $category->id)->count();
            // return $hasItems;

            if($hasItems == 0){
                $category->delete();
                return response(['status' => 'success', 'titulo' => __('Categoría Eliminada'), 'message' => __('Deleted successfully!')]);
            }

            return response(['status' => 'error', 'titulo' => __('No se puede eliminar!'), 'message' => __('Esta categoría esta asociada a un articulo del portafolio!')]);

        }catch(\Exception $e){
            // return response(['status' => 'error', 'message' => $e->getMessage()]);
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }

}
