<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
	public function index(): AnonymousResourceCollection
	{
		\Gate::authorize('view', 'users');

		return UserResource::collection(User::with('role')->paginate());
	}

	//per creare questa richiesta specifica -> php artisan make:request UserCreateRequest
	public function store(UserCreateRequest $request)
	{
		\Gate::authorize('edit', 'users');

		$user = User::create(
			$request->only('first_name', 'last_name', 'email', 'role_id')
			+ ['password' => Hash::make(1234)]
		);

		return response(new UserResource($user), Response::HTTP_CREATED);
	}

	public function show($id): UserResource
	{
		\Gate::authorize('view', 'users');

		return new UserResource(User::with('role')->find($id));
	}

	public function update(UserUpdateRequest $request, $id)
	{
		\Gate::authorize('edit', 'users');

		$user = User::find($id);

		$user->update($request->only('first_name', 'last_name', 'email', 'role_id'));

		return \response(new UserResource($user), Response::HTTP_ACCEPTED);
	}

	public function destroy($id)
	{
		User::destroy($id);

		return \response(null, Response::HTTP_NO_CONTENT);
	}
}
