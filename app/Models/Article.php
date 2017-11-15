<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getFiltered($search = array(), $onlyTotal = false) {
        $articles = $this->select('articles.*', 'users.fullname')
                        ->join('users', 'users.id', '=', 'articles.user_id');

        // Filters here..

        // End filters..

        if($onlyTotal) {
            return $articles->count();
        }

        // Ordering..
        $sOrder = (isset($search['sord']) && ($search['sord'] == 'asc' || $search['sord'] == 'desc')) ? $search['sord'] : 'asc';
        if(isset($search['sidx'])) {
            switch ($search['sidx']) {
                case 'title':
                case 'fullname':
                case 'created_at':
                    $articles = $articles->orderBy($search['sidx'], $search['sord']);
                    break;
                default:
                    $articles = $articles->orderBy('title', $search['sord']);
                    break;
            }
        }

        if(!isset($search['noLimit']) || !$search['noLimit']) {
            $limit  = !isset($search['limit']) || empty($search['limit']) ? 10 : $search['limit'];
            $page   = !isset($search['page']) || empty($search['page']) ? 1 : $search['page'];
            $from   = ($page - 1)*$limit;
            $articles = $articles->take($limit)->skip($from);
        }

        return $articles->get();
    }
}
