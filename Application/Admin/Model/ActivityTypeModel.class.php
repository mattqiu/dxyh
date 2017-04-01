<?php
/**
 * Created by PhpStorm.
 * User: DarkVisitor
 * Date: 2017/3/31
 * Time: 21:34
 */

namespace Admin\Model;

use Think\Page;
class ActivityTypeModel extends BaseModel
{
    public $addressUrl;
    public function __construct()
    {
        parent::__construct();
        $this->addressUrl = U("Activity/activityType");
    }

    public function getActivityType(){
        $keyword = I("get.keyword");
        $keyword = trim($keyword);

        $where = null;
        if ($keyword){
            $where["type_name"] = array("like", "%".$keyword."%");
        }
        $count = $this->countData($where);
        $page = new Page($count, C("PAGE_NUM"));
        $list = $this->getDataList($where, null, null, $page->firstRow, $page->listRows);
        $list['page'] = $page->show();
        return $list;
    }

    public function saveActivityType(){
        if (IS_POST){
            $requst = I('post.');
            if (!isset($requst['activityTypeName']) || empty($requst['activityTypeName'])){
                message(0, "请输入类别名称！");
            }
            if (!isset($requst['sort']) || empty($requst['sort'])){
                message(0, "请输入排序！");
            }
            $data = array(
                "type_name" => $requst['activityTypeName'],
                "sort" => $requst['sort'],
            );
            if ($requst['id'] > 0){
                $boole = $this->editData(array('id'=>$requst['id']), $data);
                if ($boole !== false){
                    message(1, "编辑成功", $this->addressUrl);
                }else{
                    message(0, "编辑失败");
                }
            }else{
                $boole = $this->addData($data);
                if ($boole){
                    message(1, "新增成功", $this->addressUrl);
                }else{
                    message(0, "新增失败");
                }
            }
        }
    }

    public function remove(){
        $id = I("get.id");
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功", $this->addressUrl);
        }else{
            message(0, "删除失败");
        }
    }
}