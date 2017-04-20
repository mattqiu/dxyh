<?php
/**
 * 用户model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:19
 */

namespace Home\Model;


class UserModel extends CommonModel
{
    public function getUserInfo(){
        return $this->getDataInfo(array('uid'=>session('uid')));
    }

    public function edit(){
        if (IS_POST){
            $param = I('post.');
            if (!isset($param['nickname']) || empty($param['nickname'])){
                message(0, '请输入昵称');
            }
            $fileUrl = "./upload/avatar/" . dateTime(time(), 4) . "/";
            import('Org.Net.FileUpload');
            $fileUp = new \FileUpload(array('filepath'=>$fileUrl));
            if ($_FILES['avatar']['tmp_name']){
                $url = $fileUp->UploadFile("avatar");
                if (empty($url)){
                    message(0, $fileUp->errorMsg);
                }
                $param['avatar'] = $url;
            }
            $boole = $this->editData(array('uid'=>session('uid')), $param);
            if ($boole !== false){
                message(1, '修改资料成功', U("User/index"));
            }else{
                message(0, '修改资料失败');
            }
        }
    }

    public function modifyPasswd(){
        if (IS_POST) {
            $param = I("post.");
            if (!isset($param['originalPasswd']) || empty($param['originalPasswd'])) {
                message(0, '请输入原密码');
            }
            if (!isset($param['newPasswd']) || empty($param['newPasswd'])) {
                message(0, '请输入新密码');
            }
            if (!isset($param['confirmPasswd']) || empty($param['confirmPasswd'])) {
                message(0, '请输入确认密码');
            }
            if ($param['newPasswd'] !== $param['confirmPasswd']) {
                message(0, '新密码与确认密码不一致<br>请重新输入');
            }
            $info = $this->getDataInfo(array('uid' => session('uid')));
            if ($info['passwd'] !== md5($param['originalPasswd'])) {
                message(0, '原密码不正确<br>请确认后再输入');
            }
            $boole = $this->editData(array('uid' => session('uid')), array('passwd' => md5($param['newPasswd'])));
            if ($boole !== false) {
                message(1, '修改密码成功');
            } else {
                message(0, '修改密码失败');
            }
        }
    }
}