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
        $data['homeCareImage'] = D("WebsiteImage")->getHomeList(2);
        $data['rows'] = D("ChapterSection")->getHomeList();

//var_dump($data);
        $this->assign($data);
        $this->display("family");
    }

    public function detail(){
        $data = D("ChapterSection")->homeCareDetail();
        //var_dump($data);
        $this->assign($data);
        $this->display("familyDetail");
    }
}