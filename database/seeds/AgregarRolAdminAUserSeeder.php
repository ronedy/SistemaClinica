<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgregarRolAdminAUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try{

            $usuario = User::find(1);
            $usuario->id_rol = 1;
            $usuario->update();

            DB::commit();
        }catch(Exception|Throwable $e){
            DB::rollBack();
            $this->command->warn($e->getMessage());
        }
    }
}
