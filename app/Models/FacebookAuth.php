<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookAuth extends Model
{
    protected $fillable = ['fb_id'];

    public function getFiltered($search = array(), $onlyTotal = false) {
        $auths = $this;

        // Filters here..

        // End filters..

        if($onlyTotal) {
            return $auths->count();
        }

        // Ordering..
        $sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
        if(isset($search['sidx'])) {
            switch ($search['sidx']) {
                case 'fullname':
                case 'fb_id':
                case 'updated_at':
                    $auths = $auths->orderBy($search['sidx'], $search['sord']);
                    break;

                default:
                    $auths = $auths->orderBy('fullname', $search['sord']);
                    break;
            }
        }

        if(!isset($search['noLimit']) || !$search['noLimit']) {
            $limit  = !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
            $page   = !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
            $from   = ($page - 1)*$limit;
            $auths = $auths->take($limit)->skip($from);
        }

        return $auths->get();
    }
}
