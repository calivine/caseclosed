<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incident;
use App\Perpetrator;
use App\Victim;
use App\Image;
use App\User;
use App\Detail;

class CaseController extends Controller
{
    /*
     * GET
     * /home
     * Case Closed home landing page
     */
    public function index() {
        $perpetrator = Perpetrator::find(rand(1,3));

        return view('welcome')->with(['perpetrator' => $perpetrator]);
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

        return view('victims.cases')->with(['victims' => $victims]);
    }

    /*
     * GET
     * /profile/{title}
     * Display details about incident
     *  */
    public function show($name) {

        $victim = Victim::where('last_name', '=', $name)->first();
        $perpetrator = Perpetrator::find($victim->perpetrator_id);

        // $images = Image::where('victim_id', $victim->id)->whereNotNull('victim')->first();

        $image = $perpetrator->image; // ->only(['victim','perpetrator','other1']);

        $sources = $perpetrator->source->only(['url1','url2','url3','url4','url5']);

        return view('victims.profile')->with([
            'victim' => $victim,
            'image' => $image ?? null,
            'sources' => $sources
        ]);
    }

    /*
     * GET
     * /new
     *  Display form to create new record about a case/perpetrator
     */
    public function newCase()
    {
        return view('create.case');
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
     * /add-source/{id}
     * Displays page to add sources
     */
    public function addSource($id)
    {
        $perpetrator = Perpetrator::find($id);

        return view('create.source')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * POST
     * /process-source/{id}
     * Process input from add source route
     */
    public function processSource(Request $request, $id)
    {
        $request->validate([
            'source1' => 'required'
        ]);
        $perpetrator = Perpetrator::find($id);

        $source = Source::where('perpetrator_id', '=', $perpetrator->id)->first();

        if (is_null($source)) {
            $source = new Source;
            $source->url1 = $request->input('source1');
            if ($request->has('source2')) {
                $source->url2 = $request->input('source2');
            }
            if ($request->has('source3')) {
                $source->url3 = $request->input('source3');
            }
            if ($request->has('source4')) {
                $source->url4 = $request->input('source4');
            }
            if ($request->has('source5')) {
                $source->url5 = $request->input('source5');
            }
            $source->perpetrator()->associate($perpetrator);

        }
        else {
            $source->url1 = $request->input('source1');
            if ($request->has('source2')) {
                $source->url2 = $request->input('source2');
            }
            if ($request->has('source3')) {
                $source->url3 = $request->input('source3');
            }
            if ($request->has('source4')) {
                $source->url4 = $request->input('source4');
            }
            if ($request->has('source5')) {
                $source->url5 = $request->input('source5');
            }
        }
        $source->save();

        return redirect()->route('caseDash', ['id' => $perpetrator->id])->with([
            'alert' => 'Added source(s)'
        ]);
    }


    /*
     * GET
     * /add-victim/{id}
     * Display form to create new victim record
     */
    public function addVictim($id)
    {
        return view('create.victim')->with([
            'id' => $id
        ]);
    }


    /*
     * POST
     * /process-victim/{id}
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


        $victim->perpetrator()->associate($perpetrator);
        $victim->save();

        if ($request->has('incident_date') or $request->has('details')) {
            $detail = new Detail;
            if ($request->has('incident_date')) {
                $detail->incident_date = $request->input('incident_date');
            }
            if ($request->has('details')) {
                $detail->description = $request->input('details');
            }
            $detail->victim()->associate($victim);
            $detail->save();
        }

        return redirect()->route('caseDash', ['id' => $perpetrator->id])->with([
            'alert' => 'Added new Victim record.'
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
        return view('admin')->with([
            'perpetrators' => $perpetrators
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
     * /add-images/{id}
     * addImages
     * Display form to save images
     */
    public function addImages($id)
    {
        // Display form to add images related to Perpetrator
        $perpetrator = Perpetrator::find($id);
        return view('create.image')->with([
            'perpetrator' => $perpetrator
        ]);
    }


    /*
     * POST
     * /images/{id}
     * processImages
     * Process input from /add-images
     */
    public function processImages(Request $request, $id)
    {
        $request->validate([
            'victim' => 'required'
        ]);
        $perpetrator = Perpetrator::find($id);
        $image = new Image;
        $image->victim = $request->input('victim');
        if ($request->has('perpetrator')) {
            $image->perpetrator = $request->input('perpetrator');
        }
        if ($request->has('other')) {
            $image->other1 = $request->input('other');
        }
        $image->perpetrator()->associate($perpetrator);
        $image->save();
        return redirect()->route('caseDash', ['id' => $perpetrator->id])->with([
            'alert' => 'Images Added.'
        ]);


    }

    /*
     * GET
     * /update-victim/{id}
     * Update Victim info
     */
    public function updateVictim($id)
    {
        $victim = Victim::find($id);
        return view('update.victim')->with([
            'victim' => $victim
        ]);
    }

    /*
     * POST
     * /process-update-victim/{id}
     * Process the input for updating victim information
     */
    public function processUpdateVictim(Request $request, $id)
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
            $victim->detail->incident_date = $request->input('incident_date');
        }
        if ($request->has('details')) {
            $victim->detail->description = $request->input('details');
        }
        if ($request->has('location')) {
            $victim->detail->location = $request->input('location');
        }
        $victim->save();
        $victim->detail->save();
        return redirect()->route('caseDash', ['id' => $victim->perpetrator->id])->with([
            'alert' => 'Victim Updated'
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
