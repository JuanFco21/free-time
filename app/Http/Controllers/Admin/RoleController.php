<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->middleware(['permission:roles.index'])->only(['index']);
            $this->middleware(['permission:roles.create'])->only(['create', 'store']);
            $this->middleware(['permission:roles.edit'])->only(['edit', 'update']);
            $this->middleware(['permission:roles.destroy'])->only(['destroy']);
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        if ($role->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        toast(__('¡Rol creado con exito!'), 'success');

        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->groupBy('group_name');
        $roles_permissions = $role->permissions;
        $roles_with_permissions = $roles_permissions->pluck('name')->toArray();
        return view('admin.roles.edit', compact('role', 'permissions', 'roles_with_permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name, 'guard_name' => 'admin']);

        if ($role->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        toast('¡Rol actualizado con exito!', 'success')->width('400');
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            return response(['status' => 'success', 'message' => __('¡Rol eliminado con exito!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('No se pudo eliminar el rol')]);
        }
    }
}
