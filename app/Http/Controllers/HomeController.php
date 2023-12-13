<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::all();

        $leaderboard = User::orderBy('point', 'desc')->get();

        $artikel_blog = Blog::OrderBy('updated_at', 'desc')->limit(4)->get();

        return view('home', compact('data', 'leaderboard', 'artikel_blog'));
    }
}
