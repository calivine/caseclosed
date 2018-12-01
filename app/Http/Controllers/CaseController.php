<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incident;
use App\Perpetrator;
use App\Victim;

class CaseController extends Controller
{
    /*
     *  Case Closed home landing page
     */
    public function index() {
        $profile_id = rand(9, 19);
        $victim = Victim::where('id', '=', $profile_id)->get();

        return view('welcome')->with(['victims' => $victim]);
    }

    /*
     *  Display names of all the victims
     *  in the database
     */
    public function display() {
        $victim = Victim::orderBy('last_name')->get();
        $victims = $victim->toArray();

        return view('cases')->with(['victims' => $victims]);
    }

    /*
     * Display details about incident
     *  */
    public function show($name) {

        $victim = DB::table('victims')
            ->join('incidents', 'victims.id', '=', 'incidents.victim_id')
            ->select('victims.*', 'incidents.detail', 'incidents.url')
            ->where('victims.last_name', '=', $name)
            ->first();

        $perp = DB::table('perpetrators')
            ->select('first_name', 'last_name', 'year_of_birth', 'arrest_date')
            ->where('victim_id', '=', $victim->id)
            ->first();

        return view('profile')->with(['victim' => $victim,
                'perp' => $perp]
        );

    }



}
