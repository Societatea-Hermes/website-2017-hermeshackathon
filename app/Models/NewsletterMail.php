<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterMail extends Model
{
    protected $fillable = ['email', 'email_check'];

    protected $hidden = ['email_check'];

    public function getFiltered($search = array(), $onlyTotal = false) {
    	$emails = $this;

    	// Filters here..
    	if(isset($search['email']) && !empty($search['email'])) {
    		$emails = $emails->where('email', 'LIKE', "%".$search['email']."%");
    	}

    	if(isset($search['dFrom']) && !empty($search['dFrom'])) {
    		$emails = $emails->where('created_at', '>=', $search['dFrom']);
    	}

    	if(isset($search['dTo']) && !empty($search['dTo'])) {
    		$emails = $emails->where('created_at', '<=', $search['dTo']);
    	}

    	// End filters..

    	if($onlyTotal) {
    		return $emails->count();
    	}

    	// Ordering..
    	$sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
    	if(isset($search['sidx'])) {
			switch ($search['sidx']) {
                case 'email':
                case 'created_at':
					$emails = $emails->orderBy($search['sidx'], $search['sord']);
					break;

				default:
					$emails = $emails->orderBy('email', $search['sord']);
					break;
			}
    	}

		if(!isset($search['noLimit']) || !$search['noLimit']) {
			$limit 	= !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
			$page 	= !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
			$from 	= ($page - 1)*$limit;
			$emails = $emails->take($limit)->skip($from);
		}

		return $emails->get();
    }
}
