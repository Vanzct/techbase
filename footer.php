<div id="footer_0" class="container" style="margin-top:20px;">
</div>
<div class="row" id="footer">
	<div class="col-md-1 col-sm-1 row"></div>
	<div class="col-md-10 col-sm-10">
		<div class="row phone-hide">
			<div class="col-md-4 col-sm-12">
				<p class="qr"><img class="img-responsive" src="img/weixin-qr.png"></p>
				<p class="wx">微信公众号：TechBase她本营</p>
			</div>
			<div class="col-md-5 col-sm-12">
				<h4>公司信息</h4>
				<p>公司：她本营网络科技有限公司</p>
				<p>地址：北京市朝阳区方恒国际中心D座2317室</p>
				<p>邮件：techbase@tabenying.com</p>
			</div>
			<div class="col-md-3 col-sm-12">
				<h4>友情链接</h4>
				<p><a href="http://leanin.org">Lean In</a></p>
				<p><a href="http://www.sycapital.cn">松源资本</a></p>
				<p><a href="http://www.36kr.com/">36Kr</a></p>
				<p><a href="http://itjuzi.com/">IT桔子</a></p>
			</div>
		</div>
		<div class="row copyright-div">
			<p class="copyright">
			Copyright ©  TechBase. All Rights Reserved.<br>她本营TechBase 版权所有
			</p>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	// 页脚自适应沉底，页眉自适应浮动
	$(function(){
		$(window).resize(function(){
			// 页脚
			var _footer_0 = $('#footer_0')
				,_footer = $('#footer');
			
			_footer.addClass('fixfooter');
			if(_footer_0.offset().top > _footer.offset().top){
				_footer.removeClass('fixfooter');
			}
			// 幻灯
			var _slide = $('#slideshow')
				,_width = _slide.width();
			_slide.find('.slides').css('width',function(){
				return $(this).find('li').css('width',_width).length * _width;
			});
			$("#slideshow .next").click();

		}).scroll(function(){
			if($(document).scrollTop() > 50){
				$('#header').parent().addClass('header_shadow');
			}else{
				$('#header').parent().removeClass('header_shadow');
			}
		}).resize();
	});	
</script>