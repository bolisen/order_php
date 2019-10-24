<?php
namespace app\order\model;


class Shoe extends Base
{

    public function getList($param){

        $list = Db("shoe")
            ->page($param['pageNum'],$param['pageSize'])
            ->select();
        $count = Db("shoe")->count();

        return ['total'=>$count,'rows'=>$list];
    }
}