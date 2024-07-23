<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Repositories\ProjectInfoRepository;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use \App\Http\Middleware\Authenticate;
use Mockery;

class UserControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function test_Store()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]); 

        $project = Project::factory()->create();

        $response = $this->post(route('user.store'), [
            'user_id' => $project->user_id,
            'trading_company_id' => $project->trading_company_id,
            'project_code' => $project->project_code,
            'project_name' => $project->project_name,
            'sales_in_charge' => $project->sales_in_charge,
            'order_amount' => $project->order_amount,
            'order_date' => $project->order_date,
            'status' => $project->status,
        ]); 

        $response->assertStatus(302);
        $response->assertRedirect(route('user.index'));
    }

    public function test_Store_Exception()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]); 

        $project = Project::factory()->create();

        $mock = Mockery::mock(ProjectInfoRepository::class);
        $mock->shouldReceive('createProjectInfo')->andThrow(new \Exception('error'));

        $this->app->instance(ProjectInfoRepository::class, $mock);

        $response = $this->post(route('user.store'), [
            'user_id' => $project->user_id,
            'trading_company_id' => $project->trading_company_id,
            'project_code' => $project->project_code,
            'project_name' => $project->project_name,
            'sales_in_charge' => $project->sales_in_charge,
            'order_amount' => $project->order_amount,
            'order_date' => $project->order_date,
            'status' => $project->status,
        ]); 

        $response->assertStatus(302);
        $response->assertRedirect(route('user.index'));
    }

    public function test_Update()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]);

        $project = Project::factory()->create();

        $response = $this->put(route('user.update', ['id' => $project->id]), [
            'user_id' => $project->user_id,
            'trading_company_id' => $project->trading_company_id,
            'project_code' => $project->project_code,
            'project_name' => $project->project_name,
            'sales_in_charge' => $project->sales_in_charge,
            'order_amount' => $project->order_amount,
            'order_date' => $project->order_date,
            'status' => $project->status,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('user.index'));
    }

    public function test_Index画面遷移テスト()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]); 

        $this->withoutExceptionHandling();

        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->get(route('user.index'));
        $response->assertOK();
    }

    public function test_Create画面遷移テスト()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]);

        $this->withoutExceptionHandling();

        $user = User::find(1);
        $response = $this->actingAs($user)
                         ->get(route('user.create'));

        $response->assertOK();
    }

    public function test_Show画面遷移テスト()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]);

        $this->withoutExceptionHandling();

        $project = Project::find(1);
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->get(route('user.show', ['id' => $project->id]));
        $response->assertOK();
    }

    public function test_Edit画面遷移テスト()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]);

        $this->withoutExceptionHandling();

        $project = Project::find(1);
        $user = User::find(1);

        $response = $this->actingAs($user)
                         ->get(route('user.edit', ['id' => $project->id]));
        $response->assertOK();
    }
}
