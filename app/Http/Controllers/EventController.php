<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AddEditEventRequest;

use App\Models\Event;

use Input;

class EventController extends Controller
{
    public function addEditEvent(AddEditEventRequest $req, Event $ev) {
    	$id = Input::get('id', 0);
    	$ev = $ev->findOrNew($id);
    	$ev->title = Input::get('title');
    	$ev->description = Input::get('description');
    	$ev->type = Input::get('type');
    	$ev->date = Input::get('date');
    	$ev->time = Input::get('time');
    	$ev->location_text = Input::get('location');
    	$ev->save();

    	$toReturn['success'] = 1;
    	return json_encode($toReturn);
    }

    public function getEventsForGrid(AdminRequest $req, Event $ev) {
    	$userData = $req->userData;
    	$search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page')
        );

        $events = $ev->getFiltered($search);

        $eventsCount = $ev->getFiltered($search, true);

        if($eventsCount == 0) {
            $numPages = 0;
        } else {
            if($eventsCount % $search['limit'] > 0) {
                $numPages = ($eventsCount - ($eventsCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $eventsCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $eventsCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($events as $event) {
        	$actions = "";

            $actions .= '<div class="ui-pg-div ui-inline-edit" style="float:left;cursor:pointer" onclick="editEvent(\''.$event->id.'\')" title="Edit event"><span class="glyphicon glyphicon-pencil"></span></div>';
            $actions .= '<div class="ui-pg-div ui-inline-edit" style="float:left;cursor:pointer" onclick="editEventPicture(\''.$event->id.'\')" title="Edit event picture"><span class="glyphicon glyphicon-camera"></span></div>';

            $toReturn['rows'][] = array(
                'id'    =>  $event->id,
                'cell'  =>  array(
                	$actions,
                	$event->title,
                	$event->date." ".$event->time,
                    $event->location_text
                )
            );
        }

        return json_encode($toReturn);
    }

    public function getEventData(AdminRequest $req, Event $ev) {
        $ev = $ev->find(Input::get('id'));
        return json_encode($ev);
    }

    public function getEvents(Event $ev) {
        $events = $ev->where('date', '=', Input::get('date', '0000-00-00'))->orderBy('time', 'ASC')->get();
        $toReturn = array();

        foreach ($events as $event) {
            switch ($event->type) {
                case '1':
                    $type = "Training";
                    break;
                case '2':
                    $type = "Workshop";
                    break;
                case '3':
                    $type = "Party";
                    break;
            }

            $toReturn[] = array(
                'id'            =>  $event->id,
                'title'         =>  $event->title,
                'description'   =>  $event->description,
                'time'          =>  $event->time,
                'type'          =>  $type,
                'location'      =>  $event->location_text,
                'banner'        =>  $event->banner
            );
        }

        return json_encode($toReturn);
    }

    public function editEventPicture(AdminRequest $req, Event $ev) {
        $id = Input::get('id', -1);
        $ev = $ev->find($id);

        $file = $req->file('logo');

        $allowedExt = array(
            'png', 'jpg', 'jpeg'
        );

        $copyDirectory = "images/event_pics/".$id."/";
        if(!file_exists($copyDirectory)) {
            mkdir($copyDirectory, 0777, true);
        }

        $filename = $file->getClientOriginalName();
        $extension = explode('.', $filename);
        $extension = strtolower($extension[count($extension)-1]);

        if(!in_array($extension, $allowedExt)) {
            return 0;
        }
        $file->move($copyDirectory, $filename);

        $ev->banner = $copyDirectory.$filename;
        $ev->save();

        return 1;
    }
}
