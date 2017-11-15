<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\addEmailForNewsletter;
use App\Http\Requests\AdminRequest;

use App\Http\Controllers\Controller;

use App\Models\NewsletterMail;

use Input;

class NewsletterController extends Controller
{
    public function saveEmail(addEmailForNewsletter $req, NewsletterMail $newsMail) {
    	$email = Input::get('email');
    	$email = strtolower($email);
    	$emailCheck = $email;

    	$checkDuplicateEmails = true;

    	if($checkDuplicateEmails) {
	    	// Special check for gmail accounts..
	    	$emailSplit = explode('@', $email);

	    	// Email is of form <characters>@<domain>.tld
	    	if(preg_match('/gmail/', $emailSplit[1])) { // Email is gmail account.. so we build the unique email hash..
	    		$emailCheckLabel = explode('+', $emailCheck); // Gmail emails may be of form <characters>+<label>
	    		$emailCheck = $emailCheckLabel[0]; // we take only what's before the + sign since we don't need the label..
	    		if(count($emailCheckLabel) > 1) {
	    			$emailCheck .= "@".$emailSplit[1]; // It had a label so we have to concatenate domain too..
	    		}
	    		$emailCheck = preg_replace('/\./', '', $emailCheck); // Emails may contain . character which is equivalent to nothing for gmail so a.aa@gmail.com == aaa@gmail.com == a.a.a@gmail.com etc..
	    	}
	    }

    	$newsMail = $newsMail->firstOrNew(['email_check' => $emailCheck]); // We check for the hash..
    	if($newsMail->id == null) { // if we dont have the email already we add the record..
    		$newsMail->email = $email;
    		$newsMail->save();
    	}

    	$toReturn['success'] = 1;
    	return json_encode($toReturn);
    }

    public function getRegisteredEmails(AdminRequest $req, NewsletterMail $newsMail) {
    	return json_encode($newsMail->all());
    }

    public function getSubscribersForGrid(AdminRequest $req, NewsletterMail $newsMail) {
        $search = array(
            'email'     =>  Input::get('email'),
            'dFrom'     =>  Input::get('dFrom'),
            'dTo'       =>  Input::get('dTo'),
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page')
        );

        $subscribers = $newsMail->getFiltered($search);

        $subscribersCount = $newsMail->getFiltered($search, true);

        if($subscribersCount == 0) {
            $numPages = 0;
        } else {
            if($subscribersCount % $search['limit'] > 0) {
                $numPages = ($subscribersCount - ($subscribersCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $subscribersCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $subscribersCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($subscribers as $subscriber) {
            $toReturn['rows'][] = array(
                'id'    =>  $subscriber->id,
                'cell'  =>  array(
                    $subscriber->email,
                    $subscriber->created_at->format('Y-m-d H:i:s')
                )
            );
        }

        return json_encode($toReturn);
    }
}
