<?php
namespace App\Service;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserService{
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function update($validated){
		$validated = array_filter($validated, function($value){
			return !empty($value);
		});

        $this->user->update($validated);
        
        return true;
	}
}

?>