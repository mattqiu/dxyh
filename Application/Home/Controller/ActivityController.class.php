<?php
/**
 * 活动类
 * User: DarkVisitor
 * Date: 2017/4/10
 * Time: 9:48
 */

namespace Home\Controller;


class ActivityController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        //$data['hotActivity'] = M("Activity")->where(array("referral"=>1))->order(array("create_time"=>"desc","status"=>array("neq","2")))->select();
    }

    public function index(){
        $data["rows"] = D("Activity")->getHomeList();
        $data['activityType'] = M("ActivityType")->order(array("sort"=>"desc"))->select();

        $this->display("activity");
    }

    public function detail(){

        $this->display("activityDetail");
    }
}