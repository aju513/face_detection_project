<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function store($data, $member = null)
    {

        $data['password'] = Hash::make($data['password']);
        $model = $this->model->create($data);
        if ($this->model->pivots) {
            foreach ($this->model->pivots as $pivot) {
                if (isset($data[$pivot])) {
                    $model->$pivot()->sync($data[$pivot]);
                }
            }
        }
        $model->update([
            'memberable_id' => $member ? $member->id : $model->id,
            'memberable_type' => $member ? get_class($member) : get_class($model)
        ]);
        return $model;
    }
    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($this->model->pivots) {
            foreach ($this->model->pivots as $pivot) {
                $model->$pivot()->sync([]);
            }
        }
        if ($model->memberable) {
            $model->memberable->delete();
        }
        return $model->delete();
    }
    public function searchable($params)
    {
        $search_indexes = ['name', 'email'];

        foreach ($search_indexes as $index) {
            if (isset($params[$index]) ? $params[$index] : '') {
                $value = $params[$index];
                $this->model = $this->model->where($index, 'like', "%$value%");
            }
        }

        if (isset($params['status']) && $params['status'] !== "") {
            $this->model = $this->model->where('status', $params['status']);
        }
        return $this;
    }

    // public function scope()
    // {
    //     $this->model = $this->model->where('id', '!=', 1);
    //     return $this;
    // }
}
