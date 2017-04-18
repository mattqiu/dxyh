/*
 * @Author: Administrator
 * @Date:   2017-04-13 23:37:58
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-04-18 14:54:15
 */
$(function() {
	var clientWidth = document.documentElement && document.documentElement.clientWidth || document.body.clientWidth || window.innerWidth;
	var n = 3; //轮播图显示个数
	if (clientWidth < 1200) {	
	// 搜索框展示栏目分类
	$(".styleBtn").click(function(){
		$(".activeStyle").toggle();
	})
	// 点击分类标签后，隐藏分类栏
	$(".activeStyleR a").click(function(){
		$(".activeStyle").hide();
	})
}
})

//1. 下拉刷新功能开始
$(function() {
	var clientWidth = document.documentElement && document.documentElement.clientWidth || document.body.clientWidth || window.innerWidth;
	var n = 3; //轮播图显示个数
	if (clientWidth < 1200) {	
		 //小屏幕小，显示一个轮播页
	// 页数
	var page = 0;
	// 每页展示5个
	var size = 5;

	// dropload
	$('.activeListWrap').dropload({
		scrollArea: window,
		autoLoad:false,//设置自动加载
		loadDownFn: function(me) {
			page++;
			// 拼接HTML
			var result = '';
			$.ajax({
				type: 'GET',
				url: 'http://ons.me/tools/dropload/json.php?page=' + page + '&size=' + size,
				dataType: 'json',
				success: function(data) {
					var arrLen = data.length;
					if (arrLen > 0) {
						for (var i = 0; i < arrLen; i++) {
							result += '<!-- 一个活动开始 --><div class="activeList clearfix"><a href="activityDetail.html"><div class="col-xs-4 col-lg-3"><img src="../img/img1.png"alt=""></div><div class="col-xs-8 col-lg-9 activeListR"><h1>新加载的</h1><p>时间：2017-03-10&nbsp;&nbsp;10:30<span class="number">人数限制：300人</span><span class="activeState stateBg1">正在报名</span></p><p>积分：10积分</p><p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p><!-- 活动状态 --></div></a></div><!-- 一个活动结束 --> ';
						}
						// 如果没有数据
					} else {
						// 锁定
						me.lock();
						// 无数据
						me.noData();
					}
					// 为了测试，延迟1秒加载
					setTimeout(function() {
						// 插入数据到页面，放到最后面
						$('.activeListBox').append(result);
						// 每次数据插入，必须重置
						me.resetload();
					}, 1000);
				},
				error: function(xhr, type) {
					alert('Ajax error!');
					// 即使加载出错，也得重置
					me.resetload();
				}
			});
		}
	});
}
});
// 下拉刷新功能结束