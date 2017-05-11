<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>科普详情</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/home/css/base.css">
    <link rel="stylesheet" href="/Public/home/css/activeDetail.css">
    <link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico">
    <link rel="stylesheet" href="/Public/artDialog/css/dialog.css">
</head>
<body>
<!-- 公共头部开始 -->
<div class="commonTop">
    <div class="wrap">
        <!-- logo -->
        <a href="#" class="logoImg">
            <img src="/Public/home/img/logo.png" alt="">
             <span class="c_h1">通达医学常识，知晓家庭护理</span>
            <img style="height: 18px;width: auto;" class="hidden-lg" src="/Public/home/img/cmt2.png" alt="">
            <!-- 新增图标手机端开始 -->
        <img class="hidden-lg"  src="/Public/home/img/H6.jpg" alt="">
        <!-- 新增图标手机端结束 -->
            <!-- 小屏幕下个人导航图标开始 -->
            <img  class="hidden-lg cmtMenuLogo" src="/Public/home/img/cmt1.png" alt="">
            <!-- 小屏幕下个人导航图标结束 -->
            <!-- 小屏幕下个人导航图标结束 -->
                    <img src="/Public/home/img/c6.png" class="cmtUser hidden-lg" alt="">
        </a>
        <!-- logo -->
        <!-- 导航开始 -->
        <nav id="sidebar-menu">
            <a href="<?php echo U('Index/index');?>">首页</a>
            <a href="<?php echo U('Coptic/index');?>">科普中心</a>
            <a href="<?php echo U('Activity/index');?>">活动中心</a>
            <a href="<?php echo U('HomeCare/index');?>">家庭护理</a>
            <a href="<?php echo U('Aboutus/index');?>">关于我们</a>
            <?php if(!empty($_SESSION['uid'])): ?><a href="<?php echo U('User/index');?>">个人中心</a><?php endif; ?>
        </nav>
        <!-- 导航结束 -->
        <!-- 登陆注册开始 -->
        <div class="loginBox">
            <?php if(empty($_SESSION['uid'])): ?><a href="<?php echo U('Public/login');?>">登录</a><span>|</span><a href="<?php echo U('Public/register');?>">注册</a>
                <?php else: ?>
                <span><?php echo (session('nickname')); ?></span>&nbsp;&nbsp;&nbsp;<span>|</span><a href="<?php echo U('Public/signOut');?>">退出</a><?php endif; ?>
        </div>
        <!-- 登陆注册结束 -->
        <!-- 新增图标pc端开始 -->
        <img class="logoR6B visible-lg"  src="/Public/home/img/H6.jpg" alt="">
        <!-- 新增图标pc端开始 -->
    </div>
