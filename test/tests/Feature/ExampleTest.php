<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // 簡単なデータベースのテスト
    public function test_database()
    {
        // データベースにデータがあるか確認
        $this->assertDatabaseHas('projects', ['project_code' => '000001']);
    }
}
