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

    public function createSubModule($slug)
    {

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
    public function storeSubModule(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:120',
            'content' => 'required|max:255',
            'video_embed' => 'nullable|string'
        ]);
        $module = Module::where('id', $id)->first();

        Submodule::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'content' => $validatedData['content'],
            'module_id' => $module->id,
            'video_embed' => $validatedData['video_embed'],
        ]);


        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan sub module!');

        return redirect()->route('admin.dashboard-admin.show', ['slug' => $module->slug]);
    }

    public function editSubModule($moduleSlug, $submoduleSlug){
        $module = Module::where('slug', $moduleSlug)->firstOrFail();

        $submodule = $module->submodules()->where('slug', $submoduleSlug)->firstOrFail();

        return view('admin.dashboard-admin.dataModule.SubModule.edit', compact('module','submodule'));
    }

    public function updateSubModule(Request $request, $slug){
        $rules = ([
            'title' => 'required',
            'content' => 'required|max:500',
            'video_embed' => 'required',
        ]);

        $validatedData = $request->validate($rules);
        
        $submodule = Submodule::where('slug', $slug)->first();
        $submodule->update($validatedData);
        
        $updatedSlug = $submodule->fresh()->slug;
        $newUrl = url("/dashboard-admin/data-module/{$submodule->module->slug}/{$updatedSlug}/edit");

        return redirect($newUrl)->with('successUpdate', 'Submodule berhasil di update!');
    }

    // show page all module/index untuk user
    public function showUser($slug)
    {
        $show_module = Module::where('slug', $slug)->first();

        return view('user.module.show', compact('show_module'));
    }

    //show masuk ke subModule untuk user
    public function subModuleShowUser($moduleSlug, $submoduleSlug)
    {

        $module = Module::where('slug', $moduleSlug)->firstOrFail();

        $submodule = $module->submodules()->where('slug', $submoduleSlug)->firstOrFail();

        $breadcrumbs = [
            'Materi' => route('materi'),
            $module->title => route('user.module.show', ['slug' => $module->slug]),
            $submodule->title => ''
        ];


        return view('user.module.subModule.index', compact('module', 'submodule', 'breadcrumbs'));
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
