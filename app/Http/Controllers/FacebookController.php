<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminRequest;

use App\Models\FacebookAuth;

use Input;

class FacebookController extends Controller
{
    public function getFacebookLoginsForGrid(AdminRequest $req, FacebookAuth $fbAuth) {
    	$search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page')
        );

        $auths = $fbAuth->getFiltered($search);

        $authsCount = $fbAuth->getFiltered($search, true);

        if($authsCount == 0) {
            $numPages = 0;
        } else {
            if($authsCount % $search['limit'] > 0) {
                $numPages = ($authsCount - ($authsCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $authsCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $authsCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($auths as $auth) {
        	$rawUndecoded = json_decode($auth->raw_response);
            $toReturn['rows'][] = array(
                'id'    =>  $auth->id,
                'cell'  =>  array(
                	$auth->fullname,
                	$auth->fb_id,
                	isset($rawUndecoded->email) ? $rawUndecoded->email : "-Undisclosed-",
                    $auth->updated_at->format('Y-m-d H:i:s')
                )
            );
        }

        return json_encode($toReturn);
    }
}
