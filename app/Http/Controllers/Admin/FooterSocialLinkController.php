<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;

class FooterSocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-social-link.index');
        // return view('admin.footer-social-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'icon' => 'required',
            'url' => ['required', 'url'],
            'tooltip' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
        ]);

        $footerSocialLink = new FooterSocialLink();
        $footerSocialLink->icon = $request->icon;
        $footerSocialLink->url = $request->url;
        $footerSocialLink->tooltip = $request->tooltip;
        $footerSocialLink->name = $request->name;
        $footerSocialLink->status = $request->status;
        $footerSocialLink->save();

        flash()->success(__('Creado correctamente!'));
        return redirect()->route('admin.footer-social.index');
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
        $social = FooterSocialLink::findOrFail($id);
        return view('admin.footer-social-link.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'icon' => 'required',
            'url' => ['required', 'url'],
            'tooltip' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
        ]);

        $footerSocialLink = FooterSocialLink::findOrFail($id);
        $footerSocialLink->icon = $request->icon;
        $footerSocialLink->url = $request->url;
        $footerSocialLink->tooltip = $request->tooltip;
        $footerSocialLink->name = $request->name;
        $footerSocialLink->status = $request->status;
        $footerSocialLink->save();

        flash()->success(__('Actualizado correctamente!'));
        return redirect()->route('admin.footer-social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $item = FooterSocialLink::findOrFail($id);
            $item->delete();
            return response(['status' => 'success', 'message' => __('Registro eliminado correctamente!')]);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
