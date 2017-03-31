<?php
/**
 * 活动类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:29
 */

namespace Admin\Controller;

use Think\Controller;
class ActivityController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 活动列表
     */
    public function index(){

        $this->display();
    }

    public function add(){

        $data['title'] = "新增活动";
        $data['Url'] = U("Activity/add");
        $this->assign($data);
        $this->display("view");
    }

    public function edit(){

        $data['title'] = "编辑活动";
        $data['Url'] = U("Activity/edit");
        $this->assign($data);
        $this->display("view");
    }

    public function del(){

    }

    /**
     * 活动分类
     */
    public function activityType(){

        $this->display();
    }


    public function activityType_add(){

        $data['title'] = "新增活动类别";
        $data['Url'] = U("Activity/activityType_add");
        $this->assign($data);
        $this->display("activityType_view");
    }

    public function activityType_edit(){

        $data['title'] = "编辑活动类别";
        $data['Url'] = U("Activity/activityType_edit");
        $this->assign($data);
        $this->display("activityType_view");
    }

    public function activityType_del(){

    }

}