<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminRequest;

use App\Models\Team;
use App\Models\TeamMember;

use \Carbon\Carbon;
use Input;
use Mail;

class TeamController extends Controller
{
    public function addTeam(Team $team, Request $req) {
        $currentDT = \Carbon\Carbon::now('Europe/Bucharest');
        $maxSignupTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', '2021-11-15 23:59');
        if($currentDT->gte($maxSignupTime)) {
            $toReturn = array(
                'success' => 0,
                'message' => 'Signup are closed!'
            );
            return json_encode($toReturn);
        }

    	// Prereq..
    	$teamName = Input::get('team');
    	$teamJoke = Input::get('joke');
    	$teamTheme = Input::get('theme');
    	$teamLead = Input::get('teamLeadName');
        $teamLeadEmail = Input::get('teamLeadEmail');
    	$teamLeadPhone = Input::get('teamLeadPhone');

    	if(empty($teamName) || empty($teamLeadEmail) || empty($teamLead) || empty($teamLeadPhone)) {
    		$toReturn = array(
    			'success' => 0,
    			'message' => 'Team name, team leader name, team leader email and phone cannot be empty!'
    		);
    		return json_encode($toReturn);
    	}

    	$teamExists = $team->whereName($teamName)->count();
    	if($teamExists >= 1) {
    		$toReturn = array(
    			'success' => 0,
    			'message' => 'This team name already exists!'
    		);
    		return json_encode($toReturn);
    	}

    	$team->name = $teamName;
    	$team->joke = $teamJoke;
    	$team->theme = $teamTheme;
    	$team->creation_ip = $req->ip();
    	$team->save();

    	// Team members..
    	// Team lead..
    	$teamTmp = new TeamMember();
    	$teamTmp->name = $teamLead;
    	$teamTmp->email = $teamLeadEmail;
    	$teamTmp->team_id = $team->id;
    	$teamTmp->phone = $teamLeadPhone;
    	$teamTmp->is_teamlead = 1;
    	$teamTmp->save();

    	// Team member 2..
    	$team2Name = Input::get('member2Name');
    	$team2Email = Input::get('member2Email');
    	if(!empty($team2Email) && !empty($team2Name)) {
    		$teamTmp = new TeamMember();
	    	$teamTmp->name = $team2Name;
	    	$teamTmp->email = $team2Email;
	    	$teamTmp->team_id = $team->id;
	    	$teamTmp->phone = Input::get('member2Phone');
	    	$teamTmp->save();
    	}

    	// Team member 3..
    	$team3Name = Input::get('member3Name');
    	$team3Email = Input::get('member3Email');
    	if(!empty($team3Email) && !empty($team3Name)) {
    		$teamTmp = new TeamMember();
	    	$teamTmp->name = $team3Name;
	    	$teamTmp->email = $team3Email;
	    	$teamTmp->team_id = $team->id;
	    	$teamTmp->phone = Input::get('member3Phone');
	    	$teamTmp->save();
    	}

    	// Team member 4.. 
    	$team4Name = Input::get('member4Name');
    	$team4Email = Input::get('member4Email');
    	if(!empty($team4Email) && !empty($team4Name)) {
    		$teamTmp = new TeamMember();
	    	$teamTmp->name = $team4Name;
	    	$teamTmp->email = $team4Email;
	    	$teamTmp->team_id = $team->id;
	    	$teamTmp->phone = Input::get('member4Phone');
	    	$teamTmp->save();
    	}

        $addToView['teamName'] = $teamName;
        // Mail::send('mails.signup', $addToView, function($message) use($teamLeadEmail) {
        //     $message->from("hackathon@societatea-hermes.ro", "hermesHackathon");
        //     $message->to($teamLeadEmail);
        //     $message->subject("Inscriere hermesHackathon");
        // });

    	$toReturn = array(
			'success' => 1
		);
		return json_encode($toReturn);
    }

    public function getTeamsForGrid(AdminRequest $req, Team $team) {
    	$search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page')
        );

        $teamX = $team->getFiltered($search);

        $teamXCount = $team->getFiltered($search, true);

        if($teamXCount == 0) {
            $numPages = 0;
        } else {
            if($teamXCount % $search['limit'] > 0) {
                $numPages = ($teamXCount - ($teamXCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $teamXCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $teamXCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($teamX as $team) {
            $toReturn['rows'][] = array(
                'id'    =>  $team->id,
                'cell'  =>  array(
                	$team->name,
                	$team->theme,
                	$team->joke,
                    $team->created_at->format('Y-m-d H:i:s')
                )
            );
        }

        return json_encode($toReturn);
    }

    public function getTeamMembersForGrid(AdminRequest $req, TeamMember $member) {
    	$search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page'),
            'team_id'	=>	Input::get('team_id')
        );

        $members = $member->getFiltered($search);

        $membersCount = $member->getFiltered($search, true);

        if($membersCount == 0) {
            $numPages = 0;
        } else {
            if($membersCount % $search['limit'] > 0) {
                $numPages = ($membersCount - ($membersCount % $search['limit'])) / $search['limit'] + 1;
            } else {
                $numPages = $membersCount / $search['limit'];
            }
        }

        $toReturn = array(
            'rows'      =>  array(),
            'records'   =>  $membersCount,
            'page'      =>  $search['page'],
            'total'     =>  $numPages
        );

        foreach($members as $member) {
            $toReturn['rows'][] = array(
                'id'    =>  $member->id,
                'cell'  =>  array(
                	$member->name,
                    $member->email,
                    $member->phone,
                    empty($member->is_teamlead) ? "Nu" : "Da"
                )
            );
        }

        return json_encode($toReturn);
    }

    public function getTeamXls(AdminRequest $req, TeamMember $member) {
        $search = array(
            'sidx'      =>  Input::get('sidx'),
            'sord'      =>  Input::get('sord'),
            'limit'     =>  empty(Input::get('rows')) ? 10 : Input::get('rows'),
            'page'      =>  empty(Input::get('page')) ? 1 : Input::get('page'),
            'team_id'   =>  Input::get('team_id')
        );

        $members = $member->getFiltered($search);

        
    }
}
