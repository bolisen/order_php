<?php


namespace app\order\controller;


class Brand  extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('brand');
    }

    /**
     * 获取列表
     */
    public function getList()
    {
        $param  = $this->getSearch();
        $data = $this->model->getList($param);

        // 数据处理
        foreach ($data['rows'] as $k=>$v) {
            // 图片地址
            if($v['pic']){
                $data['rows'][$k]['pic'] = APP_URL.$v['pic'];
            }
            // 时间样式调整
            $data['rows'][$k]['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
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
        if($res['status']){
            suc();
        }else{
            err($res['msg']);
        }
    }

    public function getOne()
    {
        $id = $this->request->get("id");
        if(empty($id)) err("ID异常！");

        $data = $this->model->getOne($id);

        //信息处理
        if($data['pic']) {
            $data['pic'] = APP_URL.$data['pic'];
        }
        $data['create_time'] = date('Y-m-d H:i:s',$data['create_time']);
        suc($data);
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

    /**
     * [get_param description]
     * @return [type] [description]
     */
    private function getPost(){
        $data['create_time'] = time();
        $param = $this->request->post();
        $param_name = ["name","number","pic","type","remark"];
        foreach ($param_name as $key) {
            if(isset($param[$key])){
                $val = $param[$key];
                switch ($key) {
                    case 'id':
                        if(!empty($val)){
                            $data[$key] = $val;
                        }
                        break;
                    case 'pic':
                        if(!empty($val)){
                            $data[$key] =str_replace(APP_URL,'',$val);
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