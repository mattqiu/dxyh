<?php
/**
 * 评论model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:26
 */

namespace Home\Model;


class CommentModel extends CommonModel
{
    public function getCopticComment(){
        $id = I("get.id");
        $join = array("INNER JOIN dxyh_user as u ON u.uid=c.uid");
        $where = array(
            "c.coptic_id" => $id,
            "c.status" => 1
        );
        $field = "c.id,c.parent_id,c.content,u.nickname";
        $list = $this->alias("c")->getJoinDataList($join, $where, $field);
        $listAry = array();
        if ($list){
            foreach ($list as $key=>$value){
                if ($value['parent_id'] != 0){
                    $list[$key]['parentName'] = $this->search($value['parent_id'], $list);
                }
            }
            foreach ($list as $key=>$value){
                if ($value['parent_id'] == 0){
                    $listAry[] = $value;
                }
            }
            $arr = array();
            foreach ($listAry as $key=>$value){
                $listAry[$key]['subData'] = $this->lookup($arr, $value['id'], $list, 1);
            }
var_dump($listAry);
        }
    }

    function search($parentId="", $array=array()){
        if (empty($parentId)) return false;
        if (empty($array)) return false;
        foreach ($array as $key=>$value){
            if ($value['id'] == $parentId){
                return $value['nickname'];
            }
        }
    }

    function lookup(&$listAry,$parentId, $array=array(), $dep){

        for ($i=0;$i<count($array);$i++){
            if ($parentId == $array[$i]['parent_id']){
                $listAry[] = $array[$i];
                $this->lookup($array[$i]['parent_id'],$array, $dep+1);
            }
        }

        return $listAry;
    }
}