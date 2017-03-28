<?php
/**
 * 科普类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:11
 */

namespace Admin\Controller;

use Think\Controller;
class CopticController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 科普文章
     */
    public function index(){

        $this->display();
    }

    /**
     * 科普分类
     */
    public function copticType(){

        $this->display();
    }
}