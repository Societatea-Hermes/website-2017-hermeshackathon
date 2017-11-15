<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function getFiltered($search = array(), $onlyTotal = false) {
        $users = $this;

        // Filters here..

        // End filters..

        if($onlyTotal) {
            return $users->count();
        }

        // Ordering..
        $sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
        if(isset($search['sidx'])) {
            switch ($search['sidx']) {
                case 'fullname':
                case 'username':
                case 'email':
                case 'created_at':
                    $users = $users->orderBy($search['sidx'], $search['sord']);
                    break;

                default:
                    $users = $users->orderBy('fullname', $search['sord']);
                    break;
            }
        }

        if(!isset($search['noLimit']) || !$search['noLimit']) {
            $limit  = !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
            $page   = !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
            $from   = ($page - 1)*$limit;
            $users = $users->take($limit)->skip($from);
        }

        return $users->get();
    }
}
