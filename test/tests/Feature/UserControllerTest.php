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

class UserControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function test_store()
    {
        // ミドルウェアの設定
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]); 

        // プロジェクトを作成
        $project = Project::factory()->create();

        // $projectの内容をpostメソッドで送信
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

        // ステータスコードが302であることを確認
        $response->assertStatus(302);

        // user.indexにリダイレクトされることを確認
        $response->assertRedirect(route('user.index'));
    }


    // ログインしていなくてもアクセスできるか確認
    public function test_Index()
    {
        $this->withMiddleware();
        $this->withoutMiddleware([Authenticate::class]); 

        $this->withoutExceptionHandling();
        //auth:usersでログイン認証
        $user = User::find(1);
        // $response = $this->get(route('user.login'));　OKだった。
        $response = $this->actingAs($user)
                         ->get(route('user.index'));
        // $response = $this->get(route('user.index'));
        $response->assertOK();
    }

}
