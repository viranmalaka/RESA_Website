<?php

namespace App\Http\Controllers;

use App\Seminar;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

use App\Http\Requests;

class SeminarController extends Controller
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
        $allUser = User::all();
        $users = [];
        foreach ($allUser as $item) {
            $users[$item['id']] = $item['name'];
        }

        return view('seminar.create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allUser = User::all();
        $users = [];
        foreach ($allUser as $item) {
            $users[$item['id']] = $item['name'];
        }

        $validator = Validator::make($request->all(), Seminar::$rules);
        if ($validator->fails()) {
            Session::flash('rejected', 'Seminar is not Created');
            return view('seminar.create')->withInput($request)->withMessages($validator->messages())->withUsers($users);
        } else {
//            dd("store");
            $seminar = new Seminar();
            $seminar->school = $request->school;
            $seminar->date = $request->date;
            $seminar->description = $request->description;

            $seminar->save();

            $seminar->Users()->sync($request->users,false);

            $pics = $request->pics;

            $i = 0;
            foreach ($pics as $pic) {
               // if ($pic != null){
//                        dd($pics[$i]);
                $fileName = $seminar->id . '_' . $i . "." . $pic->getClientOriginalExtension();
                $image = Input::file($pic);
                $location = public_path('image/seminar/' . $fileName);
//                dd($pic, $location);
                Image::make($pic)->save($location);
                
                DB::insert('insert into seminar_photo (seminar_id, pic) values (?, ?)', [$seminar->id, $fileName]);
                
                $i++;
            //    }
            }

                Session::flash('success', 'Seminar is Created');

                return redirect()->route('seminar.show', $seminar->id);
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
        $pics = DB::select('select pic from seminar_photo where seminar_id = ?', [$id]);
        //dd($pics);
        $seminar = Seminar::find($id);
        return view('seminar.show')->withSeminar($seminar)->withPics($pics);
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
