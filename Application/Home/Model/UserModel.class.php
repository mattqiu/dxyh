<?php
/**
 * 用户model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:19
 */

namespace Home\Model;


use Think\Verify;

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
            $result = $this->countData(array('nickname'=>$param['nickname'],'uid'=>array('neq',session('uid'))));
            if ($result){
                message(0, '昵称已存在');
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

    public function register(){
        if (IS_POST){
            $param = I("post.");
            if (!isset($param['nickname']) && empty($param['nickname'])){
                message(0, '请输入昵称');
            }
            $checkNickName = $this->countData(array('nickname'=>$param['nickname']));
            if ($checkNickName){
                message(0, '昵称已存在');
            }
            if (!isset($param['passwd']) && empty($param['passwd'])){
                message(0, '请输入密码');
            }
            if (strlen($param['passwd']) < 6 || strlen($param['passwd']) > 20){
                message(0, '密码长度6-20个字符');
            }
            if (!isset($param['confirmPasswd']) && empty($param['confirmPasswd'])){
                message(0, '请输入确认密码');
            }
            if (strlen($param['confirmPasswd']) < 6 || strlen($param['confirmPasswd']) > 20){
                message(0, '密码长度6-20个字符');
            }
            if ($param['confirmPasswd'] !== $param['passwd']){
                message(0, '密码与确认密码不一致');
            }
            if (!isset($param['verifyCode']) && empty($param['verifyCode'])){
                message(0, '请输入验证码');
            }
            $code = new Verify();
            $checkVerify = $code->check($param['verifyCode']);
            if (!$checkVerify){
                message(0, '验证码不正确');
            }
            $data = array(
                'nickname' => $param['nickname'],
                'passwd' => md5($param['passwd']),
                'create_time' => time()
            );
            $result = $this->addData($data);
            if ($result){
                session('uid', $result);
                message(1, '注册成功', U("User/changeMeaage"));
            }else{
                message(0, '注册失败');
            }
        }
    }

    public function login(){
        if (IS_POST){
            $parem = I("post.");
            if (!isset($parem['nickname']) || empty($parem['nickname'])){
                message(0, '请输入昵称');
            }
            if (!isset($parem['passwd']) || empty($parem['passwd'])){
                message(0, '请输入密码');
            }
            $result = $this->getDataInfo(array('nickname'=>$parem['nickname']));
            if (empty($result)){
                message(0, '帐户不存在');
            }elseif ($result['passwd'] !== md5($parem['passwd'])){
                message(0, '密码不正确');
            }else{
                session('uid',$result['uid']);
                if (isset($parem['remember'])){
                    $Ary = array(
                        'nickname' => $result['nickname'],
                        'passwd' => $parem['passwd']
                    );
                    $Ary = base64_encode(json_encode($Ary));
                    setcookie('daychina_message', $Ary, (time() + 86400*7));
                }else{
                    setcookie('daychina_message', " ", (time() + 86400*7));
                }
                message(1, '登录成功', U("User/index"));
            }

        }
    }
}