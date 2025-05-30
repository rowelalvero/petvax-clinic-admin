<?php

namespace Modules\Service\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ServiceTrainingDurationMappingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_training_duration_mapping')->delete();
        
        \DB::table('service_training_duration_mapping')->insert(array (
            0 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 1,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            1 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 2,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            2 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 3,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            3 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 4,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            4 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 5,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            5 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 6,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            6 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 7,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            7 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 8,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            8 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 9,
                'status' => 1,
                'type_id' => 1,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            9 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 10,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            10 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 11,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            11 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 12,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            12 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 13,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            13 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 14,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            14 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 15,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            15 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 16,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            16 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 17,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            17 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 18,
                'status' => 1,
                'type_id' => 2,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            18 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 19,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            19 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 20,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            20 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 21,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            21 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 22,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            22 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 23,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            23 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 24,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            24 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 25,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            25 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 26,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            26 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 27,
                'status' => 1,
                'type_id' => 3,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            27 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 28,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            28 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 29,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            29 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 30,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            30 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 31,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            31 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 32,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            32 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 33,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            33 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 34,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            34 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 35,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            35 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 36,
                'status' => 1,
                'type_id' => 4,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            36 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 37,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            37 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 38,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            38 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 39,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            39 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 40,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            40 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 41,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            41 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 42,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            42 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 43,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            43 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 44,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            44 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 45,
                'status' => 1,
                'type_id' => 5,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            45 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 46,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            46 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 47,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            47 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 48,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            48 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 49,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            49 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 50,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            50 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 51,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            51 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 52,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            52 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 53,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            53 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 54,
                'status' => 1,
                'type_id' => 6,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            54 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 55,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            55 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 56,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            56 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 57,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            57 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 58,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            58 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 59,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            59 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 60,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            60 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 61,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            61 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 62,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            62 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 63,
                'status' => 1,
                'type_id' => 7,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            63 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 64,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            64 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 65,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            65 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 66,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            66 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 67,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            67 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 68,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            68 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 69,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            69 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 70,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            70 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 71,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            71 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 72,
                'status' => 1,
                'type_id' => 8,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            72 => 
            array (
                'amount' => 10.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:15',
                'id' => 73,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            73 => 
            array (
                'amount' => 15.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:20',
                'id' => 74,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            74 => 
            array (
                'amount' => 20.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:25',
                'id' => 75,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            75 => 
            array (
                'amount' => 25.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:30',
                'id' => 76,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            76 => 
            array (
                'amount' => 30.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:35',
                'id' => 77,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            77 => 
            array (
                'amount' => 35.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:40',
                'id' => 78,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            78 => 
            array (
                'amount' => 40.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:45',
                'id' => 79,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            79 => 
            array (
                'amount' => 45.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:50',
                'id' => 80,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
            80 => 
            array (
                'amount' => 50.0,
                'created_at' => '2024-07-01 07:34:04',
                'created_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'duration' => '0:55',
                'id' => 81,
                'status' => 1,
                'type_id' => 9,
                'updated_at' => '2024-07-01 07:34:04',
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}