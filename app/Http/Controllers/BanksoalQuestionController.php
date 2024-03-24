<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use Illuminate\Http\Request;
use App\Models\BanksoalQuestion;
use RealRashid\SweetAlert\Facades\Alert;

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
            'answer' => 'required|array|in:' . implode(',', range('A', 'E')),
            'discussion' => 'required'
        ]);

        $banksoal = Banksoal::where('id', $id)->first();

        BanksoalQuestion::create([
            'banksoal_id' => $banksoal->id,
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' =>  json_encode($validatedData['answer']),
            'discussion' => $validatedData['discussion']
        ]);

        Alert::success('Berhasil', 'Berhasil menambahkan soal!');

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
    public function update(Request $request, $banksoalId, $questionId)
    {
        $banksoal = Banksoal::where('id', $banksoalId)->firstOrFail();
        $question = $banksoal->banksoalQuestions()->where('id', $questionId)->firstOrFail();

        $rules = ([
            'question' => 'required',
            'options' => 'required|array|min:1',
            'answer' => 'required|array|in:' . implode(',', range('A', 'E')),
            'discussion' => 'required',
        ]);

        $validatedData = $request->validate($rules);


        $question->update([
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' =>  json_encode($validatedData['answer']),
            'discussion' => $validatedData['discussion'],
        ]);


        $question->save();

        Alert::success('Berhasil', 'Berhasil mengubah data soal!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $question = BanksoalQuestion::find($id);
        $question->delete();

        Alert::success('Berhasil', 'Berhasil menghapus soal!');
        return back();
    }
}
