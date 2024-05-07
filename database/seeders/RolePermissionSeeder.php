<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'users.index', 'guard_name' => 'admin', 'group_name' => 'Usuarios'],
            ['name' => 'users.create', 'guard_name' => 'admin', 'group_name' => 'Usuarios'],
            ['name' => 'users.edit', 'guard_name' => 'admin', 'group_name' => 'Usuarios'],
            ['name' => 'users.destroy', 'guard_name' => 'admin', 'group_name' => 'Usuarios'],
            ['name' => 'roles.index', 'guard_name' => 'admin', 'group_name' => 'Roles'],
            ['name' => 'roles.create', 'guard_name' => 'admin', 'group_name' => 'Roles'],
            ['name' => 'roles.edit', 'guard_name' => 'admin', 'group_name' => 'Roles'],
            ['name' => 'roles.destroy', 'guard_name' => 'admin', 'group_name' => 'Roles'],
            ['name' => 'permisos.index', 'guard_name' => 'admin', 'group_name' => 'Permisos'],
            ['name' => 'permisos.create', 'guard_name' => 'admin', 'group_name' => 'Permisos'],
            ['name' => 'permisos.edit', 'guard_name' => 'admin', 'group_name' => 'Permisos'],
            ['name' => 'permisos.destroy', 'guard_name' => 'admin', 'group_name' => 'Permisos'],
            ['name' => 'category.index', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital(Categoria)'],
            ['name' => 'category.create', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital(Categoria)'],
            ['name' => 'category.edit', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital(Categoria)'],
            ['name' => 'category.destroy', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital(Categoria)'],
            ['name' => 'digital_library.index', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital'],
            ['name' => 'digital_library.create', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital'],
            ['name' => 'digital_library.edit', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital'],
            ['name' => 'digital_library.destroy', 'guard_name' => 'admin', 'group_name' => 'Biblioteca Digital'],
        ];

        foreach ($permissions as $permiso) {
            Permission::create($permiso);
        }

        $superadmin_role = Role::create(['name' => 'SuperAdministrador', 'guard_name' => 'admin']);
        $superadmin_role->syncPermissions(Permission::all());

        $superadmin = Administrator::find(1);
        $superadmin->assignRole($superadmin_role);

        $admin_role = Role::create(['name' => 'Administrador', 'guard_name' => 'admin']);
        $admin_role->syncPermissions(Permission::all());

        $administrator = Administrator::find(2);
        $administrator->assignRole($admin_role);

        $journalist_rol = Role::create(['name' => 'Periodista', 'guard_name' => 'admin']);
        $journalist = Administrator::find(3);
        $journalist->assignRole($journalist_rol);
    }
}
