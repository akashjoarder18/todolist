<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Auth;

class TaskController extends Controller
{
    private $taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository){
        $this->taskRepository = $taskRepository;
    }
    // task lists details
    public function view($id){ 
        $todo = $this->taskRepository->findParent($id);
        $taskLists = $this->taskRepository->all($id);
        $data=[
            'title'=>'Users Todo task Lists',
            'taskLists'=>$taskLists,
            'todo' => $todo
        ];
        return view('user.tasklists.index',$data);
    }

    // task list create
    public function create($id){  
        $todo_id = $id;             
        $url = '/tasklists/store';
        $title = 'Users Task Lists Create';
        $data= compact('url','title','todo_id');
        return view('user.tasklists.create')->with($data);
    }

    // task store
    public function store(Request $request){
        $data = $request->all();
        $request->validate(
            [
                'task_title'=>'required'
            ]
        );       

        $this->taskRepository->store($data);
        return redirect('/task/tasklists/view/'.$data['todo_id']);

    }

    // task edit
    public function edit($id){
        $task = $this->taskRepository->find($id);
        if(is_null($task)){
            // task not found
            return redirect()->back();
        }else {
            // user found
            $todo_id = $task->todo_id;
            $url = '/task/tasklists/update'.'/'.$id;
            $title = 'User Task Lists Edit';
            $data= compact('task','url','title','todo_id');
            return view('user.tasklists.create')->with($data);

        }
    }

    // task update
    public function update($id, Request $request){
        $data = $request->all();
        $this->taskRepository->update($data,$id);
        return redirect('/task/tasklists/view/'.$data['todo_id']);

    }

    // task delete
    public function delete($id){
        $task = $this->taskRepository->delete($id);
        if(!is_null($task)){
            $task->delete();
        }
        return redirect()->back();
    }

  

}
