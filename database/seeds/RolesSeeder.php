<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;
use App\User;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $admin = new Role();
    	$admin->name         = 'admin';
    	$admin->display_name = 'Administrador'; // optional
    	$admin->description  = 'Editar, ver, eliminar'; // optional
    	$admin->save();

    	$caja = new Role();
    	$caja->name          = 'caja';
    	$caja->display_name  = 'Caja';
    	$caja->description   = 'Tomar turnos';
    	$caja->save();

		$user = new User();
    	$user->name = 'admin';
    	$user->password =bcrypt('admin');
     	$user->save();

		$caja1 = new User();
    	$caja1->name = '1';
    	$caja1->password =bcrypt('123456');
     	$caja1->save();

    	$caja2 = new User();
    	$caja2->name = '2';
    	$caja2->password =bcrypt('123456');
     	$caja2->save();

		$caja3 = new User();
    	$caja3->name = '3';
    	$caja3->password =bcrypt('123456');
     	$caja3->save();

		$caja4 = new User();
    	$caja4->name = '4';
    	$caja4->password =bcrypt('123456');
     	$caja4->save();

    	$caja5 = new User();
    	$caja5 ->name = '5';
    	$caja5 ->password =bcrypt('123456');
    	$caja5 ->save();

		$user->attachRole($admin);
		$caja1->attachRole($caja);
		$caja2->attachRole($caja);
		$caja3->attachRole($caja);
		$caja4->attachRole($caja);
		$caja5->attachRole($caja);
	}
}