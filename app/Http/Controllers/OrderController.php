<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
	public function index()
	{
		$this->authorize('view', 'users');

		$orders = Order::with('orderItems')->paginate();

		return OrderResource::collection($orders);
	}

	public function show($id)
	{
		$this->authorize('view', 'users');

		$order = Order::with('orderItems')->find($id);

		return new OrderResource($order);
	}

	public function export()
	{
		$headers = [
			"Content-type" => "text/csv",
			"Content-Disposition" => "attachment; filename=orders.csv",
			"Pragma" => "no-cache",
			"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
			"Expires" => "0",
		];

		$callback = function () {
			$orders = Order::all();
			$file = fopen('php://output', 'w');

			fputcsv($file, ['ID', 'Name', 'Email', 'Product Title', 'Price', 'Quantity']);

			foreach ($orders as $order) {
				fputcsv($file, [$order->id, $order->name, $order->email, '', '', '']);

				foreach ($order->orderItems as $orderItem) {
					fputcsv($file, ['', '', '', $orderItem->product_title, $orderItem->price, $orderItem->quantity]);
				}
			}

			fclose($file);
		};

		return \Response::stream($callback, 200, $headers);
	}

	public function chart()
	{
		//  select DATE_FORMAT(orders.created_at, '%Y-%m-%d') as date, SUM(order_items.price * order_items.quantity) as sum
		//  FROM orders
		//  JOIN order_items on orders.id = order_id
		//  GROUP BY date;
		return Order::query()
			->join('order_items', 'orders.id', '=', 'order_items.order_id')
			->selectRaw("DATE_FORMAT(orders.created_at, '%Y-%m-%d') as date, SUM(order_items.price * order_items.quantity) as sum")
			->groupBy('date')
			->get();
	}
}
