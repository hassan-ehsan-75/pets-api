<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success([
            'customers'=>Customer::paginate(20),
        ],'Got Successfully',200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $customer=Customer::create($request->validated());
        return $this->success($customer->toArray(),'Stored Successfully',200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return $this->success([],'Updated Successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return $this->success([],'Deleted Successfully',200);
    }
}
