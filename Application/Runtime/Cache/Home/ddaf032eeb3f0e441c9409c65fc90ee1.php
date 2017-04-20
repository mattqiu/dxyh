<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>登录</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
		<style>
		body{background: #fff;}
		.main { background: #fff;  padding-top: 10px;padding-left: 10px;padding-right: 10px;}
		.main h1 { font-size: 20px; color: #000000; padding-left: 114px; font-weight: bold; margin-bottom: 40px; }
		.form1 { display: inline-block; }
		.left h2 { color: #333333; font-size: 16px; }
		.left input { width: 310px; height: 40px; font-size: 16px; padding-left: 8px; margin-top: 10px; margin-bottom: 10px;border: 1px solid #e0e0e0; }
		.others {  font-size: 16px;text-align: center; }
		.others a { color: #4D4D4D; }
		.others p { margin-bottom: 5px; }
		.others .p1{text-align: left;}
		.p1 a { color: #F55351; }
		.p2 { color: #999999; margin-top: 20px; }
		.checkBox input { width: 20px !important; height: 20px !important; vertical-align: middle; margin-right: 10px; }
		.submit { border: none; background: #2D9E12; color: #fff; cursor: pointer;border-radius: 5px; }
		@media (min-width: 1200px) {
			body{
				background-color: #F5F5F5;
			}
			.p2{
				margin-top: 40px; margin-bottom: 20px;
			}
			.others p img { margin-right: 10px; }
			.others { float: right; width: 320px; font-size: 16px;text-align: left; }
			.main { background: #fff; border: 1px solid #e0e0e0; margin-top: 50px; margin-bottom: 120px; padding-top: 60px; padding-bottom: 50px; width: 1000px; }
			.form1 { margin-left: 160px; padding-right: 90px;border-right: 1px solid #e0e0e0;   }
			.left input { width: 310px; }
			.others p { margin-bottom: 30px; }
		}
		@media (min-width:1400px) {
			body { padding-bottom: 280px; }
			.commonBottom { position: fixed; bottom: 0; left: 0; width: 100%; }
			
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
            <a href="<?php echo U('User/index');?>">个人中心</a>
        </nav>
        <!-- 导航结束 -->
        <!-- 登陆注册开始 -->
        <div class="loginBox">
            <a href="<?php echo U('Public/login');?>">登录</a><span>|</span><a href="<?php echo U('Public/regist');?>">注册</a>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<div class="wrap main container">
			<h1 class="visible-lg">登录</h1>
			<div class="col-lg-6 left">
				<!-- 表单开始 -->
				<form action="" class="form1">
					<h2>昵称</h2>
					<input type="text" placeholder="请输入昵称">
					<h2>密码</h2>
					<input type="password" placeholder="请输入密码">
					<div class="checkBox">
						<input type="checkbox">记住用户名
					</div>
					<input class="submit" type="submit" value="立即登录">
				</form>
				<!-- 表单结束 -->
			</div>
			<div class="col-lg-6">
				<!-- 其他登录方式开始 -->
				<div class="others">
					<p class="p1">还没有账号？<a href="regist.html">立即注册</a></p>
					<p class="p2">可使用以下账号直接登录</p>
					<p class="col-xs-4 col-lg-12"><a href="#"><img src="/Public/home/img/wexin2.png" alt="">微信登录</a></p>
					<p class="col-xs-4 col-lg-12"><a href="#"><img src="/Public/home/img/qq2.png" alt="">QQ登录</a></p>
					<p class="col-xs-4 col-lg-12"><a href="#"><img src="/Public/home/img/weibo2.png" alt="">微博登录</a></p>
				</div>
				<!-- 其他登录方式结束 -->
			</div>
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
	</body>
</html>