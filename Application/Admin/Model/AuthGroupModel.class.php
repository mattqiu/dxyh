<?php
/**
 * 角色Model
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 17:09
 */

namespace Admin\Model;

use Think\Model;
class AuthGroupModel extends BaseModel
{
    public function getAuthGroupSelect(){
        return $this->getDataList(null, "id,title", array("id"=>"desc"));
    }

    public function getRoleManage(){
        return $this->getDataList();
    }

    public function role_save(){
        $request = I('get.');
        return $this->getDataInfo(array('id'=>$request['id']));
    }

}