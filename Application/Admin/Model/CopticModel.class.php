<?php
/**
 * 科普文章
 * User: DarkVisitor
 * Date: 2017/4/1
 * Time: 9:32
 */

namespace Admin\Model;

use Think\Page;
class CopticModel extends BaseModel
{
    public $addressUrl;
    public function __construct()
    {
        parent::__construct();
        $this->addressUrl = U("Coptic/index");
    }

    public function getList(){
        $qustData = I("get.");
        $where = null;
        if (!empty($qustData['copticType'])){
            $where = array("coptic_type_id"=>trim($qustData['copticType']));
        }
        if (!empty($qustData['keyword'])) {
            $where["coptic_title"] = array("like", "%".trim($qustData['keyword'])."%");
        }
        if (!empty($qustData['nominate'])){
            $where['referral'] = $qustData['nominate'];
        }
        $join = "INNER JOIN dxyh_coptic_type as ct ON c.coptic_type_id = ct.id";
        $field = "c.id,ct.category_name,c.coptic_title,c.author,c.referral,c.create_time,c.browse_volume";
        $order = array('c.id'=>'desc');
        $count = $this->alias("c")->getJoinCount($join, $where);
        $page = new Page($count, C("PAGE_NUM"));
        $list = $this->alias("c")->getJoinDataList($join, $where, $field, $order, $page->firstRow, $page->listRows);
        foreach ($list as $key=>$item) {
            $list[$key]['create_time'] = dateTime($item['create_time']);
            $list[$key]['likes_num'] = M("Likes")->where(array('coptic_id'=>$item['id']))->count();
            $list[$key]['collection'] = M("Collection")->where(array('coptic_id'=>$item['id']))->count();
            $list[$key]['referral'] = $item['referral'] == 2?"否":"是";
            $list[$key]['comment_num'] = M("Comment")->where(array('coptic_id'=>$item['id']))->count();
        }
        $list['page'] = $page->show();
        return $list;
    }

    public function modify(){
        if (IS_POST){
            $request = I("post.");
            if (!isset($request['copticType']) || empty($request['copticType'])){
                message(0, "请选择类别");
            }
            if (!isset($request['copticTitle']) || empty($request['copticTitle'])){
                message(0, "请输入标题");
            }
            /*if (!isset($request['abstract']) || empty($request['abstract'])){
                message(0, "请输入摘要");
            }*/
            if (!isset($request['content']) || empty($request['content'])){
                message(0, "请输入正文");
            }
            if (!isset($request['author']) || empty($request['author'])){
                message(0, "请输入作者");
            }
            /*if (!isset($request['source']) || empty($request['source'])){
                message(0, "请输入来源");
            }
            if (!isset($request['keyword']) || empty($request['keyword'])){
                message(0, "请输入关键词");
            }
            if (!isset($request['original_link']) || empty($request['original_link'])){
                message(0, "请输入原文链接");
            }*/
            $fileUrl = "./upload/copticimag/" . dateTime(time(), 4) . "/";
            import('Org.Net.FileUpload');
            $fileUp = new \FileUpload(array('filepath'=>$fileUrl));
            $data = array(
                "coptic_type_id" => $request['copticType'],
                "coptic_title" => $request['copticTitle'],
                "abstract"  => $request['abstract'],
                "content" => $request['content'],
                "author" => $request['author'],
                "source" => $request['source'],
                "keyword" => $request['keyword'],
                "original_link" => urlencode($request['original_link']),
                "referral" => $request['referral'],
            );
            if ($request['id'] > 0){
                if ($_FILES['copticCover']['tmp_name']){
                    $url = $fileUp->UploadFile("copticCover");
                    if (empty($url)){
                        message(0, "图片上传失败！");
                    }
                    $data['coptic_cover'] = $url;
                }
                $boole = $this->editData(array('id'=>$request['id']), $data);
                if ($boole !== false){
                    message(1, "编辑成功", "#");
                }else{
                    message(0, "编辑失败");
                }
            }else{
                if (empty($_FILES['copticCover']['tmp_name'])){
                    message(0, "请选择上传图片");
                }
                $url = $fileUp->UploadFile("copticCover");
                if (empty($url)){
                    message(0, "图片上传失败!");
                }
                $data['coptic_cover'] = $url;
                $data['create_time'] = time();
                $boole = $this->addData($data);
                if ($boole){
                    message(1, "新增成功", $this->addressUrl);
                }else{
                    message(0, "新增失败");
                }
            }

        }
    }

    public function remove(){
        $id = I("get.id");
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功", $this->addressUrl);
        }else{
            message(0, "删除失败");
        }
    }


    public function copticDetails(){
        $id = I('get.id');
        $list = $this->getDataInfo(array('id'=>$id));
        $list['coptic_type_id'] = M("CopticType")->where(array("id"=>$list['coptic_type_id']))->field('category_name')->find()['category_name'];

        $join = array('INNER JOIN dxyh_user as u ON u.uid=c.uid');
        $field = "c.id,c.parent_id,u.nickname,c.content,c.create_time,c.status";
        $where = array(
            "coptic_id" => $id
        );
        $comment = M("Comment")->alias('c')->join($join)->where($where)->field($field)->select();
        foreach ($comment as $key=>$value){
            if ($value['parent_id'] != 0){
                $comment[$key]['parent_name'] = $this->array_search_value($value['parent_id'], $comment);
            }else{
                $comment[$key]['parent_name'] = $value['nickname'];
            }
        }
        $list['comment'] = $comment;
        return $list;
    }

    function array_search_value($keysID=0, $array=array()){
        foreach ($array as $key=>$value){
            if ($value['id'] = $keysID){
                return $value['nickname'];
            }
        }
        return false;
    }

}