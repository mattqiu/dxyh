<?php
/**
 * Created by PhpStorm.
 * User: DarkVisitor
 * Date: 2017/3/30
 * Time: 15:59
 */

namespace Admin\Model;

use Think\Model;
class FriendshipLinkModel extends BaseModel
{
    public function getList(){
        $list = $this->getDataList();
        foreach ($list as $key=>$value){
            $list[$key]['link'] = urldecode($value['link']);
        }
        return $list;
    }

    public function getInfo(){
        $id = I('get.id');
        $info = $this->getDataInfo(array('id'=>$id));
        $info['link'] = urldecode($info['link']);
        return $info;
    }

    public function linkSave(){
        if (IS_POST){
            $requset = I('post.');
            if (!isset($requset['linkName']) || empty($requset['linkName'])){
                message(0, "名称不能为空!");
            }
            if (!isset($requset['link']) || empty($requset['link'])){
                message(0, "链接不能为空！");
            }
            $file_path = "./upload/logo/" . dateTime(time(), 4) . "/";
            import('Org.Net.FileUpload');
            $fileUp = new \FileUpload(array('filepath'=>$file_path));
            $data = array(
                "link_name" => $requset['linkName'],
                "link" => urlencode($requset['link']),
            );
            if ($requset['id'] > 0){
                if ($_FILES['fileImage']['tmp_name']){
                    $file_url = $fileUp->UploadFile('fileImage');
                    if (empty($file_url)){
                        message(0, "图片上传失败");
                    }
                    $data['link_logo'] = $file_url;
                }
                $boole = $this->editData(array('id'=>$requset['id']), $data);

                if ($boole !== false){
                    message(1, "编辑成功", U("System/link_manage"));
                }else{
                    message(0, "编辑失败");
                }
            }else{
                $file_url = $fileUp->UploadFile('fileImage');
                if (empty($file_url)){
                    message(0, "图片上传失败");
                }

                $data['link_logo'] = $file_url;
                $boole = $this->addData($data);
                if ($boole){
                    message(1, "编辑成功", U("System/link_manage"));
                }else{
                    message(0, "编辑失败");
                }
            }
        }
    }

    public function link_del(){
        $id = I('get.id');
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功", U("System/link_manage"));
        }else{
            message(0, "删除失败");
        }
    }
}