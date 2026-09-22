<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RarityLevelSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Peu Commun',
                'color' => '#7ade17',
                'power_multiplier' => '1.2',
                'cost_multiplier' => '1.2',
                'appearance' => '12',
            ],
            [
                'name' => 'Rare',
                'color' => '#0244de',
                'power_multiplier' => '1.8',
                'cost_multiplier' => '1.8',
                'appearance' => '8',
            ],
            [
                'name' => 'Épique',
                'color' => '#c629d1',
                'power_multiplier' => '2.4',
                'cost_multiplier' => '2.4',
                'appearance' => '4',
            ],
            [
                'name' => 'Légendaire',
                'color' => '#ffbe0a',
                'power_multiplier' => '3.2',
                'cost_multiplier' => '3.2',
                'appearance' => '2',
            ],
            [
                'name' => 'Mythique',
                'color' => '#ff0026',
                'power_multiplier' => '4.5',
                'cost_multiplier' => '5',
                'appearance' => '1',
            ],
        ];
        $rarityModel = model('RarityLevelModel');
        foreach ($data as $row) {
            $rarityModel->insert($row);
        }
    }
}
