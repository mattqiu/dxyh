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
		.main { background: #fff; border: 1px solid #e0e0e0; margin-top: 50px; margin-bottom: 120px; padding-top: 60px; padding-bottom: 50px; width: 1000px; }
		.main h1 { font-size: 20px; color: #000000; padding-left: 114px; font-weight: bold; margin-bottom: 40px; }
		.form1 { display: inline-block; margin-left: 160px; border-right: 1px solid #e0e0e0; padding-right: 90px; }
		.left h2 { color: #333333; font-size: 16px; }
		.left input { width: 310px; height: 40px; font-size: 16px; padding-left: 8px; margin-top: 10px; margin-bottom: 10px;border: 1px solid #e0e0e0; }
		.others { float: right; width: 320px; font-size: 16px; }
		.others a { color: #4D4D4D; }
		.others p { margin-bottom: 30px; }
		.others p img { margin-right: 10px; }
		.p1 a { color: #F55351; }
		.p2 { color: #999999; margin-top: 40px; margin-bottom: 20px; }
		.checkBox input { width: 20px !important; height: 20px !important; vertical-align: middle; margin-right: 10px; }
		.submit { border: none; background: #2D9E12; color: #fff; cursor: pointer; }
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
        </a>
        <!-- logo -->
        <!-- 导航开始 -->
        <nav>
            <a href="<?php echo U('Index/index');?>" class="active">首页</a>
            <a href="<?php echo U('Coptic/index');?>">科普中心</a>
            <a href="<?php echo U('Activity/index');?>">活动中心</a>
            <a href="<?php echo U('HomeCare/index');?>">家庭护理</a>
            <a href="<?php echo U('Aboutus/index');?>">关于我们</a>
            <a href="<?php echo U('User/index');?>">个人中心</a>
        </nav>
        <!-- 导航结束 -->
        <!-- 登陆注册开始 -->
        <div class="loginBox visible-lg">
            <a href="<?php echo U('Public/login');?>">登录</a>|<a href="<?php echo U('Public/regist');?>">注册</a>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<div class="wrap main container">
			<h1>登录</h1>
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
					<p><a href="#"><img src="/Public/home/img/wexin2.png" alt="">微信登录</a></p>
					<p><a href="#"><img src="/Public/home/img/qq2.png" alt="">QQ登录</a></p>
					<p><a href="#"><img src="/Public/home/img/weibo2.png" alt="">微博登录</a></p>
				</div>
				<!-- 其他登录方式结束 -->
			</div>
		</div>
		<!-- 公共底部模块开始 -->
		<div class="commonBottom visible-lg">
    <div class="links">
        <a href="#" class="key">友情链接</a>
        <a href="#">中路成员企业</a>
        <a href="#">星火钱包</a>
        <a href="#">贷出去多赚</a>
        <a href="#">网贷天眼</a>
        <a href="#">网贷之家</a>
        <a href="#">网贷专家</a>
        <a href="#">二手车之家</a>
        <a href="#">车300</a>
        <a href="#">车虫网</a>
        <a href="#">车8度</a>
        <a href="#">车蚂蚁</a><br>
        <a href="#">车讯商城</a>
        <a href="#">易车二手车</a>
        <a href="#">移动汽车网</a>
        <a href="#">汽车改装店</a>
        <a href="#">丝路汽车网</a>
        <a href="#">一起网贷</a>
        <a href="#">融途网</a>
        <p class="Copyright">Copyright © 2017达医晓护网，All&nbsp;rights&nbsp;reserved&nbsp;&nbsp;沪[CP备]4008832号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海松点网络科技有限公司技术支持</p>
    </div>
</div>
		<!-- 公共底部模块结束 -->
		<script type="text/javascript" src="/Public/home/js/jquery1.91.min.js"></script>
		<script type="text/javascript">
								// 小屏幕展开导航效果
			$(function() {
				$(".cmtMenuLogo").click(function() {
					$(".commonTop nav").toggle();
					$(".commonTop").toggleClass('t6');
				}
				)
			}
			)
		</script>
	</body>
</html>