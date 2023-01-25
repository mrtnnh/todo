<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\CreateTask;
use Illuminate\Support\Str;

class TaskRequestTest extends TestCase
{
  public function testBasicTest(string $item, string $data, bool $expect): void
  {
    $request = new CreateTask();
    $rules    = $request->rules();
    $dataList = [$item => $data];

    $validator = Validator::make($dataList, $rules);
    $result    = $validator->passes();

    $this->assertEquals($expect, $result);
  }

  public function dataprovider(): array
    {
        return [
            'expect'   => ['username', 'ユーザ名', true],
            'required' => ['username', null, false],
            'required' => ['username', '', false],
            'max'      => ['username', str_repeat('a', 101), false],
            'max'      => ['username', str_repeat('a', 100), true],
        ];
    }
}
