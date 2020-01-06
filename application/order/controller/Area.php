<?php

namespace app\order\controller;

use think\Cache;

class Area extends Base
{
    public function _initialize()
    {

    }

    /**
     * 获取全部列表（树状）
     */
    public function getList()
    {
        $list = Cache::get("area");
        if(!$list){
            $data = db('area')->field('id,name,parent_id as pid')->select();
            $list = $this->generateCity($data);
            Cache::set('area',$list);
        }
        suc($list);
    }

    /**
     * 省市区树
     * @param $arr
     * @param $pid
     * @return array
     */
    public function generateCity($arr,$pid=0)
    {
        foreach ($arr as $leaf){
            if($leaf['pid'] == $pid){
                foreach ($arr as $sub){
                    if($sub['pid'] == $leaf['id']){
                        $leaf['children'] = $this->generateCity($arr,$leaf['id']);
                        break;
                    }
                }
                $return[] = $leaf;
            }
        }
        return $return;
    }


    /**
     * 获取省/市/区 列表
     * @return
     */
    public function getOne()
    {
        $parent_id = intval($this->request->param("parent_id"));
        $areaModel = model("Area");
        $lists = $areaModel->getList($parent_id);
        suc($lists);
    }

    /**
     * 获取3层级全国区域列表
     */
    public function getAll() {
        $data =  model('area')->getHierarchyList();
        suc($data);
    }


}