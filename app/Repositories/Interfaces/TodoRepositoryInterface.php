<?php
namespace App\Repositories\Interfaces;

Interface TodoRepositoryInterface{
    public function all($id);

    public function store($data);

    public function find($id);
    
    public function update($data,$id);

    public function delete($id);

    public function deleteAssociatedTask($id);

}