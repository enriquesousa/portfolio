<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PortfolioItemController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
        // return view('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric'],
            'client' => ['nullable','max:200'],
            'website' => ['url']
        ]); 

        // $imagePath = handleUpload('image'); // otra manera de hacerlo
        $imagePath = $this->uploadFile($request->file('image'), 'uploads', 'portfolio');

        $portfolioItem = new PortfolioItem();
        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        // Convert category_id to integer
        $portfolioItem->category_id = (int)$request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        flash()->success( __('Sección actualizada correctamente.') );
        return redirect()->route('admin.portfolio-item.index');
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
        // dd($id);
        $portfolioItem = PortfolioItem::find($id);
        $categories = Category::all();
        return view('admin.portfolio-item.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request->all());

        $portfolioItem = PortfolioItem::find($id);

        $request->validate([
            'image' => ['nullable', 'max:3000'],
            'foto1' => ['nullable', 'max:3000'],
            'foto2' => ['nullable', 'max:3000'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'description_en' => ['nullable'],
            'category_id' => ['required', 'numeric'],
            'client' => ['nullable','max:200'],
            'website' => ['url']
        ]);

        if ($request->hasFile('image')) {
            $this->deleteFile($portfolioItem->image);
            $imagePath = $this->uploadFile($request->file('image'), 'uploads', 'portfolio');
        }else{
            $imagePath = $portfolioItem->image; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        }

        if ($request->hasFile('foto1')) {
            $this->deleteFile($portfolioItem->foto1);
            $imagePathFoto1 = $this->uploadFile($request->file('foto1'), 'uploads', 'portfolio');
        }else{
            $imagePathFoto1 = $portfolioItem->foto1; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        }

        if ($request->hasFile('foto2')) {
            $this->deleteFile($portfolioItem->foto2);
            $imagePathFoto2 = $this->uploadFile($request->file('foto2'), 'uploads', 'portfolio');
        }else{
            $imagePathFoto2 = $portfolioItem->foto2; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        }

        // dd($imagePath, $imagePathFoto1, $imagePathFoto2);

        $portfolioItem->update([

            'image' => isset($imagePath) ? $imagePath : $portfolioItem->image,
            'foto1' => $imagePathFoto1,
            'foto2' => $imagePathFoto2,

            'title' => $request->title,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'category_id' => (int)$request->category_id,
            'client' => $request->client,
            'website' => $request->website
        ]);

        flash()->success( __('Actualizado correctamente!') );
        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id); // No podemos hacer DD aquí porque estamos haciendo una petición AJAX
        try{

            $portfolioItem = PortfolioItem::find($id);
            deleteFileIfExists($portfolioItem->image);
            $portfolioItem->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully!')]);

        }catch(\Exception $e){
            // return response(['status' => 'error', 'message' => $e->getMessage()]);
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
