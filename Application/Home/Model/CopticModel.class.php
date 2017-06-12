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
        return $this->getDataList(array('isdisplay'=>2), "id,coptic_title,coptic_cover,abstract", array("sort"=>"desc"), 0, 8);
    }

    public function getList(){
        $quesData = I("get.");
        $where = array('isdisplay'=>2);
        if ($quesData['typeId']){
            $where['ct1.coptic_type_id'] = $quesData['typeId'];
        }
        if ($quesData['keyword']){
            $where['_string'] = " ct1.coptic_title like '%".$quesData['keyword']."%' OR ct1.abstract like '%".$quesData['keyword']."%' OR ct1.content like '%".$quesData['keyword']."%' ";
        }
        $join = array("INNER JOIN dxyh_coptic_type as ct2 ON ct1.coptic_type_id=ct2.id");
        $count = $this->alias('ct1')->getJoinCount($join, $where);
        import('Org.Api.Page');
        $page = new \Page($count, C('PAGE_ROWS'));
        $field = "ct1.id,ct1.abstract,ct1.author,ct1.create_time,ct1.coptic_title,ct1.coptic_cover,ct2.category_name";
        $data['rows'] = $this->alias('ct1')->getJoinDataList($join, $where, $field, array("ct1.sort"=>"desc"), $page->firstRow, $page->listRows);
        foreach ($data['rows'] as $key=>$item){
            $data['rows'][$key]['create_time'] = dateTime($item['create_time'], 2);
        }
        $data['page'] = $page->show();
        return $data;
    }

    public function getCopticDetails(){
        $id = I("get.id");
        $info = $this->getDataInfo(array('id'=>$id));
        $info['content'] = html_entity_decode($info['content']);
        $info['create_time'] = dateTime($info['create_time'], 2);
        $info['original_link'] = urldecode($info['original_link']);
        return $info;
    }
}