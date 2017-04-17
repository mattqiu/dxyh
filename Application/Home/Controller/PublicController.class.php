<?php
/**
 * 公共类
 * User: DarkVisitor
 * Date: 2017/4/13
 * Time: 14:07
 */

namespace Home\Controller;

use Think\Controller;
class PublicController extends Controller
{
    public function login(){

        $this->display();
    }

    public function register(){

        $this->display();
    }

    public function thirdPartyLogin(){
        vendor("API.QQ.qqConnectAPI");
        $qc = new \QC();
        $qc->qq_login();

        /*$data['weixin_url'] = "https://open.weixin.qq.com/connect/qrconnect?appid=1111&redirect_uri=".urlencode("http://www.dxyh.com")."&response_type=code&scope=SCOPE&state=STATE#wechat_redirect";
        vendor("API.Weibo.WeiBoAPI");
        $o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );

        $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        $data['weibo_url'] = $code_url;*/

    }

    public function callback(){
        vendor("API.QQ.qqConnectAPI");
        $qc = new \QC();
        $accessToken = $qc->qq_callback();
        $openId = $qc->get_openid();
        $boole = M("User")->where(array('qq_openid'=>$openId))->find();
        if (!$boole){
            $keysArr = array(
                "access_token" => $accessToken,
                "oauth_consumer_key" => $qc->recorder->readInc("appid"),
                "openid" => $openId,
                "format" => "json"
            );
            $token_url = $qc->urlUtils->combineURL(self::GET_USER_INFO, $keysArr);
            $response = $qc->urlUtils->get_contents($token_url);
            var_dump(json_decode($response, true));
        }
    }
}