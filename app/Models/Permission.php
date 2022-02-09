<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @method static Builder|Permission newModelQuery()
 * @method static Builder|Permission newQuery()
 * @method static Builder|Permission query()
 * @method static Builder|Permission whereId($value)
 * @method static Builder|Permission whereName($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 */
class Permission extends Model
{
	use HasFactory;

	public function roles(): BelongsToMany
	{
		return $this->belongsToMany(Role::class,'role_permissions');
	}
}
