<?php

namespace app\controller;

use think\Request;

class Base
{
    protected Request $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
}