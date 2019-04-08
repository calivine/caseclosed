<?php

namespace App\Http\Controllers;

use App\Message;
use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Perpetrator;
use App\Victim;
use App\Image;
use App\User;

class CaseController extends Controller
{
    /*
     * GET
     * /home
     * Case Closed home landing page
     */
    public function index() {
        $perpetrators = Perpetrator::all();
        // $perpetrator = $perpetrators->random();
        // $perpetrator = Perpetrator::find(rand(1,3));

        return view('welcome')->with(['perpetrator' => $perpetrators->random()]);
    }

    /*
     * GET
     * /cases
     *  Display names of all the victims
     *  in the database
     */
    public function display() {
        $victim = Victim::orderBy('last_name')->get();
        $victims = $victim->toArray();

        return view('modules.list')->with(['victims' => $victims]);
    }

    /*
     * GET
     * /profile/{title}
     * Display details about incident
     *  */
    public function show($name) {

        $victim = Victim::where('last_name', '=', $name)->first();

        $perpetrator = Perpetrator::find($victim->perpetrator_id);

        $images = $perpetrator->images;
        $victImage = $images->firstWhere('type', 'victim');
        $perpImage = $images->firstWhere('type', 'perpetrator');

        $sources = $perpetrator->sources;

        return view('case.profile')->with([
            'victim' => $victim,
            'victImage' => $victImage ?? null,
            'perpImage' => $perpImage ?? null,

            'sources' => $sources
        ]);
    }

    /*
     * GET
     * /admin
     * Display Admin Dashboard
     * Get Perpetrator IDs to list links for Case Dashboards
     */
    public function adminDash()
    {
        $perpetrators = Perpetrator::all();

        $messages = Message::where('status', 'unread')->get();

        
        return view('admin')->with([
            'perpetrators' => $perpetrators,
            'messages' => $messages->isNotEmpty() ? $messages : null
        ]);
    }

