<?php

namespace App\Repositories;

use App\Models\Book;
use App\Interfaces\RepositoryInterface;
class BookRepository implements RepositoryInterface
{
    public static function index(){
        return Book::all();
    }

    public static function getById($id){
       return Book::findOrFail($id);
    }

    public static function store(array $data){
       return Book::create($data);
    }

    public static function update(array $data,$id){
       return Book::whereId($id)->update($data);
    }

    public static function delete($id){
       Book::destroy($id);
    }
}
