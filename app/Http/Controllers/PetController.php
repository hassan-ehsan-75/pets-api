<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Models\Customer;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success([
            'pets'=>Pet::paginate(20),
        ],'Got Successfully',200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PetRequest $request)
    {
        $pet=Pet::create($request->validated());
        return $this->success($pet->toArray(),'Stored Successfully',200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $pet->update($request->validated());
        return $this->success([],'Updated Successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return $this->success([],'Deleted Successfully',200);

    }
}
