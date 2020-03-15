<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

//何切るコントローラー
class homeController extends Controller
{
    public function index() {
        dd('a');
    }

    public function home() {
        //test用
        $questions = Question::with('answer')->get();
        return view('home', compact('questions'));
    }
}
