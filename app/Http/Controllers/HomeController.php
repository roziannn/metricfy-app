<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::all();

        $modules = Module::orderBy('created_at', 'asc')->limit(4)->get();

        $leaderboard = User::orderBy('point', 'desc')->get();

        $artikel_blog = Blog::OrderBy('updated_at', 'desc')->limit(4)->get();

        return view('home', compact('data', 'leaderboard', 'artikel_blog', 'modules'));
    }
}
