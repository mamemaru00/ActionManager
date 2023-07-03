<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // オフィスデータの作成
        Office::create(
            [
                'id' => '1',
                'office_name' => '事業部A',
            ],
        );
        Office::create(
            [
                'id' => '2',
                'office_name' => '事業部B',
            ],
        );
        Office::create(
            [
                'id' => '3',
                'office_name' => '事業部C',
            ],
        );
    }
}
