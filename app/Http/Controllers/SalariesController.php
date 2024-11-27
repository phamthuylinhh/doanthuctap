<?php

namespace App\Http\Controllers;

use App\Exports\SalaryExport;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Http\Resources\SalaryResource;
use App\Http\Resources\UserResource;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\QueryBuilder\QueryBuilder;


class SalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        $columns = Schema::getColumnListing('salaries');
        $resource = QueryBuilder::for(Salary::class)->allowedFilters($columns)->allowedSorts($columns)->paginate($limit)->appends(request()->query());
        return view('salaries.index', [
            'salaries' => SalaryResource::collection($resource),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salaries.create', [
            'users' => UserResource::collection(User::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaryRequest $request)
    {
        $data = $request->all();
        Salary::create($data);
        return redirect(route('salaries.index', absolute: false));
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
    public function edit(Salary $salary)
    {
        return view('salaries.edit', [
            'users' => UserResource::collection(User::all()),
            'salary' => new SalaryResource($salary)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $data = $request->all();
        $salary->update($data);
        return redirect(route('salaries.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        try {
            $salary->delete();
            return redirect(route('salaries.index', [
                'status' => true,

            ], false));
        } catch (QueryException $e) {
            return redirect(route('salaries.index', [
                'status' => false,
                'message' => $e->getMessage()
            ], false));
        }
    }
}
