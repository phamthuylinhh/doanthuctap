<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Enums\UserStatus;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $colums = Schema::getColumnListing('users');
        $resource = QueryBuilder::for(User::class)->allowedFilters($colums)->allowedSorts($colums)->paginate()->appends($request->query());

        return view('users.index', [
            'users' => UserResource::collection($resource)
        ]);
    }
    public function create()
    {
        return view('users.create', [
            'statuses' => array_column(UserStatus::cases(), 'value'),
            // 'users' => UserResource::collection(User::all())
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $data = $request->all();
            $user = User::create($data);
            return redirect()->route('users.index');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => new UserResource($user),
            'statuses' => array_column(UserStatus::cases(), 'value'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        unset($data['confirm-password']);
        if (!$data['password'])
            unset($data['password']);
        else
            $data['password'] = Hash::make($request->input('password'));

        // return $data;
        $user->update($data);
        return redirect()->route(
            'users.index',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'User cannot be deleted');
        }
    }
}
