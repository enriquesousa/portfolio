<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLink;
use Illuminate\Http\Request;

class FooterHelpLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-help-link.index');
        // return view('admin.footer-help-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-help-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'url' => ['required', 'url'],
            'name' => ['required', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
        ]);

        $footerHelpLink = new FooterHelpLink();
        $footerHelpLink->url = $request->url;
        $footerHelpLink->name = $request->name;
        $footerHelpLink->status = $request->status;
        $footerHelpLink->save();
 
        flash()->success(__('Creado correctamente!'));
        return redirect()->route('admin.footer-help-links.index');
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
        $footerHelpLink = FooterHelpLink::findOrFail($id);
        return view('admin.footer-help-link.edit', compact('footerHelpLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'url' => ['required', 'url'],
            'name' => ['required', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
        ]);

        $footerHelpLink = FooterHelpLink::findOrFail($id);
        $footerHelpLink->url = $request->url;
        $footerHelpLink->name = $request->name;
        $footerHelpLink->status = $request->status;
        $footerHelpLink->save();
 
        flash()->success(__('Actualizado correctamente!'));
        return redirect()->route('admin.footer-help-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $item = FooterHelpLink::findOrFail($id);
            $item->delete();
            return response(['status' => 'success', 'message' => __('Registro eliminado correctamente!')]);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
