<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDebtpayRequest;
use App\Http\Requests\UpdateDebtpayRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\DebtpayResources;
use App\Http\Resources\DebtResources;
use App\Models\Customer;
use App\Models\Debt;
use App\Models\Debtpay;
use App\Models\Enums\DebtpayStatusEnum;
use App\Models\Enums\PaymentMethodEnum;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;
class DebtpayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = Schema::getColumnListing('debt_pays');
        $resource = QueryBuilder::for(DebtPay::class)->allowedFilters($columns)->allowedSorts($columns)->paginate()->appends($request->query());
        return view('debt-pays.index', [
            'debt_pays' => DebtpayResources::collection($resource)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'debt-pays.create',
            [
                'customers' => CustomerResource::collection(Customer::all()),
                'statuses' => array_column((DebtpayStatusEnum::cases()), 'value'),
                'payment_methods' => array_column(PaymentMethodEnum::cases(), 'value'),
                'debts' => DebtResources::collection(Debt::all())
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebtpayRequest $request)
    {
        $data = $request->all();
        Debtpay::create($data);
        return redirect(route('debt-pays.index', absolute: false));

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
    public function edit(Debtpay $debtpay)
    {
        return view('debt-pays.edit', [
            'debt_pay' => $debtpay,
            'customers' => CustomerResource::collection(Customer::all()),
            'statuses' => array_column(DebtpayStatusEnum::cases(), 'value'),
            'payment_methods' => array_column(PaymentMethodEnum::cases(), 'value'),
            'debts' => DebtResources::collection(Debt::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebtpayRequest $request, Debtpay $debtpay)
    {
        dd($request->all());
        $data = $request->all();
        $debtpay->update($data);
        return redirect(route('debt-pays.index', [

        ], absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debtpay $debtpay)
    {
        try {
            $debtpay->delete();
            return redirect()->route('debt-pays.index', [

            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User cannot be deleted');
        }
    }
}
