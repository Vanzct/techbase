<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>她品牌编辑</title>
	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">

	<link rel="stylesheet/less" href="less/brand_edit.less" type="text/css"/>
	<link rel="stylesheet" href="jquery.imgareaselect-0.9.10/css/imgareaselect-default.css" />
  	<script src="js/jquery-2.1.0.min.js"></script>
  	<script src="js/jquery.form.min.js"></script>
  	<script src="jquery.imgareaselect-0.9.10/js/jquery.imgareaselect.pack.js"></script>
	<script src="js/less.js"></script>
</head>
<body>
<div class="container" id="main-container">
	
	<div id="result">
		<p>HEHE</p>
		<a href="#" id="close-result"><span class="glyphicon glyphicon-remove"></span></a>
	</div>
	<div class="row title-row">
	<form id="add-form" action="ajax.brand.php?action=add" method="post"><fieldset>
		<input type="text" class="text" id="add-brand-name" placeholder="品牌名" name="brandname" value=""  size="45" maxlength="45" />
		<button type="button" class="btn btn-default add-brand-btn">添加品牌</button>
	</filedset></form>
	</div>
	<section id="main-section" class="row">
	<div class='all-brands'>
		<table class='table linetable'>
		<thead>
			<tr>
				<td>ID</td>
				<td>品牌</td>
				<td>领域</td>
				<td>简介</td>
				<td>推荐</td>
				<td>隐藏</td>
				<td>修改</td>
				<td>详情</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			require_once "config.php";
			require_once "class.db.brand.php";
			$brand_db=new BrandDB();
			$brands=$brand_db->selectEditBrands();
			foreach($brands as $brand){
				echo "<tr>";
				echo "<td >{$brand['id']}</td>";
				echo "<td width='15%;'>{$brand['name']}</td>";
				echo "<td width='15%;'>{$brand['industry']}</td>";
				echo "<td width='30%;'>{$brand['introduction']}</td>";
				if($brand["recommend"]=="1")
					echo "<td><a href='#' class='recommend' data-id='{$brand['id']}'>取消推荐</a></td>";
				else
					echo "<td><a href='#' class='recommend' data-id='{$brand['id']}'>推荐</a></td>";
				if($brand["deleted"]=="1")
					echo "<td><a href='#' class='deleted' data-id='{$brand['id']}'>取消隐藏</a></td>";
				else
					echo "<td><a href='#' class='deleted' data-id='{$brand['id']}'>隐藏</a></td>";
				echo "<td><a href='brand_preview.php?id={$brand["id"]}'>修改</a></td>";
				echo "<td><a href='#'>查看详情</a></td>";
				
				echo "</tr>";
			}
		?>
		</tbody>
		</table>
	</div>
	</section>
</div>
<script type="text/javascript">
;$(function () {  
	$(".add-brand-btn").click(function(){
		$name=$("#add-brand-name").val();
		var url="ajax.brand.php?action=add" ;
		$.post(url ,{name:$name}, function(data) {
			if(data.indexOf("id")==0){
				location.href="brand_preview.php?id="+data.split(":")[1];
			}
		});
	});
	$(".recommend").click(function(){
		/*
		 *点击推荐或者取消推荐
		 */
		var id=$(this).attr("data-id");
		if($(".recommend").text()=="取消推荐"){ 
			var url="ajax.brand.php?action=cancel_recommend&id="+id;
			$.post(url , function(data) {
				console.log(data);
				if(data=="SUCCESS"){ 
					console.log("cancle brand recommend id:"+id);
			   		$(".recommend").text("推荐").show();   
				}
		    });
		}else{
			var url="ajax.brand.php?action=set_recommend&id="+id;
			$.post(url , function(data) {
				if(data=="SUCCESS"){ 
					console.log("set brand recommend id:"+id);
			   		$(".recommend").text("取消推荐").show();   
				}
		    });
		}
	});
	$(".deleted").click(function(){
		/*
		 *点击删除和取消删除
		 */
		var id=$(this).attr("data-id");
		if($(".deleted").text()=="隐藏"){ 
			var url="ajax.brand.php?action=delete&id="+id;
			$.post(url , function(data) {
				if(data=="SUCCESS"){ 
			   		$(".deleted").text("取消隐藏").show();   
				}
		    });
		}else{
			var url="ajax.brand.php?action=cancel_delete&id="+id;
			$.post(url , function(data) {
				if(data=="SUCCESS"){ 
			   		$(".deleted").text("隐藏").show();   
				}
		    });
		}
	});
	
});
</script>

</body>	
</html>
