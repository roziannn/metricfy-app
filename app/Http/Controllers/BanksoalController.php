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


        Alert::success('Berhasil!', "Berhasil menambahkan data banksoal!");

        return redirect('/dashboard-admin/data-banksoal');
    }

    public function delete($slug)
    {

        $banksoal = Banksoal::where('slug', $slug)->firstOrFail();
        $banksoal->delete();

        Alert::success('Berhasil!', "Berhasil menghapus data banksoal!");

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
        $user = Auth::user();

        //ambil jawaban terakhir dari user
        $latestExam = UserExamBanksoal::where('user_id', $user->id)->where('banksoal_id', $banksoal->id)
            ->latest()->first();

        //cek benar salah riwayat pengerjaan terakhir
        if ($latestExam) {
            $response_data = json_decode($latestExam->response_data, true);

            $benarCount = 0;
            $salahCount = 0;

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
        $user_id = auth()->id();
        $banksoal = Banksoal::where('slug', $slug)->first();

        $estimatedDuration = $banksoal->estimated_duration;

        $breadcrumbs = [
            'Banksoal' => route('banksoal'),
            $banksoal->title => route('user.banksoal.show', ['slug' => $banksoal->slug]),
            'Mengerjakan' => ''
        ];


        return view('user.banksoal.exercise', compact('banksoal', 'estimatedDuration', 'breadcrumbs'));
    }

    public function showDiscussion($slug)
    {
        $user_id = auth()->id();
        $banksoal = Banksoal::where('slug', $slug)->first();


        $breadcrumbs = [
            'Banksoal' => route('banksoal'),
            $banksoal->title => route('user.banksoal.show', ['slug' => $banksoal->slug]),
            'Pembahasan' => ''
        ];

        $alreadyDoneByUser = UserExamBanksoal::where('user_id', $user_id)
            ->where('banksoal_id', $banksoal->id)
            ->latest()->first();

        return view('user.banksoal.showDiscussion', compact('banksoal', 'breadcrumbs', 'alreadyDoneByUser'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $slug)
    {
        $banksoal = Banksoal::where('slug', $slug)->first();

        $rules = ([
            'title' => 'string|max:100',
            'estimated_duration' => 'required',
            'level' => 'integer',
            'topic' => 'string',
            'desc' => 'string|max:255'

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

        Alert::success('Berhasil!', "Berhasil mengubah data banksoal!");

        return back();
    }

    // public function submitExam(Request $request, $id)
    // {
    //     $user = auth()->user();
    //     $banksoal = Banksoal::where('id', $id)->first();
    //     $slug = $banksoal->slug;
    //     $questions = $banksoal->banksoalQuestions;

    //     $answers = $request->input('answers');

    //     $timed = $request->input('timed');

    //     $totalScore = 0;

    //     foreach ($questions as $question) {
    //         $correctJawaban = $question->answer;
    //         $point = $question->point;

    //         $userAnswer = $answers[$question->id]['answer']  ?? null;
    //         $isCorrect = ($userAnswer === $correctJawaban);

    //         $answers[$question->id]['isCorrect'] = $isCorrect;

    //         if ($isCorrect) {
    //             $totalScore += $point;
    //         }
    //     }


    //     UserExamBanksoal::updateOrCreate(
    //         ['banksoal_id' => $banksoal->id, 'user_id' => $user->id],
    //         [
    //             'response_data' => is_array($answers) ? json_encode($answers) : $answers,
    //             'timed' => $timed, 'pointGet' => $totalScore
    //         ]
    //     );


    //     //tambah point yg terakhir didapat
    //     $user->point += $totalScore;
    //     $user->save();

    //     if ($totalScore <= 65) {
    //         Alert::warning("😥", "Nilaimu masih dibawah rata-rata :( Kamu bisa coba kerjakan ulang");
    //     } else {
    //         Alert::success("Hore!😁", "Nilaimu diatas rata-rata! :)");
    //     }

    //     return redirect('banksoal/' . $slug);
    // }
    public function submitExam(Request $request, $id)
    {
        $user = auth()->user();
        $banksoal = Banksoal::where('id', $id)->first();
        $slug = $banksoal->slug;
        $questions = $banksoal->banksoalQuestions;

        $answers = $request->input('answers');

        $timed = $request->input('timed');

        $totalScore = 0;

        // Cek apakah data ujian pengguna untuk bank soal ini sudah ada di database sebelumnya
        $userExam = UserExamBanksoal::where('banksoal_id', $banksoal->id)
            ->where('user_id', $user->id)
            ->first();

        if (!$userExam) {
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

            // Simpan data ujian pengguna
            UserExamBanksoal::create([
                'banksoal_id' => $banksoal->id,
                'user_id' => $user->id,
                'response_data' => is_array($answers) ? json_encode($answers) : $answers,
                'timed' => $timed,
                'pointGet' => $totalScore
            ]);

            // Tambahkan point yang didapat pengguna
            $user->point += $totalScore;
            $user->save();

            $totalQuestions = count($questions);
            $averageScore = $totalQuestions > 0 ? $totalScore / $totalQuestions : 0;

            // Tampilkan pesan sesuai dengan hasil ujian
            if ($totalScore <= $averageScore) {
                Alert::warning("😥", "Nilaimu masih dibawah rata-rata :( Kamu bisa coba kerjakan ulang");
            } else {
                Alert::success("Hore!😁", "Nilaimu diatas rata-rata! :)");
            }
        } else {
            foreach ($questions as $question) {
                $correctJawaban = $question->answer;
                $point = $question->point;

                $userAnswer = $answers[$question->id]['answer']  ?? null;
                $isCorrect = ($userAnswer === $correctJawaban);

                $answers[$question->id]['isCorrect'] = $isCorrect;
                if ($isCorrect) {
                    $totalScore += $point; //point tetap di hitung, tp tidak di parse ke database
                }
            }

            UserExamBanksoal::create([
                'banksoal_id' => $banksoal->id,
                'user_id' => $user->id,
                'response_data' => is_array($answers) ? json_encode($answers) : $answers,
                'timed' => $timed,
                'pointGet' => 0,
            ]);

            $totalQuestions = count($questions);
            $averageScore = $totalQuestions > 0 ? $totalScore / $totalQuestions : 0;

            if ($totalScore <= $averageScore) {
                Alert::warning("😥", "Nilaimu lebih rendah dari pengerjaan terakhirmu.");
            } else {
                Alert::success("Hore!😁", "Nilaimu lebih besar dari pengerjaan terakhirmu! :)");
            }
        }

        return redirect('banksoal/' . $slug);
    }
}
