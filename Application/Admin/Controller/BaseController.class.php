<?php
/**
 * 后台基础Controller类
 * User: DarkVisitor
 * Date: 2017/3/27
 * Time: 23:29
 */

namespace Admin\Controller;

use Think\Auth;
use Think\Controller;
use Think\Think;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty(session("aid"))){
            redirect(U("Public/login"));
        }

        $auth = new Auth();
        $check = $auth->check(CONTROLLER_NAME . '_' . ACTION_NAME,session("aid"));
        if (!$check){
            $this->error("您没有该操作权限");
        }
    }
}