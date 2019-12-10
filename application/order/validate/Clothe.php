<?php


namespace app\order\validate;


class Clothe extends Base
{
    protected $rule = [
        "brand_id" => "require",
        'size'=>'require',
        'buy_price'=>'require',
    ];

    protected $message = [
        "brand_id.require" => "所属品牌不能为空",
        "size.require" => "尺码不能为空",
        "buy_price.require" => "入手价不能为空"
    ];
}