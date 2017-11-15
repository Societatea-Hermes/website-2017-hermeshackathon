<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public function getFiltered($search = array(), $onlyTotal = false) {
        $members = $this;

        // Filters here..
        if(isset($search['team_id']) && !empty($search['team_id'])) {
        	$members = $members->where('team_id', $search['team_id']);
        }
        // End filters..

        if($onlyTotal) {
            return $members->count();
        }

        // Ordering..
        $sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
        if(isset($search['sidx'])) {
            switch ($search['sidx']) {
                case 'name':
                case 'email':
                case 'phone':
                case 'updated_at':
                case 'created_at':
                    $members = $members->orderBy($search['sidx'], $search['sord']);
                    break;

                default:
                    $members = $members->orderBy('name', $search['sord']);
                    break;
            }
        }

        if(!isset($search['noLimit']) || !$search['noLimit']) {
            $limit  = !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
            $page   = !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
            $from   = ($page - 1)*$limit;
            $members = $members->take($limit)->skip($from);
        }

        return $members->get();
    }
}
