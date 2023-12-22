<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admin')->check()) {
            $this->middleware(['permission:permisos.index'])->only(['index']);
            $this->middleware(['permission:permisos.create'])->only(['create', 'store']);
            $this->middleware(['permission:permisos.edit'])->only(['edit', 'update']);
            $this->middleware(['permission:permisos.destroy'])->only(['destroy']);
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }

    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create(['name' => $request->name, 'guard_name' => 'admin', 'group_name' => $request->group_name]);

        toast('¡Permiso creado con exito!', 'success')->width('400');
        return redirect()->route('permission.index');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->update(['name' => $request->name, 'guard_name' => 'admin', 'group_name' => $request->group_name]);

        toast('¡Permiso actualizado con exito!', 'success')->width('400');
        return redirect()->route('permission.index');
    }

    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            return response(['status' => 'success', 'message' => __('¡Permiso eliminado con exito!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('No se pudo eliminar el permiso')]);
        }
    }
}
