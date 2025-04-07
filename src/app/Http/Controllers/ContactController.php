<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    // 初期入力ページの表示
    public function index(){
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    // データ入力後、確認ページの表示
    public function confirm(Request $request){
        $categories = Category::all();
        $contact = $request->only(['first_name','last_name','gender', 'email', 'tel_first','tel_second','tel_third','address','building','category_id','detail']);
        return view('confirm',compact('contact', 'categories'));
    }

    public function store(Request $request){
        $contact = $request->only(['first_name','last_name','gender', 'email', 'tel','address','building','category_id','detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
