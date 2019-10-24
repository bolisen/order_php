<?php
namespace app\order\controller;


class Shoe extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }


    /**
     * 获取列表
     */
    public function getList()
    {
        $param  = $this->getSearch();
        $data = model("shoe")->getList($param);
        suc($data);
    }


    public function getOne()
    {

    }


    public function add()
    {

    }


    public function update()
    {

    }


    public function delete()
    {

    }


    /**
     * 获取搜索参数
     * @return array
     */
    private function getSearch()
    {
        $data = [];
        $param = $this->request->param();

        $param_name = ["keyword","pageNum","pageSize"];
        foreach ($param_name as $key) {
            if(isset($param[$key])){
                $val = $param[$key];
                switch ($key) {
                    case 'keyword':
                        $val = trim($val);
                        if($val != ""){
                            $data[$key] = $val;
                        }
                        break;
                    default:
                        $val = ($val);
                        if(!empty($val)){
                            $data[$key] = $val;
                        }
                        break;
                }
            }
        }
        return $data;
    }
}