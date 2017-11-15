<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function getFiltered($search = array(), $onlyTotal = false) {
        $teams = $this;

        // Filters here..

        // End filters..

        if($onlyTotal) {
            return $teams->count();
        }

        // Ordering..
        $sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
        if(isset($search['sidx'])) {
            switch ($search['sidx']) {
                case 'name':
                case 'updated_at':
                case 'created_at':
                    $teams = $teams->orderBy($search['sidx'], $search['sord']);
                    break;

                default:
                    $teams = $teams->orderBy('name', $search['sord']);
                    break;
            }
        }

        if(!isset($search['noLimit']) || !$search['noLimit']) {
            $limit  = !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
            $page   = !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
            $from   = ($page - 1)*$limit;
            $teams = $teams->take($limit)->skip($from);
        }

        return $teams->get();
    }
}
