<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Exercise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */

     //BY ADMIN
    public function create($slug)
    {
        $module = Module::where('slug', $slug)->firstOrFail();

        $available_questions = Exercise::whereHas('module', function ($query) use ($module){
            $query->where('id', $module->id);
        })->get();

        return view('admin.dashboard-admin.dataModule.exerciseModule.create', compact('module', 'available_questions'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'options' => 'required|array|min:1',
            'answer' => 'required|in:' . implode(',', range('A', 'E')),
        ]);

        $module = Module::where('id', $id)->first();

        Exercise::create([
            'module_id' => $module->id,
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' => $validatedData['answer'],
        ]);

        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan latihan soal!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $module = Module::where('slug', $slug)->firstOrFail();
        
        $exerciseModule = $module->exercises;

        $breadcrumbs = [
            'Materi' => route('materi'),
            $module->title => route('user.module.show', ['slug' => $module->slug]),
            'Latihan Soal' => ''
        ];

        return view('user.module.exerciseModule.show', compact('module','exerciseModule', 'breadcrumbs'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $question = Exercise::find($id);
        $question->delete();

        return back()->with('successDelete', 'Berhasil menghapus data!');
    }
}
