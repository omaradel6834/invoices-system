<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create([
            'name' => 'OmarAdel', 
            'email' => 'oadel6834@gmail.com',
            'password' => bcrypt('123456'),
            'roles_name' => ["owner"],
            'Status' => 'مفعل',
            ]);
      
            $role = Role::create(['name' => 'owner']);
       
            $permissions = Permission::pluck('id','id')->all();
      
            $role->syncPermissions($permissions);
       
            $user->assignRole([$role->id]);
    
    }
}
