<?php
/**
 * 公共类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 12:39
 */

namespace Admin\Controller;

use Think\Controller;
class PublicController extends Controller
{
    /**
     * 登录
     */
    public function login(){
        D("Admin")->userLogin();
        $this->display();
    }



    /**
     * 修改密码
     */
    public function modify_password(){
        D("Admin")->modifyPassword();
        $this->display();
    }

    /**
     * 退出系统
     */
    public function logout(){
        unset($_SESSION['aid']);
        unset($_SESSION['aname']);
        redirect(U("Public/login"));
    }
}