<?php

namespace App\Http\Controllers;

use App\Question;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Validator;

class QuestionController extends Controller
{
//    public function __construct()
//    {
//        return $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allQue = Question::all();
        return view('questions.index')->withQuestions($allQue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alltags = Tag::all();
        $tags = [];
        foreach ($alltags as $tag){
            $tags[$tag['id']] = $tag['name'];
        }
        return view('questions.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Question::$rules);
        $alltags = Tag::all();
        $tags = [];
        foreach ($alltags as $tag){
            $tags[$tag['id']] = $tag['name'];
        }

        if ($validator->fails()){
            Session::flash('rejected', 'Questions is not added');
            return view('questions.create')->withInput($request)->withTags($tags)->withMessages($validator->messages());
        }else{
            $question = new Question();

            $question->name = $request->name;
            $question->email = $request->email;
            $question->title = $request->title;
            $question->body = $request->body;

            $question->save();
            $question->tags()->sync($request->tag, false);

            Session::flash('success', 'Question saved successfully');
            return redirect()->route('questions.show', $request->id);
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
        $question = Question::find($id);
//        dd($question->answer());
        return view('questions.show')->withQuestion($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //@todo edit questions
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
        // @todo update questions
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //@todo delete 
    }
}
