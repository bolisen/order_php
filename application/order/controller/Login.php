<?php
namespace app\order\controller;

use think\Cache;
use think\Request;
class Login extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 登录
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function doLogin()
    {
        $username = $this->request->post('username');
        $password = $this->request->post("password");

        if(empty($username)) err("用户名不能为空");

        if(empty($password)) err("密码不能为空");

        $user = db("user")->where(['username'=>$username])->find();
        if(!compare_password($password,$user['password']))err("用户名或密码不正确");

        $token = encode_token($user['id']);
        //设置缓存
        Cache::set("user_" . $token, $user, 3600);

        $data['token'] = $token;
        suc($data, '登录成功');

    }

    /**
     * 获取用户信息
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getInfo()
    {
        $token = $this->request->header('token');
        if(empty($token)){
            err('token失效');
        }

        $user = Cache::get("user_".$token);

        if(count($user) <=0)err("用户信息异常，请重新登录！");

        $user['roles'] = [
            'admin',
        ];
        suc($user);
    }


    /**
     * 登出
     */
    public function logout()
    {
        //清除缓存
        $token = $this->request->header('token');
        Cache::rm("user_".$token);
        suc();
    }

}