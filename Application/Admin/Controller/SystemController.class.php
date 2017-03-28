<?php
/**
 * 系统管理类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:42
 */

namespace Admin\Controller;

use Think\Controller;
class SystemController extends BaseController
{
    public $AuthGroup;
    public function __construct()
    {
        parent::__construct();
        $this->AuthGroup = D("AuthGroup");
    }

    /**
     * 角色管理
     */
    public function role_manage(){
        //$this->error('测试');
        $this->display();
    }

    /**
     * 账户管理
     */
    public function account_manage(){

        $this->display();
    }

    /**
     * 添加账户
     */
    public function account_add(){
        $data['auth'] = $this->AuthGroup->getAuthGroupSelect();

        $this->assign($data);
        $this->display();
    }

    /**
     * 网站图片
     */
    public function website_image(){

        $this->display();
    }

    /**
     * 友情链接
     */
    public function link_mangae(){

        $this->display();
    }

    /**
     * 关于我们
     */
    public function about_us(){

        $this->display();
    }

    /**
     * 修改密码
     */
    public function modify_password(){

        $this->display();
    }
}