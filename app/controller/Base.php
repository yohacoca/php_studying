<?php

namespace app\controller;

use app\BaseController;
use JetBrains\PhpStorm\NoReturn;
use think\App;
use think\Request;

class Base extends BaseController
{
    protected string $controller;

    protected string $method;


    #[NoReturn] public function __construct(App $app){
        parent::__construct($app);
        dd($this->request);
    }
}