<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//何切るコントローラー
class nanikiruController extends Controller
{
    public function index() {
        $paishi_image_array = $this->convertPaishi("1359m4r59p44r5s1167z");
        return view('nanikiru', compact('paishi_image_array'));
    }

    private function convertPaishi($paishi) : Array {
        $paishi_image_array = [];

        //萬子を抜き出す
        $is_aka5man = false;
        $manzu = strpos($paishi, 'm');
        for($i = 0; $i < $manzu; $i++) {
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
        //次回筒子用
        $pinzu_start = $i+1;

        //筒子を抜き出す
        $is_aka5pin = false;
        $pinzu = strpos($paishi, 'p');
        for($i = $pinzu_start; $i < $pinzu; $i++) {
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
        //次回索子用
        $souzu_start = $i+1;

        //索子を抜き出す
        $is_aka5sou = false;
        $souzu = strpos($paishi, 's');
        for($i = $souzu_start; $i < $souzu; $i++) {
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
        //次回字牌用
        $jihai_start = $i+1;

        //字牌を抜き出す
        $jihai = strpos($paishi, 'z');
        for($i = $jihai_start; $i < $jihai; $i++) {
            //png画像の配列作成
            $paishi_image_array[] = 'ji'. $paishi[$i] .'.png';
        }

        return $paishi_image_array;
    }
}
