<?php namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user) {
        $this->model = $user;
    }

    public function update($model, $id) {
        $user = $this->model->find($id);
        return $user->update($model);
    }

    public function delete($id) {
        $user = $this->model->find($id);
        if($user){
            if(!$user->delete()){
                return false;
            }
        } else {
            return false;
        }
    }

    public function getAll() {
        return $this->model->latest()->paginate(5);
    }

    public function getBy($column, $value) {
        return $this->model->where($column, $value)->get();
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

}