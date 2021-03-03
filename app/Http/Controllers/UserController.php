<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Service\UserService;


class UserController extends Controller
{
    public function registration(UserRegistrationRequest $request){
		$user = User::create($request->validated());
	    
	    return response()->json([
	        'data' => $user
	    ]);
    }

    public function getUser(User $id){
    	return response()->json([
            'data' => $id
        ]);
    }

    public function userUpdate(UserUpdateRequest $request, User $id){
    	$UserService = new UserService($id);
        $UserService->update($request->validated());
        return response()->json([
            'data' => $id
        ]);
    }

    public function userDelete(User $id){
    	$id->delete();
    }

    public function pagination(){
    	$users = User::paginate(2);
    	return response()->json([
            'data' => $users
        ]);
    }

    public function createPost(Request $request, $id){
    	$validated = $request->validate([
    		'data' => 'required|min:1|max:256'
    	]);

    	$validated['user_id'] = $id;

    	Post::create($validated);
    }

    public function deletePost(Post $id){
    	$id->delete();
    }
}
