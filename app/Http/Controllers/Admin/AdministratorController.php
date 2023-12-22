<?php

namespace App\Http\Controllers\Admin;

use App\Models\Administrator;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdministratorRequest;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:usuarios.index'])->only(['index']);
        $this->middleware(['permission:usuarios.create'])->only(['create', 'store']);
        $this->middleware(['permission:usuarios.edit'])->only(['edit', 'update']);
        $this->middleware(['permission:usuarios.destroy'])->only(['destroy']);
    }

    public function index()
    {
        $administrators = Administrator::all();
        return view('admin.administrators.index', compact('administrators'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.administrators.create', compact('roles'));
    }

    public function store(AdministratorRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/users-img');
            $image = basename($image);  // Obtiene solo el nombre del archivo sin la ruta
        } else {
            $image = 'avatar-5.png';
        }

        $administrator = Administrator::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'image' => $image,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        $administrator->assignRole(collect($request->input('role', []))->map(fn ($val) => (int)$val));

        toast('¡Administrador creado con exito!', 'success')->width('400');
        return redirect()->route('administrator.index');
    }

    public function edit($id)
    {
        $administrator = Administrator::findOrFail($id);
        $roles = Role::all();

        return view('admin.administrators.edit', compact('administrator', 'roles'));
    }

    public function update(AdministratorRequest $request, $id)
    {
        $administrator = Administrator::find($id);

        $image = $administrator->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/users-img');
            $image = basename($imagePath); // Solo el nombre del archivo
        }

        $administrator->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'image' => $image,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        $administrator->assignRole(collect($request->input('role', []))->map(fn ($val) => (int)$val));

        toast('¡Administrador actualizado con exito!', 'success')->width('400');
        return redirect()->route('administrator.index');
    }

    public function destroy($id)
    {
        try {
            $administrator = Administrator::findOrFail($id);
            $administrator->delete();
            return response(['status' => 'success', 'message' => __('Administador eliminado con exito!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('No se pudo eliminar el administrador')]);
        }
    }
}
