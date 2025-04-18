<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use Illuminate\Http\Request;

class FooterUsefulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-useful-link.index');
        // return view('admin.footer-useful-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-useful-link.create');
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

        $footerUsefulLink = new FooterUsefulLink();
        $footerUsefulLink->url = $request->url;
        $footerUsefulLink->name = $request->name;
        $footerUsefulLink->status = $request->status;
        $footerUsefulLink->save();
 
        flash()->success(__('Creado correctamente!'));
        return redirect()->route('admin.footer-useful-links.index');
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
        $footerUsefulLink = FooterUsefulLink::findOrFail($id);
        return view('admin.footer-useful-link.edit', compact('footerUsefulLink'));
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

        $footerUsefulLink = FooterUsefulLink::findOrFail($id);
        $footerUsefulLink->url = $request->url;
        $footerUsefulLink->name = $request->name;
        $footerUsefulLink->status = $request->status;
        $footerUsefulLink->save();
 
        flash()->success(__('Actualizado correctamente!'));
        return redirect()->route('admin.footer-useful-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $item = FooterUsefulLink::findOrFail($id);
            $item->delete();
            return response(['status' => 'success', 'message' => __('Registro eliminado correctamente!')]);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
