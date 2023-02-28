<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Events\CustomerOrderEvent;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Auth;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    // User Details
    public function index($id){ 
        $users = $this->userRepository->find($id);
        
        $data=[
            'title'=>'Users',
            'users'=>$users
        ];
        return view('user.users.index',$data);
    }

    // User register
    public function register(){       
        $url = '/users/store';
        $title = 'Users Register';
        $data= compact('url','title');
        return view('user.users.register')->with($data);
    }

    // user store
    public function store(Request $request){
        $data = $request->all();
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'gender'=>'required'
            ]
        );       

        $this->userRepository->store($data);
        $validated=auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ],$request->password);

        if($validated){
            if(Auth::check()){                
                return redirect()->route('dashboard')->with('success','Login Successfull');
            }else{
                return redirect()->back()->with('error','Invalid credentials');
            }
        }else{
            return redirect()->back()->with('error','Invalid credentials, please create an account!');
        }

    }

    // user edit
    public function edit($id){
        $user = $this->userRepository->find($id);
        if(is_null($user)){
            // user not found
            return redirect('/user/users');
        }else {
            // user found
            $url = '/user/users/update'.'/'.$id;
            $title = 'User Edit';

            $data= compact('user','url','title');
            return view('user.users.register')->with($data);

        }
    }

    // user update
    public function update($id, Request $request){
        $data = $request->all();
        $this->userRepository->update($data,$id);

        return redirect('/user/users/'.$id);

    }

    // user deshborard
    public function dashboard(){
        $data=[
            'title'=>'Dashboard'
        ];
        return view('user.dashboard',$data);
    }
    // user logout
    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success','You have been successfully logged out');
    }
}
