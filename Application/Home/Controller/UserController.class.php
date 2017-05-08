<?php
/**
 * 用户类
 * User: DarkVisitor
 * Date: 2017/4/13
 * Time: 13:38
 */

namespace Home\Controller;


class UserController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        if (empty(session('uid'))) {
            redirect(U("Public/login"));
        }
    }

    public function index(){
        $data['rows'] = D("User")->getUserInfo();
        $this->assign($data);
        $this->display("memberCenter");
    }

    /**
     * 我的活动
     */
    public function myActivity(){
        $data['rows'] = D("AttendActivity")->myActivity();

        $this->assign($data);
        $this->display("myActivity");
    }

    public function cancelActivity(){
        D("AttendActivity")->cancelActivity();
    }

    /**
     * 我的积分
     */
    public function myIntegral(){
        $data = D("IntegralDetail")->getList();
        $data['nowIntegral'] = M("User")->where(array('uid'=>session('uid')))->field('integral')->find()['integral'];

        $this->assign($data);
        $this->display("myIntegral");
    }

    /**
     * 我的收藏
     */
    public function myKeep(){
        $data['rows'] = D("Collection")->myKeepList();

        $this->assign($data);
        $this->display("myKeep");
    }

    /**
     * 取消收藏
     */
    public function changeKeep(){
        D("Collection")->modifryKeep();
    }

    /**
     * 修改资料
     */
    public function changeMeaage(){
        $data['rows'] = D("User")->getUserInfo();
        D('User')->edit();
        $this->assign($data);
        $this->display("changeMeaage");
    }

    /**
     * 修改密码
     */
    public function modifyPasswd(){
        D("User")->modifyPasswd();
        $this->display("modifyPasswd");
    }
}