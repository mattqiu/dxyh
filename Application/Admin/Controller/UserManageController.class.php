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

        $this->display();
    }

    /**
     * 积分明细
     */
    public function integral(){

        $this->display();
    }

    /**
     * 用户收藏列表
     */
    public function collection(){

        $this->display();
    }

    /**
     * 用户参加活动列表
     */
    public function user_activity(){

        $this->display();
    }
}