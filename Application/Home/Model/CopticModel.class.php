<?php
/**
 * 科普model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:29
 */

namespace Home\Model;


class CopticModel extends CommonModel
{
    public function getHomeList(){
        return $this->getDataList(null, "id,coptic_title,coptic_cover,abstract", array("create_time"=>"desc"), 0, 8);
    }

    public function getList(){
        $quesData = I("get.");
        $where = null;
        if ($quesData['typeId']){
            $where['ct1.coptic_type_id'] = $quesData['typeId'];
        }
        if ($quesData['keyword']){
            $where['_string'] = " ct1.coptic_title like '%".$quesData['keyword']."%' OR ct1.abstract like '%".$quesData['keyword']."%' OR ct1.content like '%".$quesData['keyword']."%' ";
        }
        $join = array("INNER JOIN dxyh_coptic_type as ct2 ON ct1.coptic_type_id=ct2.id");
        $count = $this->alias('ct1')->getJoinCount($join, $where);
        $pageSize = 1;
        $p = 0;
        $pageCount = ceil($count / $pageSize);
        if (isset($quesData['p'])){
            if (($quesData['p']-1) >= 0 && ($quesData['p']-1) <= $pageCount){
                $p = ($quesData['p']-1);
            }
        }
        $firstRow = $p * $pageSize;
        $field = "ct1.id,ct1.abstract,ct1.author,ct1.create_time,ct1.coptic_title,ct1.coptic_cover,ct2.category_name";
        $data['list'] = $this->alias('ct1')->getJoinDataList($join, $where, $field, array("ct1.create_time"=>"desc"), $firstRow, $pageSize);
        foreach ($data['list'] as $key=>$item){
            $data['list'][$key]['create_time'] = dateTime($item['create_time'], 2);
        }
        $data['totalPages'] = $pageCount;
        $data['p'] = $p + 1;
        $data['typeId'] = $quesData['typeId'];
        $data['keyword'] = $quesData['keyword'];
        if ($data['list']){
            return array('code'=>'0', 'data'=>$data);
        }else{
            return array('code'=>'1', 'data'=>$data);
        }
    }

    public function getCopticDetails(){
        $id = I("get.id");
        $info = $this->getDataInfo(array('id'=>$id));

        return $info;
    }
}