<?php


namespace app\order\model;


use app\admin\model\BaseModel;

class Area extends Base
{
    /**
     * 获取列表
     * @param  string $type 标签类别
     * @return [type]       [description]
     */
    public function getList($type, $parent_id = 0)
    {
        switch ($type) {
            case 'province':
                # code...
                break;

            default:
                if(empty($parent_id)){
                    return [];
                }
                break;
        }
        $lists = $this
            ->field("id ,name")
            ->where("parent_id",$parent_id)
            ->order("id")
            ->select();
        return $lists;
    }

    /**
     * 获取全国省市县层级列表
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getHierarchyList() {
        return $this
            ->alias('province')
            ->join(' xy_area city', 'province.id=city.parent_id')
            ->join('xy_area county', 'city.id=county.parent_id', 'LEFT')
            ->field('province.id as province_id, province.name as province_name, city.id as city_id, city.name as city_name, IFNULL(county.id, 0) as county_id, IFNULL(county.name, "") as county_name')
            ->where('province.parent_id=0')
            ->select();
    }
}