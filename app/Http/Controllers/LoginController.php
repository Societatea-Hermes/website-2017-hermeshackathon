<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;

use App\Models\Auth;
use App\Models\User;

use Carbon\Carbon;
use Hash;
use Input;
use Session;
use Uuid;

class LoginController extends Controller
{
    public function login(User $user, Auth $auth, LoginRequest $req) {
    	$username = trim(Input::get('username'));
    	$password = trim(Input::get('password'));

        $isApi = Input::get('is_api');

    	$userExists = $user->whereUsername($username)->first();

    	$toReturn = array(
    		'success' => 0,
    		'message' => 'Username / Password invalid!'
    	);

    	$auth->ip = $req->ip();
    	$auth->user_agent = $req->header('User-Agent');
    	$auth->raw_request_params = http_build_query($req->all());

    	if($userExists == null) {
    		$auth->save();
    		return response(json_encode($toReturn));
    	}

    	$auth->user_id = $userExists->id;

    	if(!Hash::check($password, $userExists->password)) {
    		$auth->save();
    		return response(json_encode($toReturn));
    	}

    	if($userExists['is_locked'] == '1') {
    		$auth->save();
    		$toReturn['message'] = 'Account has been disabled! Please contact support for more details!';
    		return response(json_encode($toReturn));
    	}

        $apiKey = '';
        if($isApi == '1') {
            $apiKey = Uuid::generate(4);
            $apiKey = $apiKey->string;
            $auth->api_token = $apiKey;
        } else {
            $sessionArr = array(
                'id'        =>  $userExists->id,
                'fullname'  =>  $userExists->fullname,
                'email'     =>  $userExists->email,
                'username'  =>  $userExists->username,
                'is_admin'  =>  $userExists->is_admin,
                'logged_in' =>  true
            );

            Session::put('userData', $sessionArr);
            session_start();
            $_SESSION['userData'] = $sessionArr;
            session_write_close();
        }

    	$toReturn = array(
    		'success' => 1,
    		'message' => $apiKey
    	);
    	
    	$auth->successful = 1;
    	$auth->save();

    	return response(json_encode($toReturn));
    }
}
