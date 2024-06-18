<?php

namespace app\controller;

use app\controller\Base;
use app\pkg\request\Http;
use think\response\Json;

class Index extends Base
{
    public function index(): Json
    {
        $data = Http::url("http://47.94.153.175")
            ->path('/api/list')
            ->get();
        return json($data);
    }

}
