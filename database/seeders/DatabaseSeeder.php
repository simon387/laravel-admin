<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

// le classi seader servono per creare dati mock
class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([
			PermissionSeeder::class,
			RoleSeeder::class,
			UserSeeder::class,
		]);
	}
}
