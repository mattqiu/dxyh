<?php
/**
 * 网站图片model
 * User: DarkVisitor
 * Date: 2017/3/30
 * Time: 11:14
 */

namespace Admin\Model;

use Think\Model;
use Think\Page;
class WebsiteImageModel extends BaseModel
{
    public function website(){
        if (IS_POST){
            $requst = I('post.');
            if (!isset($requst['imageType']) || empty($requst['imageType'])){
                message(0, "请选择图片类别！");
            }
            if (!isset($requst['sort']) || empty($requst['sort'])){
                message(0, "请输入排序！");
            }
            $filePath = "./upload/website/" . dateTime(time(), 4) . "/";
            import('Org.Net.FileUpload');
            $fileUp = new \FileUpload(array('filepath'=>$filePath));
            if ($requst['id'] > 0){
                $data = array(
                    "type" => $requst['imageType'],
                    "img_link" => $requst['imgLink'],
                    "sort" => $requst['sort'],
                    "status" => $requst['status'],
                );
                if ($_FILES['fileImage']['tmp_name']){
                    $fileUrl = $fileUp->UploadFile('fileImage');
                    if (!$fileUrl){
                        message(0, '上传图片失败');
                    }
                    $data['image'] = $fileUrl;
                }
                $boole = $this->editData(array('id'=>$requst['id']), $data);
                if ($boole !== false){
                    message(1, "编辑成功");
                }else{
                    message(0, "编辑失败");
                }
            }else{
                if (empty($_FILES['fileImage']['tmp_name'])){
                    message(0, "请选择上传图片");
                }
                $fileUrl = $fileUp->UploadFile('fileImage');
                if (!$fileUrl){
                    message(0, '上传图片失败');
                }
                $data = array(
                    "type" => $requst['imageType'],
                    "image" => $fileUrl,
                    "img_link" => $requst['imgLink'],
                    "sort" => $requst['sort'],
                    "status" => $requst['status'],
                );
                $boole = $this->addData($data);
                if ($boole){
                    message(1, "新增成功");
                }else{
                    message(0, "新增失败");
                }
            }
        }
    }

    public function getWebsiteinfo(){
        $id = I('get.id');
        return $this->getDataInfo(array('id'=>$id));
    }

    public function getWebsiteList(){
        $typeId = I('get.typeId');
        if ($typeId){
            $where = array('type'=>$typeId);
        }else{
            $where = null;
        }
        $count = $this->countData($where);
        $page =new Page($count, C('PAGE_NUM'));
        $list = $this->getDataList($where, null, null, $page->firstRow, $page->listRows);
        foreach ($list as $key=>$item){
            if ($item['type'] == 1){
                $list[$key]['type'] = "首页轮播";
            }else{
                $list[$key]['type'] = "家庭护理";
            }
            if (empty($item['status'])){
                $list[$key]['status'] = "<lable style=\"color: red;\">隐藏</lable>";
            }else{
                $list[$key]['status'] = "<lable style=\"color: #00B83F;\">显示</lable>";
            }
        }
        $list['page'] = $page->show();
        return $list;
    }

    public function website_del(){
        $id = I('get.id');
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功");
        }else{
            message(0, "删除失败");
        }
    }
}