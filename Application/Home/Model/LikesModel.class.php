<?php
/**
 * 科普点赞Model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:33
 */

namespace Home\Model;


class LikesModel extends CommonModel
{
    public function changeLikes(){
        $item = I('post.item');
        $data = array(
            'uid' => session('uid'),
            'coptic_id' => $_POST['id']
        );
        if ($item){
            $this->deleteData($data);
        }else{
            $this->addData($data);
        }
    }
}