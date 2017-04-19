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
}