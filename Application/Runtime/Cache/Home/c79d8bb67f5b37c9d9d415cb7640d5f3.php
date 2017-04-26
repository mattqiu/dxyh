<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>注册</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
        <link rel="stylesheet" href="/Public/artDialog/css/dialog.css">
		<style>
		body{background: #fff;}
		.main { background: #fff;  padding-top: 10px;padding-left: 10px;padding-right: 10px;}
		.main h1{font-size: 20px;color: #000000;padding-left: 114px;font-weight: bold;margin-bottom: 40px;}
		.form1 { display: inline-block; }
		.form1 tr td{padding-bottom: 20px;}
		.form1 tr td:first-child{text-align: right;padding-right: 20px;}
		.form1 table input{height: 40px; font-size: 16px;padding-left: 8px;border: 1px solid #e0e0e0;width: 100%;}
		.form1 .submit{background: #2D9E12;color: #fff;border: none;border-radius: 5px;cursor: pointer;height: 40px; font-size: 16px;width: 100%;}
		.codeBox input{width: 80px!important;}
		.codeBox span{display: inline-block;line-height: 1;vertical-align: middle;cursor: pointer;}
		.codeBox img{width: 95px;margin-left: 8px;margin-right: 8px;margin-top: -2px;}
		.others {  font-size: 16px;text-align: center; }
		.others a{color: #4D4D4D;}
		.others p{margin-bottom: 30px;}
		.p1 a{color: #F55351;}
		.p2{color: #999999;margin-top: 40px;margin-bottom: 20px;}
		.checkBox input{width: 20px!important;height: 20px!important;vertical-align: middle;margin-right: 10px;}
		.checkBox a{color: #2D9E12;}
		.others .p1{text-align: right;}
		@media (min-width: 1200px) {
			body{
				background-color: #F5F5F5;
			}
			.codeBox input{width: 150px!important;}
			.p2{
				margin-top: 40px; margin-bottom: 20px;
			}
			.others .p1{text-align: left;}
			.others p img { margin-right: 10px; }
			.others { float: right; width: 270px; font-size: 16px;text-align: left; }
			.main { background: #fff; border: 1px solid #e0e0e0; margin-top: 50px; margin-bottom: 120px; padding-top: 60px; padding-bottom: 50px; width: 1000px; }
			.form1 { margin-left: 160px; padding-right: 90px;border-right: 1px solid #e0e0e0;   }
			.form1 table input{height: 40px; font-size: 16px;padding-left: 8px;width: 300px;border: 1px solid #e0e0e0;}
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
		<div class="wrap main">
			<h1 class="visible-lg">注册</h1>
			<!-- 表单开始 -->
			<form action="<?php echo U('Public/register');?>" class="form1">
				<table>
					<tr>
						<td>昵称</td>
						<td><input type="text" placeholder="请输入昵称" name="nickname"></td>
					</tr>
					<tr>
						<td>设置密码</td>
						<td><input type="password" placeholder="密码长度6-20个字符" name="passwd"></td>
					</tr>
					<tr>
						<td>确认密码</td>
						<td><input type="password" placeholder="密码长度6-20个字符" name="confirmPasswd"></td>
					</tr>
					<tr>
						<td>验证码</td>
						<td class="codeBox"><input type="text" name="verifyCode" ><img src="<?php echo U('Public/verify');?>" alt=""><span class="changeA">看不清<br>换一张</span></td><!--/Public/home/img/fp1.png-->
					</tr>
					<tr>
						<td></td>
						<td><button class="submit" type="submit" >注册</button></td>
					</tr>
					<tr>
						<td></td>
						<!--<td class="checkBox"><input class="check" type="checkbox"><a href="#">我已阅读并同意《达医晓护协议》</a></td>-->
					</tr>
				</table>
			</form>
			<!-- 表单结束 -->
			<!-- 其他登录方式开始 -->
			<div class="others">
				<p class="p1">已经注册过？<a href="login.html">立即登录</a></p>
				<!--<p class="p2">可使用以下账号直接登录</p>
				<p class="col-xs-4 col-lg-12"><a href="#"><img src="/Public/home/img/wexin2.png" alt="">微信登录</a></p>
				<p class="col-xs-4 col-lg-12"><a href="#"><img src="/Public/home/img/qq2.png" alt="">QQ登录</a></p>
				<p class="col-xs-4 col-lg-12"><a href="#"><img src="/Public/home/img/weibo2.png" alt="">微博登录</a></p>-->
			</div>
			<!-- 其他登录方式结束 -->
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
				//$('.submit').css("background","#b2b5b1");

				/*$('.check').change(function () {
                    if($('.check').attr("checked")){
                        $('.submit').css("background","#2D9E12");
                        $('.submit').attr("disabled",false);
                    }else{
                        $('.submit').css("background","#b2b5b1");
                        $('.submit').attr("disabled",true);
                    }
                });*/

				$(".changeA").click(function () {
				    var url = "<?php echo U('Public/verify');?>?r="+new Date().getTime()+Math.floor(Math.random() * ( 1000 + 1));
                    $(this).prev("img").attr("src",url);
                });
            });


            $('.submit').click(function () {
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
                }else if ($("input[name='passwd']").val().length < 6 || $("input[name='passwd']").val().length > 20){
                    var d = dialog({
                        content: '密码长度6-20个字符'
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        $("input[name='passwd']").focus();
                    }, 2000);
                    return false;
                }
                if ($("input[name='confirmPasswd']").val() == ''){
                    var d = dialog({
                        content: '请输入确认密码'
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        $("input[name='confirmPasswd']").focus();
                    }, 2000);
                    return false;
                }else if ($("input[name='confirmPasswd']").val().length < 6 || $("input[name='confirmPasswd']").val().length > 20){
                    var d = dialog({
                        content: '密码长度6-20个字符'
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        $("input[name='confirmPasswd']").focus();
                    }, 2000);
                    return false;
                }
                if ($("input[name='confirmPasswd']").val() != $("input[name='passwd']").val()){
                    var d = dialog({
                        content: '密码与确认密码不一致'
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        $("input[name='confirmPasswd']").focus();
                    }, 2000);
                    return false;
                }
                if ($("input[name='verifyCode']").val() == ''){
                    var d = dialog({
                        content: '请输入验证码'
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                        $("input[name='verifyCode']").focus();
                    }, 2000);
                    return false;
                }

                var data = {
                    'nickname':$("input[name='nickname']").val(),
                    'passwd':$("input[name='passwd']").val(),
                    'confirmPasswd':$("input[name='confirmPasswd']").val(),
                    'verifyCode':$("input[name='verifyCode']").val()
                };

                $.ajax({
                    url: '<?php echo U("Public/register");?>',
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
        </script>
	</body>
</html>