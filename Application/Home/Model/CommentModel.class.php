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
        $uid = session("uid");
        $join = array("INNER JOIN dxyh_user as u ON u.uid=c.uid");
        $where = array(
            "c.coptic_id" => $id,
            "c.status" => 1
        );
        $field = "c.id,c.parent_id,c.content,u.nickname,u.avatar,c.create_time,(select count(*) from dxyh_comment_likes WHERE dxyh_comment_likes.comment_id=c.id) as likesnum,(select count(*) from dxyh_comment_likes WHERE dxyh_comment_likes.comment_id=c.id AND uid=$uid) as likes";
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
                $listAry[$key]['subData'] = array_reverse(RecursionCommentsAry($value['id'], $list));
                $listAry[$key]['create_time'] = dateTime($value['create_time'], 6);
            }
            $listAry = $this->bubbleSort($listAry);
            return $listAry;
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


    /**
     * 科普添加评论
     */
    public function copticComment(){
        $param = I("post.");
        $uid = session("uid");
        if (!isset($param['content']) && empty($param['content'])){
            return array('code'=>1, 'msg'=>'请输入评论内容！');
        }
        $data = array(
            'uid' => $uid,
            'parent_id' => empty($param['parentId'])?0:$param['parentId'],
            'coptic_id' => $param['copticId'],
            'content' => $param['content'],
            'create_time' => time(),
        );
        $cid = $this->addData($data);
        if ($cid){
            $udata = M("User")->where(array('uid'=>$uid))->field('nickname,avatar')->find();
            $rows = array(
                'cid' => $cid,
                'nickname' => $udata['nickname'],
                'avatar' => $udata['avatar'],
                'create_time' => dateTime($data['create_time'], 6)
            );
            return array('code'=>0, 'msg'=>'', 'data'=>$rows);
        }else{
            return array('code'=>1, 'msg'=>'系统繁忙，请稍后再试!');
        }
    }

}