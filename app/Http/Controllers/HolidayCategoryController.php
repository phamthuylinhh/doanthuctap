<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreHolidayCategoryRequest;
use App\Http\Requests\UpdateHolidayCategoryRequest;
use App\Http\Resources\HolidayCategoryResource;
use App\Models\HolidayCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

class HolidayCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = Schema::getColumnListing('holiday-categories');
        $resource = QueryBuilder::for(HolidayCategory::class)->allowedFilters($columns)->allowedSorts($columns)->paginate()->appends($request->query());

        return view('holiday-categories.index', [
            'holiday_categories' => HolidayCategoryResource::collection($resource)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('holiday-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHolidayCategoryRequest $request)
    {
        $data = $request->all();
        HolidayCategory::create($data);

        return redirect(route(
            'holiday-categories.index',
            absolute: false
        ));
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
    public function edit(HolidayCategory $holidayCategory)
    {
        return view('holiday-categories.edit', [
            'holiday_category' => new HolidayCategoryResource($holidayCategory),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHolidayCategoryRequest $request, HolidayCategory $holidayCategory)
    {
        $data = $request->all();
        $holidayCategory->update($data);
        return redirect()->route('holiday-categories.index', ['locale' => app()->getLocale()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HolidayCategory $holidayCategory)
    {
        try {
            $holidayCategory->delete();
            return redirect()->route(
                'holiday-categories.index',
                [
                    'locale' => request()->getDefaultLocale()
                ]
            );
        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
