<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>个人中心-修改资料</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/home/css/base.css">
    <link rel="stylesheet" href="/Public/home/css/center.css">
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
            <img style="height: 18px;width: auto;" class="hidden-lg" src="/Public/home/img/cmt2.png" alt="">
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
            <?php if(empty($_SESSION['uid'])): ?><a href="<?php echo U('Public/login');?>">登录</a><span>|</span><a href="<?php echo U('Public/regist');?>">注册</a>
                <?php else: ?>
                <a href="<?php echo U('Public/signOut');?>">退出</a><?php endif; ?>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
<!-- 公共头部结束 -->
<div class="container wrap box">
    <!-- 左边导航开始 -->
    <div class="col-lg-2 left" id="memberCenter">
    <p class="leftTitle visible-lg">会员中心</p>
    <a href="<?php echo U('User/index');?>"><img src="/Public/home/img/c2.png" alt="">个人信息</a>
    <a href="<?php echo U('User/myKeep');?>"><img src="/Public/home/img/c3.png" alt="">我的收藏</a>
    <a href="<?php echo U('User/myActivity');?>"><img src="/Public/home/img/c4.png" alt="">我的活动</a>
    <a href="<?php echo U('User/myIntegral');?>"><img src="/Public/home/img/c9.png" alt="">我的积分</a>
    <a href="<?php echo U('User/modifyPasswd');?>"><img src="/Public/home/img/c5.png" alt="">修改密码</a>
</div>
    <!-- 左边导航结束 -->
    <!-- 右侧信息模块开始 -->
    <div class="col-lg-10">
        <div class="right cpright clearfix">
            <p class="rightTitle visible-lg">修改资料</p>
            <form action="<?php echo U('User/changeMeaage');?>" id="form1" class="cmForm" method="post" enctype="multipart/form-data">
                <table class="cpTable">
                    <tr>
                        <td>头像</td>
                        <td>
                            <?php if($rows.avatar): ?><label class="cmImgLabel" for="cmIMG" style="padding: 0;">
                                    <img src="<?php echo ($rows["avatar"]); ?>" alt="" style="height: inherit;">
                                </label>
                                <?php else: ?>
                                <label class="cmImgLabel" for="cmIMG">
                                    <img src="/Public/home/img/cm2.png" alt="">
                                    <p>上传头像</p>
                                </label><?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>昵称</td>
                        <td><input type="text" value="<?php echo ($rows["nickname"]); ?>" name="nickname"></td>
                    </tr>
                    <tr>
                        <td>真实姓名</td>
                        <td><input type="text" value="<?php echo ($rows["name"]); ?>" name="name"></td>
                    </tr>
                    <tr>
                        <td>性别</td>
                        <td class="sexbox">
                            <input checked="checked" name="sex" value="0" type="radio"
                                   <?php echo (Judgement($rows["sex"],0,"checked")); ?>>保密
                            <input name="sex" type="radio" value="1" <?php echo (Judgement($rows["sex"],1,"checked")); ?>><img
                                src="/Public/home/img/cm1.png" alt="">
                            <input style="margin-left: 20px" name="sex" value="2" type="radio"
                                   <?php echo (Judgement($rows["sex"],2,"checked")); ?>><img src="/Public/home/img/c1.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>手机号</td>
                        <td><input type="text" value="<?php echo ($rows["mobile"]); ?>" name="mobile"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" class="cpSubmit">确认</button>
                            <a class="cpCancle" href="<?php echo U('User/index');?>">取消</a>
                        </td>
                    </tr>
                    <!-- 头像 -->
                    <input id="cmIMG" style="display: none;" type="file" name="avatar" onchange="uploadFile(this)">
                </table>
            </form>

        </div>
    </div>
    <!-- 右侧信息模块结束 -->
</div>
<!-- 公共底部模块开始 -->
<div class="commonBottom visible-lg">
    <div class="links">
        <a href="#" class="key">友情链接</a>
        <?php echo ($link); ?>
        <p class="Copyright">Copyright © 2017达医晓护网，All&nbsp;rights&nbsp;reserved&nbsp;&nbsp;沪[CP备]4008832号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海松点网络科技有限公司技术支持</p>
    </div>
</div>
<!-- 公共底部模块结束 -->
<script type="text/javascript" src="/Public/home/js/jquery1.91.min.js"></script>
<script type="text/javascript" src="/Public/artDialog/dist/dialog.js"></script>

<script type="text/javascript">

    $(function () {
            // 小屏幕展开导航效果
            $(".cmtMenuLogo").click(function () {
                    $(".cmtUser").toggle();
                    $(".logoImg").toggleClass('commonPR');
                    $(".commonTop nav").toggle();
                    $(".commonTop").toggleClass('t6');
                }
            )
            // 小屏幕展开登录
            $(".cmtUser").click(function () {
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
<script type="text/javascript">
    var mcenter = document.getElementById("memberCenter"),
        alinks = mcenter.getElementsByTagName("a"),
        indexes = 0,//默认第一个菜单项
        aurl = location.href.split('?')[0].split('/');//取当前URL最后一个 / 后面的文件名，pop方法是删除最后一个元素并返回最后一个元素
    if (aurl[5]) {    //如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
        aurl = aurl[5];
        for (var j = alinks.length; j--;) {    //遍历 menu 的中连接地址
            if (alinks[j].href.indexOf(aurl) !== -1) {
                indexes = j;
                break;
            }
        }
    }
    alinks[indexes].className = 'leftActive';

    function uploadFile(source) {
        var file = source.files[0];
        if (window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function (e) {
                //document.getElementById("portrait").src = e.target.result;
                $(".cmImgLabel img").attr("src", e.target.result);
            };
            fr.readAsDataURL(file);
        }
    };

    $(".cpSubmit").click(function () {
        var formData = new FormData($( "#form1" )[0]);
        $.ajax({
            url: '<?php echo U("User/changeMeaage");?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (json) {
                console.log(json);
                var d = dialog({
                    content: json.info
                });
                d.show();
                setTimeout(function () {
                    d.close().remove();
                    if (json.url){
                        location.href = json.url;
                    }
                }, 2000);
            }
        });

    })
</script>
</body>
</html>