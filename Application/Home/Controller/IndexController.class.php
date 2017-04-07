<?php
namespace Home\Controller;


class IndexController extends CommonController {
    const GET_USER_INFO = "https://graph.qq.com/user/get_user_info";

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $ip = get_client_ip(1);
        M("Visit")->add(array("ip"=>$ip, "create_time"=>time()));

        $data['websiteImage'] = D("WebsiteImage")->getHomeList();
        $data['coptic'] = D("Coptic")->getHomeList();
        $data['copticType'] = D("CopticType")->getHomeList();
        $data['activity'] = D("Activity")->getHomeList();
        $data['weixin_url'] = "https://open.weixin.qq.com/connect/qrconnect?appid=1111&redirect_uri=".urlencode("http://www.dxyh.com")."&response_type=code&scope=SCOPE&state=STATE#wechat_redirect";
        vendor("API.Weibo.WeiBoAPI");
        $o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );

        $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        $data['weibo_url'] = $code_url;
        $this->assign($data);
        $this->display();
    }

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