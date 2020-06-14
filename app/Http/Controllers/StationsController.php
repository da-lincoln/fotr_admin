<?php

namespace App\Http\Controllers;

use App\Stations;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class StationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name = request('name');
        $station = Stations::Where('name',"$name")->get();
        return View('stations.index')->with(compact('station'))->with('name',"$name");

    }

    public function home()
    {
        $station = Stations::all();
        return View('home')->with(compact('station'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = request('name');
        $station = new Stations();
        return view('stations.create', ['station'=>$station])->with('name',"$name");
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

        $station->name = request('stationName');
        $station->river_focus = request('stationRiver');
        $station->date_taken = request('stationDate');
        /*
        $extension = $request->stationImage->getClientOriginalExtension();
        $path = $request->file('stationImage')->storeAs('images',$station->name.'.'.$extension);
        $request->stationImage = $path;
        $station->image = $path;
        */

        //Get file from request
        $file = $request->file('stationImage');
        // Get contents of file
        $contents = $file->openFile()->fread($file->getSize());
        // Store contents in db
        $station->image = $contents;

        $station->Save();

        return redirect('station/'.$station->name);
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
        return view('stations.show',['station'=>$station] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Stations::find($id);
        return view('stations.edit',['station'=>$station]);
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
        $station = Stations::find($id);

        $station->name = request('stationName');
        $station->river_focus = request('stationRiver');
        $station->date_taken = request('stationDate');

        if($request->file('stationImage')->isValid()) {
            //Get file from request
            $file = $request->file('stationImage');
            // Get contents of file
            $contents = $file->openFile()->fread($file->getSize());
            // Store contents in db
            $station->image = $contents;
        }

        $station->save();
        $name = $station->name;
        return redirect('/station/'.$name);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Stations::findOrFail($id);
        $station->delete();
        return redirect('station/'.$station->name);
    }

    /**
     * @param $id
     */
    public function getImage($id)
    {
        $station = \App\Stations::find($id);
        return response()->make($station->image, 200, array(
            'Content-Type' => (new \finfo(FILEINFO_MIME))->buffer($station->image)
        ));
    }


}
