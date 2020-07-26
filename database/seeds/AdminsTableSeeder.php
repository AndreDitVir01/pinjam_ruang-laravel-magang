<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nip' => '123456789123456789',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'nama' => 'Drs. BENNY SAMPIRWANTO, M.Si',
            'jenis_kelamin' => 'L',
            'jabatan_id' => 1,
            'foto' => 'admin/image.jpg',
            'department_id' => 1
        ]);
    }
}
