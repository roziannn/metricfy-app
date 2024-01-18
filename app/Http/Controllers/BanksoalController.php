<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Module;
use App\Models\Banksoal;
use App\Models\BanksoalQuestion;
use App\Models\UserExamBanksoal;
use Illuminate\Http\Request;

class BanksoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //-USER
    {
        $banksoal = Banksoal::all();


        return view('user.banksoal.index', compact('banksoal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //-ADMIN
    {

        $topic = Module::all();

        return view('admin.dashboard-admin.dataBanksoal.create', compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Banksoal::create($request->all());

        $request->accepts('session');
        session()->flash('successStore', 'Berhasil menambahkan data!');

        return redirect('/dashboard-admin/data-banksoal');
    }

    /**
     * Display the specified resource.
     */
    public function showAdmin($slug)
    {
        $banksoal = Banksoal::where('slug', $slug)->first();
        $topic = Module::all();

        return view('admin.dashboard-admin.dataBanksoal.show', compact('banksoal', 'topic'));
    }

    public function showUser($slug)
    {
        $banksoal = Banksoal::where('slug', $slug)->first();

        $topic = Module::all();

        $breadcrumbs = [
            'Banksoal' => route('banksoal'),
            $banksoal->title => ''
        ];

        return view('user.banksoal.show', compact('banksoal', 'topic', 'breadcrumbs'));
    }

    public function exercise($slug)
    {
        $banksoal = Banksoal::where('slug', $slug)->first();
        $estimatedDuration = $banksoal->estimated_duration;


        $breadcrumbs = [
            'Banksoal' => route('banksoal'),
            $banksoal->title => route('user.banksoal.show', ['slug' => $banksoal->slug]),
            'Pengerjaan' => ''
        ];

        return view('user.banksoal.exercise', compact('banksoal', 'estimatedDuration', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    public function submitExam(Request $request, $id)
    {
        $user = auth()->user();
        $banksoal = Banksoal::where('id', $id)->first();
        $questions = $banksoal->banksoalQuestions;

        $answers = $request->input('answers');
        $timed = $request->input('timed');

        $totalScore = 0;

        foreach ($questions as $question) {
            $correctJawaban = $question->answer;
            $point = $question->point;

            $userAnswer = $answers[$question->id]['answer']  ?? null;
            $isCorrect = ($userAnswer === $correctJawaban);

            if ($isCorrect) {
                $totalScore += $point;
            }
        }


        UserExamBanksoal::updateOrCreate(
            ['banksoal_id' => $banksoal->id, 'user_id' => $user->id],
            [
                'response_data' => is_array($answers) ? json_encode($answers) : $answers,
                'timed' => $timed, 'pointGet' => $totalScore
            ]
        );
        return response()->json(['message' => 'Jawaban berhasil disimpan'], 200);
    }


    public function destroy(string $id)
    {
        //
    }
}
