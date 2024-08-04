<?php

namespace App\UI\Traits;

trait CommonTrait
{
    public function getAttribute($record, $attribute)
    {
        if (method_exists($this, $attribute)) {
            return $this->$attribute($record);
        }
        return $record->$attribute;
    }

    public function getUniqueId($model, $field)
    {
        $method = $field . "UniqueId";
        if (method_exists($this, $method)) {
            return $this->$method($model);
        }
        return $model->id;
    }
    public function getRoute($model, $params = [])
    {
        return $model->exists ? route("admin.$this->route.update", [$model->id] + $params) : route("admin.$this->route.store", $params);
    }

    public function getMethod($model)
    {
        return $model->exists ? 'PUT' : 'POST';
    }

    public function getUpdateRules($model)
    {
        return $this->rules['update'];
    }
    public function getStoreRules()
    {
        return $this->rules['store'];
    }

    public function getMessages()
    {
        return [];
    }

    public function getPermission($index)
    {
        return $this->permissions[$index];
    }

    public function getActions()
    {
        return [];
    }

    public function createAction()
    {
        return null;
    }
}
