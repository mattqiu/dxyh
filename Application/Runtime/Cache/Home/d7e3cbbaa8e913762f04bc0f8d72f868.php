<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>活动中心</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/home/css/base.css">
    <link rel="stylesheet" href="/Public/home/css/dropload.css">
    <link rel="stylesheet" href="/Public/home/css/activity.css">
    <link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico">
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
<img class="visible-lg" style="width: 100%;height: 460px;" src="/Public/home/img/a3.png" alt="">
<!-- 大屏幕下标题开始 -->
<div class="titleLogo container visible-lg">
    <div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>A</p></div>
    <div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
        <p>活动中心</p>
        <p>ctivity</p>
    </div>
</div>
<!-- 大屏幕下标题结束 -->
<!-- 活动分类开始 -->
<div class="container wrap activeStyle">
    <div class="col-lg-1 activeStyleL">活动分类</div>
    <div class="col-lg-11 activeStyleR">
        <a href="javascript:;" data-value="0">全部</a>
        <?php if(is_array($activityType)): $i = 0; $__LIST__ = $activityType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="javascript:;" data-value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["type_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!-- 活动分类结束 -->
<!-- 搜索开始 -->
<div class="container wrap searchBox">
    <div class="col-lg-1 searchBoxL visible-lg">关键词</div>
    <div class="col-lg-11 searchBoxR">
        <form action="<?php echo U('Activity/index');?>" method="get" id="form1">
            <span class="hidden-lg styleBtn">分类</span>
            <input type="text" class="input" name="keyword" value="<?php echo ($keyword); ?>">
            <input type="submit" class="submit visible-lg" onclick="subKeyWord()" value="查询">
            <span class="submit hidden-lg" onclick="subKeyWord()">查询</span><!-- 小屏幕下的查询 -->
            <input name="typeId" type="hidden" value=""/>
        </form>
    </div>
</div>
<!-- 搜索结束 -->
<!-- 小屏幕下显示的图片开始 -->
<img class="visible-xs" style="width: 100%;height: auto;margin-top: 20px;" src="/Public/home/img/s1.png" alt="">
<!-- 小屏幕下显示的图片结束 -->
<!-- 活动开始 -->
<div class="container wrap activeBox">
    <!-- 左边活动列表开始 -->
    <div class="col-lg-9 activeListWrap">
        <div class="activeListBox">
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 一个活动开始 -->
            <div class="activeList clearfix">
                <a href="<?php echo U('Activity/detail', array('id'=>$vo['id']));?>">
                    <div class="col-xs-4 col-lg-3">
                        <img src="<?php echo ($vo["activity_cover"]); ?>" alt="">
                    </div>
                    <div class="col-xs-8 col-lg-9 activeListR">
                        <h1><?php echo ($vo["activity_name"]); ?></h1>
                        <p>时间：<?php echo ($vo["activity_start_time"]); ?> - <?php echo ($vo["activity_end_time"]); ?>
                            <span class="number">人数限制：<?php echo ($vo["activity_number"]); ?></span><?php echo ($vo["status"]); ?>
                        </p>
                        <p>积分：<?php echo ($vo["activity_integral"]); ?>积分</p>
                        <p class="visible-lg">地点：<?php echo ($vo["address"]); ?></p>
                        <!-- 活动状态 -->
                    </div>
                </a>
            </div>
            <!-- 一个活动结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--&lt;!&ndash; 一个活动开始 &ndash;&gt;
            <div class="activeList clearfix">
                <a href="activityDetail.html">
                    <div class="col-xs-4 col-lg-3">
                        <img src="/Public/home/img/img1.png" alt="">
                    </div>
                    <div class="col-xs-8 col-lg-9 activeListR">
                        <h1>活动标题</h1>
                        <p>时间：2017-03-10&nbsp;&nbsp;10:30
                            <span class="number">人数限制：300人</span><span class="activeState">已截止</span>
                        </p>
                        <p>积分：10积分</p>
                        <p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
                        &lt;!&ndash; 活动状态 &ndash;&gt;
                    </div>
                </a>
            </div>
            &lt;!&ndash; 一个活动结束 &ndash;&gt;
            &lt;!&ndash; 一个活动开始 &ndash;&gt;
            <div class="activeList clearfix">
                <a href="activityDetail.html">
                    <div class="col-xs-4 col-lg-3">
                        <img src="/Public/home/img/img1.png" alt="">
                    </div>
                    <div class="col-xs-8 col-lg-9 activeListR">
                        <h1>活动标题</h1>
                        <p>时间：2017-03-10&nbsp;&nbsp;10:30
                            <span class="number">人数限制：300人</span><span class="activeState stateBg2">已报满</span></p>
                        <p>积分：10积分</p>
                        <p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
                        &lt;!&ndash; 活动状态 &ndash;&gt;
                    </div>
                </a>
            </div>
            &lt;!&ndash; 一个活动结束 &ndash;&gt;
            &lt;!&ndash; 一个活动开始 &ndash;&gt;
            <div class="activeList clearfix">
                <a href="activityDetail.html">
                    <div class="col-xs-4 col-lg-3">
                        <img src="/Public/home/img/img1.png" alt="">
                    </div>
                    <div class="col-xs-8 col-lg-9 activeListR">
                        <h1>活动标题</h1>
                        <p>时间：2017-03-10&nbsp;&nbsp;10:30
                            <span class="number">人数限制：300人</span><span class="activeState stateBg1">正在报名</span></p>
                        <p>积分：10积分</p>
                        <p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
                        &lt;!&ndash; 活动状态 &ndash;&gt;
                    </div>
                </a>
            </div>
            &lt;!&ndash; 一个活动结束 &ndash;&gt;
            &lt;!&ndash; 一个活动开始 &ndash;&gt;
            <div class="activeList clearfix">
                <a href="activityDetail.html">
                    <div class="col-xs-4 col-lg-3">
                        <img src="/Public/home/img/img1.png" alt="">
                    </div>
                    <div class="col-xs-8 col-lg-9 activeListR">
                        <h1>活动标题</h1>
                        <p>时间：2017-03-10&nbsp;&nbsp;10:30
                            <span class="number">人数限制：300人</span><span class="activeState stateBg1">正在报名</span></p>
                        <p>积分：10积分</p>
                        <p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
                        &lt;!&ndash; 活动状态 &ndash;&gt;
                    </div>
                </a>
            </div>-->
            <!-- 一个活动结束 -->
        </div>
        <!-- 分页开始 -->
        <div class="pages clearfix visible-lg">
            <?php echo ($page); ?>
        </div>
        <!-- 分页结束 -->
    </div>
    <!-- 左边活动列表结束 -->
    <!-- 右边热门活动回顾开始 -->
    <div class="col-lg-3 history visible-lg">
        <h2>热门活动推荐</h2>
        <ul class="historyList">
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
</div>
<!-- 活动结束 -->
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
<script type="text/javascript" src="/Public/home/js/dropload.min.js"></script>
<script type="text/javascript" src="/Public/home/js/activity.js"></script>
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
        $('.activeStyle a:first').addClass("activeStyleActive");

        var id = "<?php echo ($id); ?>";
        if (id) {
            $(".activeStyle").find('a').removeClass('activeStyleActive');
            $(".activeStyle").find('a').each(function () {
                if ($(this).attr("data-value") == id) {
                    $(this).addClass('activeStyleActive');
                }
            })
        }
    });

    $(".activeStyle").find('a').each(function () {
        $(this).on('click', function () {
            var typeId = $(this).attr('data-value');
            $("input[name='typeId']").val(typeId);
            $("#form1").submit();
        });
    });

    function subKeyWord() {
        $("input[name='typeId']").val($(".activeStyleActive").attr("data-value"));
        $("#form1").submit();
    }
</script>
</body>
</html>