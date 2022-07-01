<?php

class Controller
{
    public function model($model)
    {
        require_once __DIR__ . '/../Models/' . $model . '.php';
        return new $model;
    }
}
