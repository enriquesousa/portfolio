<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::first();
        return view('admin.experience.index', compact('experience'));
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
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:5000',
            'description_en' => 'nullable|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:255',
        ]);

        $experience = Experience::find($id);
        $imagePath = handleUpload('image', $experience);

        Experience::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => (!empty($imagePath) ? $imagePath : $experience->image),
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
}
