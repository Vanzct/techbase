<?php
if(isset($_GET["action"])){
	if($_GET["action"]=="add"){
		require_once "class.db.brand.php";
		$brand_db=new BrandDB();
		$data["name"]=$_POST["name"];
	
		$brand_db->insertBrand($data);
		$r=$brand_db->selectBrandByName($data["name"]);
		$id=$r["id"];
		$path=getcwd()+"img/brand/"+$id;
		chdir("./img/brand");
		mkdir($id);
		chdir("./../..");
		$brand_db=null;
		echo "id:".$id;
	}else if($_GET["action"]=="update"){
		require_once "class.db.brand.php";
		$brand_db=new BrandDB();
		$name=$_POST["name"];
		$value=$_POST["value"];
		$para=$_POST["para"];
		$id=$_GET["id"];
		$brand_db->updateField($id,$para,$value);
		$brand_db=null;
		echo "SUCCESS";
	}else if($_GET["action"]=="update_img"){
		$name=$_GET["png"];
		$id=$_GET["id"];
		rename("img/brand/".$name,"img/brand/".$id."/logo.png");
		echo "SUCCESS";
	}else if($_GET["action"]=="add_pro_article"){
		$id=$_GET["id"];
		require_once "class.db.brand.php";
		$brand_db=new BrandDB();
		$img=$_POST["img"];
		$p=$_POST["p"];
		$brand_db->insertArticle($id,$p,$img,"pro");
		$brand_db=null;
		//rename("img/brand/".$name,"img/brand/".$id."/logo.png");
		echo "SUCCESS";
	}
	else if($_GET["action"]=="cancel_recommend"){
		#取消推荐
		require_once "class.db.brand.php";
		$id=$_GET["id"];
		$brand_db=new BrandDB();
		if($brand_db->updateRecommend($id,0))
			echo "SUCCESS";
		else echo "FAILURE";
	}else if($_GET["action"]=="set_recommend"){
		#取消推荐
		require_once "class.db.brand.php";
		$id=$_GET["id"];
		$brand_db=new BrandDB();
		if($brand_db->updateRecommend($id,1))
			echo "SUCCESS";
		else echo "FAILURE";
	}
	else if($_GET["action"]=="cancel_delete"){
		#取消推荐
		require_once "class.db.brand.php";
		$id=$_GET["id"];
		$brand_db=new BrandDB();
		if($brand_db->updateDeleted($id,0))
			echo "SUCCESS";
		else echo "FAILURE";
	}else if($_GET["action"]=="delete"){
		#取消推荐
		require_once "class.db.brand.php";
		$id=$_GET["id"];
		$brand_db=new BrandDB();
		if($brand_db->updateDeleted($id,1))
			echo "SUCCESS";
		else echo "FAILURE";
	}
	
}
?>
