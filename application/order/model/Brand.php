<?php


namespace app\order\model;


use think\Loader;

class Brand extends Base
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

        $list = Db("brand")
            ->page($param['pageNum'],$param['pageSize'])
            ->select();
        $count = Db("brand")->count();
        return ['total'=>$count,'rows'=>$list];
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
            if(model("brand")->insert($data)){
                $res['status'] = true;
                $res['msg'] = "添加成功";
            }
        }
        return $res;
    }

    public function getOne($id) {
        return model("brand")->where(['id'=>$id])->find();
    }
}