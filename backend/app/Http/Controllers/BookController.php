<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Classes\ApiResponseClass;
use App\Http\Resources\BookResource;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BookRepository::index();

        return ApiResponseClass::sendResponse(BookResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $deatils = [
            'name' => $request->name,
            'description' =>$request->description,
            'address' =>$request->address,
            'author' =>$request->author,
            'year' =>$request->year,
            'isbn' =>$request->isbn,
            'status' =>$request->status,
        ];
        DB::beginTransaction();
        try{
             $Book = BookRepository::store($deatils);

             DB::commit();
             return ApiResponseClass::sendResponse(new BookResource($Book),'Book Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Book = BookRepository::getById($id);

        return ApiResponseClass::sendResponse(new BookResource($Book),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $Book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $deatils = [
            'name' => $request->name,
            'description' =>$request->description,
            'address' =>$request->address,
            'author' =>$request->author,
            'year' =>$request->year,
            'isbn' =>$request->isbn,
            'status' =>$request->status,
        ];
        DB::beginTransaction();
        try{
             $Book = BookRepository::update($deatils,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Book Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         BookRepository::delete($id);

        return ApiResponseClass::sendResponse('Book Delete Successful','',204);
    }
}
