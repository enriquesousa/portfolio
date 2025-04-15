<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalSetting = GeneralSetting::first();
        return view('admin.setting.general-setting.index', compact('generalSetting'));
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
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:300',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:300',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:300',
        ]);

        $setting = GeneralSetting::first();

        $logo = handleUpload('logo', $setting);
        $favicon = handleUpload('favicon', $setting);
        $footer_logo = handleUpload('footer_logo', $setting);

        $generalSetting = GeneralSetting::firstOrNew();
        $generalSetting->logo = (!empty($logo)) ? $logo : @$generalSetting->logo;
        $generalSetting->favicon = (!empty($favicon)) ? $favicon : @$generalSetting->favicon;
        $generalSetting->footer_logo = (!empty($footer_logo)) ? $footer_logo : @$generalSetting->footer_logo;
        $generalSetting->save();

        flash()->success(__('Configuración actualizada correctamente.'));
        return redirect()->route('admin.general-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
