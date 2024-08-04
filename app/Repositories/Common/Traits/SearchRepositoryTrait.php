<?php

namespace App\Repositories\Common\Traits;

/**
 * Trait SearchRepositoryTrait
 * @package Core\Repositories\Common\Traits
 */
trait SearchRepositoryTrait
{

    /**
     * @param $attr
     * @param $value
     * @return mixed
     */
    public function findBy($attr, $value)
    {
        $query = $this->model->query();
        return $query->where($attr, $value)->paginate(10);
    }


    /**
     * @param $params
     * @return mixed
     */
    public function search($params)
    {
        $query = $this->model;
        foreach ($params as $attr => $value) {
            $query->where($attr, $value);
        }
        return $query->get();
    }

    /**
     * Find a particular row
     *
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function find($id)
    {
        $query = $this->model->query();
        return $query->find($id);
    }

    /**
     * Find a particular row otherwise fail
     *
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function findOrFail($id)
    {
        $query = $this->model->query();
        return $query->findOrFail($id);
    }

    /**
     * @param $field
     * @param $value
     * @param string $operator
     * @return mixed
     */
    public function where($field, $value, $operator = '=')
    {
        $this->model = $this->model->where($field, $operator, $value);
        return $this;
    }

    /**
     * @param $param
     * @param $value
     * @return mixed
     */
    public function whereIn($param, $value)
    {
        $this->model = $this->model->whereIn($param, $value);
        return $this;
    }

    /**
     * @param $field
     * @param $callback
     * @return SearchRepositoryTrait
     */
    public function whereHas($field, $callback)
    {
        $this->model = $this->model->whereHas($field, $callback);
        return $this;
    }


    /**
     * @return mixed
     */
    public function all()
    {
        $query = $this->model->query();
        return $query->all();
    }
}
