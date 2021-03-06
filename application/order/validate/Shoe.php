<?php


namespace app\order\validate;


use think\Validate;

class Shoe extends Base
{
    protected $rule = [
        "brand_id" => "require",
        'shop_type'=>'require',
        'size'=>'require',
        'buy_price'=>'require',
    ];

    protected $message = [
        "brand_id.require" => "所属品牌不能为空",
        "shop_type.require" => "平台不能为空",
        "size.require" => "尺码不能为空",
        "buy_price.require" => "入手价不能为空"
    ];
}