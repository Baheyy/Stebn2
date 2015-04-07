<?php namespace App\Http\Controllers;

use App\BikeStation;
use App\Card;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Bike;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Auth::User();
		return view('admin.welcome', compact('user'));
	}

    public function cards()
    {
        $user = Auth::User();
        return view('admin.create.cards', compact('user'));
    }

    public function bikes()
    {
        $user = Auth::User();
        return view('admin.create.bikes', compact('user'));
    }

    public function bikeStations()
    {
        $user = Auth::User();
        return view('admin.create.bikestations', compact('user'));
    }

    public function CreateBikeStations(Requests\CreateBikeStation $request)
    {
        BikeStation::create($request->all());
        return redirect('admin/welcome')->with([
            'flash_message' => 'Bike Station
            created successfully!',
            'flash_message_important' => true,
        ]);
    }

    public function CreateBikes(Requests\CreateBike $request)
    {
        Bike::create($request->all());
        return redirect('admin/welcome')->with([
             'flash_message' => 'Bike created successfully!',
             'flash_message_important' => true,
         ]);
    }

    public function CreateCards(Requests\CreateCards $request)
    {
        //dd($request->number);

        $n = $request->number;

        while($n > 0)
        {
            $card = new Card;
            $card->save();
            $n = $n - 1;
        }

        return redirect('admin/welcome')->with([
        'flash_message' => 'Card(s) created successfully!',
        'flash_message_important' => true,
    ]);
    }

    public function viewBikeStations()
    {
        $user = Auth::User();
        $bikeStations = BikeStation::all();
        return view('admin.view.bikeStations', compact('user'), compact('bikeStations'));
    }

    /**
     * This method returns the bikes in a certain given station.
     */
    public function viewBikes(Requests\viewBikes $request)
    {
        $bikestation = BikeStation::find($request->bikeStations +1);
        $bikes = $bikestation->bikes->toArray();
        $user = Auth::User();

        return view('admin.view.BikesInStation', compact('bikes'), compact('user'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
