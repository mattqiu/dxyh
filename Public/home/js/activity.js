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
	var page = 1;
	// 每页展示5个
	var size = 5;
	var url = 'http://www.daychina.net/Home/Activity/detail?id=';

	// dropload
	$('.activeListWrap').dropload({
		scrollArea: window,
		autoLoad:false,//设置自动加载
		loadDownFn: function(me) {
			page++;
			// 拼接HTML
			var result = '';
            var typeId = $(".activeStyleActive").attr("data-value");
            var keyword = $("input[name='keyword']").val();
			$.ajax({
				type: 'GET',
				url: 'http://www.daychina.net/Home/Activity/activityJsonData',
				dataType: 'json',
                data: {'p':page,'typeId':typeId,'keyword':keyword},
				success: function(json) {
					var arrLen = json.data;
					console.log(arrLen);
					if (json.code == 0) {
						var rows = [];
						$.each(arrLen, function (key, item) {
							rows[key] = '<div class="activeList clearfix">';
							rows[key] += '<a href="'+url+item.id+'"><div class="col-xs-4 col-lg-3">';
							rows[key] += '<img src="'+item.activity_cover+'"alt=""></div>';
							rows[key] += '<div class="col-xs-8 col-lg-9 activeListR">';
							rows[key] += '<h1>'+item.activity_name+'</h1>';
							rows[key] += '<p>时间：'+ item.activity_start_time + '-' + item.activity_end_time;
							rows[key] += '<span class="number">人数限制：'+item.activity_number+'</span>';
							rows[key] += item.status+'</p>';
							rows[key] += '<p>积分：'+item.activity_integral+'积分</p>';
							rows[key] += '<p class="visible-lg">地点：'+item.address+'</p></div></a></div>';
						});
						rows = rows.join('');
						// 如果没有数据
					} else {
						// 锁定
						me.lock();
						// 无数据
						me.noData();
					}
					console.log(rows);

					// 为了测试，延迟1秒加载
					setTimeout(function() {
						// 插入数据到页面，放到最后面
						$('.activeListBox').append(rows);
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