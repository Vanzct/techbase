<!DOCTYPE html>
<html lang="zh-CN">
  	<head>
  		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=2">
  	
    	<title>她首页</title>
    	<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css" id="style-resource-1">
    	<link rel="stylesheet" href="slidershow/css/normalize.css" />
		<link rel="stylesheet" href="slidershow/css/component.css" />
	
    	<link rel="stylesheet/less" href="less/index.less" type="text/css"/>
    	<script src="js/jquery-2.1.0.min.js"></script>
    	<script src="js/less.js"></script>
 
  	</head>
  	<body>
  	<div class="container">
  		
  		<?php 
  			$current="index"; 
  			require_once "header.php" ;
  			$header=new Header();
  			$header->show($current);
  		?>
    	<div class="row" id="banner">
			<?php require_once "banner.php" ;?>
		</div>
  		<!--div class="row" id="consult" >
			<div class="row" id="consult-rec">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class='img'><img class="img-responsive img-thumbnail" src="img/consult-rec/consult04.jpg"/></div>
					<div class="descr-h"><h4>���飺��չ�й��Ů�ԶԿƼ���չ��̬�ȸ�Ϊ��</h4></div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class='img'><img class="img-responsive img-thumbnail" src="img/consult-rec/consult05.jpg"/></div>
					<div><h4>ΪʲôŮ���ڸ߿Ƽ�������ϡȱ���</h4></div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class='img'><img class="img-responsive img-thumbnail" src="img/consult-rec/consult03.jpg"/></div>
					<div><h4>ӡ��Ψһ���⼮Ů��CEO���������߸��ɣ����������г������̻�</h4></div>
				</div>
			</div>
		</div--><!--END div class="row" id="consult-rec"-->
		<div class="brand-zone row">
			<p class="more-brand"><a href="brandshome.php">更多品牌>></a></p>
			<?php require_once "brandcard.php" ;?>
			<?php require_once "class.db.brand.php" ;?>
			<?php 
				$brand_db=new BrandDB();
				$brands = $brand_db->selectRecommendBrands();
				for($i=0;$i<6 && $i<count($brands);$i++){
					$brand=$brands[$i];
					echo "<div class='col-md-4 col-sm-4 brand-card-container'>";//$brand["introduction"]
					Brand::showBrandCard($brand["id"],$brand["name"],$brand["industry"],"{$brand["introduction"]}");
					echo "</div>";
				}
			?>
		</div>
	</div><!--END container-->
	<?php require_once "footer.php" ;?>	
	<script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>	
	<!--script src="slidershow/js/classie.js"></script-->
	<!--script src="slidershow/js/tiltSlider.js"></script-->
	<script>
	(function($){
		//$(".brand-info").hide();

		function Banner(){
			var current=0;
			var banner_items=$("#slideshow .slides li");
			var banner_nav_items=$("#slideshow .banner-nav span");
			$(banner_nav_items).each(function(index,item){
				//console.log(index);
				//console.log(item);
				$(this).click(function(){
					var lastItem=current;
					current=index;
					
					if($(this).hasClass("current")){
						console.log("I am current");
					}else{
						$(banner_nav_items[lastItem]).removeClass("current");
						$(banner_nav_items[current]).addClass("current");
						$(banner_items[lastItem]).removeClass("current").hide();
						$(banner_items[current ]).addClass("current").show();
					}
				});
				
			});
			function showItem(lastItem){
				$(banner_nav_items[lastItem]).removeClass("current");
				$(banner_nav_items[current]).addClass("current");
				$(banner_items[lastItem]).removeClass("current").hide();
				$(banner_items[current ]).addClass("current").show();
			}
			$("#slideshow .prev").click(function(){
				var itemsSize=banner_items.length;
				var lastItem=current;
				if(lastItem==0){
					current=itemsSize-1;
				}else{
					current=current-1;
				}
				
				showItem(lastItem);
			});
			$("#slideshow .next").click(function(){
				var itemsSize=banner_items.length;
				var lastItem=current;
				if(lastItem==itemsSize-1){
					current=0;
				}else{
					current++;
				}
				showItem(lastItem);
			});
			function swith(){
				var itemsSize=banner_items.length;
				var lastItem=current;
				if(lastItem==0){
					current=itemsSize-1;
				}else{
					current=current-1;
				}
				
				showItem(lastItem);
			}
		
		}
		banner = new Banner();
	
		//$(document).ready(function() {
        	//每隔3秒自动调用方法，实现图表的实时更新
        window.setInterval(function(){
        	$("#slideshow .next").click();
        },7000);         
    	//});
	})(jQuery);
	</script>
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
