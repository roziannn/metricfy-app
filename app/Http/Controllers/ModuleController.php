<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Submodule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_module = Module::all();

        return view('user.module.index', compact('data_module'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard-admin.dataModule.create');
    }

    public function createSubModule($slug){

        $data_module = Module::where('slug', $slug)->first();

        return view('admin.dashboard-admin.dataModule.SubModule.create', compact('data_module'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Module::create($request->all());

        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan data!');

        return redirect('/dashboard-admin/data-module');
    }

    //belum di test??
    public function storeSubModule(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|string|max:120',
            'content' => 'required|max:255',
        ]);
        $module = Module::where('id', $id)->first();

        Submodule::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'content' => $validatedData['content'],
            'module_id' => $module->id,
        ]);


        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function showUser($slug)
    {
        $show_module = Module::where('slug', $slug)->first();

        return view('user.module.show', compact('show_module'));
    }

    public function showAdmin($slug)
    {
        $module = Module::where('slug', $slug)->first();

        //we dont need o recall subModules, karena di model Module sudah ada hasMany submodules 

        return view('admin.dashboard-admin.dataModule.show', compact('module'));
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
    public function update(Request $request, $id)
    {
        $rules = ([
            'title' => 'required|max:30',
            'description' => 'required|max:255',
            'content' => 'required|max:500',
        ]);


        $validatedData = $request->validate($rules);

        $module = Module::find($id);
        $module->update($validatedData);

        return redirect('/dashboard-admin/data-module')->with('successUpdate', 'Module berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
