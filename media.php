<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
  		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=1, user-scalable=no">
  	
    	<title>她本营</title>
    	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css" id="style-resource-1">
    	
    	<link rel="stylesheet/less" href="less/home.less" type="text/css"/>
    	<style>
    		#sec01{
    			text-align:center;
    			min-height:400px;
    		}
    		#sec01 h3{
    			font-size:300%;
    		}
    	</style>
    	<script src="js/jquery-2.1.0.min.js"></script>
    	<script src="js/less.js"></script>
 
  	</head>
  	<body>
  	<div class="container">
  		<?php 
  			$current="media"; 
  			require_once "header.php" ;
  			$header=new Header();
  			$header->show($current);
  		?>
  		<!--section class="row sec" id="tabenying">
  			<h2>她本营</h2>
  			<p>为女性科技创业者服务的互联网平台</p>
  		</section-->
    	<section class="row sec" id="sec01">
    		<h3>即将上线</h3>
    	</section>
  		
	</div><!--END container-->
	<?php require_once "footer.php" ;?>	
	<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>	
	<script type="text/javascript">
	;$(function () {  
		
	});
	</script>
</html>

