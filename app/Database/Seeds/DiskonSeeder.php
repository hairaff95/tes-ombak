<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table('diskon');
        $today = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        for ($i = 0; $i < 10; $i++) {
            $builder->insert([
                'tanggal' => date('Y-m-d', strtotime("+$i days", strtotime($today))),
                'nominal' => rand(100000, 300000),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
