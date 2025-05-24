<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TimeZoneDataTable;
use App\Http\Controllers\Controller;
use App\Models\TimeZone;
use Illuminate\Http\Request;

class TimeZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TimeZoneDataTable $dataTable)
    {
        return $dataTable->render('admin.timezone.index');
        // return view('admin.timezone.index');
    }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.timezone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:time_zones,name'],
        ]);

        $item = new TimeZone();
        $item->name = $request->name;
        $item->save();

        flash(__('Zona horaria creada correctamente!'));
        return redirect()->route('admin.time-zone.index');
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
        $timezone = TimeZone::findOrFail($id);
        return view('admin.timezone.edit', compact('timezone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:time_zones,name,'.$id],
        ]);

        $item = TimeZone::findOrFail($id);
        $item->name = $request->name;
        $item->save();

        flash(__('Zona horaria actualizada correctamente!'));
        return redirect()->route('admin.time-zone.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
