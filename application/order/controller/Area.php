<?php

namespace app\order\controller;

class Area extends Base
{
    public function _initialize()
    {

    }

    /**
     * 获取全部列表（层级分明）
     */
    public function getList()
    {
        $arr = model("area")->field('id name')->select();
        suc($arr);
    }


    public function get_array_level($arr)
    {


    }


    /**
     * 获取省/市/区 列表
     * @return
     */
    public function getOne()
    {
        $parent_id = intval($this->request->param("parent_id"));
        $type = $this->request->param("type");
        $areaModel = model("Area");
        $lists = $areaModel->getList($type, $parent_id);
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