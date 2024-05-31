<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Classes\ApiResponseClass;
use App\Http\Resources\LoanResource;
use App\Repositories\LoanRepository;
use Illuminate\Support\Facades\DB;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LoanRepository::index();

        return ApiResponseClass::sendResponse(LoanResource::collection($data),'',200);
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
    public function store(StoreLoanRequest $request)
    {
        $details =[
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try{
             $Loan = LoanRepository::store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new LoanResource($Loan),'Loan Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Loan = LoanRepository::getById($id);

        return ApiResponseClass::sendResponse(new LoanResource($Loan),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $Loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, $id)
    {
        $updateDetails =[
            'name' => $request->name,
            'details' => $request->details
        ];
        DB::beginTransaction();
        try{
             $Loan = LoanRepository::update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Loan Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         LoanRepository::delete($id);

        return ApiResponseClass::sendResponse('Loan Delete Successful','',204);
    }
}
