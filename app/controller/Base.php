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
        $this->controller = $app->request->controller();
        $this->method = $app->request->method();
        //获取验证器
        $validate_space = "app\\validate\\{$this->controller}";
        $isTrue = $this->validate($this->request->param(), $validate_space);
    }
}