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
            ['email' => 'admin@example.com'],
            [
                'name' => 'แอดมิน',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '6',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@kudc.go.th'],
            [
                'name' => 'super แอดมิน',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '6',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.office@example.com'],
            [
                'name' => 'แอดมินสำนักงานปลัด',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '1',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.finance@example.com'],
            [
                'name' => 'แอดมินกองคลัง',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '2',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.engineering@example.com'],
            [
                'name' => 'แอดมินกองช่าง',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '3',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.health@example.com'],
            [
                'name' => 'แอดมินกองสาธารณสุขและสิ่งแวดล้อม',
                'password' => Hash::make('123456789'),
                'level' => 'admin',
                'agency' => '4',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin.education@example.com'],
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
