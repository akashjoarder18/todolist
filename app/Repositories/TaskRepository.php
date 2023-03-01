<?php
namespace App\Repositories;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\User;
use App\Models\Todolist;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface{

    public function all($id){
        return Task::select('tasks.*')
                ->where('tasks.todo_id',$id)
                ->get(); 
    }

    public function store($data){        
        $task = new Task;
        $task->task_title = $data['task_title'];
        $task->task_details = $data['task_details'];
        $task->todo_id = $data['todo_id'];
        $task->save();
 
    }

    public function findParent($id){
        return Todolist::find($id);
    }
    public function find($id){
        return Task::find($id);
    }

    public function update($data,$id){
        $task = Task::find($id);
        $task->task_title = $data['task_title'];
        $task->task_details = $data['task_details'];
        $task->save();
    }

    public function delete($id){
        return Task::find($id);
    }

}