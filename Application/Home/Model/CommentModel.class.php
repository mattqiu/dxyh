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
        $field = "c.id,c.parent_id,c.content,u.nickname,(select count(*) from dxyh_comment_likes WHERE dxyh_comment_likes.comment_id=c.id) as likesnum";
        $list = $this->alias("c")->getJoinDataList($join, $where, $field, null, null, null);

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
            foreach ($listAry as $key=>$value){
                $listAry[$key]['subData'] = array_reverse($this->lookup($value['id'], $list));
            }
            $listAry = $this->bubbleSort($listAry);
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

    /**
     * 递归返回所有子孙
     * @param $parentId 父id
     * @param array $array 所以子集数组
     * @return array 返回祖先的所有子孙，子与孙在同一级
     */
    function lookup($parentId, $array=array()){
        $subAry = array();
        foreach ($array as $key=>$value){
            if ($value['parent_id'] == $parentId){
                $arr = $this->lookup($value['id'], $array);
                if ($arr){
                    foreach ($arr as $k=>$v){
                        $subAry[] = $v;
                    }
                }
                $subAry[] = $value;

            }
        }
        return $subAry;
    }

    /**
     * 根据评论的回复和点赞数冒泡排序，由大到小
     * @param array $array 排序数组
     * @return array|bool
     */
    function bubbleSort($array=array()){
        if (empty($array)) return false;
        for ($i=0;$i<count($array)-1;$i++){
            for ($j=$i+1;$j<count($array);$j++){
                if (count($array[$i]['subData']) < count($array[$j]['subData'])){
                    $temp = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $temp;
                }elseif (count($array[$i]['subData']) == count($array[$j]['subData'])){
                    if ($array[$i]['likesnum'] < $array[$j]['likesnum']){
                        $temp = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $temp;
                    }
                }
            }
        }
        return $array;
    }
}