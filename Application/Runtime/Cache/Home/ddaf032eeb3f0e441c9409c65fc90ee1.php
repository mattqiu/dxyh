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
        <link rel="stylesheet" href="/Public/artDialog/css/dialog.css">
		<style>
		body{background: #fff;}
		.main { background: #fff;  padding-top: 10px;padding-left: 10px;padding-right: 10px;text-align: center;}
		.main h1 { text-align: left;font-size: 20px; color: #000000; padding-left: 114px; font-weight: bold; margin-bottom: 40px; }
		.form1 { display: inline-block;text-align: left; }
		.left h2 { color: #333333; font-size: 16px; }
		.left input { width: 310px; height: 40px; font-size: 16px; padding-left: 8px; margin-top: 10px; margin-bottom: 10px;border: 1px solid #e0e0e0; }
		.p1{text-align: right;margin-top: 20px}
		.p1 a { color: #F55351; }
		.p2 { color: #999999; margin-top: 20px; }
		.checkBox input { width: 20px !important; height: 20px !important; vertical-align: middle; margin-right: 10px; }
		.submit { border: none; background: #2D9E12; color: #fff; cursor: pointer;border-radius: 5px; height: 40px;width: 310px;}
		@media (min-width: 1200px) {
			body{
				background-color: #F5F5F5;
			}
			.p2{
				margin-top: 40px; margin-bottom: 20px;
			}
			.main { background: #fff; border: 1px solid #e0e0e0; margin-top: 50px; margin-bottom: 120px; padding-top: 60px; padding-bottom: 50px; width: 1000px; }
			.form1 { margin: 0 auto;  }
			.left input { width: 310px; }
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
		<div class="wrap main container">
			<h1 class="visible-lg">登录</h1>
			<div class="col-lg-12 left">
				<!-- 表单开始 -->
				<form action="" class="form1">
					<h2>昵称</h2>
					<input type="text" placeholder="请输入昵称" name="nickname" value="<?php echo ($nickname); ?>">
					<h2>密码</h2>
					<input type="password" placeholder="请输入密码" name="passwd" value="<?php echo ($passwd); ?>">
					<div class="checkBox">
						<input type="checkbox" name="remember" value="1" >记住用户名
					</div>
					<button class="submit" type="button" >立即登录</button>
					<p class="p1">还没有账号？<a href="regist.html">立即注册</a></p>
				</form>
				<!-- 表单结束 -->
			</div>
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

			$(function () {
			    var checkLogin = "<?php echo ($checkLogin); ?>";
			    if (checkLogin){
                    $("input[name='remember']").attr("checked", true);
                }


				$(".submit").click(function () {
                    if ($("input[name='nickname']").val() == ''){
                        var d = dialog({
                            content: '请输入昵称'
                        });
                        d.show();
                        setTimeout(function () {
                            d.close().remove();
                            $("input[name='nickname']").focus();
                        }, 2000);
                        return false;
                    }
                    if ($("input[name='passwd']").val() == ''){
                        var d = dialog({
                            content: '请输入密码'
                        });
                        d.show();
                        setTimeout(function () {
                            d.close().remove();
                            $("input[name='passwd']").focus();
                        }, 2000);
                        return false;
                    }
					var callbackUrl = "<?php echo isset($callbackUrl)?$callbackUrl:'';?>";
                    var data = {
                        'nickname':$("input[name='nickname']").val(),
                        'passwd':$("input[name='passwd']").val(),
                        'remember':$("input[name='remember']:checked").val(),
						'callbackUrl':callbackUrl
                    };
                    $.ajax({
                        url: '<?php echo U("Public/login");?>',
                        type: 'post',
                        data: data,
                        dataType: 'json',
                        success: function (json) {
                            console.log(json);
                            var d = dialog({
                                content: json.info
                            });
                            d.show();
                            setTimeout(function () {
                                d.close().remove();
                                if (json.status){
                                    location.href = json.url;
                                }
                            }, 2000);
                        }
                    });
                });
            })
        </script>
	</body>
</html>