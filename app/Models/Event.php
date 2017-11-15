<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function getFiltered($search = array(), $onlyTotal = false) {
        $events = $this;

        // Filters here..

        // End filters..

        if($onlyTotal) {
            return $events->count();
        }

        // Ordering..
        $sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
        if(isset($search['sidx'])) {
            switch ($search['sidx']) {
                case 'title':
                case 'location_text':
                    $events = $events->orderBy($search['sidx'], $search['sord']);
                    break;
                case 'datetime':
                    $events = $events->orderBy('date', $search['sord'])->orderBy('time', $search['sord']);
                    break;

                default:
                    $events = $events->orderBy('title', $search['sord']);
                    break;
            }
        }

        if(!isset($search['noLimit']) || !$search['noLimit']) {
            $limit  = !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
            $page   = !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
            $from   = ($page - 1)*$limit;
            $events = $events->take($limit)->skip($from);
        }

        return $events->get();
    }
}
