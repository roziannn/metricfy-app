<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Module;
use App\Models\Banksoal;
use App\Models\BanksoalQuestion;
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
