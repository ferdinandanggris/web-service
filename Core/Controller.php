<?php

class Controller
{
    public function model($model)
    {
        require_once '../api/Models/' . $model . '.php';
        return new $model;
    }
}
