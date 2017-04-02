<?php
/**
 * 科普类
 * User: DarkVisitor
 * Date: 2017/3/28
 * Time: 11:11
 */

namespace Admin\Controller;

use Think\Controller;
class CopticController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 科普文章
     */
    public function index(){
        $data['rows'] = D("Coptic")->getList();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['copticType'] = M("CopticType")->select();
        $data['typeId'] = $_GET['copticType'];
        $data['nominate'] = $_GET['nominate'];
        $data['keyword'] = $_GET['keyword'];
        $this->assign($data);
        $this->display();
    }

    public function add(){
        D("Coptic")->modify();
        $data['copticType'] = D("CopticType")->getDataList(null, "id,category_name");
        $data['title'] = "新增科普文章";
        $data['Url'] = U("Coptic/add");
        $this->assign($data);
        $this->display("view");
    }

    public function edit(){
        D("Coptic")->modify();
        $data['copticType'] = D("CopticType")->getDataList(null, "id,category_name");
        $data['rows'] = D("Coptic")->getDataInfo(array('id'=>$_GET['id']));
        $data['title'] = "编辑科普文章";
        $data['Url'] = U("Coptic/edit");
        $this->assign($data);
        $this->display("view");
    }

    public function del(){
        D("Coptic")->remove();
    }

    public function details(){

    }

    /**
     * 科普分类
     */
    public function copticType(){

        $data['rows'] = D("CopticType")->showView();
        $data['page'] = $data['rows']['page'];
        unset($data['rows']['page']);
        $data['keyword'] = $_GET['keyword'];
        $this->assign($data);
        $this->display();
    }

    /**
     * 添加科普分类
     */
    public function copticType_add(){
        D("CopticType")->coptiTypeSave();
        $data['title'] = "新增科普类别";
        $data['Url'] = U("Coptic/copticType_add");
        $this->assign($data);
        $this->display("copticType_view");
    }

    /**
     * 编辑科普分类
     */
    public function copticType_edit(){
        D("CopticType")->coptiTypeSave();

        $data['rows'] = D("CopticType")->copticEdit();
        $data['title'] = "编辑科普类别";
        $data['Url'] = U("Coptic/copticType_edit");
        $this->assign($data);
        $this->display("copticType_view");
    }

    /**
     * 删除科普分类
     */
    public function copticType_del(){
        D("CopticType")->copticDel();
    }
}