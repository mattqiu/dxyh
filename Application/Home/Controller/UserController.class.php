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

        $this->display();
    }
}