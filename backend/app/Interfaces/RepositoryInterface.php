<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public static function index();
    public static function getById($id);
    public static function store(array $data);
    public static function update(array $data,$id);
    public static function delete($id);
}
