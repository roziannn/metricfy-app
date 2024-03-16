<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Alert;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::all();

        $modules = Module::orderBy('created_at', 'asc')->limit(4)->get();

        $leaderboard = User::orderBy('point', 'desc')->limit(8)->get();

        $artikel_blog = Blog::OrderBy('updated_at', 'desc')->limit(4)->get();

        $blogs = [];

        foreach ($artikel_blog as $blog) {
            $kataCount = str_word_count(strip_tags($blog->content));
            $avrgUserReading = 300;

            $estimatedReadingTime = ceil($kataCount / $avrgUserReading);

            $blogs[] = [
                'blog' => $blog,
                'estimatedReadingTime' => $estimatedReadingTime
            ];
        }

        return view('home', compact('data', 'leaderboard', 'blogs', 'modules'));
    }
}
