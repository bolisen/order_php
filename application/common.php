<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------


// 应用公共文件
use think\Config;

/**
 * @param $msg
 * @param int $code 1：成功
 * @param string $data
 */
function suc($data ='',$msg='操作成功')
{
    $arr['code'] = 200;
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
    $arr['code'] = 500;
    $arr['msg'] = $msg;
    exit(json_encode($arr));
}


/**
 * 密码加密方法
 * @param string $pw 要加密的原始密码
 * @param string $authCode 加密字符串
 * @return string
 */
function set_password($pw, $authCode = null)
{
    if (empty($authCode)) {
        $authCode = Config::get('default_auth');
    }
    $result = "###" . md5(md5($authCode . $pw));
    return $result;
}


/**
 * 密码比较方法,所有涉及密码比较的地方都用这个方法
 * @param string $password 要比较的密码
 * @param string $passwordInDb 数据库保存的已经加密过的密码
 * @return boolean 密码相同，返回true
 */
function compare_password($password, $passwordInDb)
{
    return set_password($password) == $passwordInDb;
}


/**
 * token加密
 * @param $str
 * @return string
 */
function encode_token($str){
    return md5(Config::get('default_auth').$str);
}


/**
 * token解密
 * @param $str
 * @return mixed
 */
function decode_token($str){
    $arr = explode("_",$str);
    return $arr[1];
}


