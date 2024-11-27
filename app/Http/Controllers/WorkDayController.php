<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkdayRequest;
use App\Http\Requests\UpdateWorkdayRequest;
use App\Http\Resources\UserResource;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Resources\WorkDayResource;
use App\Models\WorkDay;
use Schema;
use Spatie\QueryBuilder\QueryBuilder;

class WorkDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        $columns = Schema::getColumnListing('work_days');
        $resource = QueryBuilder::for(WorkDay::class)->allowedFilters($columns)->allowedSorts($columns)->paginate($limit)->appends(request()->query());

        // return WorkDayResource::collection($resource);
        return view('work_days.index', [
            'workday' => WorkDayResource::collection($resource),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work_days.create', [
            'users' => UserResource::collection(User::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkdayRequest $request)
    {
        $data = $request->all();
        WorkDay::create($data);
        return redirect(route('work_days.index', absolute: false));
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
    public function edit(WorkDay $workDay)
    {
        return view('work_days.edit', [
            'workday' => new WorkDayResource($workDay),
            'users' => UserResource::collection(User::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkdayRequest $request, WorkDay $workDay)
    {
        $data = $request->all();
        $workDay->update($data);
        return redirect()->route('work_days.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkDay $workDay)
    {
        try {
            $workDay->delete();
            return redirect()->route(
                'work_days.index',

            );

        } catch (QueryException $e) {
            return view(route('work_days.index', [
                'status' => false,
                'message' => $e->getMessage(),

            ], false));
        }
    }
}
