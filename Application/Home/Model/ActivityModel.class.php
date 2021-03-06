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
            if ($item['activity_start_time'] > time()){
                $data['rows'][$key]['status'] = "<span class=\"activeState stateBg2\">敬请期待</span>";
            }elseif ($item['activity_start_time'] < time() && $item['activity_end_time'] > time()){
                $data['rows'][$key]['status'] = "<span class=\"activeState stateBg1\">立即参与</span>";
            }elseif ($item['activity_end_time'] < time()){
                $data['rows'][$key]['status'] = "<span class=\"activeState\">活动结束</span>";
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
        if ($info['enroll_start_time'] > time()){
            $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">未到报名时间</a>";
        }elseif ($info['enroll_start_time'] <= time() && $info['enroll_end_time'] >= time()){   //报名正在进行中
            if ($info['activity_number'] > 0){
                $atttndNum = M("AttendActivity")->where(array('activity_id'=>$id))->count();
                if ($atttndNum < $info['activity_number']){
                    if (session("uid")){
                        $boole = M("AttendActivity")->where(array('uid'=>session('uid'),'activity_id'=>$id))->count();
                        if ($boole){
                            $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">取消参与</a>";
                        }else{
                            $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">我要参与</a>";
                        }
                    }else{
                        $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">我要参与</a>";
                    }
                }else{
                    $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" style=\"background: #FB890A;\" disabled>报名已满</a>";
                }
            }else{
                if (session("uid")){
                    $boole = M("AttendActivity")->where(array('uid'=>session('uid'),'activity_id'=>$id))->count();
                    if ($boole){
                        $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">取消参与</a>";
                    }else{
                        $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">我要参与</a>";
                    }
                }else{
                    $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">我要参与</a>";
                }
            }
        }elseif ($info['enroll_end_time'] < time() && time() < $info['activity_start_time']){
            $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" style=\"background: #939696;\" disabled>报名结束</a>";
        }elseif ($info['activity_start_time'] <= time() && $info['activity_end_time'] > time()){
            if (session("uid")){
                $boole = M("AttendActivity")->where(array('uid'=>session('uid'),'activity_id'=>$id))->count();
                if ($boole){
                    $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">取消参与</a>";
                }else{
                    $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">正在进行</a>";
                }
            }else{
                $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" data-value=\"{$info['id']}\">正在进行</a>";
            }
        }elseif ($info['activity_end_time'] < time()){
            $info['checkAttend'] = "<a href=\"javascript:;\" class=\"joinBtn\" style=\"background: #939696;\" disabled>活动结束</a>";
        }

        $info['content'] = html_entity_decode($info['content']);
        $info['activity_start_time'] = dateTime($info['activity_start_time'], 6);
        $info['activity_end_time'] = dateTime($info['activity_end_time'], 6);
        $info['enroll_start_time'] = dateTime($info['enroll_start_time'], 6);
        $info['enroll_end_time'] = dateTime($info['enroll_end_time'], 6);
        $info['activity_number'] = empty($info['activity_number'])?"人数不限":$info['activity_number'];

        return $info;
    }

}