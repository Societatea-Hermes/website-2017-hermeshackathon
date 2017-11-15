<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Models\Auth;
use App\Models\Module;

use File;
use Session;
use Input;

class LoggedInRequest extends Request
{
    public $userData = null; // Var which will keep user data (so that we can use its data in both api and session mode)
    public $isApiCall = false; // It will signal if the call is an api call (for further inplementation, so we can restrict method calls if it's api call or not)

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->logRequest();
        $loginToken = Request::header('X-Api-Key');
        if($this->checkApiKey($loginToken) || $this->checkSession()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Checks if api key is valid
     * Sets this->userData var with userData from apiKey if apiKey valid
     * @author Flaviu Porutiu (flaviu@glitch.ro)
     * @param apiKey - string - loginToken
     * @return bool - true if apiKey is valid, false otherwise
     */
    private function checkApiKey($apiKey = '') {
        if(empty($apiKey)) {
            return false;
        }

        $userData = Auth::where('api_token', '=', $apiKey)->join('users', 'auths.user_id', '=', 'users.id')->first();
        if($userData == null) {
            return false;
        }

        $userDataArr = array(
            'id'            =>  $userData->id,
            'fullname'      =>  $userData->fullname,
            'email'         =>  $userData->email,
            'username'      =>  $userData->username,
            'is_admin'      =>  $userData->is_admin,
            'logged_in'     =>  true
        );

        $this->userData = $userDataArr;
        
        $this->isApiCall = true;
        return true;
    }

    /**
     * Checks if session is valid. 
     * Sets this->userData var with userData from session if session valid
     * @author Flaviu Porutiu (flaviu@glitch.ro)
     * @return bool - true if session is valid, false otherwise
     */
    private function checkSession() {
        $userDataArr = Session::get('userData');
        if($userDataArr == '') {
            return false;
        }
        $this->userData = $userDataArr;
        return true;
    }

    /**
     * Logs the request sent to the api
     * @author Flaviu Porutiu (flaviu@glitch.ro)
     */
    private function logRequest() {
        $textToLog = "[".date('Y-m-d H:i:s')."] IP: ".$this->ip()." | URL: ".Request::url()." | Request params: ".http_build_query(Request::all(), '', ', ')."\n";
        $logFileName = "../storage/logs/api_".date('Y-m-d').".log";
        $logFile = File::append($logFileName, $textToLog);
    }
}
