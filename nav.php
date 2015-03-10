<?php 
class Nav{ 
	public function show($current){ 
?>
<nav class="navbar">

	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">TECHBASE</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><img src="img/logo000.png" class="img-responsive" alt="logo"></a>
	</div><!-- navbar-header-->
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="pages-div">
		<ul class="nav navbar-nav">
	        <li <?php if($current=="index") echo "class='active'" ?>><a href="index.php">她首页<span class="sr-only">(current)</span></a></li>  
	      	<li <?php if($current=="brand") echo "class='active'" ?>><a href="brandshome.php">她品牌</a></li>
	      	<!--li><a href="http://localhost/wordpress/">她资讯</a></li-->
	      	<li <?php if($current=="home") echo "class='active'" ?>><a href="home.php">她本营</a></li>
	      	<li class="phone-hide  <?php if($current=="media") echo "active" ?>"><a href="media.php">她资讯</a></li>
	      	<li class="phone-hide  <?php if($current=="community") echo "active" ?>"><a href="community.php">她社区</a></li>
	      	<li class="phone-hide lianxiwe"><a href="#">联系我们</a></li>
      	</ul>
	</div>
	
</nav>

<?php } }?> 