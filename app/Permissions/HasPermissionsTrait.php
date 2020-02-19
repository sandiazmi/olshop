<?php

namespace App\Permissions;

use App\Models\Role;
use App\Models\Permission;

trait HasPermissionsTrait
{

	public function assignRole(...$roles)
	{
		// ambil model role
		$roles = $this->getAllRoles(array_flatten($roles));

		if ($roles == null) {
			return $this;
		}

		// simpan relasi many
		$this->roles()->saveMany($roles);
	}

	public function removeRole(...$roles)
	{
		$roles = $this->getAllRoles($roles);

		$this->roles()->detach($roles);

		return $this;
	}

	public function syncRole(...$roles)
	{
		$this->roles()->detach();

		return $this->assignRole($roles);
	}

	// mendapatkan semua role user
	protected function getAllRoles(array $roles)
	{
		return Role::whereIn('name', $roles)->get();
	}

	// memberi permission
	public function givePermissionTo(...$permissions)
	{
		// ambil model permission
		$permissions = $this->getAllpermissions(array_flatten($permissions));

		if ($permissions == null) {
			return $this;
		}

		// save ke relasi many
		$this->permissions()->saveMany($permissions);

		return $this;
	}

	// mencabut permission
	public function revokePermission(...$permissions)
	{
		$permissions = $this->getAllpermissions($permissions);

		$this->permissions()->detach($permissions);

		return $this;
	}

	// mengupdate permission
	public function updatePermissions(...$permissions)
	{
		$this->permissions()->detach();

		return $this->givePermissionTo($permissions);
	}

	public function hasPermissionTo($permission)
	{
		// Permission berdasarkan role

		return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
	}

	protected function getAllpermissions(array $permissions)
	{
		return Permission::whereIn('name', $permissions)->get();
	}

	protected function hasPermissionThroughRole($permission)
	{
		// cek apakah role mempunyai permission
		foreach ($permission->roles as $role) {
			if ($this->roles->contains($role)) {
				return true;
			}
		}
		return false;
	}

	protected function hasPermission($permission)
	{
		return (bool) $this->permissions->where('name', $permission->name)->count();
	}

	public function hasRole(...$roles)
	{
		foreach ($roles as $role) {
			if ($this->roles->contains('name', $role)) {
				return true;
			}
		}
		return false;
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'users_roles');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'users_permissions');
	}
}
