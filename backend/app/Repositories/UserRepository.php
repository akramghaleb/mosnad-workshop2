<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements RepositoryInterface
{
    public static function index()
    {
        return User::all();
    }

    public static function getById($id)
    {
        return User::findOrFail($id);
    }

    public static function store($data)
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }

    public static function update($data, $id)
    {
        return User::whereId($id)->update([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }

    public static function delete($id)
    {
        User::destroy($id);
    }
}
