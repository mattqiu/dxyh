<?php
/**
 * 客户端基础类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:42
 */

namespace Home\Controller;

use Think\Controller;
class CommonController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $link = D("FriendshipLink")->getHomeList();
        $this->assign('link',$link);
        $weixin_config = C("WEIXI_CONFIG");
        $weixin_config['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $wxConfig = weixin_config($weixin_config);
        $this->assign('wxConfig',$wxConfig);
    }
}