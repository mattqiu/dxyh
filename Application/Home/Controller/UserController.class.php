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

        $this->display();
    }

    /**
     * 我的积分
     */
    public function myIntegral(){

        $this->display();
    }

    /**
     * 我的收藏
     */
    public function myKeep(){
        $data['rows'] = D("Collection")->myKeepList();

        $this->assign($data);
        $this->display();
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
        $this->display();
    }

    /**
     * 修改密码
     */
    public function modifyPasswd(){
        D("User")->modifyPasswd();
        $this->display();
    }
}