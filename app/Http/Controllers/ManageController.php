<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Auth;

use App\Publication;
use App\User;
use App\Bar;

use Spatie\OpeningHours\OpeningHours;


class ManageController extends Controller
{
    function home(){

    	$bars = Bar::where('manager', Auth::id() )->get(); 

    	return view('manage.home',['bars'=>$bars]);
    }

    function publications(){

    	$bars = Bar::where('manager', Auth::id() )->get(); 

    	return view('manage.home',['bars'=>$bars]);
    }


    function newBar(){

        $action = 'BarsController@saveBar';
        $method = 'POST';

        return view('bars.create',['action'=>$action,'method'=>$method]);

    }

    function Bars(){

        $bars = Bar::where('manager', Auth::id() )->get(); 

        return view('bars.browse',['items'=>$bars]);
    }


}
