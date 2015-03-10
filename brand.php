<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
  		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=1">
  	
    	<title>她品牌</title>
    	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
    	<link rel="stylesheet/less" href="less/brand.less" type="text/css"/>
    	<script src="js/jquery-2.1.0.min.js"></script>
    	<script src="js/less.js"></script>
 
  	</head>
  	<body>
  	<div class="container">
  		<?php 
  			$current="brand"; 
  			require_once "header.php" ;
  			$header=new Header();
  			$header->show($current);
  		?>
    
  		<section class="brand-section row">
			<aside class="col-md-4 col-xs-12">
				<div  id="brand-banner">
				<?php require_once "brandcard.php" ;?>
				<?php require_once "class.db.brand.php" ;?>
				<?php 
					$id=$_GET["id"];
					$brand_db=new BrandDB();
					$brand = $brand_db->selectBrandById($id);
					$scale=$brand["scale"];
					$tags=$brand["tags"];
					$region=$brand["region"];
					//Brand::showBrandCard($brand["id"],$brand["name"],$brand["industry"],$brand["introduction"]);
					echo "<div class='brand-card'> " ; 
					echo "	<div class='logo-img'>";						
  					echo " 		<a href='brand.php?id={$id}'><img src='img/brand/{$id}/logo.png' class='img-circle img-responsive' alt='图片呢'> </a>" ;
  					echo "  </div>";				
  					echo "  <div class='brand-footer'> ";
  					echo "  	<h4 class='brand-name'><a href='brand.php?id={$id}' class='edit-text'>{$brand['name']}</a></h4> ";
  					echo " 		<h5 class='brand-financ'>{$brand["industry"]}</h5> ";
  					echo "<p >";
  					if(isset($scale))
						echo "{$brand['scale']}&nbsp;";
					if(isset($region))
						echo "{$region}";
					echo "</p>";
  					echo "  </div> " ;
  					echo "  <div class='row brand-info'> ";
  					echo "  	<p>{$brand["introduction"]}</p> " ; 
  					echo "  </div> ";	
  					echo "</div> ";
					
				?>
				</div>
			</aside>
			<article class="col-md-8 col-xs-12">
				<div class="row" id="product">
					<h3 class="title-h3">产品介绍</h3>
					<?php 
						$articles= $brand_db->selectArticles($id,"pro");
						foreach($articles as $article){
							echo "<div class='row product-article'>";
							echo "<div class='img'><img class='img-responsive' src='{$article["img"]}'></div>";
							echo "<p>{$article["p"]}</p>";
							echo "</div>";
							
						}
					?>
				</div>
				<div class="row" id="team">
					<h3 class="title-h3">团队介绍</h3>
					<?php 
						$ms= $brand_db->selectMembers($id);
						foreach($ms as $m){
							echo "<div class='col-md-3 member-article'>";
							if(isset($m["photo"]))
								echo "<div class='photo'><img class='img-responsive img-circle' src='img/brand/{$id}/{$m["photo"]}'></div>";
							else
								echo "<div class='photo'><img class='img-responsive img-circle'src='img/brand/where.png'></div>";
							echo "<p>{$m["name"]}</p>";
							echo "<p>{$m["role"]}</p>";
							echo "</div>";
							
						}
					?>
				</div>
				<div class="row" id="experiece">
					<dl>
					<?php 
						$es=$brand_db->selectExperience($id);
						if(count($es)>0)
							echo "<h3 class='title-h3'>发展历程</h3>";
						foreach($es as $e){
							echo "<dt>{$e["date00"]}</dt>";
							echo "<dd>{$e["content"]}</dd>";
						} 
					?>
					</dl>
				</div>
				<div class="row" id="other">
					<?php 
						$articles= $brand_db->selectArticles($id,"other");
						foreach($articles as $article){
							if(count($es)>0)
								echo "<h3 class='title-h3'>其他信息</h3>";
							echo "<div class='row product-article'>";
							
							echo "<div class='img'><img class='img-responsive' src='{$article["img"]}'></div>";
							echo "<p>{$article["p"]}</p>";
							echo "</div>";
						}
					?>
				</div>
			</article>
		</section>
	</div><!--END container-->
	<?php require_once "footer.php" ;?>	
	<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>	
</html>
<?php

?>
