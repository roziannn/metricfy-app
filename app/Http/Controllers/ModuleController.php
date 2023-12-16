<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Submodule;
use Illuminate\Support\Str;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_module = Module::orderBy('created_at', 'asc')->get();

        return view('user.module.index', compact('data_module'));
    }

    public function create()
    {
        return view('admin.dashboard-admin.dataModule.create');
    }

    public function createSubModule($slug)
    {

        $data_module = Module::where('slug', $slug)->first();

        return view('admin.dashboard-admin.dataModule.SubModule.create', compact('data_module'));
    }

    public function store(Request $request)
    {
        Module::create($request->all());

        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan data!');

        return redirect('/dashboard-admin/data-module');
    }

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

    public function editSubModule($moduleSlug, $submoduleSlug)
    {
        $module = Module::where('slug', $moduleSlug)->firstOrFail();

        $submodule = $module->submodules()->where('slug', $submoduleSlug)->firstOrFail();

        return view('admin.dashboard-admin.dataModule.SubModule.edit', compact('module', 'submodule'));
    }

    public function updateSubModule(Request $request, $slug)
    {
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
        $show_module = Module::where('slug', $slug)
            ->with(['submodules' => function ($query) {
                $query->orderBy('id', 'asc');
            }])->first();

        //count total subMateri
        if ($show_module) {
            $totalCurrentSub = $show_module->submodules->count();
        } else {
            $totalCurrentSub = 0; 
        }


        // get user progress by current modul 
        $userProgress = UserProgress::where([
            'user_id' => auth()->user()->id,
            'module_id' => $show_module->id,
        ])->orderBy('submodule_id', 'asc')->pluck('submodule_id')->toArray();

        

        // Menentukan status kunci untuk setiap submodul
        $submodules = $show_module->submodules;

        foreach ($submodules as $key => $submodule) {
            if ($key === 0) {
                $submodule->locked = false;
                continue;
            }

            $prevSubmodule = $submodules[$key - 1];
            $submodule->locked = !in_array($submodule->id, $userProgress) && !in_array($prevSubmodule->id, $userProgress);
        }

        return view('user.module.show', compact('show_module', 'totalCurrentSub', 'userProgress'));
    }


    //show masuk ke subModule untuk user
    public function subModuleShowUser($moduleSlug, $submoduleSlug)
    {
        $user = auth()->user();

        $module = Module::where('slug', $moduleSlug)
            ->with(['submodules' => function ($query) {
                $query->orderBy('id', 'asc');
            }])->first();

        $submodule = $module->submodules()->where('slug', $submoduleSlug)->firstOrFail();

        $userProgress = UserProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'submodule_id' => $submodule->id,
                'module_id' => $module->id,
            ]
        );

        $userProgressList = UserProgress::where([
            'user_id' => $user->id,
            'module_id' => $module->id,
        ])->orderBy('submodule_id', 'asc')->pluck('submodule_id')->toArray();

        // Filter playlist based on user progress
        $playlist = $module->submodules;

        foreach ($playlist as $key => $playlistItem) {
            if ($key === 1) {
                $playlistItem->locked = false;
            } else {
                $playlistItem->locked = !in_array($playlistItem->id, $userProgressList) && !in_array($playlist[$key - 1]->id, $userProgressList);
            }
        }

        $exerciseModule = $module->exercises;

        $breadcrumbs = [
            'Materi' => route('materi'),
            $module->title => route('user.module.show', ['slug' => $module->slug]),
            $submodule->title => ''
        ];

        return view('user.module.subModule.index', compact('module', 'submodule', 'breadcrumbs', 'playlist', 'exerciseModule', 'userProgressList'));
    }

    public function showAdmin($slug)
    {
        $module = Module::where('slug', $slug)->first();


        return view('admin.dashboard-admin.dataModule.show', compact('module'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $module = Module::find($id);

        $rules = ([
            'title' => 'required|max:30',
            'description' => 'required|max:255',
            'content' => 'required|max:500',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validatedData = $request->validate($rules);


        $module->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $module->slug . '-' . time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('img/module'), $thumbnailName);

            $oldImagePath = public_path('img/module') . '/' . $module->thumbnail;
            if ($module->thumbnail && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $module->thumbnail = $thumbnailName;
            $module->save();
        }


        return redirect('/dashboard-admin/data-module')->with('successUpdate', 'Module berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        //
    }

}
