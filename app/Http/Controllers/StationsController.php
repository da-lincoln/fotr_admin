<?php

namespace App\Http\Controllers;

use App\Stations;
use Illuminate\Http\Request;

class StationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = request('name');
        $allStations = Stations::all()->where('name',$name);
        return view('stations.index',['station'=>$allStations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $station = new Stations();
        return view('stations.create', ['station'=>$station]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $station = new Stations();
        $station->name = request();
        $station->river_focus = request();
        $station->image = request();
        $station->date_taken = request();

        $station->Save();

        return redirect('station');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $station = Stations::find($id);
        return view('stations.show',['station'=>$station]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
