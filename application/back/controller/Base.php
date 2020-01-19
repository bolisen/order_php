<?php
namespace app\back\controller;

use think\Controller;
// 制定允许其他域名访问
header("Access-Control-Allow-Origin:".ALLOW_ORIGIN);
// 响应类型
header('Access-Control-Allow-Methods:OPTIONS,GET,POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type,token');

class Base extends Controller
{
    public function _initialize()
    {

    }

}