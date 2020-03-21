<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();
        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);

        $viewPostsPermission = Permission::create([
            'name' => 'View posts',
            'display_name' => 'Ver publicaciones'    
        ]);
        $createPostsPermission = Permission::create([
            'name' => 'Create posts',
            'display_name' => 'Crear publicaciones'    
        ]);
        $updatePostsPermission = Permission::create([
            'name' => 'Update posts',
            'display_name' => 'Actualizar publicaciones'    
        ]);
        $deletePostsPermission = Permission::create([
            'name' => 'Delete posts',
            'display_name' => 'Eliminar publicaciones'    
        ]);

        $viewUsersPermission = Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver usuarios'    
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear usuarios' 
        ]);
        $updateUsersPermission = Permission::create([
            'name' => 'Update users',
            'display_name' => 'Actualizar usuarios' 
        ]);
        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar usuarios' 
        ]);
        
        $viewRolesPermission = Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver roles' 
        ]);
        $createRolesPermission = Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear roles'
        ]);
        $updateRolesPermission = Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Actualizar roles'
        ]);
        $deleteRolesPermission = Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Eliminar roles'
        ]);

        $viewPermissionsPermission = Permission::create([
            'name' => 'View permissions',
            'display_name' => 'Ver permisos' 
        ]);

        $updatePermissionsPermission = Permission::create([
            'name' => 'Update permissions',
            'display_name' => 'Actualizar permisos' 
        ]);

        $admin = new User;
        $admin->run = '15979446-6';
        $admin->name = 'David Villegas Aguilar';
        $admin->email = 'david.villegas.aguilar@gmail.com';
        $admin->adress = 'Heroes de la concepcion - Iquique';
        $admin->movil = '+56976400180';
        $admin->password = 'I5483114-1984';
        $admin->save();

        $admin->tags()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14]);

        $admin->assignRole($adminRole);

        $user = new User;        
        $user->run = '11111111-1';
        $user->name = 'juan perez';
        $user->email = 'prueba@correo.cl';
        $user->password = '123123';
        $user->adress = 'Iquique';        
        $user->phone = '+56955555555';
        $user->movil = '572555555';
        $user->password = '123123';
        $user->save();

    }
}
