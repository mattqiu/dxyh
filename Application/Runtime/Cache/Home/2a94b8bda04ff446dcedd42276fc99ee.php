<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>登录 - 达晓医护</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Public/admin/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/admin/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="/Public/admin/css/ace-fonts.css" />

    <!-- ace styles -->

    <link rel="stylesheet" href="/Public/admin/css/ace.min.css" />
    <link rel="stylesheet" href="/Public/admin/css/ace-rtl.min.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/Public/admin/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->
    <link rel="stylesheet" href="/Public/admin/think/think.css" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="/Public/admin/js/html5shiv.js"></script>
    <script src="/Public/admin/js/respond.min.js"></script>


    <![endif]-->
    <script type="text/javascript" src="/Public/admin/js/jquery-2.0.3.min.js"></script>

    <style type="text/css">
        body {
            background-image: url("/Public/admin/images/admin-login-bg.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        #login-box, #forgot-box, #signup-box {
            padding: 0;
        }

    </style>
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <a href="<?php echo U('Index/thirdPartyLogin');?>" ><button>qq登录</button></a>
            <a href="<?php echo ($weixin_url); ?>"><button>微信登录</button></a>
            <a href="<?php echo ($weibo_url); ?>"><button>微博登录</button></a>
        </div><!-- /.row -->
    </div>
    <div class="bshare-custom">
        <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
        <a title="分享到QQ空间" class="bshare-qzone"></a>
        <a title="分享到QQ好友" class="bshare-qqim"></a>
        <a title="分享到微信" class="bshare-weixin"></a>
        <a title="分享到LinkedIn" class="bshare-linkedin"></a>
        <!--<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>-->
    </div>

</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<!--<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>-->

<script type="text/javascript" src="/Public/admin/think/think.js"></script>
<!-- <![endif]-->

<!--[if IE]>

<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='/Public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#'+id).addClass('visible');
    }

</script>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
</body>
</html>