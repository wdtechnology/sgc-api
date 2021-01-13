<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('units')->insert([

            'name' => 'Apt 101',
            'id_owner' => 1

        ]);

        DB::table('units')->insert([

            'name' => 'Apt 102',
            'id_owner' => 1

        ]);

        DB::table('units')->insert([

            'name' => 'Apt 203',
            'id_owner' => 0

        ]);

        DB::table('units')->insert([

            'name' => 'Apt 804',
            'id_owner' => 0

        ]);

        DB::table('areas')->insert([

            'allowed' => '1',
            'title' => 'Academia',
            'cover' => 'gym.jpg',
            'days' => '1,2,4,5',
            'start_time' => '06:00:00',
            'end_time' => '23:00:00',

        ]);

        DB::table('areas')->insert([

            'allowed' => '1',
            'title' => 'Piscina',
            'cover' => 'pool.jpg',
            'days' => '0,2,3,4,5,6',
            'start_time' => '07:00:00',
            'end_time' => '23:00:00',

        ]);

        DB::table('areas')->insert([

            'allowed' => '1',
            'title' => 'Churrasqueira',
            'cover' => 'barbecue.jpg',
            'days' => '0,1,2,3,4,5,6',
            'start_time' => '09:00:00',
            'end_time' => '23:00:00',

        ]);

        DB::table('walls')->insert([
            'title' => 'Título do aviso de teste',
            'body' => 'Lorem Impsum dkjaskldalsdjasdasd',
            'date_created' => '2021-01-13 12:00:00'

        ]);

        DB::table('walls')->insert([
            'title' => 'Alerta geral para todos',
            'body' => 'Bla bla bla bla bla ',
            'date_created' => '2021-01-13 18:00:00'

        ]);


    }
}
