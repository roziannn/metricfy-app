<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\BanksoalQuestion;
use Illuminate\Http\Request;

class BanksoalQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $paket_soal = Banksoal::where('slug', $slug)->firstOrFail();

        $available_questions = BanksoalQuestion::whereHas('banksoal', function ($query) use ($paket_soal) {
            $query->where('id', $paket_soal->id);
        })->get();

        return view('admin.dashboard-admin.dataBanksoal.banksoalQuestions.create', compact('paket_soal', 'available_questions'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'options' => 'required|array|min:1',
            'answer' => 'required|in:' . implode(',', range('A', 'E')),
        ]);

        $banksoal = Banksoal::where('id', $id)->first();

        BanksoalQuestion::create([
            'banksoal_id' => $banksoal->id,
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' => $validatedData['answer'],
        ]);

        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan soal!');

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $question = BanksoalQuestion::find($id);

        $rules = ([
            'question' => 'required',
            'options' => 'required|array|min:1',
            'answer' => 'required|in:' . implode(',', range('A', 'E')),
        ]);

        $validatedData = $request->validate($rules);


        $question->update([
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' => $validatedData['answer'],
        ]);

        $question->save();

        $request->accepts('session');
        session()->flash('successUpdatePertanyaan', 'Berhasil mengubah data banksoal!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $question = BanksoalQuestion::find($id);
        $question->delete();

        return back()->with('successDelete', 'Berhasil menghapus soal!');
    }
}
