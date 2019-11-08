<?php
namespace app\order\model;
use think\Loader;

class Clothe extends Base
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

        // 排序
        $order = "";
        if(!empty($param['sort'])){
            $order = $param['sort']." ".$param['order'];
        }else{
            $order = 'id desc';
        }

        $list = Db("clothe")
            ->alias('c')
            ->join('xy_brand b','c.brand_id = b.id','left')
            ->where($where)
            ->order($order)
            ->page($param['pageNum'],$param['pageSize'])
            ->field("c.*,b.name")
            ->select();

        $count = Db("clothe")
            ->alias('c')
            ->join('xy_brand b','c.brand_id = b.id','left')
            ->where($where)
            ->count();
        return ['total'=>$count,'rows'=>$list];
    }

    /**
     * 添加
     * @param $data
     * @return array
     */
    public function addOne($data){
        $res = ["status" => false, "msg" => "添加失败"];
        $validate = Loader::validate('Clothe');
        if(!$validate->check($data)){
            $res['msg'] = $validate->getError();
        }else{
            $data['create_time']  = time();
            if(model("clothe")->insert($data)){
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
        return model("clothe")->where(['id'=>$id])->find();
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
        $validate = Loader::validate('Clothe');
        if(!$validate->check($data)){
            $res['msg'] = $validate->getError();
        }else{
            if(model("clohte")->where(['id'=>$data['id']])->update($data) !== false){
                $res['status'] = true;
                $res['msg'] = "修改成功";
            }
        }
        return $res;
    }
}