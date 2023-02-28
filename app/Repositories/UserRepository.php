<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface{

    public function all(){
        return User::all(); 
    }

    public function store($data){        
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];
        $user->status = 1;
        $user->password = \Hash::make($data['password']);
        $user->save();
 
    }

    public function find($id){
        return User::find($id);
    }

    public function update($data,$id){
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];
        $user->save();
    }

}