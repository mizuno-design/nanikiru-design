<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

//何切るコントローラー
class nanikiruController extends Controller
{
    public function index() {
        //全ての問題牌姿
        $paishi_image_array = [];
        //全ての問題選択肢
        $answer_choice_array = [];
        $questions = Question::all();
        foreach($questions as $question) {
            //問題牌姿
            $paishi_image_array[] = $this->convertPaishi($question->question);
            //問題選択肢
            $answer_choice_array[] = $question->choice;
            dd($question);
        }
        return view('nanikiru', compact('paishi_image_array'));
    }

    private function convertPaishi($paishi) : Array {
        $paishi_image_array = [];

        //萬子を抜き出す
        $m = 0;
        $is_aka5man = false;
        $manzu = strpos($paishi, 'm');
        if($manzu) {
            for($i = 0; $i < $manzu; $i++) {
                //萬子が存在する
                $m = 1;
                //赤チェック
                if($is_aka5man) {
                    $paishi_image_array[] = 'aka5man.png';
                    $is_aka5man = false;
                    continue;
                }
                if($paishi[$i] === 'r') {
                    $is_aka5man = true;
                    continue;
                }
                //png画像の配列作成
                $paishi_image_array[] = 'man'. $paishi[$i] .'.png';
            }
        }
        //次回筒子用
        $pinzu_start = $i+$m;

        //筒子を抜き出す
        $p = 0;
        $is_aka5pin = false;
        $pinzu = strpos($paishi, 'p');
        if($pinzu) {
            for($i = $pinzu_start; $i < $pinzu; $i++) {
                //筒子が存在する
                $p = 1;
                //赤チェック
                if($is_aka5pin) {
                    $paishi_image_array[] = 'aka5pin.png';
                    $is_aka5pin = false;
                    continue;
                }
                if($paishi[$i] === 'r') {
                    $is_aka5pin = true;
                    continue;
                }
                //png画像の配列作成
                $paishi_image_array[] = 'pin'. $paishi[$i] .'.png';
            }
        }

        //次回索子用
        $souzu_start = $i+$p;
        //索子を抜き出す
        $s = 0;
        $is_aka5sou = false;
        $souzu = strpos($paishi, 's');
        if($souzu) {
            for($i = $souzu_start; $i < $souzu; $i++) {
                $s = 1;
                //赤チェック
                if($is_aka5sou) {
                    $paishi_image_array[] = 'aka5sou.png';
                    $is_aka5sou = false;
                    continue;
                }
                if($paishi[$i] === 'r') {
                    $is_aka5sou = true;
                    continue;
                }
                //png画像の配列作成
                $paishi_image_array[] = 'sou'. $paishi[$i] .'.png';
            }
        }

        //次回字牌用
        $jihai_start = $i+$s;

        //字牌を抜き出す
        $jihai = strpos($paishi, 'z');
        for($i = $jihai_start; $i < $jihai; $i++) {
            if($paishi[$i] == "p"){
                continue;
            }
            //png画像の配列作成
            $paishi_image_array[] = 'ji'. $paishi[$i] .'.png';
        }
        return $paishi_image_array;
    }
}
