<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Userdata;

class UserdataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'tanaka',
            'age' => '22',
        ];
        $userdata = new Userdata;
        $userdata->fill($param)->save();

        $param = [
            'name' => 'kazune',
            'age' => '23',
        ];
        $userdata = new Userdata;
        $userdata->fill($param)->save();

        $param = [
            'name' => 'matsuda',
            'age' => '44',
        ];
        $userdata = new Userdata;
        $userdata->fill($param)->save();

        $param = [
            'name' => 'shogo',
            'age' => '37',
        ];
        $userdata = new Userdata;
        $userdata->fill($param)->save();
    }
}
