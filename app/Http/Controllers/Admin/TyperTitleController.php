<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $dataTable)
    {
        return $dataTable->render('admin.typer-title.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.typer-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:200',
        ]);

        $typerTitle = new TyperTitle();
        $typerTitle->title = $request->title;
        $typerTitle->save();

        flash()->success('Título creado correctamente.');
        return redirect()->route('admin.typer-title.index');
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
        $typerTitle = TyperTitle::findOrFail($id);
        return view('admin.typer-title.edit', compact('typerTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:200',
        ]);

        $typerTitle = TyperTitle::findOrFail($id);
        $typerTitle->title = $request->title;
        $typerTitle->save();

        flash()->success('Título actualizado correctamente.');
        return redirect()->route('admin.typer-title.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        try{

            $typerTitle = TyperTitle::findOrFail($id);
            $typerTitle->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully!')]);

        }catch(\Exception $e){
            // return response(['status' => 'error', 'message' => $e->getMessage()]);
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
