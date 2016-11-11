<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;
use Validator;
use Session;

use App\Http\Requests;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contact')
        ->withAddress(EnvController::getValue(Keys::Address))
        ->withTelephone(EnvController::getValue(Keys::Telephone));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ContactMessage::$rule);

        if ($validator->fails()){
            Session::flash('rejected', 'Messages is not sent');
            return view('pages.contact')->withInput($request)->withMessages($validator->messages())
                ->withAddress(EnvController::getValue(Keys::Address))
                ->withTelephone(EnvController::getValue(Keys::Telephone));
        }else{
            $cont = new ContactMessage();

            $cont->name = $request->name;
            $cont->email = $request->email;
            $cont->subject = $request->subject;
            $cont->message = $request->message;

            $cont->save();

            Session::flash('success', 'Message saved successfully');
            return view('pages.contact')->withAddress(EnvController::getValue(Keys::Address))
                ->withTelephone(EnvController::getValue(Keys::Telephone));
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
        //
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
