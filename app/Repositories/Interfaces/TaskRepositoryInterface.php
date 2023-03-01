<?php
namespace App\Repositories\Interfaces;

Interface TaskRepositoryInterface{
    public function all($id);

    public function store($data);

    public function find($id);

    public function findParent($id);
    
    public function update($data,$id);

    public function delete($id);

}