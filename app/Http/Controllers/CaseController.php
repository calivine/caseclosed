<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Perpetrator;
use App\Victim;
use App\Actions\Victim\GetVictim;
use App\Actions\Perpetrator\StoreCase;
use App\Actions\Perpetrator\UpdateCase;
use App\Actions\Perpetrator\DestroyCase;
use App\Actions\Source\StoreSource;
use App\Actions\Image\StoreImage;


class CaseController extends Controller
{
    /*
     * GET
     * /home
     * Case Closed home landing page
     */
    public function index()
    {
        $action = new GetVictim();

        return view('welcome')->with($action->rda);
    }

    /*
     * GET
     * /cases
     *  Display names of all the victims
     *  in the database
     */
    public function display()
    {
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

        $sources = $perpetrator->sources;

        return view('case.profile')->with([
            'victim' => $victim,
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

        $action = new StoreCase($request);

        return view('case-dashboard')->with($action->rda);
    }

    /*
     * GET
     * /case/{id}/edit
     * Display Case edit page
     */
    public function edit($id)
    {
        $perpetrator = Perpetrator::find($id);
        return view('case.update')->with([
            'perpetrator' => $perpetrator
        ]);
    }

    /*
     * PUT
     * /case/{id}
     * Process input from edit case page
     */
    public function update(Request $request, $id)
    {
        new UpdateCase($request, $id);

        return redirect('admin')->with([
            'alert' => 'Case/Perpetrator Updated.'
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
        new DestroyCase($id);

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

        $action = new StoreSource($request, $id);

        return redirect()->route('caseDash', ['id' => $action->rda['id']])->with([
            'alert' => 'Added source'
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

        $action = new StoreImage($request, $id);

        return redirect()->route('caseDash', ['id' => $action->rda['id']])->with([
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
