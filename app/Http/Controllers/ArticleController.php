<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddEditArticleRequest;
use App\Http\Requests\AdminRequest;

use App\Models\Article;
use App\Models\Event;

use Input;

class ArticleController extends Controller
{
    public function addEditArticle(AddEditArticleRequest $req, Article $art, Event $ev) {
    	$id = Input::get('id', 0);

    	$userData = $req->userData;

    	$art = $art->findOrNew($id);
    	$art->title = Input::get('title');
    	$art->content = Input::get('content');
    	$art->user_id = $userData['id'];
    	
    	$event_id = Input::get('event_id');
    	try {
            $ev->findOrFail($event_id);
        } catch (ModelNotFoundException $ex) {
            $toReturn['success'] = 0;
            $toReturn['message'] = "Event does not exist!";
            return response(json_encode($toReturn), 422);
        }

    	$art->event_id = $event_id;
    	$art->save();

    	$toReturn['success'] = 1;
        return json_encode($toReturn);
    }

    public function getArticlesForGrid(AdminRequest $req, Article $art) {
    	$search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page')
        );

        $articles = $art->getFiltered($search);

        $articlesCount = $art->getFiltered($search, true);

        if($articlesCount == 0) {
            $numPages = 0;
        } else {
            if($articlesCount % $search['limit'] > 0) {
                $numPages = ($articlesCount - ($articlesCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $articlesCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $articlesCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($articles as $article) {
        	$actions = "";

            $actions .= '<div class="ui-pg-div ui-inline-edit" style="float:left;cursor:pointer" onclick="editArticle(\''.$article->id.'\')" title="Edit article"><span class="glyphicon glyphicon-pencil"></span></div>';

            $toReturn['rows'][] = array(
                'id'    =>  $article->id,
                'cell'  =>  array(
                	$actions,
                	$article->title,
                	$article->fullname,
                    $article->created_at->format('Y-m-d')
                )
            );
        }

        return json_encode($toReturn);
    }

    public function getArticleData(AdminRequest $req, Article $art) {
    	$art = $art->find(Input::get('id'));
    	return json_encode($art);
    }
}