    /*
     * GET
     * /case-dashboard/{id}
     * displayDash($id)
     * caseDash
     * Display case dashboard page
     */
    public function displayDash($id)
    {
        $perpetrator = Perpetrator::find($id);
        return view('case-dashboard')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * GET
     * /case/new
     *  Display form to create new record about a case/perpetrator
     */
    public function newCase()
    {
        return view('case.create');
    }

    /*
     * POST
     * /create
     * Process input to create a new case record
     */
    public function create(Request $request)
    {
        # Validate user input
        $request->validate([
            'perp_name' => 'required'
        ]);

        $perpetrator = new Perpetrator();
        $name = explode(" ", $request->input('perp_name'));
        $perpetrator->first_name = $name[0];
        if (count($name) > 2) {
            $perpetrator->middle_name = $name[1];
            $perpetrator->last_name = $name[2];
        } else {
            $perpetrator->last_name = $name[1];
        }
        if ($request->has('perp_arrest')) {
            $perpetrator->arrest_date = $request->input('perp_arrest');
        }
        if ($request->has('perp_dob')) {
            $perpetrator->date_of_birth = $request->input('perp_dob');
        }
        if ($request->has('perp_death')) {
            $perpetrator->date_of_death = $request->input('perp_death');
        }
        if ($request->has('perp_details')) {
            $perpetrator->description = $request->input('perp_details');
        }

        $perpetrator->save();

        return view('case-dashboard')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * GET
     * /case/{id}/delete
     * Display confirmation page for case delete
     */
    public function deleteCase($id)
    {
        $perpetrator = Perpetrator::find($id);

        return view('case.delete')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * DELETE
     * /case/{id}
     * Delete process for cases
     */
    public function destroyCase($id)
    {
        $perpetrator = Perpetrator::find($id);
        $perpetrator->victims()->delete();
        $perpetrator->sources()->delete();
        $perpetrator->images()->delete();
        $perpetrator->delete();

        return redirect('admin')->with([
            'alert' => 'Case Deleted.'
        ]);
    }

    /*
     * GET
     * /source/{id}/new
     * Displays page to add sources
     */
    public function newSource($id)
    {
        $perpetrator = Perpetrator::find($id);

        return view('source.create')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * POST
     * /source/{id}
     * Process input from add source route
     */
    public function processSource(Request $request, $id)
    {
        $request->validate([
            'source' => 'required'
        ]);

        $perpetrator = Perpetrator::find($id);

        $source = new Source;
        $source->url = $request->input('source');

        $source->perpetrator()->associate($perpetrator);

        $source->save();

        return redirect()->route('caseDash', ['id' => $perpetrator->id])->with([
            'alert' => 'Added source'
        ]);
    }

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
    public function processVictim(Request $request, $id)
    {
        $request->validate([
            'victim_name' => 'required',
            'incident_date' => 'required',
            'cause_of_death' => 'required',
            'gender' => 'required'
        ]);

        $perpetrator = Perpetrator::find($id);
        $victim = new Victim;

        // Split victim name input into First Middle Last
        $name = explode(" ", $request->input('victim_name'));
        $victim->first_name = $name[0];
        if (count($name) > 2) {
            $victim->middle_name = $name[1];
            $victim->last_name = $name[2];
        } else {
            $victim->last_name = $name[1];
        }
        $victim->gender = $request->input('gender');

        $victim->cause_of_death = $request->input('cause_of_death');
        if ($request->has('dob')) {
            $victim->date_of_birth = $request->input('dob');
        }
        if ($request->has('incident_date') or $request->has('details')) {

            if ($request->has('incident_date')) {
                $victim->incident_date = $request->input('incident_date');
            }
            if ($request->has('details')) {
                $victim->description = $request->input('details');
            }
        }
        $victim->perpetrator()->associate($perpetrator);
        $victim->save();

        return redirect()->route('caseDash', ['id' => $perpetrator->id])->with([
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
        $victim = Victim::find($id);
        if ($request->has('victim_name')) {
            $name = explode(" ", $request->input('victim_name'));
            $victim->first_name = $name[0];
            if (count($name) > 2) {
                $victim->middle_name = $name[1];
                $victim->last_name = $name[2];
            } else {
                $victim->last_name = $name[1];
            }
        }
        if ($request->has('dob')) {
            $victim->date_of_birth = $request->input('dob');
        }
        if ($request->has('incident_date')) {
            $victim->incident_date = $request->input('incident_date');
        }
        if ($request->has('details')) {
            $victim->description = $request->input('details');
        }
        if ($request->has('location')) {
            $victim->location = $request->input('location');
        }
        $victim->save();
        return redirect()->route('caseDash', ['id' => $victim->perpetrator->id])->with([
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
        $victim = Victim::find($id);
        $caseID = $victim->perpetrator->id;
        $victim->delete();

        return redirect()->route('caseDash', ['id' => $caseID])->with([
            'alert' => 'Victim Deleted.'
        ]);
    }

    /*
     * GET
     * /image/{id}/new
     * Display form to save images
     */
    public function newImage($id)
    {
        // Display form to add images related to Perpetrator
        $perpetrator = Perpetrator::find($id);
        return view('image.create')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * POST
     * /image/{id}
     * Process input from /image/{id}/new
     */
    public function processImage(Request $request, $id)
    {
        $request->validate([
            'url' => 'required'
        ]);
        $perpetrator = Perpetrator::find($id);

        $image = new Image;
        $image->url = $request->input('url');
        $image->type = $request->input('type');
        if ($request->has('caption')) {
            $image->caption = $request->input('caption');
        }
        $image->perpetrator()->associate($perpetrator);

        $image->save();
        return redirect()->route('caseDash', ['id' => $perpetrator->id])->with([
            'alert' => 'Image Added.'
        ]);
    }
    /*
     * $perpetrators = Perpetrator::all();
        $perp_labels = array();
        foreach($perpetrators as $perpetrator) {
            $perp_name = $perpetrator->first_name . " ";
            $perp_name .= (is_null($perpetrator->middle_name)) ? " " : $perpetrator->middle_name . " ";
            $perp_name .= $perpetrator->last_name;
            $perp_labels[] = $perp_name;
        }
     *
     *
     */
}
