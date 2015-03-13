<?php 
class Header{ 
	public function show($current){ 
?>
<header style="position: fixed;z-index: 1000;top: 0;left: 0;right: 0;">
	<div class="row" id="header">
		<div class="title-bar pc-hide">
			<h3><span class="title">
				<?php 
					if($current=="index"){
						echo "她首页";
					}else if($current=="home"){
						echo "她本营";
					}else echo "她品牌";
				?>
			</span>
			<a class="communicate"><span class="glyphicon glyphicon-qrcode"></span></a></h3>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<?php require_once "nav.php" ;
				$nav =new Nav();
				$nav->show($current);
			?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="cxxx">
			<a href="#" id="close-cxxx"><span class="glyphicon glyphicon-remove"></span></a>
			<img class="img-responsive" src="img/weixin-qr.png">
			<div class="co-card">
				<p>扫描二维码关注我们</p>
				<p>微信公众号  TechBase她本营</p>
			</div>
			<div class="co-card">
				<p>邮件发送 techbase@tabenying.com</p>
			</div>
			</div>
		</div>
	</div>
</header>
<script type="text/javascript">
$(function () {  
  	$(".lianxiwe").hover(function(){
  		$(this).children("a").css("border-bottom","none");
  		$(this).css("border-bottom","2px solid #cd0000");
	  	$(".cxxx").show();
  	},function(){
  		$(this).css("border-bottom","none");
	  	$(".cxxx").hide();
  	});
  	$(".communicate").click(function(){ 
	  	$(".cxxx").toggle(function(){
	  		$(".communicate").css("color","#cd0000");
	  	},function(){
	  		$(".communicate").css("color","#cc6600");
	  	});
  	});
  	$("#close-cxxx").click(function(){
  		$(".cxxx").hide();
  		
  	});
  	
});

</script>
<?php }}?>