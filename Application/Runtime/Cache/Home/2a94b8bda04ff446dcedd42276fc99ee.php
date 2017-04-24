<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>首页</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" type="text/css" href="/Public/home/css/idangerous.swiper.css">
		<link rel="stylesheet" href="/Public/home/css/index.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
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
		<!-- 顶部轮播图开始 -->
		<div class="swiper-container swiper1">
			<!-- 图片开始 -->
			<div class="swiper-wrapper">
				<?php if(is_array($websiteImage)): $i = 0; $__LIST__ = $websiteImage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><a href="<?php echo ($vo["img_link"]); ?>"> <img src="<?php echo ($vo["image"]); ?>" alt=""></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!-- 图片结束 -->
			<!-- 轮播分页开始 -->
			<div class="swiper-pagination"></div>
			<!-- 轮播分页结束 -->
		</div>
		<!-- 顶部轮播图结束 -->
		<!-- 最新科普开始 -->
		<!-- 大屏幕下标题开始 -->
		<div class="titleLogo container visible-lg">
			<div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>S</p></div>
			<div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
				<p>最新科普</p>
				<p>cience</p>
			</div>
		</div>
		<!-- 大屏幕下标题结束 -->
		<div class="wrap">
			<p class="clearfix"><span class="hidden-lg min-title">最新科普</span><a class="more" href="<?php echo U('Coptic/index');?>">more>></a></p>
			<div class="container wrap article1List">
				<!-- 一个文章开始 -->
				<?php if(is_array($coptic)): $i = 0; $__LIST__ = $coptic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-xs-6 article1">
						<a href="<?php echo U('Coptic/details',array('id'=>$vo['id']));?>">
							<img src="<?php echo ($vo["coptic_cover"]); ?>" alt="">
							<h3><?php echo ($vo["coptic_title"]); ?></h3>
							<div class="figcaption visible-lg">
								<p><?php echo ($vo["abstract"]); ?></p>
							</div>
						</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<!-- 一个文章结束 -->
			</div>
		</div>
		<!-- 最新科普结束 -->
		<!-- 板块风采开始 -->
		<!-- 大屏幕下标题开始 -->
		<div class="titleLogo container visible-lg">
			<div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>P</p></div>
			<div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
				<p>板块风采</p>
				<p>late style</p>
			</div>
		</div>
		<!-- 大屏幕下标题结束 -->
		<div class="wrap bankuai">
			<div class="hidden-lg min-title">板块风采</div><!-- 小屏幕下的标题 -->
			<div class="container  box3">
				<!-- 轮播开始 -->
				<div class="swiper-container swiper2">
					<!-- 图片开始 -->
					<div class="swiper-wrapper">
						<!-- 一个轮播页开始 -->
                        <?php if(is_array($copticType)): $i = 0; $__LIST__ = $copticType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide container plateStyleListBox">
                                <a href="#">
                                    <img src="<?php echo ($vo["category_image"]); ?>" alt="">
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
						<!-- 一个轮播页结束 -->
					</div>
					<!-- 图片结束 -->
					<!-- 轮播分页开始 -->
					<div class="swiper-pagination2 hidden-lg"></div>
					<!-- 轮播分页结束 -->
				</div>
				<!-- 轮播结束 -->
				<!-- 上一页，下一页控制按钮开始 -->
				<img class="pre2 visible-lg" src="/Public/home/img/pre2.png" alt="">
				<img class="next2 visible-lg" src="/Public/home/img/next2.png" alt="">
				<!-- 上一页，下一页控制按钮结束 -->
			</div>
		</div>
		<!-- 板块风采结束 -->
		<!-- 最近活动开始 -->
		<!-- 大屏幕下标题开始 -->
		<div class="titleLogo container visible-lg">
			<div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>A</p></div>
			<div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
				<p>最近活动</p>
				<p>ctivity</p>
			</div>
		</div>
		<!-- 大屏幕下标题结束 -->
		<div class="wrap wnewActivity">
			<p class="clearfix" style="margin-top: 10px;"><span class=" hidden-lg min-title">最近活动</span><a class="more" href="<?php echo U('Activity/index');?>">more>></a></p>
			<div class="container  newActivity">
				<!-- 一个活动开始 -->
                <?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-4 newActivity1">
                        <a href="<?php echo U('Activity/detail',array('id'=>$vo['id']));?>">
                            <img src="<?php echo ($vo["activity_cover"]); ?>" alt="">
                            <h3></h3><!-- 蒙层 -->
                            <p class="newActivityP"><?php echo ($vo["activity_name"]); ?></p>
                            <div class="activeMessage">
                                截止：<?php echo ($vo["enroll_end_time"]); ?> <?php echo ($vo["week"]); ?> <?php echo ($vo["time"]); ?>
                                <span class="joinActive">立即参与</span>
                            </div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
				<!-- 一个活动结束 -->
			</div>
		</div>
		<!-- 最近活动结束 -->
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
		<script type="text/javascript" src="/Public/home/js/idangerous.swiper.min.js"></script>
		<script type="text/javascript" src="/Public/home/js/index.js"></script>
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