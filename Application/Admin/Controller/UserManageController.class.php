<?php
/**
 * 用户管理类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:36
 */

namespace Admin\Controller;

use Think\Controller;
class UserManageController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 用户列表
     */
    public function user_list(){
        $data['rows'] = D("User")->getList();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['keyword'] = $_GET['keyword'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 积分明细
     */
    public function integral(){
        $data['rows'] =D("IntegralDetail")->getList();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['createTime'] = $_GET['create_time'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 用户收藏列表
     */
    public function collection(){
        $data['rows'] = D("Collection")->getList();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['CopticType'] = M("CopticType")->select();
        $data['keyword'] = $_GET['keyword'];
        $data['typeId'] = $_GET['typeId'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 用户参加活动列表
     */
    public function user_activity(){
        $data['rows'] = D("AttendActivity")->UserActivity();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['activityType'] = M("ActivityType")->select();
        $data['keyword'] = $_GET['keyword'];
        $data['typeId'] = $_GET['typeId'];
        $this->assign($data);
        $this->display();
    }
}