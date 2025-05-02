<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // เงื่อนไขค้นหา
            [
                'name' => 'แอดมิน',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '6',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.office@example.com'], // email ที่ตรงกับชื่อ
            [
                'name' => 'แอดมินสำนักงานปลัด',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '1',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.finance@example.com'], // email ที่ตรงกับชื่อ
            [
                'name' => 'แอดมินกองคลัง',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '2',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.engineering@example.com'], // email ที่ตรงกับชื่อ
            [
                'name' => 'แอดมินกองช่าง',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '3',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.health@example.com'], // email ที่ตรงกับชื่อ
            [
                'name' => 'แอดมินกองสาธารณสุขและสิ่งแวดล้อม',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '4',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.education@example.com'], // email ที่ตรงกับชื่อ
            [
                'name' => 'แอดมินกองการศึกษาและวัฒนธรรม',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '5',
            ]
        );

        // User test
        User::updateOrCreate(
            ['email' => 'testuser@example.com'],
            [
                'name' => 'ทดสอบ',
                'password' => Hash::make('123456789'),
                'level' => 'user',
            ]
        );
    }
}
