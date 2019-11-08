<?php


namespace app\order\controller;


class Clothe extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('clothe');
    }

    /**
     * 获取列表
     */
    public function getList()
    {
        $param = $this->getSearch();
        $data = $this->model->getList($param);

        // 数据处理
        foreach ($data['rows'] as $k => $v) {
            if($v['sale_price'] && floatval($v['sale_price']) !== 0.00){
                // 盈亏显示处理
                $data['rows'][$k]['money'] = round($v['sale_price']-$v['buy_price']-$v['ship_fee'],2);
            }
            //地址处理
            if($v['province'] && $v['city'] && $v['area']){
                $province = model('area')->getName($v['province']);

                $data['rows'][$k]['address'] = model('area')->getName($v['province']).model('area')->getName($v['city'])->model('area')->getName($v['area']).$v['address'];
            }
            $data['rows'][$k]['create_time'] = date('Y-m-d', $v['create_time']);
        }
        suc($data);
    }

    /**
     * 新增
     */
    public function add()
    {
        // 获取表单传递数据
        $data = $this->getPost();
        $res = $this->model->addOne($data);
        if ($res['status']) {
            suc();
        } else {
            err($res['msg']);
        }
    }

    /**
     * 获取一条记录
     */
    public function getOne()
    {
        $id = $this->request->get("id");
        if (empty($id)) err("ID异常！");

        $data = $this->model->getOne($id);
        suc($data);
    }

    /**
     * 更新一条记录
     */
    public function update()
    {
        $data = $this->getPost();
        if (empty($data['id'])) err("id异常");

        $res = $this->model->updateOne($data);
        if ($res['status']) {
            suc();
        } else {
            err($res['msg']);
        }
    }


    /**
     * 删除
     */
    public function del()
    {
        $id = $this->request->post("id");
        if (empty($id)) err("ID异常，无法删除");

        $res = Db('shoe')->delete($id);
        if ($res) {
            suc();
        } else {
            err("删除失败！");
        }
    }


    /**
     * 获取搜索参数
     * @return array
     */
    private function getSearch()
    {
        $data = [];
        $param = $this->request->param();

        $param_name = ["keyword", "pageNum", "pageSize", 'sort', 'order'];
        foreach ($param_name as $key) {
            if (isset($param[$key])) {
                $val = $param[$key];
                switch ($key) {
                    case 'keyword':
                        $val = trim($val);
                        if ($val != "") {
                            $data[$key] = $val;
                        }
                        break;
                    default:
                        $val = ($val);
                        if (!empty($val)) {
                            $data[$key] = $val;
                        }
                        break;
                }
            }
        }
        return $data;
    }

    /**
     * [get_param description]
     * @return [type] [description]
     */
    private function getPost()
    {
        $data = [];
        $param = $this->request->post();

        $param_name = ["id", "brand_id","buy_name", "size", "buy_price", "mobile",'address','ship',"sale_price","ship_num",'ship_fee','proCityArea'];
        foreach ($param_name as $key) {
            if (isset($param[$key])) {
                $val = $param[$key];
                switch ($key) {
                    case 'id':
                        if (!empty($val)) {
                            $data[$key] = $val;
                        }
                        break;
                    case 'proCityArea':
                        if(!empty($val)){
                            $proCityArea = explode(',',$val);
                            $data['province'] = $proCityArea[0];
                            $data['city'] = $proCityArea[1];
                            $data['area'] = $proCityArea[2];
                        }
                        break;
                    default:
                        $data[$key] = $val;
                        break;
                }
            }
        }
        return $data;
    }
}