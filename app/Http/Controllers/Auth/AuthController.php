<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Image;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     * 
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(Input::all(), User::$rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        if (Input::hasFile('p_pic')){
            $fileName = time() . "." . Input::file('p_pic')->getClientOriginalExtension();
        }else{
            $fileName = "";
        }

        $data['image'] = $fileName;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

            'address' => $data['address'],
            'field' => $data['field'],
            'tel' => $data['telephone'],
            'gender' => $data['gender'],
            'school' => $data['school'],
            'level' => $data['level'],
            'about' => $data['about'],
            'image' => $data['image'],
            'facebook_link' => $data['facebook_link'],
            'linkedin_link' => $data['linkedin_link'],
            'twitter_link' => $data['twitter_link'],
            'instagram_link' => $data['instagram_link'],

            'access' => 0
        ]);

//        dd($data);
        if (Input::hasFile('p_pic')){
            $image = Input::file('p_pic');
            $location = public_path('image/' . $fileName);
            Image::make($image)->resize(400, 400)->save($location);
        }
        
        Session::flush('success', 'User Created');
        return $user;
    }
}

//MIMES
