<?php

namespace App\Interfaces\Repositories;

interface BookRepositoryInterface
{
public function index();
public function create($data);
public function update($data, $id);
public function show($id);
public function destroy($id);
}
