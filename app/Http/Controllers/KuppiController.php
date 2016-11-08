<?php

namespace App\Http\Controllers;

use App\Kuppi;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class KuppiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allKuppi = Kuppi::all();
        return view('kuppi.index')->withKuppi($allKuppi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kuppi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->time = strtotime($request->time);
        $validator = Validator::make($request->all(), Kuppi::$rules);

        if ($validator->fails()){
//            dd($validator->messages());
            Session::flash('rejected', 'Kuppi is not saved');
            return view('kuppi.create')->withInput($request)->withMessage($validator->messages());
        }else{

            list($y, $m, $d) = explode('-',$request->date);
            $H = date('H', $request->time);
            $M = date('i', $request->time);

            $timestamp = date("h-i-s-M-d-Y",mktime($H,$M,'00',$m,$d,$y));

            //dd($timestamp);

            $kuppi = new Kuppi();
            $kuppi->created_by = $request->created_by;
            $kuppi->subject = $request->subject;
            $kuppi->date_time = $timestamp;
            $kuppi->place = $request->place;
            $kuppi->message = $request->message;

            $kuppi->save();

            Session::flash('success', 'Kuppi is Saved successfully');

            return redirect()->route('kuppi.show', $kuppi->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kuppi = Kuppi::find($id);
        return view('kuppi.show')->withKuppi($kuppi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // @todo edit kuppi
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
        //@todo update kuppi details
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //@todo delete kuppi
    }
}
