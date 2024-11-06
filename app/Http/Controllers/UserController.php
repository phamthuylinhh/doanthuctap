<?php
namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Models\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
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
        return view('users.create'[

        ]);
    }

    public function edit()
    {

    }



}
