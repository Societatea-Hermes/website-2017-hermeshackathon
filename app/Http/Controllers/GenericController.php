<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\SuRequest;

use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\Event;
use App\Models\FacebookAuth;

use Config;
use Facebook;
use Image;
use Input;
use Session;
use Socialite;
use Uuid;

class GenericController extends Controller
{
    public function defaultRoute() {
    	$partnerImgArr = array(
    		// 'hermes.png' 			=>	'http://societatea-hermes.ro/',
    		// 'ssmi.png' 				=>	'#',
    		// 'ullink.png' 	        =>	'http://www.ullink.com/',
    		// 'endava.png' 			=>	'http://www.endava.com/',
    		// 'isdc.png' 				=>	'http://www.isdc.eu/',
    		// 'yonder.png' 			=>	'http://tss-yonder.com/'
    	);

        $timeline = array(
            'To be announced..' =>  array(
                'start_date'    =>  '2018-11-24 11:00',
                'end_date'      =>  '2018-11-25 13:00'
            )
//        ,
//            'Official start + Idea pitch (1m / team)'  =>  array(
////                'start_date'    =>  '2017-12-09 11:00',
////                'end_date'      =>  '2017-12-09 11:30'
////            ),
////            'Work time &amp; mentoring'  =>  array(
////                'start_date'    =>  '2017-12-09 11:30',
////                'end_date'      =>  '2017-12-09 15:00'
////            ),
////            'Lunch break'  =>  array(
////                'start_date'    =>  '2017-12-09 15:00',
////                'end_date'      =>  '2017-12-09 16:00'
////            ),
////            'Work time &amp; mentoring'  =>  array(
////                'start_date'    =>  '2017-12-09 16:00',
////                'end_date'      =>  '2017-12-09 23:00'
////            ),
////            'Late snack (pizza)'  =>  array(
////                'start_date'    =>  '2017-12-09 23:00',
////                'end_date'      =>  '2017-12-09 23:30'
////            ),
////            'Work time &amp; mentoring'  =>  array(
////                'start_date'    =>  '2017-12-09 23:30',
////                'end_date'      =>  '2017-12-10 09:00'
////            ),
////            'Breakfast'  =>  array(
////                'start_date'    =>  '2017-12-10 09:00',
////                'end_date'      =>  '2017-12-10 10:00'
////            ),
////            'Preparation for the demo and the final pitch'  =>  array(
////                'start_date'    =>  '2017-12-10 10:00',
////                'end_date'      =>  '2017-12-10 12:00'
////            ),
////            'Technical demo (jury will visit each team - 5m / team)'  =>  array(
////                'start_date'    =>  '2017-12-10 12:00',
////                'end_date'      =>  '2017-12-10 13:15'
////            ),
////            'Final pitch (3m / team) &amp; jury questions (2m / team)'  =>  array(
////                'start_date'    =>  '2017-12-10 13:15',
////                'end_date'      =>  '2017-12-10 14:45'
////            ),
////            'Chillout time &amp; networking (jury debate in the meantime)'  =>  array(
////                'start_date'    =>  '2017-12-10 14:45',
////                'end_date'      =>  '2017-12-10 15:15'
////            ),
////            'Awards ceremony'  =>  array(
////                'start_date'    =>  '2017-12-10 15:15',
////                'end_date'      =>  '2017-12-10 16:15'
////            )
        );

    	$addToView = array(
    		'partnerArr'	=>	"",
            'active'        =>  'home',
            'timeline'      =>  $timeline
    	);

    	foreach($partnerImgArr as $key => $val) {
    		$target = $val != "#" ? "_blank" : "_self";
    		$addToView['partnerArr'] .= '<div class="oc-item"><a href="'.$val.'" target="'.$target.'"><img src="images/appImg/partners/'.$key.'" alt="Partners"></a></div>';
    	}

    	return view('comming_soon', $addToView);
    }

    public function adminRoute() {
    	$userData = Session::get('userData');
    	if(empty($userData)) {
    		return view('login');
    	}
        if($userData['logged_in']) {
            $addToView['user'] = $userData;
            return view("admin", $addToView); 
        }
    }

    public function newsletterSubscribers(AdminRequest $req) {
        $addToView['user'] = $req->userData;
    	return view('admin.subscribers', $addToView);
    }

    public function users(SuRequest $req) {
        $addToView['user'] = $req->userData;
        return view('admin.users', $addToView);
    }

    public function accountSettings(AdminRequest $req) {
        $addToView['user'] = $req->userData;
        return view('admin.accountSettings', $addToView);
    }

    public function facebookLogins(AdminRequest $req) {
        $addToView['user'] = $req->userData;
        return view('admin.fbLogins', $addToView);
    }

    public function events(AdminRequest $req) {
        $addToView['user'] = $req->userData;
        return view('admin.events', $addToView);
    }

    public function teams(AdminRequest $req) {
        $addToView['user'] = $req->userData;
        return view('admin.teams', $addToView);
    }

