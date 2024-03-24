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
        $questions = $banksoal->banksoalQuestions;
        $topic = Module::all();
        $user = Auth::user();

        $latestExam = UserExamBanksoal::where('user_id', $user->id)->where('banksoal_id', $banksoal->id)
            ->latest()->first();

        if ($latestExam) {
            $response_data = json_decode($latestExam->response_data, true);

            $benarCount = 0;
            $salahCount = 0;

            foreach ($questions as $question) {
                $questionId = $question->id;
                $keyAnswers = json_decode($question->answer);
                $point = $question->point;
                $userAnswer = $response_data[$questionId]['answer'] ?? null;

                $isCorrect = false;

                // Check if both key answers and user's answer are arrays
                if (is_array($keyAnswers) && is_array($userAnswer)) {
                    // Check if user's answer includes all elements of key answers
                    if (empty(array_diff($keyAnswers, $userAnswer))) {
                        $isCorrect = true;
                    }
                }

                // Update the counts based on correctness
                if ($isCorrect) {
                    $benarCount++;
                } else {
                    $salahCount++;
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

    public function submitExam(Request $request, $id)
    {
        $user = auth()->user();
        $banksoal = Banksoal::findOrFail($id);
        $questions = $banksoal->banksoalQuestions;
        $answers = $request->input('answers');
        $timed = $request->input('timed');

        $slug = $banksoal->slug;

        $userExam = UserExamBanksoal::where('banksoal_id', $banksoal->id)
            ->where('user_id', $user->id)
            ->first();

        $totalScore = 0;

        if (!$userExam) {
            foreach ($questions as $question) {
                $keyAnswers = json_decode($question->answer);
                $point = $question->point;
                $userAnswer = $answers[$question->id]['answer'] ?? null;
                // dd($userAnswer);

                $isCorrect = false;

                // Check if both key answers and user's answer are arrays
                if (is_array($keyAnswers) && is_array($userAnswer) && empty(array_diff($keyAnswers, $userAnswer))) {
                    $isCorrect = true;
                }

                $answers[$question->id]['isCorrect'] = $isCorrect;
                if ($isCorrect) {
                    $totalScore += $point; //point tetap di hitung, tp tidak di parse ke database
                }
            }

            $pointGet = $totalScore;

            // Save user exam data
            UserExamBanksoal::create([
                'banksoal_id' => $banksoal->id,
                'user_id' => $user->id,
                'response_data' => is_array($answers) ? json_encode($answers) : $answers,
                'timed' => $timed,
                'pointGet' => $pointGet
            ]);

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
                $keyAnswers = json_decode($question->answer);
                $point = $question->point;

                $userAnswer = $answers[$question->id]['answer']  ?? null;

                $isCorrect = false;

                // Check if both key answers and user's answer are arrays
                // Check if user's answer includes all elements of key answers
                if (is_array($keyAnswers) && is_array($userAnswer) && empty(array_diff($keyAnswers, $userAnswer))) {
                    $isCorrect = true;
                }

                $answers[$question->id]['isCorrect'] = $isCorrect;
                //point tetap di hitung, tp tidak di parse ke database
                $totalScore += $isCorrect ? $point : 0;
            }

            $pointGet = $totalScore;

            UserExamBanksoal::create([
                'banksoal_id' => $banksoal->id,
                'user_id' => $user->id,
                'response_data' => is_array($answers) ? json_encode($answers) : $answers,
                'timed' => $timed,
                'pointGet' => $pointGet
            ]);

            $totalQuestions = count($questions);
            $averageScore = $totalQuestions > 0 ? $totalScore / $totalQuestions : 0;

            if ($userExam) {
                if ($totalScore <= $averageScore) {
                    Alert::warning("😥", "Nilaimu lebih rendah dari pengerjaan terakhirmu. Ayo tingkatkan lagi!");
                } else {
                    Alert::success("Hore!😁", "Nilaimu lebih besar dari pengerjaan terakhirmu! :)");
                }
            }
        }

        return redirect('banksoal/' . $slug);
    }
}
