<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('admin.privacy-policy.index', compact('privacyPolicy'));
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
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required',
            'content_en' => 'nullable',
        ]);

        $item = PrivacyPolicy::firstOrNew();
        $item->content = $request->content;
        $item->content_en = $request->content_en;
        $item->save();

        flash()->success(__('Actualizado correctamente!'));
        return redirect()->route('admin.privacy-policy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
