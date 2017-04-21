<?php
/**
 * 积分明细Model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:32
 */

namespace Home\Model;


class IntegralDetailModel extends CommonModel
{
    public function getList(){
        $uid = session('uid');
        $count = $this->countData(array('uid'=>$uid));
        import('Org.Api.Page');
        $page = new \Page($count, C('PAGE_ROWS'));
        $list['rows'] = $this->getDataList(array('uid'=>$uid), null, array('create_time'=>'desc'), $page->firstRow, $page->listRows);
        $list['page'] = $page->show();
        return $list;
    }
}