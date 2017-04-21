<?php
/**
 * 参加活动记录Model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:22
 */

namespace Home\Model;


class AttendActivityModel extends CommonModel
{
    public function participateActivity(){
        $id = I('post.id');
        if (empty($id)){
            return array('code'=>1, 'msg'=>'参数丢失');
        }
        $row = M('Activity')->where(array('id'=>$id))->find();
        if (!$row){
            return array('code'=>1, 'msg'=>'活动不存在，可能已被管理员删除');
        }
        if ($row['enroll_start_time'] > time()){
            return array('code'=>1, 'msg'=>'活动报名还没开始');
        }
        if ($row['enroll_end_time'] < time()){
            return array('code'=>1, 'msg'=>'活动报名时间已结束');
        }
        if ($row['activity_number']){
            $rowNum = $this->countData(array('activity_id'=>$id));
            if ($rowNum >= $row['activity_number']){
                return array('code'=>1, 'msg'=>'活动报名人数已满');
            }
        }
        $checkActivity = $this->countData(array('activity_id'=>$id,'uid'=>session('uid')));
        if ($checkActivity){
            return array('code'=>1, 'msg'=>'您已报名该活动');
        }
        $data = array(
            'uid' => session('uid'),
            'activity_type_id' => $row['activity_type_id'],
            'activity_id' => $row['id'],
            'create_time' => time()
        );
        $boole = $this->addData($data);
        if ($boole){
            $rowNum = $this->countData(array('activity_id'=>$id));
            return array('code'=>0, 'msg'=>'报名成功', 'data'=>$rowNum);
        }else{
            return array('code'=>1, 'msg'=>'报名失败');
        }
    }


    public function myActivity(){
        $uid = session("uid");
        $join = array('INNER JOIN dxyh_activity as ay2 ON ay1.activity_id=ay2.id');
        $where = array('ay1.uid'=>$uid);
        $field = "ay1.id,ay2.activity_name,ay2.activity_cover,ay2.activity_start_time,ay2.activity_end_time,ay2.activity_number,ay2.address,ay2.browse_volume";
        $list = $this->alias("ay1")->getJoinDataList($join, $where, $field, array('ay1.create_time'=>'desc'));
        foreach ($list as $key=>$value){
            $list[$key]['activity_start_time'] = dateTime($value['activity_start_time'], 2);
            $list[$key]['activity_end_time'] = dateTime($value['activity_end_time'], 2);
        }
        return $list;
    }

    public function cancelActivity(){
        $id = I("post.id");
        $boole = $this->deleteData(array('id'=>$id,'uid'=>session('uid')));
        if ($boole){
            message(1, '已取消活动');
        }else{
            message(0, '未取消活动');
        }
    }
}