<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSectionSetting;
use Illuminate\Http\Request;

class PortfolioSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolioSetting = PortfolioSectionSetting::first();
        return view('admin.portfolio-setting.index', compact('portfolioSetting'));
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
            'title' => 'required|string|max:200',
            'sub_title' => 'required|string|max:500',
        ]);

        PortfolioSectionSetting::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
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
