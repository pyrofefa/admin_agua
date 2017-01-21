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
        $caja1->id_sucursal = '1';
        $caja1->name = '1';
    	$caja1->password = '123456';
     	$caja1->save();

    	$caja2 = new User();
        $caja2->id_sucursal = '2';
        $caja2->name = '1';
    	$caja2->password = '123456';
     	$caja2->save();

		$caja3 = new User();
        $caja3->id_sucursal = '3';
        $caja3->name = '1';
    	$caja3->password = '123456';
     	$caja3->save();

		$caja4 = new User();
        $caja4->id_sucursal = '4';
        $caja4->name = '1';
    	$caja4->password ='123456';
     	$caja4->save();

    	$caja5 = new User();
        $caja5->id_sucursal = '5';
        $caja5 ->name = '1';
    	$caja5 ->password ='123456';
    	$caja5 ->save();


        $caja6 = new User();
        $caja6->id_sucursal = '6';
        $caja6 ->name = '1';
        $caja6 ->password ='123456';
        $caja6 ->save();


        $caja7 = new User();
        $caja7->id_sucursal = '7';
        $caja7 ->name = '1';
        $caja7 ->password ='123456';
        $caja7 ->save();


        $caja8 = new User();
        $caja8->id_sucursal = '8';
        $caja8 ->name = '1';
        $caja8 ->password ='123456';
        $caja8 ->save();

		$user->attachRole($admin);
		$caja1->attachRole($caja);
		$caja2->attachRole($caja);
		$caja3->attachRole($caja);
		$caja4->attachRole($caja);
		$caja5->attachRole($caja);
        $caja6->attachRole($caja);
        $caja7->attachRole($caja);
        $caja8->attachRole($caja);

	}
}