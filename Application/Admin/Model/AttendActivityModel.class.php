<?php
/**
 * 用户参与活动类
 * User: DarkVisitor
 * Date: 2017/4/1
 * Time: 15:54
 */

namespace Admin\Model;

use Think\Page;
class AttendActivityModel extends BaseModel
{
    public function getActivitySignUp(){
        $qustData = I("get.");
        $where = array('aa.activity_id'=>$qustData['id']);
        if (!empty($qustData['keyword'])) {
            $where['_string'] = ' (u.mobile like "%'.trim($qustData['keyword']).'%")  OR (u.nickname like "%'.trim($qustData['keyword']).'%") OR (u.name like "%'.trim($qustData['keyword']).'%") ';
        }
        if (!empty($qustData['status'])){
            $where['audit'] = $qustData['status'];
        }

        $join = array("INNER JOIN dxyh_user as u ON aa.uid=u.uid");

        $count = $this->alias("aa")->getJoinCount($join, $where);
        $page = new Page($count, C("PAGE_NUM"));
        $field = "aa.id,aa.create_time,aa.sign_time,aa.audit,u.mobile,u.nickname,u.name,u.sex";
        $list = $this->alias("aa")->getJoinDataList($join, $where, $field, null, $page->firstRow, $page->listRows);
        foreach ($list as $key=>$item){
            $list[$key]['create_time'] = dateTime($item['create_time']);
            $list[$key]['sign_time'] = dateTime($item['sign_time']);
            switch ($item['audit']){
                case 3:
                    $list[$key]['audit'] = "未审核";
                    break;
                case 1:
                    $list[$key]['audit'] = "已通过";
                    break;
                case 2:
                    $list[$key]['audit'] = "未通过";
                    break;
            }
            switch ($item['sex']){
                case 0:
                    $list[$key]['sex'] = "保密";
                    break;
                case 1:
                    $list[$key]['sex'] = "男";
                    break;
                case 2:
                    $list[$key]['sex'] = "女";
                    break;
            }
        }
        $list['page'] = $page->show();
        return $list;
    }

    public function signAudit(){
        if (IS_POST){
            $numId = I("post.num");
            $status = I("post.auditStatus");
            if (empty($numId)){
                message(0, "请选择至少一条记录进行操作!");
            }
            $where['id'] = array("in", $numId);
            $boole = $this->editData($where, array("audit"=>$status));
            if ($boole !== false){
                message(1, "审核成功", U("Activity/signUp", array("id"=>$_POST['id'], "whetherAudit"=>$_POST['whetherAudit'])));
            }else{
                message(0, "审核失败");
            }
        }else{
            message(0, "非法请求");
        }
    }

    public function signExpprt(){
        $qustData = I("get.");
        $where = array('aa.activity_id'=>$qustData['id']);
        $join = array("INNER JOIN dxyh_user as u ON aa.uid=u.uid");
        $field = "u.mobile,u.nickname,u.name,u.sex,aa.create_time,aa.sign_time";
        $list = $this->alias("aa")->getJoinDataList($join, $where, $field);
        foreach ($list as $key=>$item){
            $list[$key]['create_time'] = dateTime($item['create_time']);
            $list[$key]['sign_time'] = dateTime($item['sign_time']);
            switch ($item['audit']){
                case 3:
                    $list[$key]['audit'] = "未审核";
                    break;
                case 1:
                    $list[$key]['audit'] = "已通过";
                    break;
                case 2:
                    $list[$key]['audit'] = "未通过";
                    break;
            }
            switch ($item['sex']){
                case 0:
                    $list[$key]['sex'] = "保密";
                    break;
                case 1:
                    $list[$key]['sex'] = "男";
                    break;
                case 2:
                    $list[$key]['sex'] = "女";
                    break;
            }
        }

        return $list;
    }
}