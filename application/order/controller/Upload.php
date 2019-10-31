<?php


namespace app\order\controller;


use think\Controller;

class Upload extends Base
{

    /**
     * 图片上传
     */
    public function picUpload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('pic');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $fileInfo = $file->getInfo();
            $fileType = $fileInfo['type'];
            if(!in_array($fileType,['image/jpeg','image/gif','image/png','image/bmp']))err("请上传正确的文件");

            $info = $file->move(ROOT_PATH . 'public/uploads');
            if($info){
                //上传成功；返回图片地址
                $pathName = $info->getSaveName();
                $data['imgUrl'] = APP_URL.'/uploads/'.$pathName;
                suc($data);
            }else{
                // 上传失败获取错误信息
                $errMsg = $file->getError();
                err($errMsg);
            }
        }
    }
}