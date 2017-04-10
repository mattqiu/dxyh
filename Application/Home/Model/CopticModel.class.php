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
            $where['coptic_type_id'] = $quesData['typeId'];
        }
        if ($quesData['keyword']){
            $where['_string'] = " coptic_title like '%".$quesData['keyword']."%' OR abstract like '%".$quesData['keyword']."%' OR content like '%".$quesData['keyword']."%' ";
        }
        $count = $this->countData($where);

        $list = $this->getDataList($where, null, array("create_time"=>"desc"));
        return $list;
    }

    public function getCopticDetails(){
        $id = I("get.id");
        $info = $this->getDataInfo(array('id'=>$id));

        return $info;
    }
}