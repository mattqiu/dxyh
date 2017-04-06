<?php
/**
 * 科普model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:29
 */

namespace Home\Model;


class CopticModel extends CommonModel
{
    public function getHomeList(){
        return $this->getDataList(null, "id,coptic_title,coptic_cover,abstract", array("create_time"=>"desc"), 0, 8);
    }
}