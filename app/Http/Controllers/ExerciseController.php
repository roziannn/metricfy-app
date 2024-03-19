<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Exercise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\UserExerciseAnswer;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

        $available_questions = Exercise::whereHas('module', function ($query) use ($module) {
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
            'discussion' => 'required'
        ]);

        $module = Module::where('id', $id)->first();

        Exercise::create([
            'module_id' => $module->id,
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' => $validatedData['answer'],
            'discussion' => $validatedData['discussion'],
        ]);

        Alert::success('Berhasil!', 'Berhasil menambahkan soal.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $module = Module::where('slug', $slug)->firstOrFail();

        $exerciseModule = $module->exercises;

        // $userExerciseAnswers = UserExerciseAnswer::where('user_id', auth()->user()->id)
        // ->where('module_id', $module->id)
        // ->pluck('exercise_id');

        $user = Auth::user();

        //cek pertanyaannya dah pernah dijawab blm, trs betul or not
        $userAlreadyAnswer = UserExerciseAnswer::where('user_id', $user->id)->where('is_correct', true)->pluck('user_answer', 'exercise_id')->toArray();
        // dd($userAlreadyAnswer);


        $breadcrumbs = [
            'Materi' => route('materi'),
            $module->title => route('user.module.show', ['slug' => $module->slug]),
            'Latihan Soal' => ''
        ];

        return view('user.module.exerciseModule.show', compact('module', 'exerciseModule', 'breadcrumbs', 'userAlreadyAnswer'));
    }

    public function submitAnswer(Request $request, $slug, $exerciseId)
    {
        $request->validate([
            'answer' => [
                'required',
                Rule::in(['A', 'B', 'C', 'D', 'E']),
            ]
        ]);

        $userAnswer = strtoupper($request->input('answer'));

        $exercise = Exercise::findOrFail($exerciseId);

        $correctAnswer = strtoupper($exercise->answer);
        $isCorrect = ($userAnswer === $correctAnswer);

        $pointsEarn = 0;

        if ($isCorrect === true) {
            $pointsEarn = $exercise->point;
        } else {
            $exercise->point = 0;
        }

        UserExerciseAnswer::create([
            'user_id' => auth()->user()->id,
            'module_id' => $exercise->module_id,
            'exercise_id' => $exercise->id,
            'user_answer' => $userAnswer,
            'point' => $exercise->point,
            'is_correct' => $isCorrect,
        ]);

        $user = auth()->user();
        $user->point += $pointsEarn; //current point ditambah pointEarned
        $user->save();


        if ($isCorrect) {
            Alert::success('Jawaban kamu benar!', 'Kamu mendapatkan 3 poin 🪙');
        } else {

            Alert::error('Jawaban kamu salah!', 'Coba lagi');
        }


        return back();
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $moduleSlug, $exerciseId)
    {
        $module = Module::where('slug', $moduleSlug)->firstOrFail();

        $question = $module->exercises()->where('id', $exerciseId)->firstOrFail();

        $rules = ([
            'question' => 'required',
            'options' => 'required|array|min:1',
            'answer' => 'required|in:' . implode(',', range('A', 'E')),
            'discussion' => 'required'
        ]);

        $validatedData = $request->validate($rules);


        $question->update([
            'question' => $validatedData['question'],
            'options' => json_encode($validatedData['options']),
            'answer' => $validatedData['answer'],
            'discussion' => $validatedData['discussion'],
        ]);

        $question->save();

        Alert::success('Berhasil!', 'Berhasil mengubah soal.');

        return back();
    }

    public function delete($moduleSlug, $exerciseId)
    {

        $module = Module::where('slug', $moduleSlug)->firstOrFail();

        $question = $module->exercises()->where('id', $exerciseId)->firstOrFail();
        $question->delete();

        Alert::success('Berhasil!', 'Berhasil menghapus soal.');

        return back();
    }
}
