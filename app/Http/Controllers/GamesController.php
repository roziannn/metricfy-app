<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function showAll()
    {
        return view('user.games.index');
    }

    public function gameGuessTheNumber()
    {
        return view('user.games.game-list.guessTheNumber');
    }
}
