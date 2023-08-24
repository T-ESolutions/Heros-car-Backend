<?php

namespace App\Http\Controllers\Interfaces\V1\Provider;

interface CarRepositoryInterface{

    public function store($request);
    public function update($request);
    public function myCars();
    public function details($request);
    public function data($request);



}
