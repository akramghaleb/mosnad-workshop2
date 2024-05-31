<?php

namespace App\Repositories;

use App\Models\Loan;
use App\Interfaces\RepositoryInterface;
class LoanRepository implements RepositoryInterface
{
    public static function index(){
        return Loan::all();
    }

    public static function getById($id){
       return Loan::findOrFail($id);
    }

    public static function store(array $data){
       return Loan::create($data);
    }

    public static function update(array $data,$id){
       return Loan::whereId($id)->update($data);
    }

    public static function delete($id){
       Loan::destroy($id);
    }
}
