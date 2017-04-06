<?php
/**
 * 友情链接model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:31
 */

namespace Home\Model;


class FriendshipLinkModel extends CommonModel
{
    public function getHomeList(){
        $list = $this->getDataList(null, "link_name,link");
        $link = array();
        foreach ($list as $key=>$item){
            $link[] = "<a href=\"". urldecode($item['link']) ."\">".$item['link_name']."</a>";
        }
        return implode("|", $link);
    }
}