<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 初期入力ページの表示
    public function index(){
        return view('index');
    }

    // データ入力後、確認ページの表示
    public function confirm(Request $request){
        $contact = $request->only(['category_id','first_name','last_name','gender', 'email', 'tel','address','building','detail']);
        return view('confirm',compact('contact'));
    }
}
