<?php
/**
 * 积分明细
 * User: DarkVisitor
 * Date: 2017/4/2
 * Time: 14:49
 */

namespace Admin\Model;

use Think\Page;
class IntegralDetailModel extends BaseModel
{
    public function getList(){
        $qustData = I('get.');
        $where = null;
        if (isset($qustData['create_time']) && !empty($qustData['create_time'])){
            $createTime = explode('-', $qustData['create_time']);
            $where['ig.create_time'] = array(array('gt',strtotime($createTime[0])),array('lt',strtotime($createTime[1])),'and');
        }
        if (isset($qustData['keyword']) && !empty($qustData['keyword'])){
            $where['_string'] = ' (u.mobile like "%'.trim($qustData['keyword']).'%")  OR (u.nickname like "%'.trim($qustData['keyword']).'%") OR (u.name like "%'.trim($qustData['keyword']).'%") ';
        }

        $join = array("INNER JOIN dxyh_user as u ON ig.uid=u.uid");

        $count = $this->alias("ig")->getJoinCount($join, $where);
        $page = new Page($count, C("PAGE_NUM"));
        $field = "ig.id,ig.create_time,ig.integral_num,ig.reason,u.mobile,u.nickname,u.name";
        $list = $this->alias("ig")->getJoinDataList($join, $where, $field, array("ig.id"=>"desc"), $page->firstRow, $page->listRows);
        foreach ($list as $key=>$item){
            $list[$key]['create_time'] = dateTime($item['create_time']);
        }
        $list['page'] = $page->show();
        return $list;
    }
}