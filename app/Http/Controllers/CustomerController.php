<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        $columns = Schema::getColumnListing('customers');
        $resource = QueryBuilder::for(Customer::class)->allowedFilters($columns)->allowedSorts($columns)->paginate($limit)->appends(request()->query());
        return view('customers.index', [
            'customers' => CustomerResource::collection($resource)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $customer = $data;
        $customer = Customer::create($customer);

        return redirect(route('customers.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'customer' => new CustomerResource(($customer))
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->except(['confirm-password']);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $customer->update($data);
        return redirect(route('customers.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect(route('customers.index', [
                'status' => true,

            ], false));
        } catch (QueryException $e) {
            return redirect(route('customers.index', [
                'status' => false,
                'message' => $e->getMessage(),

            ], false));
        }
    }
}
