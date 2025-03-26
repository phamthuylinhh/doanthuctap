<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebtsRequest;
use App\Http\Requests\UpdateDebtsRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\DebtpayResources;
use App\Http\Resources\DebtResources;
use App\Models\Customer;
use App\Models\Debt;
use App\Models\Enums\DebtpayStatusEnum;
use App\Models\Enums\PaymentMethodEnum;
use App\Models\Enums\SatusPaymentEnum;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;
class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = Schema::getColumnListing('debts');
        $resource = QueryBuilder::for(Debt::class)->allowedFilters($columns)->allowedSorts($columns)->paginate()->appends($request->query());
        return view('debts.index', [
            'debts' => DebtResources::collection($resource)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('debts.create', [
            'customers' => CustomerResource::collection(Customer::all()),
            'statuses' => array_column(DebtPayStatusEnum::cases(), 'value'),
            'status_payments' => array_column(SatusPaymentEnum::cases(), 'value'),
            'payment_methods' => array_column(PaymentMethodEnum::cases(), 'value'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtsRequest $request)
    {
        $data = $request->all();
        Debt::create($data);
        return redirect(route('debts.index', absolute: false));

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
    public function edit(Debt $debt)
    {
        return view('debts.edit', [
            'debt' => $debt,
            'customers' => CustomerResource::collection(Customer::all()),
            'statuses' => array_column(DebtPayStatusEnum::cases(), 'value'),
            'status_payments' => array_column(DebtpayStatusEnum::cases(), 'value'),
            'payment_methods' => array_column(PaymentMethodEnum::cases(), 'value'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtsRequest $request, Debt $debt)
    {
        $data = $request->all();
        $debt->update($data);
        return redirect(route('debts.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        try {
            $debt->delete();
            return redirect(route('debts.index', [
                'status' => true,

            ], false));
        } catch (QueryException $e) {
            return redirect(route('debts.index', [
                'status' => false,
                'message' => $e->getMessage(),

            ], false));
        }
    }
}
