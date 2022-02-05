<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
	public function index(): LengthAwarePaginator
	{
		return User::with('role')->paginate();
	}

	//per creare questa richiesta specifica -> php artisan make:request UserCreateRequest
	public function store(UserCreateRequest $request)
	{
		$user = User::create(
			$request->only('first_name', 'last_name', 'email')
			+ ['password' => Hash::make(1234)]
		);

		return response($user, Response::HTTP_CREATED);
	}

	public function show($id)
	{
		return User::with('role')->find($id);
	}

	public function update(UserUpdateRequest $request, $id)
	{
		$user = User::find($id);

		$user->update($request->only('first_name', 'last_name', 'email'));

		return \response($user, Response::HTTP_ACCEPTED);
	}

	public function destroy($id)
	{
		User::destroy($id);

		return \response(null, Response::HTTP_NO_CONTENT);
	}
}
