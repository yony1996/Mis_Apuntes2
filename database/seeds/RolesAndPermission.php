<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');


          /// creamos los roles para que son admin,estudiante
          $role1 = Role::create(['name' => 'admin']);
          $role2 = Role::create(['name' => 'estudiante']);

        /// crea los permisos para el crud de asignaturas
        ///
        Permission::create(['name' => 'asignatura'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'asignatura create'])->syncRoles($role2);
        Permission::create(['name' => 'asignatura edit'])->syncRoles($role2);
        Permission::create(['name' => 'asignatura destroy'])->syncRoles($role2);
        

        /// crea los permisos para el crud del tareas

        Permission::create(['name' => 'tareas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tareas create'])->syncRoles($role2);
        Permission::create(['name' => 'tareas edit'])->syncRoles($role2);
        Permission::create(['name' => 'tareas destroy'])->syncRoles($role2);
        Permission::create(['name' => 'tareas status'])->syncRoles($role2);

       
        Permission::create(['name' => 'perfil edit'])->syncRoles($role2);

        Permission::create(['name' => 'admin index'])->syncRoles($role1);
       
        ///crearmos el usario por defecto
        $user_password = Hash::make('root1234');
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => $user_password]);

        $user->assignRole($role1);
        
    }
}
