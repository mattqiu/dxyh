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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 角色管理
     */
    public function role_manage(){
        $data['rows'] = D("AuthGroup")->getRoleManage();

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

            $boole = D("AuthGroup")->addData($data);
            if ($boole){
                $this->success('新增成功', U("System/role_manage"));
            }else{
                $this->error('新增失败');
            }
        }
        $data['auths'] = D("AuthRule")->authTree();

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
            $boole = D("AuthGroup")->editData(array('id'=>$requset['gid']), $data);
            if ($boole !== false){
                $this->success('编辑成功', U("System/role_manage"));
            }else{
                $this->error('编辑失败');
            }
        }

        $data['rows'] = D("AuthGroup")->role_save();
        $data['auths'] = D("AuthRule")->authTree();

        $this->assign($data);
        $this->display();
    }

    /**
     * 角色删除
     */
    public function role_del(){
        $requset = I('get.');
        $boole = D("AuthGroup")->deleteData(array('id'=>$requset['id']));
        if ($boole){
            D("AuthGroupAccess")->deleteData(array('group_id'=>$requset['id']));
            $this->success('删除成功', U("System/role_manage"));
        }else{
            $this->error('删除失败');
        }
    }


    /**
     * 账户管理
     */
    public function account_manage(){
        $data['rows'] = D("Admin")->getAdminList();
        $data['auth'] = D("AuthGroup")->getAuthGroupSelect();
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
            $boole = D("Admin")->addData($data);
            if ($boole){
                $data = array(
                    "aid" => $boole,
                    "group_id" => $request['authId'],
                );
                D("AuthGroupAccess")->addData($data);
                $this->success("新增成功", U("System/account_manage"));
            }else{
                $this->error("新增失败");
            }
        }
        $data['auth'] = D("AuthGroup")->getAuthGroupSelect();

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
            $boole = D("Admin")->editData(array('aid'=>$request['aid']), $resutl);
            if ($boole !== false){
                D("AuthGroupAccess")->editData(array('aid'=>$request['aid']), array('group_id'=>$request['authId']));
                $this->success('编辑成功', U("System/account_manage"));
            }else{
                $this->error('编辑失败');
            }
        }
        $data['auth'] = D("AuthGroup")->getAuthGroupSelect();
        $data['rows'] = D("Admin")->getAdminSave();

        $this->assign($data);
        $this->display();
    }

    /**
     * 账户删除
     */
    public function account_del(){
        $boole = D("Admin")->deleteAdmin();
        if ($boole){
            D("AuthGroupAccess")->deleteData(array('aid'=>$_GET['id']));
            $this->success('删除成功', U("System/account_manage"));
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 网站图片
     */
    public function website_image(){
        $data['rows'] = D("WebsiteImage")->getWebsiteList();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['typeId'] = $_GET['typeId'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 网站图片添加
     */
    public function website_add(){
        D("WebsiteImage")->website();


        $data['title'] = "新增图片";
        $data['Url'] = U('System/website_add');
        $this->assign($data);
        $this->display('website');
    }

    /**
     * 网站图片修改
     */
    public function website_edit(){
        D("WebsiteImage")->website();
        $data['rows'] = D("WebsiteImage")->getWebsiteinfo();
        $data['rows']['img_link'] = urldecode($data['rows']['img_link']);
        $data['title'] = "编辑图片";
        $data['Url'] = U('System/website_edit');
        $this->assign($data);
        $this->display('website');
    }

    /**
     * 网站图片删除
     */
    public function website_del(){
        D("WebsiteImage")->website_del();
    }

    /**
     * 友情链接
     */
    public function link_manage(){
        $data['rows'] = D("FriendshipLink")->getList();
        $this->assign($data);
        $this->display();
    }

    /**
     * 友情链接添加
     */
    public function link_add(){
        D("FriendshipLink")->linkSave();
        $data['title'] = "新增友情链接";
        $data['Url'] = U("System/link_add");
        $this->assign($data);
        $this->display("link_view");
    }

    /**
     * 友情链接编辑
     */
    public function link_edit(){
        D("FriendshipLink")->linkSave();
        $data['rows'] = D("FriendshipLink")->getInfo();
        $data['title'] = "编辑友情链接";
        $data['Url'] = U("System/link_edit");
        $this->assign($data);
        $this->display("link_view");
    }

    /**
     * 友情链接删除
     */
    public function link_del(){
        D("FriendshipLink")->link_del();
    }

    /**
     * 关于我们
     */
    public function about_us(){
        $about = htmlspecialchars_decode(file_get_contents("about.text"));
        $this->assign("content", $about);
        $this->display();
    }

    /**
     * 关于我们编辑
     */
    public function about_save(){
        //  var_dump(I('post.about'));

        $about = I('post.about');
        $boole = file_put_contents("about.text", $about);
        if ($boole){
            $this->success("编辑成功", U("System/about_us"));
        }else{
            $this->error("编辑失败");
        }
    }




    
}