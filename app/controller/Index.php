<?php

namespace app\controller;

use app\BaseController;
use app\pkg\request\Http;

class Index extends BaseController
{
    public function index()
    {
        $db = Http::url("http://47.94.153.175/")
            ->path('api')
            ->send();
        dd($db);
    }

}
