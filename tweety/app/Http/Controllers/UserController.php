<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        return view('users.list', [
            'users' => User::all()
        ]);
    }

    public function show($id)
    {
        return view('users.show', [
            'user' => User::with('tweets')->findOrFail($id)
        ]);
    }

    public function tweet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tweet' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('user/'.Auth::id())->withErrors($validator)->withInput();
        }

        $tweet = new Tweet();
        $tweet->content = $request->tweet;
        $tweet->user_id = Auth::id();

        $tweet->save();

        return redirect('user/'.Auth::id())->with('success', 'Tweet save !');
    }
}