    public function event($id_event, Event $ev, Article $ar) {
        $partnerImgArr = array(
            // 'hermes.png'             =>  'http://societatea-hermes.ro/',
            // 'ssmi.png'               =>  '#',
            'ullink.png'            =>  'http://www.ullink.com/',
            'endava.png'            =>  'http://www.endava.com/',
            'isdc.png'              =>  'http://www.isdc.eu/',
            'yonder.png'            =>  'http://tss-yonder.com/'
        );

        $addToView = array(
            'partnerArr'    =>  "",
            'eventDetails'  =>  '',
            'eventType'     =>  '',
            'articles'      =>  array()
        );

        try {
            $ev = $ev->findOrFail($id_event);
        } catch (ModelNotFoundException $ex) {
            return redirect('/');
        }

        foreach($partnerImgArr as $key => $val) {
            $target = $val != "#" ? "_blank" : "_self";
            $addToView['partnerArr'] .= '<div class="oc-item"><a href="'.$val.'" target="'.$target.'"><img src="images/appImg/partners/'.$key.'" alt="Partners"></a></div>';
        }

        $addToView['eventDetails'] = $ev;

        switch ($ev->type) {
            case '1':
                $addToView['eventType'] = "Training";
                break;
            case '2':
                $addToView['eventType'] = "Workshop";
                break;
            case '3':
                $addToView['eventType'] = "Party";
                break;
        }

        $addToView['articles'] = $ar->select('articles.*', 'users.fullname')
                                    ->join('users', 'users.id', '=', 'articles.user_id')
                                    ->where('event_id', '=', $id_event)->get();

        return view('event', $addToView);
    }

    public function article($id_article, Article $ar) {
        $partnerImgArr = array(
            // 'hermes.png'             =>  'http://societatea-hermes.ro/',
            // 'ssmi.png'               =>  '#',
            'ullink.png'            =>  'http://www.ullink.com/',
            'endava.png'            =>  'http://www.endava.com/',
            'isdc.png'              =>  'http://www.isdc.eu/',
            'yonder.png'            =>  'http://tss-yonder.com/'
        );

        $addToView = array(
            'partnerArr'    =>  "",
            'articleDetails'  =>  ''
        );

        try {
            $ar = $ar->findOrFail($id_article);
        } catch (ModelNotFoundException $ex) {
            return redirect('/');
        }

        foreach($partnerImgArr as $key => $val) {
            $target = $val != "#" ? "_blank" : "_self";
            $addToView['partnerArr'] .= '<div class="oc-item"><a href="'.$val.'" target="'.$target.'"><img src="images/appImg/partners/'.$key.'" alt="Partners"></a></div>';
        }

        $addToView['articleDetails'] = $ar;

        return view('article', $addToView);
    }


    // Facebook handler
    public function facebookLogin() {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookOauth(FacebookAuth $fbAuth) {
        $user = Socialite::driver('facebook')->user();
        
        $fbAuth = $fbAuth->firstOrNew(['fb_id' => $user->id]);
        $fbAuth->fullname = $user->name;
        $fbAuth->token = $user->token;
        $fbAuth->raw_response = json_encode($user);
        $fbAuth->save();

        Session::put('facebookData', $user);
        return redirect('/facebookOverlay');
    }

    public function facebookOverlay() {
        $facebookData = Session::get('facebookData');
        $imgName = Uuid::generate('4');

        $fbAvatar = $facebookData->avatar_original;
        $fbAvatar = explode('?', $fbAvatar);
        $fbAvatar = $fbAvatar[0]."?width=500&height=500";

        $img = Image::make($fbAvatar)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            })->insert('images/appImg/overlay/overlay.png', 'bottom-left')->save('images/overlays/'.$imgName.".jpg");

        $addToView['imgSrc'] = $imgName;
        
        return view('facebookOverlay', $addToView);
    }

    // public function postToFacebook(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    //     $facebookData = Session::get('facebookData');
    //     $imgName = Input::get('img_name');
    //     $data = [
    //         'message'   =>  'Image posted using SSMI Cover overlay. Find out more: '.Config::get('app.url'),
    //         'source'    =>  $fb->fileToUpload('images/overlays/'.$imgName.'.jpg')
    //     ];
    //     $toReturn['success'] = 0;
    //     try {
    //         $response = $fb->post('/me/photos', $data, $facebookData->token);
    //     } catch(Facebook\Exceptions\FacebookResponseException $e) {
    //         $toReturn['message'] = 'Graph returned an error: ' . $e->getMessage();
    //         return json_encode($toReturn);
    //     } catch(Facebook\Exceptions\FacebookSDKException $e) {
    //         $toReturn['message'] = 'Facebook SDK returned an error: ' . $e->getMessage();
    //         return json_encode($toReturn);
    //     }
    //     $graphNode = $response->getGraphNode();
    //     $toReturn['success'] = 1;
    //     $toReturn['graphNode'] = $graphNode['link'];
    //     return json_encode($toReturn);
    // }

    public function logout() {
    	Session::flush();
        session_start();
        session_destroy();
        return redirect('/');
    }
}
