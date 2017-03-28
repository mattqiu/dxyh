<?php
/**
 * 家庭护理类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:33
 */

namespace Admin\Controller;

use Think\Controller;
class HomeCareController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 家庭护理
     */
    public function index(){

        $this->display();
    }
}