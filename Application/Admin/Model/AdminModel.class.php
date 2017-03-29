<?php

/**
 * Created by PhpStorm.
 * User: DarkVisitor
 * Date: 2017/3/27
 * Time: 22:05
 */
namespace Admin\Model;

use Think\Model;
use Think\Page;

class AdminModel extends BaseModel
{
    public function getAdminList(){
        $request = I('get.');
        $where = array();
        if (isset($request['authId']) && !empty($request['authId'])){
            $where['g.id'] = $request['authId'];
        }
        if (isset($request['keyword']) && !empty($request['keyword'])){
            $where['a.aname'] = array('LIKE', $request['keyword']);
        }
        $join = array("INNER JOIN dxyh_auth_group_access as ag ON a.aid=ag.aid", "INNER JOIN dxyh_auth_group as g ON ag.group_id=g.id");
        $field = "a.aid,a.aname,a.create_time,g.title";
        $count = $this->alias('a')->getJoinCount($join, $where);
        $page = new Page($count, C('PAGE_NUM'));

        $list = $this->alias('a')->getJoinDataList($join, $where, $field, "a.create_time DESC", $page->firstRow, $page->listRows);
        $list['page'] = $page->show();
        foreach ($list as $key=>$item){
            $list[$key]['create_time'] = empty($item['create_time'])?'':dateTime($item['create_time']);
        }

        return $list;
    }

    public function getAdminSave(){
        $request = I('get.');
        $where['a.aid'] = $request['id'];
        $join = array("INNER JOIN dxyh_auth_group_access as ag ON a.aid=ag.aid");
        $field = "a.aid,a.aname,ag.group_id";
        return $this->alias('a')->getJoinDataInfo($join, $where, $field);
    }

    public function deleteAdmin(){
        $request = I('get.');
        return $this->deleteData(array('aid'=>$request['id']));
    }
}