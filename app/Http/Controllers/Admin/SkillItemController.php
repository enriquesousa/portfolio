<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkillItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class SkillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skill-item.index');
        // return view('admin.skill-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill-item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'percent' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $skill = new SkillItem();
        $skill->name = $request->name;
        $skill->percent = (int)$request->percent;
        $skill->save();

        flash(__('Habilidad creada correctamente!'));
        return redirect()->route('admin.skill-item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skillItem = SkillItem::findOrFail($id);
        return view('admin.skill-item.edit', compact('skillItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'percent' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $skill = SkillItem::findOrFail($id);
        $skill->name = $request->name;
        $skill->percent = (int)$request->percent;
        $skill->save();

        flash(__('Habilidad actualizada correctamente!'));
        return redirect()->route('admin.skill-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id); // No podemos hacer DD aquí porque estamos haciendo una petición AJAX
        try{

            $portfolioItem = SkillItem::find($id);
            $portfolioItem->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully!')]);

        }catch(\Exception $e){
            // return response(['status' => 'error', 'message' => $e->getMessage()]);
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
