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

    /**
     * 活动分类
     */
    public function activityType(){

        $this->display();
    }
}