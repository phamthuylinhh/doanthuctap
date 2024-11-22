<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalaryAdvancesRequest;
use App\Http\Requests\UpdateSalaryAdvancesRequest;
use App\Http\Resources\UserResource;
use App\Models\SalaryAdvances;
use App\Http\Resources\SalaryAdvancesResource;
use App\Models\SalaryAdvancesRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\SalaryAdvancesEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Enums\DebtPayStatusEnum;
class SalaryAdvancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        $columns = Schema::getColumnListing('salary_advances');
        $resource = QueryBuilder::for(SalaryAdvances::class)->allowedFilters($columns)->allowedSorts($columns)->paginate($limit)->appends(request()->query());

        return view('salary_advances.index ', [
            'salary_advances' => SalaryAdvancesResource::collection($resource),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salary_advances.create', [
            'users' => UserResource::collection(User::all()),
            'statuses' => array_column(SalaryAdvancesEnum::cases(), 'value'),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaryAdvancesRequest $request)
    {
        $data = $request->all();
        SalaryAdvances::create($data);
        return redirect(route('salary_advances.index'));

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
    public function edit(SalaryAdvances $salaryAdvance)
    {
        return view('salary_advances.edit', [
            'salary_advances' => new SalaryAdvancesResource($salaryAdvance),
            'statuses' => array_column(SalaryAdvancesEnum::cases(), 'value'),
            'users' => UserResource::collection(User::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryAdvancesRequest $request, SalaryAdvances $salaryAdvance)
    {
        $data = $request->all();
        $salaryAdvance->update($data);
        return redirect(route('salary_advances.index', absolute: false));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalaryAdvances $salaryAdvance)
    {
        try {
            $salaryAdvance->delete();
            return redirect()->route('salary_advances.index');

        } catch (QueryException $e) {
            return view(route('salary_advances.index', [
                'status' => false,
                'message' => $e->getMessage(),

            ], absolute: false));
        }
    }
}
