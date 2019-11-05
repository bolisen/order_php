<?php


namespace app\order\validate;


use think\Validate;

class Shoe extends Base
{
    protected $rule = [
        "name" => "require",
        'number'=>'require',
        'type'=>'require',
    ];

    protected $message = [
        "title.require" => "名称不能为空",
        "number.require" => "货号不能为空",
        "type.require" => "类型不能为空"
    ];
}