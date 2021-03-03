<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateApiRequest;
use App\Models\User;

class PostController extends Controller{
    public function create(){
    	return view('posts');
    }

    public function store(Request $request){
    	$validated = $request->validate([
    		'data' => 'required|min:1|max:256'
    	]);

    	$validated['user_id'] = Auth::user()->id;

    	Post::create($validated);

    	return redirect()->route('profile');
    }

}
