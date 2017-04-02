<?php
/**
 * 家庭护理类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:33
 */

namespace Admin\Controller;

use Think\Controller;
class HomeCareController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 家庭护理
     */
    public function index(){
        $data['rows'] = D("ChapterSection")->getList();//var_dump($data['rows']);
        $this->assign($data);
        $this->display();
    }

    public function add(){
        D("ChapterSection")->modify();
        $data['chapter'] = D("ChapterSection")->getDataList(array('chapter'=>0), "id,chapter_name");
        $data['id'] = $_GET['id'];
        $data['title'] = "新增章节";
        $data['Url'] = U("HomeCare/add");
        $this->assign($data);
        $this->display("view");
    }

    public function edit(){
        D("ChapterSection")->modify();
        $data['rows'] = D("ChapterSection")->getDataInfo(array('id'=>$_GET['id']));
        $data['chapter'] = D("ChapterSection")->getDataList(array('chapter'=>0), "id,chapter_name");
        $data['title'] = "编辑章节";
        $data['Url'] = U("HomeCare/edit");
        $this->assign($data);
        $this->display("view");
    }

    public function del(){
        D("ChapterSection")->remove();
    }
}