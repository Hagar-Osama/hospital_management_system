<?php

namespace app\Http\Base;

abstract class Repository
{
    abstract public function index();

    abstract public function create();

    abstract  public function store();

    abstract public function edit();

    abstract public function update();
    
    abstract  public function delete();
}
