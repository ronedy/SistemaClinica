<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            'Administrador',
            'Secretaria'
        );

        for($i = 0; $i < count($roles); $i++ ){
            DB::table('rol')->insert([
                'descripcion' => $roles[$i]
            ]);
        }
    }
}
