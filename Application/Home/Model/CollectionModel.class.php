<?php
/**
 * 收藏Model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:25
 */

namespace Home\Model;


class CollectionModel extends CommonModel
{
    public function changeKeep(){
        $item = I('post.item');
        $id = I('post.id');
        $data = array(
            'uid' => session("uid"),
            'coptic_id' => $id
        );
        if ($item){
            $this->deleteData($data);
        }else{
            $data['coptic_type_id'] = $_POST['coptic_type_id'];
            $data['create_time'] = time();
            $this->addData($data);
        }
    }

    public function myKeepList(){
        $uid = session('uid');
        $join = array('INNER JOIN dxyh_coptic as ct2 ON ct1.coptic_id=ct2.id','INNER JOIN dxyh_coptic_type as ct3 ON ct1.coptic_type_id=ct3.id');
        $where = array('ct1.uid'=>$uid);
        $field = "ct1.id,ct1.create_time,ct2.coptic_cover,ct2.coptic_title,ct3.category_name";
        $list = $this->alias('ct1')->getJoinDataList($join, $where, $field, array('ct1.create_time'=>'desc'));
        foreach ($list as $key => $item) {
            $list[$key]['create_time'] = dateTime($item['create_time']);
        };
        return $list;
    }

    public function modifryKeep(){
        $id = I('post.id');
        $data = array(
            'uid' => session("uid"),
            'id' => $id
        );
        $boole = $this->deleteData($data);
        if ($boole){
            message(1, '取消收藏成功');
        }else{
            message(0, '取消收藏失败');
        }
    }
}