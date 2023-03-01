<?php
namespace App\Repositories;
use App\Repositories\Interfaces\TodoRepositoryInterface;
use App\Models\User;
use App\Models\Todolist;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TodoRepository implements TodoRepositoryInterface{

    public function all($id){
        return Todolist::select('todolists.*')
                ->where('todolists.user_id',$id)
                ->get(); 
    }

    public function store($data){        
        $todo = new Todolist;
        $todo->name = $data['name'];
        $todo->user_id = auth()->user()->id;
        $todo->save();
        $todoId = $todo->todo_id;
        if(isset($data['taskTitle'])){
           for($i=1;$i<=sizeof($data['taskTitle']);$i++) {
            for($j=1;$j<=sizeof($data['taskDetails']);$j++){
                if(is_null($data['taskTitle'][$i])){                    
                    return redirect()->route('dashboard')->with('validation_error','task title can not be null');
                }
                $task = new Task;
                $task->task_title = $data['taskTitle'][$i];
                $task->task_details = $data['taskDetails'][$j];
                $task->todo_id = $todoId;
                $task->save();
            }

           }
        }
 
    }

    public function find($id){
        return Todolist::find($id);
    }

    public function update($data,$id){
        $todo = Todolist::find($id);
        $todo->name = $data['name'];
        $todo->save();
    }

    public function delete($id){
        return Todolist::find($id);
    }

    public function deleteAssociatedTask($id){
       return Task::where('todo_id',$id)->get();
    }

}