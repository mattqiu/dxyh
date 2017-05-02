<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>家庭护理</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" type="text/css" href="/Public/home/css/idangerous.swiper.css">
		<link rel="stylesheet" href="/Public/home/css/family.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
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
		<div class="container wrap box3">
			<!-- 轮播开始 -->
			<div class="swiper-container swiper2 visible-lg">
				<!-- 图片开始 -->
				<div class="swiper-wrapper">
					<?php if(is_array($homeCareImage)): $i = 0; $__LIST__ = $homeCareImage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 一个轮播页开始 -->
						<div class="swiper-slide container plateStyleListBox">
							<a href="<?php echo ($vo["img_link"]); ?>">
								<img src="<?php echo ($vo["image"]); ?>" alt="">
							</a>
						</div>
						<!-- 一个轮播页结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 图片结束 -->
			</div>
			<!-- 轮播结束 -->
			<!-- 上一页，下一页控制按钮开始 -->
			<img class="pre2 visible-lg" src="/Public/home/img/f3.png" alt="">
			<img class="next2 visible-lg" src="/Public/home/img/f2.png" alt="">
			<!-- 上一页，下一页控制按钮结束 -->
		</div>
		<!-- 目录开始 -->
		<div class="wrap menu">
			<h1>目录</h1>
			<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p class="title newTitle">
                    <a href="<?php echo U('HomeCare/detail',array('id'=>$vo['id']));?>">
                        <span><?php echo ($vo["chapter_name"]); ?></span>
                        <?php if(!empty($vo["title"])): echo ($vo["title"]); endif; ?>
                    </a>
                </p>
                <?php if(!empty($vo["subData"])): if(is_array($vo["subData"])): $i = 0; $__LIST__ = $vo["subData"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><p>
                            <a class="new" href="<?php echo U('HomeCare/detail',array('id'=>$item['id']));?>">
                                <?php echo ($item["chapter_name"]); ?>&nbsp;&nbsp;<?php echo ($item["title"]); ?>
                            </a>
                        </p><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
			<!--<p class="title newTitle"><a href="familyDetail.html">序言</a></p>
			<p class="title newTitle"><a href="familyDetail.html"><span>第一章</span>基本家庭护理操作</a></p>
			<p><a class="new" href="familyDetail.html">第一节&nbsp;&nbsp;基本清洁</a></p>
			<p><a class="new" href="familyDetail.html">第二节&nbsp;&nbsp;基本清洁</a></p>
			<p><a class="new" href="familyDetail.html">第三节&nbsp;&nbsp;基本清洁</a></p>
			<p><a class="new" href="#">第四节&nbsp;&nbsp;基本清洁</a></p>
			<p><a class="new" href="#">第五节&nbsp;&nbsp;基本清洁<strong class="newTip">最新</strong></a></p>
			<p><a href="#">第一节&nbsp;&nbsp;基本清洁</a></p>
			<p><a href="#">第二节&nbsp;&nbsp;基本清洁</a></p>
			<p><a href="#">第三节&nbsp;&nbsp;基本清洁</a></p>
			<p><a href="#">第四节&nbsp;&nbsp;基本清洁</a></p>
			<p><a href="#">第五节&nbsp;&nbsp;基本清洁</a></p>
			<p class="title"><a href="#"><span>第二章</span>基本家庭护理操作</a></p>-->
		</div>
		<!-- 目录结束 -->
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
		<script type="text/javascript" src="/Public/home/js/idangerous.swiper.min.js"></script>
		<script type="text/javascript">
			$(function(){
				var clientWidth = document.documentElement && document.documentElement.clientWidth || document.body.clientWidth || window.innerWidth;
				var n=5;//轮播图显示个数
				if (clientWidth<1200) {
					n=1;//小屏幕小，显示一个轮播页
				}
				var mySwiper2 = $('.swiper2').swiper({
			autoplay: 5000,
			loop: true,
			slidesPerView :n,
			spaceBetween:20,
		});
		// 上一页
		$(".pre2").click(function(){
			mySwiper2.slidePrev();
		})
		// 下一页
		$(".next2").click(function(){
			mySwiper2.slideNext();
		})
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
	</body>
</html>