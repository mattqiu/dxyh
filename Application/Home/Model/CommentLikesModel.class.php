<?php
/**
 * 评论点赞model
 * User: DarkVisitor
 * Date: 2017/4/19
 * Time: 14:56
 */

namespace Home\Model;


class CommentLikesModel extends CommonModel
{
    /**
     * 评论点赞功能
     */
    public function commentLikes(){
        $param = I("post.");
        $uid = session("uid");
        $data = array(
            'uid' => $uid,
            'comment_id' => $param['cid']
        );
        if ($param['likes']){
            $this->deleteData($data);
        }else{
            $this->addData($data);
        }
        $likesNum = $this->countData(array('comment_id' => $param['cid']));
        return array('likesNum'=>$likesNum);
    }
}