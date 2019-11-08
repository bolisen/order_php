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
        "title.brand_id" => "所属品牌不能为空",
        "type.size" => "尺码不能为空",
        "type.buy_price" => "入手价不能为空"
    ];
}