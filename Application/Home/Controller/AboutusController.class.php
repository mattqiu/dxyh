<?php
/**
 * 关于我们
 * User: DarkVisitor
 * Date: 2017/4/13
 * Time: 13:55
 */

namespace Home\Controller;


class AboutusController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data = file_get_contents("about.text");
        if (empty($data)){
            $data = "暂无数据";
        }else{
            $data = html_entity_decode($data);
        }
        $this->assign("rows", $data);
        $this->display("Public/aboutUs");
    }
}