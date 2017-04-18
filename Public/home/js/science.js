/*
* @Author: Administrator
* @Date:   2017-04-13 23:59:59
* @Last Modified by:   Administrator
* @Last Modified time: 2017-04-14 00:06:35
*/


/*
 * @Author: Administrator
 * @Date:   2017-04-13 23:37:58
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-04-13 23:58:18
 */
function adjustF(){
			$(".figcaption").each(function(i) {
		var divH = $(this).height();
		var $p = $("p", $(this)).eq(0);
		while ($p.outerHeight() > divH) {
		$p.text($p.text().replace(/(\s)*([a-zA-Z0-9]+|\W)(\.\.\.)?$/, "..."));
		};
		})
		}
$(function() {
		// 摘要多行显示省略号
		adjustF();
		
	// 搜索框展示栏目分类
	$(".input").focus(function() {
		$(".activeStyle").show();
	})
	$(".input").blur(function() {
        $(".activeStyle").hide();
    })
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
    var url = 'http://www.dxyh.com/Home/Coptic/details?id=';
	var typeId = $(".activeStyleActive").attr("data-value");
	var keyword = $("input[name='keyword']").val();

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
				url: 'http://www.dxyh.com/Home/Coptic/copticJsonData',
                data: {'p':page,'typeId':typeId,'keyword':keyword},
				dataType: 'json',
				success: function(json) {
					var arrLen = json.data;
                    console.log(arrLen);
					if (json.code == 0) {
                        var rows = [];
                        $.each(arrLen, function (key, item) {
                            rows[key] = '<div class="activeList clearfix">';
                            rows[key] += '<a href="'+url+item.id+'"><div class="col-xs-4 col-lg-3">';
                            rows[key] += '<img src="'+item.coptic_cover+'"alt=""></div>';
                            rows[key] += '<div class="col-xs-8 col-lg-9 activeListR">';
                            rows[key] += '<h1>'+item.coptic_title+'</h1>';
                            rows[key] += '<p>作者：'+item.author+'&nbsp;&nbsp;&nbsp;&nbsp;'+item.create_time;
                            rows[key] += '<span class="author visible-lg">'+item.category_name+'</span></p>';
                            rows[key] += '<div class="figcaption"><p>'+item.abstract+'</p></div></div></a></div>';
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
						adjustF();
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