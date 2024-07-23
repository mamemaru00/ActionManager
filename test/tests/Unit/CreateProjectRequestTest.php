<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateProjectRequest;

class CreateProjectRequestTest extends TestCase
{
   /**
     * カスタムリクエストのバリデーションテスト
     *
     * @param array 項目名の配列
     * @param array 値の配列
     * @param boolean 期待値(true:バリデーションOK、false:バリデーションNG)
     * @dataProvider dataUserRegistration
     */
    public function test_CreateProjectRequest($item, $data, $expect)
    {
        $request = new CreateProjectRequest;
        $rules = $request->rules();

        $validator = Validator::make([$item => $data], [$item => $rules[$item]]);
        $result = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    public function dataProjectRegistration()
    {
        return [
            '正常' => ['project_name', 'テストプロジェクト', true],
            '必須エラー' => ['project_name', '', false],
            '最大文字数エラー' => ['project_name', str_repeat('a', 256), false],
            '正常' => ['sales_in_charge', '2024/01/01', true],
            '必須エラー' => ['sales_in_charge', '', false],
            '正常' => ['order_amount', '9999', true],
            '必須エラー' => ['order_amount', '', false],
            '正常' => ['order_date', '2023/01/01', true],
            '必須エラー' => ['order_date', '', false],
            '正常' => ['status', '有効化', true],
            '必須エラー' => ['status', '', false],
        ];
    }
}
