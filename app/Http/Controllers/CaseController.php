<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incident;
use App\Perpetrator;
use App\Victim;
use App\Image;

class CaseController extends Controller
{
    /*
     *  Case Closed home landing page
     */
    public function index() {
        $profile_id = rand(1,3);

        $perpetrator = Perpetrator::find($profile_id);

        return view('welcome')->with(['perpetrator' => $perpetrator]);
    }

    /*
     *  Display names of all the victims
     *  in the database
     */
    public function display() {
        $victim = Victim::orderBy('last_name')->get();
        $victims = $victim->toArray();

        return view('victims.cases')->with(['victims' => $victims]);
    }

    /*
     * Display details about incident
     *  */
    public function show($name) {

        $victim = Victim::where('last_name', '=', $name)->with('image')->first();

        // $images = Image::where('victim_id', $victim->id)->whereNotNull('victim')->first();

        $image = $victim->image; // ->only(['victim','perpetrator','other1']);

        $sources = $victim->source->only(['url1','url2','url3','url4','url5']);

        return view('victims.profile')->with([
            'victim' => $victim,
            'image' => $image ?? null,
            'sources' => $sources
        ]);
    }
}
