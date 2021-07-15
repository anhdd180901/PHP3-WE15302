<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create(); //câu lệnh tạo bản ghi : (Bảng)::factory(số lượng bản ghi)->create
    //     $data = [
    //         [
    //             'name' => "Đào Duy Anh",
    //             'email' => "anhddph11921@fpt.edu.vn",
    //             'password' => '123456',
    //             'phone_number' => '0987141905'
    //         ],
    //         [
    //             'name' => "Trần Hữu Nam",
    //             'email' => "namth@fpt.edu.vn",
    //             'password' => '123456',
    //             'phone_number' => '0987654322'
    //         ]
    //     ];

    //     foreach($data as $item){
    //         $user = new User();
    //         $user->name = $item['name'];
    //         $user->email = $item['email'];
    //         $user->password = Hash::make($item['password']);
    //         $user->phone_number = $item['phone_number'];
    //         $user->save();
    //     }
    }
}
