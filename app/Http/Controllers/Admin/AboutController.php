<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
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
            'description' => ['required', 'string', 'max:7000'],
            'description_en' => ['nullable', 'string', 'max:7000'],
            'image' => ['max:1024', 'image'],
            // 'resume' => ['mimes:pdf,csv,doc,docx', 'max:2000'],
        ]);

        $about = About::first();
        
        // if ($request->hasFile('image')) {
        //     $this->deleteFile(About::find($id)->image);
        //     $imagePath = $this->uploadFile($request->file('image'), 'uploads', 'about');
        // }else{
        //     $imagePath = About::find($id)->image; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
        // }

        $imagePath = handleUpload('image', $about);

        if($request->submit == 'Eliminar') {
            $this->deleteFile(About::find($id)->resume);
            $resumePath = null;
        }else{
            if ($request->hasFile('resume')) {
                $this->deleteFile(About::find($id)->resume);
                $resumePath = $this->uploadFile($request->file('resume'), 'uploads', 'resume');
            }else{
                $resumePath = About::find($id)->resume; // Si no se sube una nueva imagen, se mantiene la imagen anterior.
            }
        }

        About::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image' => (!empty($imagePath) ? $imagePath : $about->image),
            // 'resume' => $resumePath
        ]);

        flash()->success(__('Sección actualizada correctamente.'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadResume()
    {
        $about = About::first();
        return response()->download(public_path($about->resume));
    }
}
