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
        session("uid","1");
    }
}