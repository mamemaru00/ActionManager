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
                'office_code' => 'AA1',
                'office_name' => '事業所A',
            ],
        );
        Office::create(
            [
                'id' => '2',
                'office_code' => 'BB2',
                'office_name' => '事業所B',
            ],
        );
        Office::create(
            [
                'id' => '3',
                'office_code' => 'CC3',
                'office_name' => '事業所C',
            ],
        );
    }
}
