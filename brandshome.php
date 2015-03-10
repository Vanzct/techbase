<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=0.9,maximum-scale=2">

	<title>她品牌</title>
	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css" id="style-resource-1">

	<link rel="stylesheet/less" href="less/brandshome.less" type="text/css"/>
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/less.js"></script>
</head>
  	<body>
    	<div class="container" id="go">
    		<?php 
  				$current="brand"; 
  				require_once "header.php" ;
  				$header=new Header();
  				$header->show($current);
  			?>
    		<div class="row" id="xuangao">
    			<h3>为每一个创业团队提供品牌展示窗口，用户体验的中心，测试市场评价反馈的平台</h3>
    			<!--h4>欢迎 <strong>核心团队有女性成员</strong> 或 <strong>针对女性用户群体</strong> 的创业团队进驻她品牌！</h4-->
    		</div>
  			<div class="brand-zone row">
  				<?php require_once "brandcard.php" ;?>
  				<?php require_once "class.db.brand.php" ;?>
  				<?php 
  					$brand_db=new BrandDB();
  					$brands = $brand_db->selectBrands();
  					foreach($brands as $brand){
  						echo "<div class='col-md-4 col-sm-3 brand-card-container'>";
  						Brand::showBrandCard($brand["id"],$brand["name"],$brand["industry"],$brand["introduction"]);
  						echo "</div>";
  						
  					}
  				?>
			</div><!--END div class="row" id="consult-rec"-->
		<!--show over layout-->
		
	</div>	
	<?php require_once "footer.php" ;?>
	<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>	
	<!--script src="js/slideshow.js"></script-->
	<!--script src="js/brand.js"></script-->
  	</body>	
</html>
<?php
/*
 * Created on 2015-2-9
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
