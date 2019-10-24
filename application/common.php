<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * @param $msg
 * @param int $code 1：成功
 * @param string $data
 */
function suc($data = '',$msg='操作成功')
{
    $arr['code'] = 1;
    $arr['data'] = $data;
    $arr['msg'] = $msg;
    exit(json_encode($arr));
}

/**
 * @param $msg
 * @param int $code 0：失败
 * @param string $data
 */
function err($msg='操作失败')
{
    $arr['code'] = 0;
    $arr['msg'] = $msg;
    exit(json_encode($arr));
}