<?php
namespace app\back\model;

use think\Loader;

class Menu extends Base
{

    /**
     * 查询列表
     * @param $param
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getList($param){

        //搜索
        $where = [];
        if(!empty($param['keyword'])){
            $where['name'] = ['like',"%".$param['keyword']."%"];
        }

        if(!empty($param['type'])){
            $where['type'] = $param['type'];
        }

        // 排序
        $order = "";
        if(!empty($param['sort'])){
            $order = $param['sort']." ".$param['order'];
        }else{
            $order = 'id desc';
        }

        // 获取全部（便于select选择）
        $list = Db("menu")->select();
        return $list;
    }

    /**
     * 添加
     * @param $data
     * @return array
     */
    public function addOne($data){
        $res = ["status" => false, "msg" => "添加失败"];
        $validate = Loader::validate('Brand');
        if(!$validate->check($data)){
            $res['msg'] = $validate->getError();
        }else{
            $data['create_time']  = time();
            if(model("brand")->insert($data)){
                $res['status'] = true;
                $res['msg'] = "添加成功";
            }
        }
        return $res;
    }

    /**
     * 获取一条记录
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getOne($id) {
        return model("brand")->where(['id'=>$id])->find();
    }

    /**
     * 更新一条记录
     * @param $data
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateOne($data){
        $res = ["status" => false, "msg" => "修改失败"];
        $validate = Loader::validate('Brand');
        if(!$validate->check($data)){
            $res['msg'] = $validate->getError();
        }else{
            if(model("brand")->where(['id'=>$data['id']])->update($data)){
                $res['status'] = true;
                $res['msg'] = "修改成功";
            }
        }
        return $res;
    }
}