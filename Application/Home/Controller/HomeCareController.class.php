<?php
/**
 * 家庭护理
 * User: DarkVisitor
 * Date: 2017/4/13
 * Time: 13:57
 */

namespace Home\Controller;


class HomeCareController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $this->display("family");
    }

    public function detail(){

        $this->display("familyDetail");
    }
}