<?php namespace App\Http\Controllers;

use App\BikeStation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Renting;
use Auth;
use App\Bike;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('Customer.welcome', compact('user'));

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
     * @return \Illuminate\View\View
     *
     */

    public function ViewRentedBikes(){
        $user = Auth::User();
        $bikes= $user->bikes->toArray();
        $bikestation = BikeStation::first();

        return view('Customer.View.ViewRentedBikes', compact('user', 'bikes', 'bikestation'));


    }

    /**
     * @return \Illuminate\View\View
     * Returns the view for renting a bike, compacting all the bikes and their corresponding bike stations.
     */
    public function RentABike()
    {
        $user = Auth::User();
        $bikestations = BikeStation::all();
        $bikes = Bike::all(); //Must be handles only to view the bikes in the current station not all stations.

        return view('Customer/Create/RentABike', compact('user'));
        /*return redirect('Customer/welcome')->with([
            'flash_message' => 'You have successfully rented the choosen bike!',
            'flash_message_important' => true,
        ]);
        */
    }

    /**
     * @param Requests\Rent $request
     * @return \Illuminate\Http\RedirectResponse
     * Actually renting a bike, updating table rentings, and associating the bike with the current user.
     */
    public function RentTheBike(Requests\Rent $request){

        $user = Auth::User();
        $card_id= $user->card_id;
        $bike_id = $request->bike_id;
        DB::table('bikes')
            ->where('id', $bike_id)
            ->update(['bike_station_id' => -1]);

        $user->bikes()->attach($request->bike_id);

        Renting::create($request->all());
/*
        DB::table('rentings')
            ->where('id', null)
            ->update(['card_id' => $card_id]);*/ //How to update table rentings with the card_id.

        return redirect('Customer/welcome')->with([
            'flash_message' => 'Bike successfully chosen at: ' .Carbon::now(),
            'flash_message_important' => true,
        ]);
    }

    /**
     * Returns the view for parking the bike
     *
     */

    public function ParkABike()
    {
        $user = Auth::User();
        return view('Customer.Create.ParkABike', compact('user'));
    }

    /**
     * Parks the bike in a certain station
     */
    public function ParkTheBike(Requests\Rent $request)
    {
        $bikestation_id = $request->bike_station_id;
        $bike_id = $request->bike_id;
        $bike = Bike::find($bike_id);

        DB::table('bikes')
            ->where('id', $bike_id)
            ->update(['bike_station_id' => $bikestation_id]);

        return redirect('Customer/welcome')->with([
            'flash_message' => 'Bike successfully parked at: ' .Carbon::now(),
            'flash_message_important' => true,
        ]);


    }


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
