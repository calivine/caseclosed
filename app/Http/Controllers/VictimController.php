<?php

namespace App\Http\Controllers;

use App\Actions\Victim\DestroyVictim;
use App\Actions\Victim\StoreVictim;
use Illuminate\Http\Request;
use App\Message;
use App\Source;
use Illuminate\Support\Facades\DB;
use App\Perpetrator;
use App\Victim;
use App\Image;
use App\User;
use App\Actions\Victim\UpdateVictim;

class VictimController extends Controller
{
    /*
     * GET
     * /victim/{id}/new
     * Display form to create new victim record
     */
    public function newVictim($id)
    {
        return view('victim.create')->with([
            'id' => $id
        ]);
    }

    /*
     * POST
     * /victim/{id}
     * Process the input from /add-victim and save to database
     */
    public function storeVictim(Request $request, $id)
    {
        $request->validate([
            'victim_name' => 'required',
            'incident_date' => 'required',
            'cause_of_death' => 'required',
            'gender' => 'required'
        ]);

        $action = new StoreVictim($request, $id);

        return redirect()->route('caseDash', ['id' => $action->rda['id']])->with([
            'alert' => 'Added new Victim record.'
        ]);

    }

    /*
     * GET
     * Update Victim info
     * /victim/{id}/edit
     */
    public function editVictim($id)
    {
        $victim = Victim::find($id);

        return view('victim.update')->with([
            'victim' => $victim
        ]);
    }

    /*
     * PUT
     * /victim/{id}
     * Process the input for updating victim information
     */
    public function updateVictim(Request $request, $id)
    {
        $action = new UpdateVictim($request, $id);

        return redirect()->route('caseDash', ['id' => $action->rda['id']])->with([
            'alert' => 'Victim Updated'
        ]);
    }

    /*
     * GET
     * /victim/{id}/delete
     * Display delete victim record confirmation
     */
    public function deleteVictim($id) {

        $victim = Victim::find($id);

        return view('victim.delete')->with([
            'victim' => $victim
        ]);
    }

    /*
     * Complete the delete process
     * DELETE
     * /victim/{id}
     */
    public function destroyVictim($id) {

        $action = new DestroyVictim(
            $id
        );

        return redirect()->route('caseDash', ['id' => $action->rda['caseID']])->with([
            'alert' => 'Victim Deleted.'
        ]);
    }
}
