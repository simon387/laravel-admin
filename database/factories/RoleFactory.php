<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 *
	 * created with php artisan make:factory RoleFactory
	 */
	public function definition()
	{
		return [
			'name' => $this->faker->name
		];
	}
}
