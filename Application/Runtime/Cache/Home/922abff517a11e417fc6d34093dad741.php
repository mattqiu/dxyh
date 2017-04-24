<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>活动详情</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" href="/Public/home/css/activeDetail.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
		<link rel="stylesheet" href="/Public/artDialog/css/dialog.css">
	</head>
	<body style="padding-bottom: 60px;">
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
		<div class="container wrap activeDetail">
			<!-- 右边热门活动回顾开始 -->
			<div class="col-lg-3 col-lg-push-9 history">
				<!-- 报名及分享开始 -->
				<div class="joinBox">
					<div class="bshare-custom  visible-lg">
						<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
						<a title="分享到QQ空间" class="bshare-qzone"></a>
						<a title="分享到QQ好友" class="bshare-qqim"></a>
						<a title="分享到微信" class="bshare-weixin"></a>
						<a title="分享到LinkedIn" class="bshare-linkedin"></a>
						<!--<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>-->
					</div>
					<p>时间：<?php echo ($rows["activity_start_time"]); ?> 至 <?php echo ($rows["activity_end_time"]); ?></p>
					<p>报名：<?php echo ($rows["enroll_start_time"]); ?> 至 <?php echo ($rows["enroll_end_time"]); ?></p>
					<p>地点：<?php echo ($rows["address"]); ?></p>
					<p>人数：<label class="attend"><?php echo ($rows["enrollnum"]); ?></label>/<?php echo ($rows["activity_number"]); ?></p>
					<p>浏览：<?php echo ($rows["browse_volume"]); ?></p>
					<div class="joinBtnBox"><a href="javascript:;" class="joinBtn" data-value="<?php echo ($rows["id"]); ?>">我要去</a></div>
				</div>
				<!-- 报名及分享结束 -->
				<h2 class="visible-lg">热门活动回顾</h2>
				<ul class="historyList visible-lg">
					<?php if(is_array($hotActivity)): $i = 0; $__LIST__ = $hotActivity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 一个热门活动开始 -->
						<li>
							<a href="<?php echo U('Activity/detail', array('id'=>$vo['id']));?>">
								<img src="<?php echo ($vo["activity_cover"]); ?>" alt="">
								<!-- 标题 -->
								<div class="mengceng"></div><!-- 蒙层 -->
								<p class="historyTitle"><?php echo ($vo["activity_name"]); ?></p>
							</a>
						</li>
						<!-- 一个热门活动结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<!-- 右边热门活动回顾结束 -->
			<!-- 左边详情开始 -->
			<div class="col-lg-9 col-lg-pull-3 activeDetailL">
				<div>活动类别：<?php echo ($rows["type_name"]); ?> <!--<span class="code"><img src="/Public/home/img/code.png" alt="">活动二维码</span>--></div>
				<!-- 标题开始 -->
				<h1 class="activeTitle"><?php echo ($rows["activity_name"]); ?></h1>
				<!-- 标题结束 -->
				<!-- 活动内容开始 -->
				<div class="content">
					<?php echo ($rows["content"]); ?>
				</div>
				<!-- 活动内容结束 -->
			</div>
			<!-- 左边详情结束 -->
			
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
		<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
		<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
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
		$(function () {
			$(".joinBtn").click(function () {
				var id = $(this).attr("data-value");
				$.ajax({
					url: "<?php echo U('Activity/participateActivity');?>",
					type: 'post',
					data: {'id':id},
					dataType: 'json',
					success: function (json) {
						console.log(json);
						if (json.code == 0){
							$(".attend").html(json.data);
						}
						var d = dialog({
							content: json.msg
						});
						d.show();
						setTimeout(function () {
							d.close().remove();
                            if (json.code == 2){
                                location.href = json.url;
                                return false;
                            }
						}, 2000);
					}
				});
			});
		});
	</script>
	</body>
</html>