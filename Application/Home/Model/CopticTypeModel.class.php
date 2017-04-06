<?php
/**
 * 科普分类model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:30
 */

namespace Home\Model;


class CopticTypeModel extends CommonModel
{
    public function getHomeList(){
        return $this->getDataList(null, null, array("sort"=>"desc","create_time"=>"desc"));
    }
}