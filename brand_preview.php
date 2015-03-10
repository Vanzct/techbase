<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
  		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=1">
  	
    	<title>她品牌编辑页</title>
    	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">

    	<link rel="stylesheet/less" href="less/brand_preview.less" type="text/css"/>
    	<script src="js/jquery-2.1.0.min.js"></script>
    	<script src="js/jquery.form.min.js"></script>
    	<script src="js/less.js"></script>
  	</head>
  	<body>
  	<div class="container" id="container" data-id="<?php echo $_GET["id"];?>">
  		<div id="result">
			<p>HEHE</p>
			<a href="#" id="close-result"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
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
					Brand::showBrandCard($brand["id"],$brand["name"],$brand["industry"],$brand["introduction"]);
					if(isset($scale))
						echo "<p class='scale'>{$scale}</p>"
				?>
				</div>
			</aside>
			<article class="col-md-8 col-xs-12">
				<div class="row sec" id="product">
					<h3 class="title-h3">产品介绍</h3>
					<a href="#" class="article-plus" id="add-pro-article"><span class="glyphicon glyphicon-plus"></span></a>
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
				<div class="row sec" id="team">
					<h3 class="title-h3">团队介绍</h3>
					<a href="#" class="article-plus" id="add-team-article"><span class="glyphicon glyphicon-plus"></span></a>
					<?php 
						$ms= $brand_db->selectMembers($id);
						foreach($ms as $m){
							echo "<div class='col-md-3 member-article'>";
							if(isset($m["photo"]))
								echo "<div class='photo'><img class='img-responsive img-round' src='img/brand/{$m["photo"]}'></div>";
							else
								echo "<div class='photo'><img class='img-responsive img-circle'src='img/brand/bianshenchu.jpg'></div>";
							echo "<p>{$m["name"]}</p>";
							echo "<p>{$m["role"]}</p>";
							echo "</div>";
							
						}
					?>
				</div>
				<div class="row sec" id="licheng">
					<h3 class="title-h3">发展历程</h3>
					<a href="#" class="article-plus" id="add-licheng-article"><span class="glyphicon glyphicon-plus"></span></a>
					<dl>
						<dt>2014-15-01</dt>
							<dd>A轮上市</dd>
						<dt>2014-13-05</dt>
							<dd>B轮上线</dd>
					</dl>
				</div>
				<div class="row sec" id="other">
					<h3 class="title-h3">其他信息</h3>
					<a href="#" class="article-plus" id="add-other-article"><span class="glyphicon glyphicon-plus"></span></a>
					<p>我们要找像凌总一样比格高，Angela一样疯狂的合伙人</p>
				</div>
			</article>
		</section>
	</div><!--END container-->
	<!--编辑文字的框框-->

	<div id="edit-div" class="row">
		<a class="close-model" href="#"><span class="glyphicon glyphicon-remove"></span></a>
		<div id="upload-pic" class="col-md-7">
			<form action="ajax.uploadpic.php" enctype="multipart/form-data" method="post" name="upload-form" id="upload-form">
  			<input name="upfile" id="upfile" type="file">
			</form>
			<div id="upload-success">
				<div id="upload-state"><p>上传并且修改图片</p></div>
				<p id="pic-path"></p>
				<p id="pic-info"></p>
				<div id="pic-preview" >
					<!--a href="#" id="delete-pic"><span class="glyphicon glyphicon-trash"></span></a>
					<a href="#" id="modify-pic"><span class="glyphicon glyphicon-pencil"></span></a-->
					<img class="img-responsive" src="img/brand/6.jpg">
				</div>
			</div>
		</div>

		<div class="col-md-5" >
			<div class="row edit" id="edit-text">
				<label id="edit-text-label" for="add-brand-name">DEMO</label>
				<input type="hidden" id="edit-text-para" name="name" value="DEMO" />
				<textarea id="edit-text-value" rows="3" cols="50" wrap="off" />DMEO</textarea>
				<button type="button" class="btn btn-default" id="submit-text">保存修改</button>
			</div>
			<div class="row edit" id="edit-article">
				<h4 id="edit-info" data-type="pro">添加品牌</h4>
				<input type="text" class="img" id="edit-article-img" name="img" value="DEMO" size="45" maxlength="90" />
				<textarea name="name" id="edit-article-p" rows="10" cols="50" wrap="off">文本内容</textarea>
				<button type="button" class="btn btn-default" id="submit-pro-article">上传</button>
			</div>
			<div class="row edit" id="edit-member">
				<h4 id="edit-info" data-type="pro">添加成员</h4>
				<label>图片</label>
				<input type="text" class="img" id="edit-mem-img" name="img" value="DEMO" size="45" maxlength="90" />
				<label>名字</label>
				<input type="text" class="text" id="edit-mem-name" name="img" value="DEMO" size="45" maxlength="90" />
				<label>角色</label>
				<input type="text" class="text" id="edit-mem-role" name="img" value="DEMO" size="45" maxlength="90" />
				<button type="button" class="btn btn-default" id="submit-member-article">上传</button>
			</div>
		</div>
	</div>
	<?php require_once "footer.php" ;?>	
	<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>	
	<script src="js/brand_preview.js"></script>
</html>
<?php

?>
