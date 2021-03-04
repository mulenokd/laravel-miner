<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Game;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game = new Game(9, 9, 15); 
        
        $data = [
            'field' => $game->field
        ];

        return view('game', $data);
    }
}
