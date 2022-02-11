<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
	public function index()
	{
		$this->authorize('view', 'users');

		return ProductResource::collection(Product::paginate());
	}

	public function store(Request $request)
	{
		$this->authorize('edit', 'users');

		$product = Product::create($request->only('title', 'description', 'image', 'price'));

		return response(new ProductResource($product), Response::HTTP_CREATED);
	}

	public function show($id)
	{
		$this->authorize('view', 'users');

		return new ProductResource(Product::find($id));
	}

	public function update(Request $request, $id)
	{
		$this->authorize('edit', 'users');

		$product = Product::find($id);

		$product->update($request->only('title', 'description', 'image', 'price'));

		return \response(new ProductResource($product), Response::HTTP_ACCEPTED);
	}

	public function destroy($id)
	{
		$this->authorize('edit', 'users');

		Product::destroy($id);

		return \response(null, Response::HTTP_NO_CONTENT);
	}
}
