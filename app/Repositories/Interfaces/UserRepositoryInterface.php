<?php
namespace App\Repositories\Interfaces;

Interface UserRepositoryInterface{
    public function all();

    public function store($data);

    public function find($id);
    
    public function update($data,$id);

}