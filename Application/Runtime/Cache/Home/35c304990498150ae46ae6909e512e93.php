<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>关于我们</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
		<style type="text/css">	
		.bg { width: 100%; height: auto; }
		body { background: #FFFFFF; }
		.titleLogo { margin-top: 80px; margin-bottom: 40px; border-top: 1px solid #CCCCCC; }
		.titleLogoL { text-align: right; font-size: 75px; vertical-align: top; line-height: 1; padding-right: 5px; color: #F55351; margin-top: -40px; background: #fff; width: 110px; }
		.titleLogoR { margin-top: -40px; padding-top: 10px; font-size: 32px; vertical-align: top; line-height: 1; background: #fff; width: 190px; }
		.titleLogoR p:first-child { color: #2A2A2A; font-weight: bold; }
		.titleLogoR p:last-child { color: #666; }
		.aboutusImg { width: 250px; float: left; margin-right: 30px; }
		.aboutUs { line-height: 2; text-indent: 2em; padding-bottom: 100px; }
		.aboutUs p { padding: 10px; }
		@media (min-width:1200px) {
			.aboutUs p { padding: 0; }
			.bg { width: 100%; height: 460px; }
		}
		</style>
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
                <span><?php echo (session('nickname')); ?></span>&nbsp;&nbsp;&nbsp;<span>|</span><a href="<?php echo U('Public/signOut');?>">退出</a><?php endif; ?>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<img class="bg" src="/Public/home/img/A2.png" alt="">
		<!-- 大屏幕下标题开始 -->
		<div class="titleLogo container visible-lg">
			<div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>A</p></div>
			<div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
				<p>关于我们</p>
				<p>bout us</p>
			</div>
		</div>
		<!-- 大屏幕下标题结束 -->
		<!-- 关于我们描述开始 -->
		<div class="wrap aboutUs clearfix">
			<?php echo ($rows); ?>
		</div>
		<!-- 关于我们描述结束 -->
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
	</body>
</html>