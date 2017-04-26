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
        $data['rows'] = D("Activity")->getList();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['activityType'] = D("ActivityType")->getDataList(null, "id,type_name");
        $data['typeId'] = $_GET['typeId'];
        $data['keyword'] = $_GET['keyword'];
        $data['status'] = $_GET['status'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 新增活动
     */
    public function add(){
        D("Activity")->modify();
        $data['activityType'] = D("ActivityType")->getDataList(null, "id,type_name");
        $data['title'] = "新增活动";
        $data['Url'] = U("Activity/add");
        $this->assign($data);
        $this->display("view");
    }

    /**
     * 编辑活动
     */
    public function edit(){
        D("Activity")->modify();
        $data['rows'] = D("Activity")->getDataInfo(array('id'=>$_GET['id']));
        $data['activityType'] = D("ActivityType")->getDataList(null, "id,type_name");//var_dump($data['rows']);
        $data['title'] = "编辑活动";
        $data['Url'] = U("Activity/edit");
        $this->assign($data);
        $this->display("view");
    }

    /**
     * 删除活动
     */
    public function del(){
        D("Activity")->remove();
    }

    /**
     * 活动分类
     */
    public function activityType(){
        $data['rows'] = D("ActivityType")->getActivityType();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['keyword'] = $_GET['keyword'];
        $this->assign($data);
        $this->display("activityType");
    }

    /**
     * 新增活动分类
     */
    public function activityType_add(){
        D("ActivityType")->saveActivityType();
        $data['title'] = "新增活动类别";
        $data['Url'] = U("Activity/activityType_add");
        $this->assign($data);
        $this->display("activityType_view");
    }

    /**
     * 编辑活动分类
     */
    public function activityType_edit(){
        D("ActivityType")->saveActivityType();
        $data['rows'] = D("ActivityType")->getDataInfo(array('id'=>$_GET['id']));
        $data['title'] = "编辑活动类别";
        $data['Url'] = U("Activity/activityType_edit");
        $this->assign($data);
        $this->display("activityType_view");
    }

    /**
     * 删除活动分类
     */
    public function activityType_del(){
        D("ActivityType")->remove();
    }

    /**
     * 报名人员
     */
    public function signUp(){
        $data['rows'] = D("AttendActivity")->getActivitySignUp();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['whetherAudit'] = $_GET['whetherAudit'];
        $data['keyword'] = $_GET['keyword'];
        $data['status'] = $_GET['status'];
        $data['id'] = $_GET['id'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 报名人员审核
     */
    public function signAudit(){
        D("AttendActivity")->signAudit();
    }

    /**
     * 导出报名人员
     */
    public function signExport(){
        $title = "报名人员";
        $column = array("手机","昵称","姓名","性别","报名时间","签到时间");
        $rows = D("AttendActivity")->signExpprt();
        export($title, $column, $rows);


    }

}