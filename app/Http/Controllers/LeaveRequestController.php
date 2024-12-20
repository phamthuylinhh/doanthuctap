<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreLeaveRequestRequest;
use App\Http\Requests\UpdateLeaveRequestRequest;
use App\Http\Resources\LeaveRequestResource;
use App\Http\Resources\UserResource;
use App\Models\Enums\StatusLeaveRequest;
use App\Models\LeaveRequest;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;


class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $columns = Schema::getColumnListing('leave_requests');
        $resource = QueryBuilder::for(LeaveRequest::class)->allowedFilters($columns)->allowedSorts($columns)->paginate()->appends($request->query());
        return view('leave_requests.index', [
            'leave_requests' => LeaveRequestResource::collection($resource)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave_requests.create', [
            'users' => UserResource::collection(User::all()),
            'leave_requests' => LeaveRequestResource::collection(LeaveRequest::all()),
            'statuses' => array_column(StatusLeaveRequest::cases(), 'value')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        $data = $request->all();
        LeaveRequest::create($data);
        return redirect(route('leave_requests.index'));
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
    public function edit(LeaveRequest $leave_request)
    {
        return view('leave_requests.edit', [
            'leave_request' => $leave_request,
            'users' => UserResource::collection(User::all()),
            'statuses' => array_column(StatusLeaveRequest::cases(), 'value')
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequestRequest $request, LeaveRequest $leave_request)
    {
        $data = $request->all();
        $leave_request->update($data);
        return redirect(route('leave_requests.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequest $leave_request)
    {
        try {
            $leave_request->delete();
            return redirect(route('leave_requests.index', [
                'status' => true
            ], absolute: false));
        } catch (QueryException $e) {
            return redirect(route('leave_requests.index', [
                'status' => false,
                'message' => $e->getMessage()
            ], absolute: false));
        }
    }

}
