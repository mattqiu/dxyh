<?php
/**
 * 书籍章节Model类
 * User: DarkVisitor
 * Date: 2017/4/6
 * Time: 14:24
 */

namespace Home\Model;


class ChapterSectionModel extends CommonModel
{
    public function getHomeList(){
        $bookId = 1;
        $list = $this->getDataList(array('bookid'=>$bookId));
        $listAry = array();
        if ($list){
            foreach ($list as $key=>$value){
                if ($value['chapter'] == 0){
                    $listAry[] = $value;
                }
            }
            foreach ($listAry as $key=>$value){
                $listAry[$key]['title'] = ($value['title'] == '序言' || $value['title'] == '尾言')?'':$value['title'];
                $listAry[$key]['subData'] = $this->matchingSubAry($value['id'], $list);
            }
        }

        return $listAry;
    }


    /**获取章下面的子节
     * @param $parentId
     * @param array $array
     */
    function matchingSubAry($parentId, $array=array()){
        if (empty($parentId)) return false;
        $result = array();
        if ($array){
            foreach ($array as $key=>$value){
                if ($parentId == $value['chapter']){
                    $result[] = $value;
                }
            }
        }
        return $result;
    }

    /**
     * 章节详情
     */
    public function homeCareDetail(){
        $id = I('get.id');
        $rows = array();
        $chapter = $this->getDataInfo(array('id'=>$id));
        if (empty($chapter)) return false;

        if ($chapter['chapter']){
            //当所选内容为节时
            $chapter['parent_name'] = $this->getDataInfo(array('id'=>$chapter['chapter']))['chapter_name'];
            $chapter['create_time'] = dateTime($chapter['create_time'], 6);
            $chapter['content'] = html_entity_decode($chapter['content']);
            $rows['chapter'] = $chapter;
            $rows['prevChapter'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
            $rows['prevSection'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
            $rows['nextSection'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
            $rows['nextChapter'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
        }else{
            //当所选内容为章时
            if ($chapter['chapter_name'] == '序言'){
                //获取下一章的第一节
                $chapter['parent_name'] = '';
                $chapter['create_time'] = dateTime($chapter['create_time'], 6);
                $chapter['content'] = html_entity_decode($chapter['content']);
                $rows['chapter'] = $chapter;
                $rows['prevChapter'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
                $rows['prevSection'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
                $rows['nextSection'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
                $rows['nextChapter'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
            }elseif ($chapter['chapter_name'] == '尾言'){
                $chapter['parent_name'] = '';
                $chapter['create_time'] = dateTime($chapter['create_time'], 6);
                $chapter['content'] = html_entity_decode($chapter['content']);
                $rows['chapter'] = $chapter;
                $rows['prevChapter'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
                $rows['prevSection'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
                $rows['nextSection'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
                $rows['nextChapter'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
            }else{
                //当选择的章不是序言或尾言时，自动读取当前章的第一节
                $section = $this->getDataInfo(array('chapter'=>$id));
                if ($section){
                    //当前章存在节时,获取第一节内容
                    $section['parent_name'] = $chapter['chapter_name'];
                    $section['create_time'] = dateTime($section['create_time'], 6);
                    $section['content'] = html_entity_decode($section['content']);
                    $rows['chapter'] = $section;
                    $rows['prevChapter'] = $this->previousChapter($section['bookid'], $section['id'], $section['chapter'], 0);
                    $rows['prevSection'] = $this->previousChapter($section['bookid'], $section['id'], $section['chapter'], 1);
                    $rows['nextSection'] = $this->nextChapter($section['bookid'], $section['id'], $section['chapter'], 1);
                    $rows['nextChapter'] = $this->nextChapter($section['bookid'], $section['id'], $section['chapter'], 0);
                }else{
                    //当前章不存在节时
                    $rows['chapter'] = '';
                    $rows['prevChapter'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
                    $rows['prevSection'] = $this->previousChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
                    $rows['nextSection'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 1);
                    $rows['nextChapter'] = $this->nextChapter($chapter['bookid'], $chapter['id'], $chapter['chapter'], 0);
                }
            }
        }

        return $rows;
    }

    /**
     * 获取下一章节ID
     * @param $bookId   书籍ID
     * @param $nowId    当前章节ID
     * @param $parentId 当前章节ID的父ID
     * @param $type     章节类型：0-下一章，1-下一节
     * @return string
     */
    function nextChapter($bookId, $nowId, $parentId, $type){
        $nextChapter = '';
        if ($type){
            //获取下一节
            if ($parentId){
                //章节父ID存在时
                $parentList = $this->getDataList(array('chapter'=>$parentId));
                if ($parentList){
                    //循环确定当前节在当前章的位置
                    for ($i=0;$i<count($parentList);$i++){
                        if ($parentList[$i]['id'] == $nowId){
                            //判断当前节之后是否有还有节
                            if ($parentList[$i+1]){
                                //存在时将节的ID返回
                                $nextChapter = $parentList[$i+1]['id'];
                                break;
                            }else{
                                //不存在时，获取所有的章
                                $chapter = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                                if ($chapter){
                                    //循环确定当前章在所有章中的位置
                                    for ($j=0;$j<count($chapter);$j++){
                                        if ($chapter[$j]['id'] == $parentId){
                                            //判断当前章之后是否有章
                                            if ($chapter[$j+1]){
                                                //存在章时,判断是否是尾言
                                                if ($chapter[$j+1]['chapter_name'] == '尾言'){
                                                    $nextChapter = $chapter[$j+1]['id'];
                                                    break;
                                                }else{
                                                    //不是尾言时，判断下一章是否有节
                                                    $sectionInfo = $this->getDataInfo(array('chapter'=>$chapter[$j+1]['id']));
                                                    if ($sectionInfo){
                                                        $nextChapter = $sectionInfo['id'];
                                                        break;
                                                    }else{
                                                        $nextChapter = $chapter[$j+1]['id'];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                //章节父ID不存在时,获取所有章
                $chapterList = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                if ($chapterList){
                    //循环定位当前章的位置
                    for ($i=0;$i<count($chapterList);$i++){
                        if ($chapterList[$i]['id'] == $nowId){
                            //判断当前章是否还有下一章
                            if ($chapterList[$i+1]){
                                //判断当前章的下一章是否是尾言
                                if ($chapterList[$i+1]['chapter_name'] == '尾言'){
                                    $nextChapter = $chapterList[$i+1];
                                    break;
                                }else{
                                    //不是序言时，获取下一章的所有节
                                    $sectionInfo = $this->getDataInfo(array('chapter'=>$chapterList[$i+1]['id']));
                                    if ($sectionInfo){
                                        //下一章存在节时，获取下一章的第一节
                                        $nextChapter = $sectionInfo['id'];
                                        break;
                                    }else{
                                        $nextChapter = $chapterList[$i+1];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }else{
            //获取下一章
            if ($parentId){
                //章节父ID存在时
                $parentList = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                if ($parentList){
                    //循环确定当前章在所有章中的位置
                    for ($i=0;$i<count($parentList);$i++){
                        if ($parentList[$i]['id'] == $parentId){
                            //判断当前章是否还有下一章
                            if ($parentList[$i+1]){
                                //存在下一章时，判断下一章是不是尾言
                                if ($parentList[$i+1]['chapter_name'] == '尾言'){
                                    $nextChapter = $parentList[$i+1]['id'];
                                    break;
                                }else{
                                    $sectionInfo = $this->getDataInfo(array('chapter'=>$parentList[$i+1]['id']));
                                    //判断是否存在节
                                    if ($sectionInfo){
                                        $nextChapter = $sectionInfo['id'];
                                        break;
                                    }else{
                                        $nextChapter = $parentList[$i+1]['id'];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                //章节父ID不存在时,获取所有章
                $chapterList = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                if ($chapterList){
                    //循环定位当前章的位置
                    for ($i=0;$i<count($chapterList);$i++){
                        if ($chapterList[$i]['id'] == $nowId){
                            //判断当前章是否还有下一章
                            if ($chapterList[$i+1]){
                                //判断当前章的下一章是否是尾言
                                if ($chapterList[$i+1]['chapter_name'] == '尾言'){
                                    $nextChapter = $chapterList[$i+1];
                                    break;
                                }else{
                                    //不是序言时，获取下一章的所有节
                                    $sectionInfo = $this->getDataInfo(array('chapter'=>$chapterList[$i+1]['id']));
                                    if ($sectionInfo){
                                        //下一章存在节时，获取下一章的第一节
                                        $nextChapter = $sectionInfo['id'];
                                        break;
                                    }else{
                                        $nextChapter = $chapterList[$i+1];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        return $nextChapter;
    }

    /**获取上一章节
     * @param $bookId       书籍ID
     * @param $nowId        当前章节ID
     * @param $parentId     当前章节父ID
     * @param $type         类型：0-上一章，1-上一节
     */
    function previousChapter($bookId, $nowId, $parentId, $type){
        $previousChapter = '';
        if ($type){
            //获取上一节
            if ($parentId){
                //章节父ID存在时
                $parentList = $this->getDataList(array('chapter'=>$parentId));
                if ($parentList){
                    //循环确定当前节在当前章的位置
                    for ($i=0;$i<count($parentList);$i++){
                        if ($parentList[$i]['id'] == $nowId){
                            //判断当前节之前是否有还有节
                            if ($parentList[$i-1]){
                                //存在时将节的ID返回
                                $previousChapter = $parentList[$i-1]['id'];
                                break;
                            }else{
                                //不存在时，获取所有的章
                                $chapter = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                                if ($chapter){
                                    //循环确定当前章在所有章中的位置
                                    for ($j=0;$j<count($chapter);$j++){
                                        if ($chapter[$j]['id'] == $parentId){
                                            //判断当前章之前是否有章
                                            if ($chapter[$j-1]){
                                                //存在章时,判断是否是序言
                                                if ($chapter[$j-1]['chapter_name'] == '序言'){
                                                    $previousChapter = $chapter[$j-1]['id'];
                                                    break;
                                                }else{
                                                    //不是序言时，判断上一章是否有节
                                                    $sectionList = $this->getDataList(array('chapter'=>$chapter[$j-1]['id']));
                                                    if ($sectionList){
                                                        $previousChapter = $sectionList[count($sectionList)-1]['id'];
                                                        break;
                                                    }else{
                                                        $previousChapter = $chapter[$j-1]['id'];
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                //章节父ID不存在时,获取所有章
                $chapterList = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                if ($chapterList){
                    //循环定位当前章的位置
                    for ($i=0;$i<count($chapterList);$i++){
                        if ($chapterList[$i]['id'] == $nowId){
                            //判断当前章是否还有上一章
                            if ($chapterList[$i-1]){
                                //判断当前章的上一章是否是序言
                                if ($chapterList[$i-1]['chapter_name'] == '序言'){
                                    $previousChapter = $chapterList[$i-1];
                                    break;
                                }else{
                                    //不是序言时，获取上一章的所有节
                                    $sectionList = $this->getDataList(array('chapter'=>$chapterList[$i-1]['id']));
                                    if ($sectionList){
                                        //上一章存在节时，获取上一章的最后一节
                                        $previousChapter = $sectionList[count($sectionList)-1]['id'];
                                        break;
                                    }else{
                                        $previousChapter = $chapterList[$i-1];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }else{
            //获取上一章
            if ($parentId){
                //章节父ID存在时
                $parentList = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                if ($parentList){
                    //循环确定当前章在所有章中的位置
                    for ($i=0;$i<count($parentList);$i++){
                        if ($parentList[$i]['id'] == $parentId){
                            //判断当前章是否还有上一章
                            if ($parentList[$i-1]){
                                //存在上一章时，判断上一章是不是序言
                                if ($parentList[$i-1]['chapter_name'] == '序言'){
                                    $previousChapter = $parentList[$i-1]['id'];
                                    break;
                                }else{
                                    $sectionInfo = $this->getDataInfo(array('chapter'=>$parentList[$i-1]['id']));
                                    if ($sectionInfo){
                                        $previousChapter = $sectionInfo['id'];
                                        break;
                                    }else{
                                        $previousChapter = $parentList[$i-1]['id'];
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                //章节父ID不存在时,获取所有章
                $chapterList = $this->getDataList(array('chapter'=>0,'bookid'=>$bookId));
                if ($chapterList){
                    //循环定位当前章的位置
                    for ($i=0;$i<count($chapterList);$i++){
                        if ($chapterList[$i]['id'] == $nowId){
                            //判断当前章是否还有上一章
                            if ($chapterList[$i-1]){
                                //判断当前章的上一章是否是序言
                                if ($chapterList[$i-1]['chapter_name'] == '序言'){
                                    $previousChapter = $chapterList[$i-1];
                                    break;
                                }else{
                                    //不是序言时，获取上一章的所有节
                                    $sectionInfo = $this->getDataInfo(array('chapter'=>$chapterList[$i-1]['id']));
                                    if ($sectionInfo){
                                        //上一章存在节时，获取上一章的第一节
                                        $previousChapter = $sectionInfo['id'];
                                        break;
                                    }else{
                                        $previousChapter = $chapterList[$i-1];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $previousChapter;
    }

}