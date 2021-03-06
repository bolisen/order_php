<?php


namespace app\order\validate;


class Brand extends Base
{
    protected $rule = [
        "name" => "require",
        'number'=>'require',
        'type'=>'require',
    ];

    protected $message = [
        "name.require" => "名称不能为空",
        "number.require" => "货号不能为空",
        "type.require" => "类型不能为空"
    ];
}