</div>
<!-- 公共头部结束 -->
<div class="container wrap activeDetail">
    <!-- 左边详情开始 -->
    <div class="col-lg-9 activeDetailL">
        <!-- 标题开始 -->
        <h1 class="activeTitle"><?php echo ($rows["coptic_title"]); ?></h1>
        <!-- 标题结束 -->
        <p class="author">作者：<?php echo ($rows["author"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($rows["create_time"]); if(!empty($rows["original"])): ?><img style="margin-left: 30px;" src="/Public/home/img/yuanchuang.png" alt="原创标识"><?php endif; ?></p>
        <div class="container">
            <div class="col-lg-8 keyWord"><?php if(!empty($rows["keyword"])): ?>关键词：<span><?php echo ($rows["keyword"]); ?></span><?php endif; ?></div>
            <div class="col-lg-4 keyWord">
                <strong id="keep">
                    <img src="/Public/home/img/ss0.png" alt="" data-value="0" data-field-name="keep"><!--<img src="/Public/home/img/ss1.png" class="c_hide" data-value="1" data-field-name="keep">-->收藏
                </strong>
                <strong id="likes">
                    <img src="/Public/home/img/zz0.png" alt="" data-value="0" data-field-name="likes"><!--<img src="/Public/home/img/zz1.png" class="c_hide" data-value="1" data-field-name="likes">-->赞
                </strong>
            </div>
        </div>

        <!-- 活动内容开始 -->
        <div class="content">
            <?php echo ($rows["content"]); ?>
            <!-- 活动时间等信息开始 -->
            <?php if(!empty($rows["source"])): ?><div class="from">来源：<?php echo ($rows["source"]); ?></div><?php endif; ?>
            <?php if(!empty($rows["original_link"])): ?><div class="fromA">原文链接：<a href="<?php echo ($rows["original_link"]); ?>"><?php echo ($rows["original_link"]); ?></a></div><?php endif; ?>
            <!-- 发表评论开始 -->
            <a href="#publish" class="publishBtn">发表评论</a>
            <!-- 评论列表开始 -->
            <div class="discussBox">
                <div class="filter">
                    <!--<span class="filterActive" onclick="cutComment()">最热</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span onclick="cutComment()">最新</span>-->
                </div>
                <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 一个评论开始 -->
                    <div class="discussList">
                        <p class="user">
                            <img src="<?php echo ($vo["avatar"]); ?>" alt=""><!-- 头像 -->
                            <span><?php echo ($vo["nickname"]); ?></span><!-- 用户名 -->
                        </p>
                        <!-- 评论内容开始 -->
                        <p><?php echo ($vo["content"]); ?></p>
                        <!-- 评论内容结束 -->
                        <!-- 对评论的点评内容开始 -->
                        <?php if(!empty($vo["subData"])): ?><div class="reBox">
                                <img class="sanjiao"
                                     src="/Public/home/img/sanjiao.png" alt=""><!-- 三角图标 -->
                                <p class="reTitle"><span>点评</span></p>
                                <?php if(is_array($vo["subData"])): $i = 0; $__LIST__ = $vo["subData"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="container discussContent">
                                        <div class="col-lg-2 username">
                                            <img src="<?php echo ($item["avatar"]); ?>" alt="">
                                        </div>
                                        <!--<div class="col-lg-10 discussContentR"><?php echo ($item["nickname"]); ?> ：<?php echo ($item["content"]); ?></div>-->
                                        <p class="r2"><?php echo ($item["nickname"]); ?>&nbsp;&nbsp;<span style="color:#000;">回复<?php echo ($item["parent_name"]); ?></span>：<?php echo ($item["content"]); ?></p>
                                    </div>
                                    <p class="r1">回复</p>
                                    <form action="" class="reForm">
                                        <textarea class="content1" placeholder="回复 <?php echo ($item["nickname"]); ?>：" data-id="<?php echo ($item["id"]); ?>" data-coptic-id="<?php echo ($rows["id"]); ?>"></textarea>
                                        <button class="reFormBtn submitCommon">发表</button>
                                    </form><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div><?php endif; ?>
                        <!-- 对评论的点评内容结束 -->
                        <!-- 评论时间开始 -->
                        <p class="discussTime">
                            <span class="discusstime"><?php echo ($vo["create_time"]); ?></span>
                            <span class="dianPing">我要点评</span>
                            <strong>
                                <?php if($vo["likes"] == 1): ?><img src="/Public/home/img/zz0.png" style="display: none;" alt="" data-value="0" data-id="<?php echo ($vo["id"]); ?>">
                                    <img src="/Public/home/img/zz1.png" alt="" data-value="1" data-id="<?php echo ($vo["id"]); ?>">
                                <?php else: ?>
                                    <img src="/Public/home/img/zz0.png" alt="" data-value="0" data-id="<?php echo ($vo["id"]); ?>">
                                    <img src="/Public/home/img/zz1.png" style="display: none;" alt="" data-value="1" data-id="<?php echo ($vo["id"]); ?>"><?php endif; ?>
                            </strong>
                            <span><?php echo ($vo["likesnum"]); ?></span>
                        </p>
                        <!-- 评论时间结束 -->
                        <!-- 发表点评表单开始 -->
                        <form action="" class="reForm2">
                            <textarea class="content1" data-id="<?php echo ($vo["id"]); ?>" data-coptic-id="<?php echo ($rows["id"]); ?>"></textarea>
                            <button class="reFormBtn submitCommon">发表</button>
                        </form>
                        <!-- 发表点评表单结束 -->
                    </div>
                    <!-- 一个评论结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- 评论列表结束 -->
            <!-- 发表评论结束 -->
        </div>
        <!-- 发表评论开始 -->
        <form id="publish" action="" class="reForm2 reForm3">
            <p style="font-size: 18px;margin-bottom: 5px;">我要评论</p>
            <textarea class="content1"></textarea>
            <button class="reFormBtn mainComment">发表</button>
        </form>
        <!-- 发表评论结束 -->
        <!-- 活动内容结束 -->
    </div>
    <!-- 左边详情结束 -->
    <!-- 右边热门科普推荐开始 -->
    <div class="col-lg-3 history scienceHistory">
        <h2 class="visible-lg">热门科普推荐</h2>
        <ul class="historyList visible-lg">
            <!-- 一个热门科普推荐开始 -->
            <?php if(is_array($hotCoptic)): $i = 0; $__LIST__ = $hotCoptic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo U('Coptic/details', array('id'=>$vo['id']));?>">
                        <img src="<?php echo ($vo["coptic_cover"]); ?>" alt="">
                        <!-- 标题 -->
                        <div class="mengceng"></div><!-- 蒙层 -->
                        <p class="historyTitle"><?php echo ($vo["coptic_title"]); ?></p>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- 一个热门科普推荐结束 -->
        </ul>
    </div>
    <!-- 右边热门科普推荐结束 -->
</div>
<!-- 公共底部模块开始 -->
<div class="commonBottom visible-lg">
    <div class="links">
        <a href="#" class="key">友情链接</a>
        <?php echo isset($link)?$link:"";?>
        <p class="Copyright">Copyright © 2017达医晓护网，All&nbsp;rights&nbsp;reserved&nbsp;&nbsp;沪[CP备]4008832号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海松点网络科技有限公司技术支持</p>
    </div>
</div>
<!-- 公共底部模块结束 -->
<script type="text/javascript" src="/Public/home/js/jquery1.91.min.js"></script>
<script type="text/javascript" src="/Public/artDialog/dist/dialog.js"></script>
<script type="text/javascript">
    var callbackUrl = encodeURIComponent(window.location.href);
    $(function () {
        var ss0 = "/Public/home/img/ss0.png";
        var ss1 = "/Public/home/img/ss1.png";
        var zz0 = "/Public/home/img/zz0.png";
        var zz1 = "/Public/home/img/zz1.png";
        // 点击回复，展开回复框
        $(".r1").live('click', function () {
            $(this).next('.reForm').toggle();
        });
        // 点击我要点评，展开点评表单
        $(".dianPing").live('click', function () {
            $(this).parent().siblings('.reForm2').toggle();
        });
        // 点赞与收藏功能
        $(".keyWord img").click(function () {
            var type = $(this).attr('data-field-name');
            var item = $(this).attr('data-value');
            var id = '<?php echo ($rows["id"]); ?>';
            var coptic_type_id = '<?php echo ($rows["coptic_type_id"]); ?>';
            $.ajax({
                url: '<?php echo U("Coptic/copticKeepLikes");?>',
                data: {'type': type, 'item': item, 'id': id, 'coptic_type_id': coptic_type_id,'callbackUrl':callbackUrl},
                type: 'post',
                dataType: 'json',
                success: function (json) {
                    console.log(json);
                    var d = dialog({
                        content: json.info
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        if (json.status == 2){
                            window.location.href = json.url;
                            return false;
                        }
                    }, 2000);
                }
            });
            switch (type){
                case 'likes':
                    if (item > 0){
                        $(this).attr('src', zz0);
                        $(this).attr('data-value', 0)
                    }else{
                        $(this).attr('src', zz1);
                        $(this).attr('data-value', 1)
                    }
                    break;
                case 'keep':
                    if (item > 0){
                        $(this).attr('src', ss0);
                        $(this).attr('data-value', 0)
                    }else{
                        $(this).attr('src', ss1);
                        $(this).attr('data-value', 1)
                    }
                    break;
            }
        });

        //点赞与收藏数据适配
        var checkLikes = "<?php echo ($checkLikes); ?>";
        var checkStoreUp = "<?php echo ($checkStoreUp); ?>";
        if (checkLikes > 0) {
            $("#likes img").attr('src', zz1);
            $("#likes img").attr('data-value', 1)
        }
        if (checkStoreUp > 0) {
            $("#keep img").attr('src',ss1);
            $("#keep img").attr('data-value', 1)
        }

        //评论点赞功能
        $(".discussTime strong img").live('click', function () {
            $(this).toggle().siblings('img').toggle();
        });

        //评论发表功能
        $(".submitCommon").live('click', function () {
            var content = $(this).prev().val();
            var parentId = $(this).prev().attr("data-id");
            var copticId = $(this).prev().attr("data-coptic-id");
            if (content == ''){
                var d = dialog({
                    content: '请输入评论内容'
                });
                d.show();
                setTimeout(function () {
                    d.close().remove();
                }, 2000);
                return false;
            }
            var result = '';
            $.ajax({
                url: '<?php echo U("Coptic/copticComment");?>',
                type: 'post',
                data: {'content':content,'parentId':parentId,'copticId':copticId,'callbackUrl':callbackUrl},
                dataType: 'json',
                async:false,
                success: function (json) {
                    console.log(json);
                    if (json.code == 0){
                        result += '<div class="container discussContent">';
                        result += '<div class="col-lg-2 username">';
                        result += '<img src="'+json.data.avatar+'" alt=""></div>';
                        result += '<p class="r2">'+json.data.nickname+'&nbsp;&nbsp;<span style="color:#000;">回复'+json.data.parent_name+'</span>：' + content + '</p>';
                        result += '</div>';
                        result += '<p class="r1">回复</p>';
                        result += '<form action="" class="reForm">';
                        result += '<textarea class="content1" placeholder="回复 '+json.data.nickname+'：" data-id="'+json.data.cid+'" data-coptic-id="<?php echo ($rows["id"]); ?>"></textarea>';
                        result += '<button class="reFormBtn submitCommon">发表</button>';
                        result += '</form>';
                    }else{
                        var d = dialog({
                            content: json.msg
                        });
                        d.show();
                        setTimeout(function () {
                            d.close().remove();
                            if (json.code == 2){
                                window.location.href = json.url
                            }
                        }, 2000);
                    }
                }
            });
            if ($(this).parent().parent().is(".reBox")){
                $(this).parent().parent(".reBox").append(result);
            }else{
                if ($(this).parent().siblings().is(".reBox")){
                    $(this).parent().parent().find(".reBox").append(result);
                }else{
                    var subCom = '<div class="reBox"><img class="sanjiao"src="/Public/home/img/sanjiao.png" alt=""><p class="reTitle"><span>点评</span></p>'+ result + '</div>';
                    $(this).parent().prev().before(subCom);
                }
            }
            $(this).prev().val('');
            $(this).parent().toggle();
            return false;
        });

        //主评论
        $(".mainComment").click(function () {
            var copticId = "<?php echo ($rows["id"]); ?>";
            var content = $(this).prev().val();
            if (content == ''){
                var d = dialog({
                    content: '请输入评论内容'
                });
                d.show();
                setTimeout(function () {
                    d.close().remove();
                }, 2000);
                return false;
            }
            var result = '';
            $.ajax({
                url: '<?php echo U("Coptic/copticComment");?>',
                type: 'post',
                data: {'content':content,'copticId':copticId,'callbackUrl':callbackUrl},
                dataType: 'json',
                async:false,
                success: function (json) {
                    console.log(json);
                    if (json.code == 0){
                        result += '<div class="discussList">';
                        result += '<p class="user">';
                        result += '<img src="'+json.data.avatar+'" alt="">';
                        result += '<span>'+json.data.nickname+'</span></p>';
                        result += '<p>'+content+'</p>';
                        result += '<p class="discussTime">';
                        result += '<span class="discusstime">'+json.data.create_time+'</span>';
                        result += '<span class="dianPing">我要点评</span>';
                        result += '<strong>';
                        result += '<img src="/Public/home/img/zz0.png" alt="" data-value="0" data-id="'+json.data.cid+'">';
                        result += '<img src="/Public/home/img/zz1.png" alt="" style="display: none;" data-value="1" data-id="'+json.data.cid+'">';
                        result += '</strong>';
                        result += '<span>0</span> </p>';
                        result += '<form action="" class="reForm2">';
                        result += '<textarea class="content1" data-id="'+json.data.cid+'" data-coptic-id="<?php echo ($rows["id"]); ?>"></textarea>';
                        result += '<button class="reFormBtn submitCommon">发表</button></form></div>';
                    }else{
                        var d = dialog({
                            content: json.msg
                        });
                        d.show();
                        setTimeout(function () {
                            d.close().remove();
                            if (json.code == 2){
                                window.location.href = json.url
                            }
                        }, 2000);
                    }
                }
            });
            $(".discussBox").append(result);
            $(this).prev().val('');
            return false;
        });
    })

    //评论点赞功能
    $(".discussTime img").live('click', function () {
        var likes = $(this).attr('data-value');
        var cid = $(this).attr('data-id');
        var likesNum = '';
        $.ajax({
            url: '<?php echo U("Coptic/commentLikes");?>',
            data: {'likes':likes,'cid':cid,'callbackUrl':callbackUrl},
            type: 'post',
            dataType: 'json',
            async: false,
            success: function (json) {
                if (json.code == 2){
                    var d = dialog({
                        content: json.msg
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        window.location.href = json.url
                    }, 2000);
                    return false;
                }
                likesNum = json.likesNum;
            }
        });
        $(this).parent().next("span").html(likesNum);
    })
</script>
<script type="text/javascript">
                                
            $(function() {
                // 小屏幕展开导航效果
                $(".cmtMenuLogo").click(function() {
                    $(".cmtUser").toggle();
                    $(".logoImg").toggleClass('commonPR');
                    $(".commonTop nav").toggle();
                    $(".commonTop").toggleClass('t6');
                }
                )
                // 小屏幕展开登录
                $(".cmtUser").click(function() {
                    $(".cmtMenuLogo").toggle();
                    $(".logoImg").toggleClass('commonPL');
                    $(".loginBox").toggle();
                    $(".commonTop").toggleClass('t6');
                }
                )
            }
            )
        </script>
<script>
    //js控制导航选中效果
    (function(){
        var tDiv = document.getElementById("sidebar-menu"),
        links = tDiv.getElementsByTagName("a"),
        index = 0,//默认第一个菜单项
        url = location.href.split('?')[0].split('/');//取当前URL最后一个 / 后面的文件名，pop方法是删除最后一个元素并返回最后一个元素
        if(url[3] && url[4]){    //如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
            url = url[3]+'/'+url[4];
            for (var i=links.length; i--;) {    //遍历 menu 的中连接地址
                if(links[i].href.indexOf(url) !== -1){
                    index = i;
                    break;
                }
            }
        }
        links[index].className = 'active';
    })();


</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    var imgUrl = $(".logoImg img").attr('src');
    var config = '<?php echo ($wxConfig); ?>';
    var link = location.href;
    console.log(config);
    wx.config(config);
    wx.ready(function(){

        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。

        wx.onMenuShareTimeline({
            title: 'test', // 分享标题
            link: link, // 分享链接
            imgUrl: imgUrl, // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });

        wx.onMenuShareAppMessage({
            title: '', // 分享标题
            desc: '', // 分享描述
            link: '', // 分享链接
            imgUrl: '', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });
    wx.error(function(res){

        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

    });
</script>
</body>
</html>