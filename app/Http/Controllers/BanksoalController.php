<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Blog;
use App\Models\Module;
use App\Models\Banksoal;
use Illuminate\Http\Request;
use App\Models\BanksoalQuestion;
use App\Models\UserExamBanksoal;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function delete($slug)
    {

        $banksoal = Banksoal::where('slug', $slug)->firstOrFail();
        $banksoal->delete();

        return redirect('/dashboard-admin/data-banksoal')->with('successDelete', 'Berhasil menghapus data!');;
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
        $user = Auth::user();

        //ambil jawaban terakhir dari user
        $latestExam = UserExamBanksoal::where('user_id', $user->id)->where('banksoal_id', $banksoal->id)
            ->first();

        //cek benar salah riwayat pengerjaan terakhir
        if ($latestExam) {
            $response_data = json_decode($latestExam->response_data, true);

            $benarCount = 0;
            $salahCount = 0;

            // foreach ($response_data as $questionId => $response) {
            //     //hitung based on jawaban yang benar
            //     // dd($response['answer']);
            //     $isCorrect = ($response['answer'] === $banksoal->banksoalQuestions->find($questionId)->answer);
            //     if ($isCorrect) {
            //         $benarCount++;
            //     } else {
            //         $salahCount++;
            //     }
            // }

            foreach ($response_data as $questionId => $response) {
                $question = $banksoal->banksoalQuestions->find($questionId);
                if ($question) {
                    $isCorrect = ($response['answer'] === $question->answer);
                    if ($isCorrect) {
                        $benarCount++;
                    } else {
                        $salahCount++;
                    }
                }
            }


            //add ke latestExam buat di blade
            $latestExam->benarCount = $benarCount;
            $latestExam->salahCount = $salahCount;
            $latestExam->nilai = $benarCount * 10;

            //info nilai
            $totalSoal = count($response_data);
            $rataRata = ($benarCount / $totalSoal) * 100;

            $latestExam->totalSoal = $totalSoal * 10;

            $evaluasiExam = '';

            if ($rataRata <= 70) {
                $evaluasiExam =  "Nilaimu berada di bawah rata-rata. Kamu dapat mencoba kembali dan memperbaiki hasil latihanmu! 💪";
            } else {
                $evaluasiExam =  "Nilaimu berada di atas rata-rata. Kerja yang bagus! 😍";
            }

            $latestExam->evaluasiExam = $evaluasiExam;
        }

        $breadcrumbs = [
            'Banksoal' => route('banksoal'),
            $banksoal->title => ''
        ];

        return view('user.banksoal.show', compact('banksoal', 'topic', 'breadcrumbs', 'latestExam'));
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

    public function update(Request $request, $id)
    {
        $banksoal = Banksoal::find($id);

        $rules = ([
            'title' => 'required|max:30',
            'estimated_duration' => 'required',
            'level' => 'required',
            'topic' => 'required',
            'desc' => 'required'

        ]);

        $validatedData = $request->validate($rules);


        $banksoal->update([
            'title' => $validatedData['title'],
            'estimated_duration' => $validatedData['estimated_duration'],
            'level' => $validatedData['level'],
            'topic' => $validatedData['topic'],
            'desc' => $validatedData['desc'],
        ]);

        $banksoal->save();

        $request->accepts('session');
        session()->flash('successUpdate', 'Berhasil mengubah data banksoal!');

        return redirect('/dashboard-admin/data-banksoal');
    }


    public function submitExam(Request $request, $id)
    {
        $user = auth()->user();
        $banksoal = Banksoal::where('id', $id)->first();
        $slug = $banksoal->slug;
        $questions = $banksoal->banksoalQuestions;

        $answers = $request->input('answers');

        $timed = $request->input('timed');

        $totalScore = 0;

        foreach ($questions as $question) {
            $correctJawaban = $question->answer;
            $point = $question->point;

            $userAnswer = $answers[$question->id]['answer']  ?? null;
            $isCorrect = ($userAnswer === $correctJawaban);

            $answers[$question->id]['isCorrect'] = $isCorrect;

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


        //tambah point yg terakhir didapat
        $user->point += $totalScore;
        $user->save();

        if ($totalScore <= 70) {
            Alert::warning("😥", "Nilaimu masih dibawah rata-rata :( Kamu bisa coba kerjakan ulang");
        } else {
            Alert::success("Hore!😁", "Nilaimu diatas rata-rata! :)");
        }

        return redirect('banksoal/' . $slug);
    }


    public function destroy(string $id)
    {
        //
    }
}
