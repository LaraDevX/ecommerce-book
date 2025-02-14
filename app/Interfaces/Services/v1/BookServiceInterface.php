<?php

namespace App\Interfaces\Services\v1;

interface BookServiceInterface
{
public function allBooks();
public function createBook($bookDTO);
public function updateBooks($bookDTO, $id);
public function showBook($id);
public function deleteBook($id);

}
