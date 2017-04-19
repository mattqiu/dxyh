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
        $hotActivity = M("Activity")->where(array("referral"=>1))->field("id,activity_name,activity_cover")->order(array("create_time"=>"desc"))->select();
        $this->assign("hotActivity", $hotActivity);
    }

    /**
     * 活动中心
     */
    public function index(){
        $data = D("Activity")->getList();
        $data['activityType'] = M("ActivityType")->order(array("sort"=>"desc"))->select();
        $data['id'] = $_GET['typeId'];
        $data['keyword'] = $_GET['keyword'];

        $this->assign($data);
        $this->display("activity");
    }

    public function detail(){
        $Model = new \Think\Model();
        $Model->execute("update dxyh_activity set browse_volume = browse_volume+1 where id={$_GET['id']}");

        $data['rows'] = D("Activity")->getActivityDetails();

        $this->assign($data);
        $this->display("activityDetail");
    }

    /**
     * 移动端滚动翻页获取数据
     */
    public function activityJsonData(){
        $data = D("Activity")->getList();
        if ($data['rows']){
            $result = array('code'=>0, 'data'=>$data['rows']);
        }else{
            $result = array('code'=>1, 'data'=>$data['rows']);
        }
        echo json_encode($result);
    }
}