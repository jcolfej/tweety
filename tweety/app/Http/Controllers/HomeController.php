<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'tweets' => Tweet::with('user')->orderBy('created_at', 'desc')->take(5)->get()
        ]);
    }
}
