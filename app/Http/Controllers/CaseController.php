<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Perpetrator;
use App\Victim;

class CaseController extends Controller
{
    /*
     *  Case Closed home landing page
     */
    public function index() {
        return view('welcome');
    }


    /*
     *  Display names of all the victims
     *  in the database
     */
    public function display() {
        $victim = Victim::all();
        $victims = $victim->toArray();

        return view('cases')->with(['victims' => $victims]);
    }

    /*
     * Add new victim data
     */
    public function addVictim() {

        # Instantiate a new Victim model
        $victim = new Victim();

        $victim->first_name = 'Jennifer';
        $victim->last_name = 'Bastian';
        $victim->middle_name = 'Marie';
        $victim->date_of_birth = '1973-04-15';
        $victim->age = 13;
        $victim->gender = 'F';

        $victim->save();
        dump('Added: ', $victim->first_name, $victim->last_name);
    }

    public function addIncident() {
        $incident = new Incident();
        $incident->victim_id = 1;
        $incident->perpetrator_id = 1;
        $incident->date = '1986-08-04';
        $incident->year = 1986;
        $incident->details = 'Jennifer’s body was found 28 days after she went missing by a group of joggers near the Five Mile Drive. She had been raped and strangled. ';
        $incident->url = 'https://www.thenewstribune.com/news/local/crime/article211133344.html';

        $incident->save();
        dump('Added: ', $incident->id);

    }

    public function addPerp() {
        $perpetrator = new Perpetrator();
        $perpetrator->first_name = 'Robert';
        $perpetrator->last_name = 'Washburn';
        $perpetrator->victim_id = '3';
        $perpetrator->year_of_birth = 1957;
        $perpetrator->arrest_date = '2018-05-10';
        # $perpetrator->detail = '';

        $perpetrator->save();
        dump('Added:', $perpetrator->first_name, $perpetrator->last_name, $perpetrator->id);

    }

    /*
     * updateVictim updates information
     * about the selected victim
     */
    public function updateVictim() {
        $victim = Victim::where('last_name', '=', 'Bastian')->get();
        $victims = $victim->toArray();
        # dump($victims);
        dump($victims[0]['first_name']);

    }

    public function show($name) {
        $victim = Victim::where('last_name', '=', $name)->get();
        $victims = $victim->toArray();
        $incident = Incident::where('victim_id', '=', $victims[0]['id'])->get();
        $incident_details = $incident->toArray();

        $perpetrator = Perpetrator::where('victim_id', '=', $victims[0]['id'])->get();
        $perpetrators = $perpetrator->toArray();

        $name = [
            'first_name' => $victims[0]['first_name'],
            'last_name' => $victims[0]['last_name'],
            'middle_name' => $victims[0]['middle_name'] != null ? $victims[0]['middle_name'] : '',
            'age' => $victims[0]['age'],
            'gender' => $victims[0]['gender'] == 'F' ? 'Female' : 'Male',
            'detail' => $incident_details[0]['detail'],
            'url' => $incident_details[0]['url'],
            'perp_first_name' => $perpetrators[0]['first_name'],
            'perp_last_name' => $perpetrators[0]['last_name'],
            'arrest_date' => $perpetrators[0]['arrest_date'],
            'year_of_birth' => $perpetrators[0]['year_of_birth']
        ];
        /*

        foreach ($victims as $index => $person) {
            $name = $person['last_name'];
        }
        */
        return view('profile')->with(['name' => $name,]);


    }



}
