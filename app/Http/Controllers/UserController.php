<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ChangeUserDataRequest;
use App\Http\Requests\SuRequest;

use App\Models\User;

use Hash;
use Input;

class UserController extends Controller
{
    public function getUsersForGrid(SuRequest $req, User $user) {
        $userData = $req->userData;
    	$search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page')
        );

        $users = $user->getFiltered($search);

        $usersCount = $user->getFiltered($search, true);

        if($usersCount == 0) {
            $numPages = 0;
        } else {
            if($usersCount % $search['limit'] > 0) {
                $numPages = ($usersCount - ($usersCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $usersCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $usersCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($users as $user) {
        	$actions = "";

            if($user->id != $userData['id']) {
                $title = "Make user admin";
                if($user->is_admin == 1) {
                    $title = "Make user non-admin";
                }

                $title2 = "Ban user";
                $icon2 = "ban-circle";
                if($user->is_locked == 1) {
                    $title2 = "Unban user";
                    $icon2 = "ok";
                }
                $actions .= '<div class="ui-pg-div ui-inline-edit" style="float:left;cursor:pointer" onclick="changeAdminStatus(\''.$user->id.'\')" title="'.$title.'"><span class="glyphicon glyphicon-pencil"></span></div>';
                $actions .= '<div class="ui-pg-div ui-inline-edit" style="float:left">&nbsp;</div>';
                $actions .= '<div class="ui-pg-div ui-inline-edit" style="float:left;cursor:pointer" onclick="changeUserStatus(\''.$user->id.'\')" title="'.$title2.'"><span class="glyphicon glyphicon-'.$icon2.'"></span></div>';
            }

            $toReturn['rows'][] = array(
                'id'    =>  $user->id,
                'cell'  =>  array(
                	$actions,
                	$user->fullname,
                	$user->username,
                    $user->email,
                    empty($user->is_admin) ? "No" : "Yes",
                    empty($user->is_locked) ? "0" : "1"
                )
            );
        }

        return json_encode($toReturn);
    }

    public function addUser(AddUserRequest $req, User $user) {
        $user->fullname = Input::get('fullname');
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');

        $user->is_admin = Input::get('is_admin');
        $user->save();

        $toReturn['success'] = 1;
        return json_encode($toReturn);
    }

    public function changeUserStatus(SuRequest $req, User $user) {
        $userData = $req->userData;
        try {
            $userExists = $user->findOrFail(Input::get('id', -1));
        } catch (ModelNotFoundException $ex) {
            $toReturn['success'] = 0;
            $toReturn['message'] = "User does not exist!";
            return response(json_encode($toReturn), 422);
        }

        if($userExists->id == $userData['id']) {
            $toReturn['success'] = 0;
            $toReturn['message'] = "You cannot modify your own account!";
            return response(json_encode($toReturn), 422);
        }

        $is_locked = $userExists->is_locked;
        if($is_locked == '1') {
            $userExists->is_locked = null;
        } else {
            $userExists->is_locked = 1;
        }
        $userExists->save();

        $toReturn['success'] = 1;
        return json_encode($toReturn);
    }

    public function changeAdminStatus(SuRequest $req, User $user) {
        $userData = $req->userData;
        try {
            $userExists = $user->findOrFail(Input::get('id', -1));
        } catch (ModelNotFoundException $ex) {
            $toReturn['success'] = 0;
            $toReturn['message'] = "User does not exist!";
            return response(json_encode($toReturn), 422);
        }

        if($userExists->id == $userData['id']) {
            $toReturn['success'] = 0;
            $toReturn['message'] = "You cannot modify your own account!";
            return response(json_encode($toReturn), 422);
        }

        $is_admin = $userExists->is_admin;
        if($is_admin == '1') {
            $userExists->is_admin = null;
        } else {
            $userExists->is_admin = 1;
        }
        $userExists->save();

        $toReturn['success'] = 1;
        return json_encode($toReturn);
    }

    public function changeUserData(ChangeUserDataRequest $req, User $user) {
        $userData = $req->userData;
        $user = $user->find($userData['id']);

        $password = Input::get('password');
        if(!empty($password)) {
            $user->password = Hash::make($password);
        }

        $user->save();

        $toReturn['success'] = 1;
        return json_encode($toReturn);
    }
}
