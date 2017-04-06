<?php
/**
 * 活动model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:21
 */

namespace Home\Model;


class ActivityModel extends CommonModel
{
    public function getHomeList(){
        return $this->getDataList(array("status"=>array("neq"=>"2")), "id,activity_name,activity_cover,enroll_end_time,browse_volume", array("create_time"=>"desc"), 0, 3);
    }
}