<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nim'=>'2301004','nama'=>'Dian Pratama',
            'email'=>'dian@email.com',   
            'jurusan'=>'IF','ipk'=>2.80,'semester'=>4,'aktif'=>false,'foto'=>null],
            ['nim'=>'2301005','nama'=>'Eka Rahayu',     
            'email'=>'eka@email.com',    
            'jurusan'=>'TI','ipk'=>3.20,'semester'=>2,'aktif'=>true, 'foto'=>null],
            ['nim'=>'2301006','nama'=>'Fajar Nugroho',   
            'email'=>'fajar@email.com',  
            'jurusan'=>'SI','ipk'=>3.60,'semester'=>6,'aktif'=>true, 'foto'=>null],
            ['nim'=>'2301007','nama'=>'Gita Lestari',    
            'email'=>'gita@email.com',   
            'jurusan'=>'IF','ipk'=>2.95,'semester'=>1,'aktif'=>false,'foto'=>null],
            ['nim'=>'2301008','nama'=>'Hendra Wijaya',   
            'email'=>'hendra@email.com', 
            'jurusan'=>'SI','ipk'=>3.40,'semester'=>5,'aktif'=>true, 'foto'=>null]
        ];

        foreach ($data as $item) {
            Mahasiswa::create($item);
        }
    }
}