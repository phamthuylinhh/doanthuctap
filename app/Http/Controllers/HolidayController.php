<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Http\Resources\HolidayCategoryResource;
use App\Http\Resources\HolidayResource;
use App\Models\Holiday;
use App\Models\HolidayCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = Schema::getColumnListing('holidays');
        $resource = QueryBuilder::for(Holiday::class)->allowedFilters($columns)->allowedSorts($columns)->paginate()->appends($request->query());

        return view('holidays.index', [
            'holidays' => HolidayResource::collection($resource)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('holidays.create', [
            'categories' => HolidayCategoryResource::collection(HolidayCategory::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHolidayRequest $request)
    {
        $data = $request->all();
        Holiday::create($data);

        return redirect(route('holidays.index', ));
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
    public function edit(Holiday $holiday)
    {
        return view('holidays.edit', [
            'holiday' => $holiday,
            'categories' => HolidayCategoryResource::collection(HolidayCategory::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        $data = $request->all();
        $holiday->update($data);
        return redirect(route(
            'holidays.index',
            absolute: false
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holiday $holiday)
    {
        try {
            $holiday->delete();
            return redirect()->route(
                'holidays.index',

            );

        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
