<?php namespace App\Contracts;

interface UserRepositoryInterface{
    public function update($model, $id);
    public function delete($id);
    public function getAll();
    public function find($id);
    public function getBy($column, $value);
}