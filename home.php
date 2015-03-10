<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
  		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=1, user-scalable=no">
  	
    	<title>她本营</title>
    	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css" id="style-resource-1">
    
    	<link rel="stylesheet/less" href="less/home.less" type="text/css"/>
    	<script src="js/jquery-2.1.0.min.js"></script>
    	<script src="js/less.js"></script>
 
  	</head>
  	<body>
  	<div class="container">
  		<?php 
  			$current="home"; 
  			require_once "header.php" ;
  			$header=new Header();
  			$header->show($current);
  		?>
  		<!--section class="row sec" id="tabenying">
  			<h2>她本营</h2>
  			<p>为女性科技创业者服务的互联网平台</p>
  		</section-->
    	<section class="row sec" id="sec01">
    		<div class="col-md-6 col-xs-12 img-side">
    			<img src="img/brand/1.png" class="img-responsive">
    		</div>
    		<div class="col-md-6 col-xs-12 text-side">
    			<h3>她本营</h3>
    			<h5>打造属于女性科技创业群体自己的大本营</h5>
    			<p>以零星之火，造燎原之势；以女性之姿，搏时代之巅。正是受到女性创业者们不甘沉默、满腔热情、坚韧不屈的创业故事的感染，
    			秉承“大胆想，勇敢做”的理念，我们萌生了创建女性科技互联网社区和孵化平台的想法——这便是TechBase她本营诞生的原因。
    			</p>
    		</div>
  
    	</section>
  		<section class="row sec" id="sec02">
  			<div class="col-md-6 col-xs-12 img-side">
    			<img src="img/brand/2.png" class="img-responsive">
    		</div>
    		<div class="col-md-6 col-xs-12 text-side">
    			<h3>为什么我们这么做</h3>
    			<h5>来自女性在时代与科技领域进步的发声</h5>
    			<dl>
					<dt>趋势</dt>
					<dd>越来越多的女性参与到科技行业</dd>
					<dt>价值</dt>
					<dd>解决女性创业中的真实问题</dd>
					<dt>情怀</dt>
					<dd>通过专业平台打破性别壁垒</dd>
				</dl>
    		</div>
    	</section>
    	<section class="row sec" id="sec03">
  			<div class="col-md-6 col-xs-12 img-side">
    			<img src="img/brand/3.png" class="img-responsive">
    		</div>
    		<div class="col-md-6 col-xs-12 text-side">
    			<h3>我们可以做什么</h3>
    			<h5>只专注于一件事情，帮助女性创业者</h5>
    			<ul>
					<li>创业项目展示</li>
					<li>品牌服务推广</li>
					<li>产品原型测试与客户意见收集</li>
					<li>合作伙伴招募与人员招聘</li>
					<li>投融资对接服务</li>
					<li>财务法律咨询</li>
					<li>线下培训与社交活动</li>
				</ul>
    		</div>
    	</section>
    	<section class="row sec" id="sec04">	
    		<div class="col-md-12 col-xs-12 img-side">
    			<img src="img/brand/4.png" class="img-responsive">
    		</div>
    		<div class="col-md-12 col-xs-12 text-side">
    			<h3><a target="_blank" href="herstartup.php">5月，一场女性创意的角逐</a></h3>
    			<p>TechBase她本营将携手Lean In Beijing及科技互联网行业内多家知名投资孵化机构和媒体，
    				共同打造首个世界级的女性科技互联网创业大赛Her Startup，为女性创业者提供展示创意与实力的舞台</p>
    		</div>
    	</section>
	</div><!--END container-->
	<?php require_once "footer.php" ;?>	
	<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>	
	<script type="text/javascript">
	;$(function () {  
		
	});
	</script>
</html>
<?php

?>
