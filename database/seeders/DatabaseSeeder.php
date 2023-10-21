<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'avatar' => 'https://www.getillustrations.com/photos/pack/3d-avatar-male_lg.png',
            'full_name' => 'Trần Trung Kiên',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'group_id' => 1,
            'created_at' => Date('y-m-d h:m:s'),
            'updated_at' => Date('y-m-d h:m:s'),
            'phone_number' => "0376173628",
            'address' => "Tuyeen quang",
        ]);
        DB::table('groups')->insert([
            ['id' => 1, 'name' => "Quản trị viên", 'permissions' => ''],
            ['id' => 2, 'name' => "Khách hàng", 'permissions' => ''],
            ['id' => 3, 'name' => "Quản lý đặt tour", 'permissions' => ''],
            ['id' => 4, 'name' => "Nhân viên hỗ trợ", 'permissions' => ''],
        ]);

        DB::table('vehicles')->insert([
            ['id' => 1, 'name' => "xe 4-5 chỗ"],
            ['id' => 2, 'name' => "xe 7 chỗ"],
            ['id' => 3, 'name' => "xe 16 chỗ"],
            ['id' => 4, 'name' => "xe 29-30 chỗ"],
            ['id' => 5, 'name' => "xe 35 chỗ"],
            ['id' => 6, 'name' => "xe 45 chỗ"],
            ['id' => 7, 'name' => "xe ô tô 47 chỗ"],

        ]);




        DB::table('tags')->insert([
            ['id' => 1, 'name' => "Biển"],
            ['id' => 2, 'name' => "Núi"],
            ['id' => 3, 'name' => "Thành phố"],
            ['id' => 4, 'name' => "Thảo nguyên"],
            ['id' => 5, 'name' => "Rừng"],
            ['id' => 6, 'name' => "Bảo tàng"],
            ['id' => 7, 'name' => "Lịch sử"],
            ['id' => 8, 'name' => "Ẩm thực"],
            ['id' => 9, 'name' => "Thể thao"],
            ['id' => 10, 'name' => "Du lịch đường sắt"],
            ['id' => 11, 'name' => "Khám phá hang động"],
            ['id' => 12, 'name' => "Thả nổi"],
            ['id' => 13, 'name' => "Lễ hội"],
            ['id' => 14, 'name' => "Ngắm sao"],
            ['id' => 15, 'name' => "Dạo chợ"],
            ['id' => 16, 'name' => "TPhượt"],

        ]);
    }
}
