<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\Project;

class UpdateFunctionalityTest extends TestCase
{
    private $project;

    protected function setUp(): void
    {
        parent::setUp();
        $this->project = new Project;
    }

    public function test_projectUserIdConversionが機能が正常に動作するか()
    {
        $request = new Request();
        $request->merge([
            'user_id' => '1',
            'sales_in_charge' => '2024/01/01',
            'order_amount' => '9999',
            'order_date' => '2023/01/01',
            'status' => '有効化',
        ]);

        $request = (int)$request->user_id;
        
        $this->assertEquals(1, $request);     
    }

    public function test_updateProjectInfoが正常に機能するか()
    {
        $id = 1;

        $request = new Request();
        $request->merge([
            'user_id' => '3',
            'sales_in_charge' => '2024/01/01',
            'order_amount' => '3333333',
            'order_date' => '2023/01/01',
            'status' => '有効化',
        ]);

        $projectScope = $this->project->findOrFail($id);
        $projectScope->fill([
            "user_id" => $request->user_id,
            "sales_in_charge" => $request->sales_in_charge,
            "order_amount" => $request->order_amount,
            "order_date" => $request->order_date,
            "status" => $request->status,
        ])->save();

        $this->assertEquals($request->user_id, $projectScope->user_id);
    }
}
