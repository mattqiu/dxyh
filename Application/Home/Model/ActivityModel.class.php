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

    public function getList(){
        $quesData = I("get.");
        $where = null;
        if ($quesData['typeId']){
            $where['ay1.activity_type_id'] = $quesData['typeId'];
        }
        if ($quesData['keyword']){
            $where['_string'] = " ay1.activity_name like '%".$quesData['keyword']."%' OR ay1.address like '%".$quesData['keyword']."%' ";
        }
        $join = array("INNER JOIN dxyh_activity_type as ay2 ON ay1.activity_type_id=ay2.id");
        $count = $this->alias('ay1')->getJoinCount($join, $where);
        import('Org.Api.Page');
        $page = new \Page($count, C('PAGE_ROWS'));
        $field = "ay1.id,ay1.activity_cover,ay1.address,ay1.activity_name,ay1.activity_number,ay1.activity_integral,ay1.status,ay1.activity_start_time,ay1.activity_end_time,ay1.enroll_start_time,ay1.enroll_end_time,(select count(*) from dxyh_attend_activity where dxyh_attend_activity.activity_id=ay1.id) as activityNum";
        $data['rows'] = $this->alias('ay1')->getJoinDataList($join, $where, $field, array("ay1.create_time"=>"desc"), $page->firstRow, $page->listRows);
        foreach ($data['rows'] as $key=>$item){
            if ($item['enroll_start_time'] > time()){
                $data['rows'][$key]['status'] = "<span class=\"activeState\">未开始</span>";
            }elseif ($item['enroll_end_time'] < time()){
                $data['rows'][$key]['status'] = "<span class=\"activeState\">已截止</span>";
            }elseif ($item['activity_number'] > 0){
                if ($item['activityNum'] >= $item['activity_number']){
                    $data['rows'][$key]['status'] = "<span class=\"activeState stateBg2\">已报满</span>";
                }elseif ($item['enroll_start_time'] <= time() && $item['enroll_end_time'] >= time()){
                    $data['rows'][$key]['status'] = "<span class=\"activeState stateBg1\">正在报名</span>";
                }
            }elseif ($item['enroll_start_time'] <= time() && $item['enroll_end_time'] >= time()){
                $data['rows'][$key]['status'] = "<span class=\"activeState stateBg1\">正在报名</span>";
            }
            $data['rows'][$key]['activity_start_time'] = dateTime($item['activity_start_time'], 6);
            $data['rows'][$key]['activity_end_time'] = dateTime($item['activity_end_time'], 6);
            $data['rows'][$key]['activity_number'] = empty($item['activity_number'])?"人数不限":$item['activity_number']."人";

        }
        $data['page'] = $page->show();
        return $data;
    }

    public function getActivityDetails(){
        $id = I('get.id');
        $join = array("INNER JOIN dxyh_activity_type as ay2 ON ay1.activity_type_id=ay2.id");
        $field = "ay1.*,ay2.type_name,(select count(*) from dxyh_attend_activity where dxyh_attend_activity.activity_id=ay1.id) as enrollnum";
        $info = $this->alias("ay1")->getJoinDataInfo($join, array('ay1.id'=>$id), $field);
        $info['content'] = html_entity_decode($info['content']);
        $info['activity_start_time'] = dateTime($info['activity_start_time'], 6);
        $info['activity_end_time'] = dateTime($info['activity_end_time'], 6);
        $info['enroll_start_time'] = dateTime($info['enroll_start_time'], 6);
        $info['enroll_end_time'] = dateTime($info['enroll_end_time'], 6);
        $info['activity_number'] = empty($info['activity_number'])?"人数不限":$info['activity_number'];
        return $info;
    }

    
}