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

    }

    public function register(){

    }

    public function thirdPartyLogin(){
        vendor("API.QQ.qqConnectAPI");
        $qc = new \QC();
        $qc->qq_login();



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