<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Interfaces\TodoRepositoryInterface;
use Auth;

class TodoController extends Controller
{
    private $todoRepository;
    public function __construct(TodoRepositoryInterface $todoRepository){
        $this->todoRepository = $todoRepository;
    }
    // todo lists details
    public function index($id){ 
        $todoLists = $this->todoRepository->all($id);
        $data=[
            'title'=>'Users Todo Lists',
            'todoLists'=>$todoLists
        ];
        return view('user.todolists.index',$data);
    }

    // todo list create
    public function create(){       
        $url = '/todolists/store';
        $title = 'Users Todo Lists Create';
        $flag = 1;
        $data= compact('url','title','flag');
        return view('user.todolists.create')->with($data);
    }

    // todo store
    public function store(Request $request){
        $data = $request->all();
        $request->validate(
            [
                'name'=>'required'
            ]
        ); 
        if(isset($data['taskTitle'])){
            for($i=1;$i<=sizeof($data['taskTitle']);$i++) {
             for($j=1;$j<=sizeof($data['taskDetails']);$j++){
                 if(is_null($data['taskTitle'][$i])){                    
                     return redirect()->back()->with('validation_error','task title'.$i.' can not be null');
                 }
                }      
            }
        }
        $this->todoRepository->store($data);
        $id = auth()->user()->id;
        return redirect('/todo/todolists/'.$id);

    }

    // todo edit
    public function edit($id){
        $todo = $this->todoRepository->find($id);
        if(is_null($todo)){
            // todo not found
            return redirect('/todo/todolists/'.auth()->user()->id);
        }else {
            // todo found
            $url = '/todo/todolists/update'.'/'.$id;
            $title = 'User Todo Lists Edit';
            $flag = 0;
            $data= compact('todo','url','title','flag');
            return view('user.todolists.create')->with($data);

        }
    }

    // todo update
    public function update($id, Request $request){
        $data = $request->all();
        $this->todoRepository->update($data,$id);

        return redirect('/todo/todolists/'.auth()->user()->id);

    }

     // todo delete
     public function delete($id){
        $todo = $this->todoRepository->delete($id);
        if(!is_null($todo)){
            $task = $this->todoRepository->deleteAssociatedTask($id);
            if(!is_null($task)){  
                foreach($task as $item){
                    $item->delete();
                } 
            }
            $todo->delete();
        }

        return redirect()->back();

    }

  

}
