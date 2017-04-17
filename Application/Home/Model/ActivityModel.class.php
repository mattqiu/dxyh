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
        $list = $this->getDataList(array("status"=>array("neq","3")), "id,activity_name,activity_cover,enroll_end_time,browse_volume", array("create_time"=>"desc"), 0, 3);
        $weekarray=array("日","一","二","三","四","五","六");
        foreach ($list as $key=>$item){
            $list[$key]['enroll_end_time'] = dateTime($item['enroll_end_time'], 2);
            $list[$key]['week'] = "星期".$weekarray[date('w', $item['enroll_end_time'])];
            $list[$key]['time'] = date('H:i', $item['enroll_end_time']);
        }
        return $list;
    }
}