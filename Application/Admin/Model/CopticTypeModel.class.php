<?php
/**
 * 科普分类model
 * User: DarkVisitor
 * Date: 2017/3/31
 * Time: 15:08
 */

namespace Admin\Model;


use Think\Page;

class CopticTypeModel extends BaseModel
{
    public function showView(){
        $keyword = I("get.keyword");
        $keyword = trim($keyword);

        $where = null;
        if ($keyword){
            $where["category_name"] = array("like", "%".$keyword."%");
        }
        $count = $this->countData($where);
        $page = new Page($count, C("PAGE_NUM"));
        $list = $this->getDataList($where, null, null, $page->firstRow, $page->listRows);
        $list['page'] = $page->show();
        return $list;
    }

    public function coptiTypeSave(){
        if (IS_POST){
            $qusets = I("post.");
            if (!isset($qusets['categoryName']) || empty($qusets['categoryName'])){
                message(0, "类别名称不能为空！");
            }
            if (!isset($qusets['editor']) || empty($qusets['editor'])){
                message(0, "主编不能为空！");
            }
            if (!isset($qusets['sort']) || empty($qusets['sort'])){
                message(0, "排序不能为空！");
            }
            $data = array(
                "category_name" => trim($qusets['categoryName']),
                "editor" => trim($qusets['editor']),
                "sort" => trim($qusets['sort']),
            );
            $fileUrl = "./upload/copticimag/" . dateTime(time(), 4) . "/";
            import('Org.Net.FileUpload');
            $fileUp = new \FileUpload(array('filepath'=>$fileUrl));
            if ($qusets['id'] > 0){
                if ($_FILES['categoryImage']['tmp_name']){
                    $url = $fileUp->UploadFile("categoryImage");
                    if (empty($url)){
                        message(0, "图片上传失败！");
                    }
                    $data['category_image'] = $url;
                }
                $boole = $this->editData(array('id'=>$qusets['id']), $data);
                if ($boole !== false){
                    message(1, "编辑成功", U("Coptic/copticType"));
                }else{
                    message(0, "编辑失败");
                }
            }else{
                if (empty($_FILES['categoryImage']['tmp_name'])){
                    message(0, "类别图片不能为空！");
                }
                $url = $fileUp->UploadFile("categoryImage");
                if (empty($url)){
                    message(0, "图片上传失败!");
                }
                $data['category_image'] = $url;
                $data['create_time'] = time();
                $boole = $this->addData($data);
                if ($boole){
                    message(1, "新增成功", U("Coptic/copticType"));
                }else{
                    message(0, "新增失败");
                }
            }
        }
    }

    public function copticDel(){
        $id = I("get.id");
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功", U("Coptic/copticType"));
        }else{
            message(0, "删除失败");
        }
    }

    public function copticEdit(){
        $id = I("get.id");
        return $this->getDataInfo(array('id'=>$id));
    }
}