<?php

use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new \App\User();
        $user->username='quanghung';
        $user->password= \Illuminate\Support\Facades\Hash::make(123456);
        $user->email='admin@gmail.com';
        $user->address='Ho Chi Minh';
        $user->save();
    }
}
