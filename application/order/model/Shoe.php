<?php
namespace app\order\model;
use think\Loader;

class Shoe extends Base
{

    public function brand()
    {
        return $this->hasOne('Brand','brand_id','id');
    }

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
        }

        $list = Db("shoe")
            ->where($where)
            ->order($order)
            ->page($param['pageNum'],$param['pageSize'])
            ->select();
        $count = Db("shoe")->where($where)->count();
        return ['total'=>$count,'rows'=>$list];
    }

    /**
     * 添加
     * @param $data
     * @return array
     */
    public function addOne($data){
        $res = ["status" => false, "msg" => "添加失败"];
        $validate = Loader::validate('Shoe');
        if(!$validate->check($data)){
            $res['msg'] = $validate->getError();
        }else{
            $data['create_time']  = time();
            if(model("shoe")->insert($data)){
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
        return model("shoe")->where(['id'=>$id])->find();
    }

    /**
     * 更新一条记录
     * @param $data
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateOne($data){
        $res = ["status" => false, "msg" => "添加失败"];
        $validate = Loader::validate('Brand');
        if(!$validate->check($data)){
            $res['msg'] = $validate->getError();
        }else{
            if(model("shoe")->where(['id'=>$data['id']])->update($data)){
                $res['status'] = true;
                $res['msg'] = "修改成功";
            }
        }
        return $res;
    }

}