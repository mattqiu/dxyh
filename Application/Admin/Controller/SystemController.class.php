<?php
/**
 * 系统管理类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:42
 */

namespace Admin\Controller;

use Think\Controller;
class SystemController extends BaseController
{
    public $AuthGroup;
    public $Admin;
    public $AuthGroupAccess;
    public $AuthRule;
    public function __construct()
    {
        parent::__construct();
        $this->AuthGroup = D("AuthGroup");
        $this->Admin = D("Admin");
        $this->AuthGroupAccess = D("AuthGroupAccess");
        $this->AuthRule = D("AuthRule");
    }

    /**
     * 角色管理
     */
    public function role_manage(){
        $data['rows'] = $this->AuthGroup->getRoleManage();

        $this->assign($data);
        $this->display();
    }

    /**
     * 角色添加
     */
    public function role_add(){
        if (IS_POST){
            $requet = I('post.');
            if (!isset($requet['authName']) || empty($requet['authName'])){
                $this->error('角色名称不能为空');
            }

            $data = array(
                "title" => $requet['authName'],
                "rules" => implode(',',$requet['rules_id']),
                "content" => $requet['content'],
            );

            $boole = $this->AuthGroup->addData($data);
            if ($boole){
                $this->success('新增成功', U("System/role_manage"));
            }else{
                $this->error('新增失败');
            }
        }
        $data['auths'] = $this->AuthRule->authTree();

        $this->assign($data);
        $this->display();
    }

    /**
     * 角色编辑
     */
    public function role_edit(){
        if (IS_POST){
            $requset = I('post.');
            if (!$requset['authName'] || empty($requset['authName'])){
                $this->error('角色名称不能为空！');
            }
            $data = array(
                "title" => $requset['authName'],
                "content" => $requset['content'],
                "rules" => implode(',', $requset['rules_id']),
            );
            $boole = $this->AuthGroup->editData(array('id'=>$requset['gid']), $data);
            if ($boole){
                $this->success('编辑成功', U("System/role_manage"));
            }else{
                $this->error('编辑失败');
            }
        }

        $data['rows'] = $this->AuthGroup->role_save();
        $data['auths'] = $this->AuthRule->authTree();

        $this->assign($data);
        $this->display();
    }

    /**
     * 角色删除
     */
    public function role_del(){
        $requset = I('get.');
        $boole = $this->AuthGroup->deleteData(array('id'=>$requset['id']));
        if ($boole){
            $this->AuthGroupAccess->deleteData(array('group_id'=>$requset['id']));
            $this->success('删除成功', U("System/role_manage"));
        }else{
            $this->error('删除失败');
        }
    }


    /**
     * 账户管理
     */
    public function account_manage(){
        $data['rows'] = $this->Admin->getAdminList();
        $data['auth'] = $this->AuthGroup->getAuthGroupSelect();
        $data['authId'] = $_GET['authId'];
        $data['keyword'] = $_GET['keyword'];
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $this->assign($data);
        $this->display();
    }

    /**
     * 添加账户
     */
    public function account_add(){
        if (IS_POST){
            $request = I('post.');
            if (!isset($request['accountName']) || empty($request['accountName'])){
                $this->error('管理员账号不能为空！');
            }
            if (!isset($request['passwd']) || empty($request['passwd'])){
                $this->error('密码不能为空！');
            }
            if (!isset($request['confirmPasswd']) || empty($request['confirmPasswd'])){
                $this->error('确认密码不能为空！');
            }
            if ($request['passwd'] !== $request['confirmPasswd']){
                $this->error("密码与确认密码不一致<br>请重新输入");
            }
            if (!isset($request['authId']) || empty($request['authId'])){
                $this->error("请选择管理员所属角色！");
            }
            $data = array(
                "aname" => $request['accountName'],
                "passwd" => md5($request['passwd']),
                "create_time" => time(),
            );
            $boole = $this->Admin->addData($data);
            if ($boole){
                $data = array(
                    "aid" => $boole,
                    "group_id" => $request['authId'],
                );
                $this->AuthGroupAccess->addData($data);
                $this->success("新增成功", U("System/account_manage"));
            }else{
                $this->error("新增失败");
            }
        }
        $data['auth'] = $this->AuthGroup->getAuthGroupSelect();

        $this->assign($data);
        $this->display();
    }

    /**
     * 账户编辑
     */
    public function account_edit(){
        if (IS_POST){
            $request = I('post.');
            $resutl = array();
            if (!isset($request['accountName']) || empty($request['accountName'])){
                $this->error('管理员账号不能为空！');
            }
            $resutl['aname'] = $request['accountName'];
            if (isset($request['passwd']) && !empty($request['passwd'])){
                if (!isset($request['confirmPasswd']) || empty($request['confirmPasswd'])){
                    $this->error('确认密码不能为空！');
                }
                if ($request['passwd'] !== $request['confirmPasswd']){
                    $this->error("密码与确认密码不一致<br>请重新输入");
                }
                $resutl['passwd'] = md5($request['passwd']);
            }
            if (!isset($request['authId']) || empty($request['authId'])){
                $this->error("请选择管理员所属角色！");
            }
            $boole = $this->Admin->editData(array('aid'=>$request['aid']), $resutl);
            if ($boole !== false){
                $this->AuthGroupAccess->editData(array('aid'=>$request['aid']), array('group_id'=>$request['authId']));
                $this->success('编辑成功', U("System/account_manage"));
            }else{
                $this->error('编辑失败');
            }
        }
        $data['auth'] = $this->AuthGroup->getAuthGroupSelect();
        $data['rows'] = $this->Admin->getAdminSave();

        $this->assign($data);
        $this->display();
    }

    /**
     * 账户删除
     */
    public function account_del(){
        $boole = $this->Admin->deleteAdmin();
        if ($boole){
            $this->AuthGroupAccess->deleteData(array('aid'=>$_GET['id']));
            $this->success('删除成功', U("System/account_manage"));
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 网站图片
     */
    public function website_image(){
        
        $this->display();
    }

    /**
     * 友情链接
     */
    public function link_mangae(){

        $this->display();
    }

    /**
     * 关于我们
     */
    public function about_us(){

        $this->display();
    }

    /**
     * 修改密码
     */
    public function modify_password(){

        $this->display();
    }
}