<?php

namespace App\Models\Contracts;

interface CrudInterface{

    public function create($data);

    public function read($id);

    public function update($data);

    public function delete();

}