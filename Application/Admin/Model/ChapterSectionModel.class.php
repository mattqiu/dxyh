<?php
/**
 * 家庭护理
 * User: DarkVisitor
 * Date: 2017/4/2
 * Time: 10:45
 */

namespace Admin\Model;


class ChapterSectionModel extends BaseModel
{
    public $addressUrl;
    public function __construct()
    {
        parent::__construct();
        $this->addressUrl = U("HomeCare/index");
    }

    public function getList(){
        $list = $this->getDataList(array('chapter'=>0));
        $chapter_list = array();
        foreach ($list as $key=>$item){
            $chapter_list[] = $item;
            $sub_list = $this->getDataList(array('chapter'=>$item['id']));
            if ($sub_list){
                foreach ($sub_list as $k=>$v){
                    $chapter_list[] = $v;
                }
            }
            unset($sub_list);
        }
        return $chapter_list;
    }

    public function modify(){
        if (IS_POST){
            $questData = I("post.");
            if (!isset($questData['chapter_name']) || empty($questData['chapter_name'])){
                message(0, "请输入章节名称！");
            }
            if (!isset($questData['title']) || empty($questData['title'])){
                message(0, "请输入章节标题!");
            }
            $data = array(
                "chapter" => $questData['chapter'],
                "chapter_name" => $questData['chapter_name'],
                "title" => $questData['title'],
                "content" => $questData['content'],
            );
            if ($questData['id'] > 0){
                $boole = $this->editData(array('id'=>$questData['id']), $data);
                if ($boole !== false){
                    message(1, "编辑成功", $this->addressUrl);
                }else{
                    message(0, "编辑失败");
                }
            }else{
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
        $id = I('get.id');
        $boole = $this->getDataInfo(array('chapter'=>$id));
        if ($boole){
            message(0, "存在子章节，不可以删除！");
        }
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功!", $this->addressUrl);
        }else{
            message(0, "删除失败");
        }
    }
}