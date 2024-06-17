<?php

namespace app\controller;

use app\controller\Base;
use app\pkg\request\Http;

class Index extends Base
{
    public function index()
    {
        $db = Http::url("http://47.94.153.175")
            ->path('/api/list')
            ->get();
        dd($db);
    }

}
