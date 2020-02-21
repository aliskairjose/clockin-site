<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->updateOrInsert(
            [
                'name'          => 'Fake Company',
                'description'   => 'A Fake Company for test',
                'phone'         => '1234567890',
                'email'         => 'fake@company.com',
                'address'       => 'Fake St',
                'picture'       => '',
                'country_id'    => 241
            ]
        );
        DB::table('companies')->updateOrInsert(
            [
                'name'          => 'Empresas Polar',
                'description'   => 'Alimentos polar',
                'phone'         => '9876543210',
                'email'         => 'empresas@polar.com',
                'address'       => 'Caracas',
                'picture'       => '',
                'country_id'    => 241
            ]
        );
        DB::table('companies')->updateOrInsert(
            [
                'name'          => 'Savoy',
                'description'   => 'Golosinas',
                'phone'         => '0987876567',
                'email'         => 'savoy@savoy.com',
                'address'       => 'Caracas',
                'picture'       => '',
                'country_id'    => 241
            ]
        );
    }
}
