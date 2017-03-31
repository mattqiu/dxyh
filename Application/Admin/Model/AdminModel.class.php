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

    public function modifyPassword(){
        if (IS_POST){
            $requert = I("post.");
            if (!isset($requert['originalPasswd']) || empty($requert['originalPasswd'])){
                message(0, "原密码不能为空");
            }
            if (!isset($requert['newPasswd']) || empty($requert['newPasswd'])){
                message(0, "新密码不能为空");
            }
            if (!isset($requert['confirmPasswd']) || empty($requert['confirmPasswd'])){
                message(0, "确认密码不能为空");
            }
            if ($requert['confirmPasswd'] !== $requert['newPasswd']){
                message(0, "新密码与确认密码不一致<br>请重新输入");
            }
            $chack_password = $this->getDataInfo(array('aid'=>session('aid')), "passwd");
            if ($chack_password['passwd'] !== md5($requert['originalPasswd'])){
                message(0, "原密码不正确");
            }
            $boole = $this->editData(array('aid'=>session('aid')), md5($requert['newPasswd']));
            if ($boole !== false){
                session("aid", " ");
                message(1, "修改密码成功", U("Public/login"));
            }else{
                message(0, "修改密码失败");
            }
        }
    }

    public function userLogin(){
        if (IS_POST){
            $request_data = I("post.");
            if (!isset($request_data['userName']) || empty($request_data['userName'])){
                message(0, "用户名不能为空！");
            }
            if (!isset($request_data['passWord']) || empty($request_data['passWord'])){
                message(0, "密码不能为空！");
            }
            $info = $this->getDataInfo(array("aname"=>$request_data['userName']));
            if ($info){
                if ($info['passwd'] === md5($request_data['passWord'])){
                    session("aid", $info['aid']);
                    session("aname", $info['aname']);
                    message(1, "登录成功", U("Index/index"));
                }else{
                    message(0, "密码错误!");
                }
            }else{
                message(0, "用户不存在");
            }
        }
    }
}