<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FormDataUser;

class HomeController extends Controller
{
    public function index()
    {
        $data = FormDataUser::where('status', 1)->orderBy('id', 'DESC')->get();
        
        return view('home')->with(compact('data'));
    }
}
