<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends FrontendController
{

    public function index()
    {
//        $this->data('x', 10);
//        $this->data('y', 20);
//        $this->data('title','hello');
//        $this->makeTitle('home');


        $this->data('title',$this->makeTitle('home'));

        return view($this->pagePath. 'home.home',$this->data);
    }
    public function contact()
    {
 $this->data('title',$this->makeTitle('welcome'));
        return view($this->pagePath. 'home.contact',$this->data);
    }
    public function about()
    {
//        $this->data('title',$this->makeTitle(''));
        return view($this->pagePath. 'home.about',$this->data);
    }

    public function login(Request $request){
        if ($request->isMethod('get')){
            return view($this->frontendPath.'users.login',$this->data);

        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'username'=>'required',
                'password'=>'required'
            ]);
            $username=$request->username;
            $password=$request->password;

            if( Auth::guard('web')->attempt(['username'=>$username,'password'=>$password])) {

                return redirect()->intended(route('users'));
            }
            else{
                return redirect()->back()->with('error','Username & Password Not match');
            }
        }
    }

    public function user(Request $request)
    {
        return view($this->frontendPath.'users.index',$this->data);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->intended(route('login'))->with('success','Successfully logout');
    }


}
