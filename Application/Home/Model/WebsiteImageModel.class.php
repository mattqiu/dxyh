<?php
/**
 * 网站图片model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:34
 */

namespace Home\Model;


class WebsiteImageModel extends CommonModel
{
    public function getHomeList($type = 1){
        $list = $this->getDataList(array('type'=>$type,'status'=>1), "image,img_link", array("sort"=>"desc"));
        return $list;
    }
}