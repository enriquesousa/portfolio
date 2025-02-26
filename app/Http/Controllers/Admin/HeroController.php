<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    use FileUpload;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'sub_title' => ['required', 'string', 'max:500'],
            'image' => ['max:1024', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $this->deleteFile(Hero::find($id)->image);
            $imagePath = $this->uploadFile($request->file('image'), 'uploads', 'hero');
        }else{
            $imagePath = Hero::find($id)->image; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        }

        Hero::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'btn_text' => $request->btn_text,
            'btn_url' => $request->btn_url, 
            'image' => isset($imagePath) ? $imagePath : '',
        ]);

        flash()->success('Sección actualizada correctamente.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
