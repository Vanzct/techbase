<?php
require_once "class.DBConn.php";
class BrandDB extends DBConn{
	/**
	 * 查询所有设备状态
	 */
	public function selectBrands(){
		$conn=parent::getConn();
 		$sql="SELECT id,name,industry,introduction,recommend FROM brand WHERE deleted=0 ORDER BY rank;";
 		try{
 			$st=$conn->prepare($sql);
 			$st->execute();
 			$row=$st->fetchALL();
 		}catch(PDOException $e){
 			echo "selectBrands() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function selectEditBrands(){
		$conn=parent::getConn();
 		$sql="SELECT id,name,industry,introduction,recommend,deleted FROM brand ";
 		try{
 			$st=$conn->prepare($sql);
 			$st->execute();
 			$row=$st->fetchALL();
 		}catch(PDOException $e){
 			echo "selectBrands() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function selectRecommendBrands(){
		$conn=parent::getConn();
 		$sql="SELECT id,name,industry,introduction FROM brand WHERE recommend=1 and deleted=0;";
 		try{
 			$st=$conn->prepare($sql);
 			$st->execute();
 			$row=$st->fetchALL();
 		}catch(PDOException $e){
 			echo "selectBrands() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function selectArticles($brand_id,$type){
		$conn=parent::getConn();
 		$sql="SELECT id,p,img FROM article WHERE brand_id=:id and type=:type;";
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":id",$brand_id,PDO::PARAM_INT);
 			$st->bindValue(":type",$type,PDO::PARAM_STR);
 			$st->execute();
 			$row=$st->fetchALL();
 		}catch(PDOException $e){
 			echo "selectBrands() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function insertArticle($brand_id,$p,$img,$type){
 		$conn=parent::getConn();
 		$sql="insert into article (brand_id,p,img,type) values(:brand_id,:p,:img,:type) ";
 		
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":brand_id",$brand_id,PDO::PARAM_INT);
 			$st->bindValue(":p",$p,PDO::PARAM_STR);
 			$st->bindValue(":img",$img,PDO::PARAM_STR);
 			$st->bindValue(":type",$type,PDO::PARAM_STR);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "insertChannel() failed:".$e->getMessage();
 			return false;
 		}	
	} 
	public function selectExperience($brand_id){
		$conn=parent::getConn();
 		$sql="SELECT id,date00,content FROM experience WHERE brand_id=:id ;";
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":id",$brand_id,PDO::PARAM_INT);
 			$st->execute();
 			$row=$st->fetchALL();
 		}catch(PDOException $e){
 			echo "selectExperience() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function insertExperience($data){
 		$conn=parent::getConn();
 		$sql="insert into experience (brand_id,date,content) values(:brand_id,:date,:content) ";
 		
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":brand_id",$data["brand_id"],PDO::PARAM_INT);
 			$st->bindValue(":date",$data["date"],PDO::PARAM_STR);
 			$st->bindValue(":content",$data["content"],PDO::PARAM_STR);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "insertChannel() failed:".$e->getMessage();
 			return false;
 		}	
	} 
	public function selectMembers($brand_id){
		$conn=parent::getConn();
 		$sql="SELECT id,name,role,photo FROM member WHERE brand_id=:id ;";
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":id",$brand_id,PDO::PARAM_INT);
 			$st->execute();
 			$row=$st->fetchALL();
 		}catch(PDOException $e){
 			echo "selectBrands() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function insertMember($data){
 		$conn=parent::getConn();
 		$sql="insert into brand (name) values(:name) ";
 		
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":name",$data["name"],PDO::PARAM_STR);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "insertChannel() failed:".$e->getMessage();
 			return false;
 		}	
	} 
	public function selectBrandById($id){
		$conn=parent::getConn();
 		$sql="SELECT id,name,industry,scale,introduction,tags,region,recommend FROM brand WHERE id=$id;";
 		try{
 			$st=$conn->prepare($sql);
 			$st->execute();
 			$row=$st->fetch();
 		}catch(PDOException $e){
 			echo "selectBrands() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	public function selectBrandByName($name){
		$conn=parent::getConn();
 		$sql="SELECT id,name,industry,scale,introduction,tags,recommend FROM brand WHERE name='$name';";
 		try{
 			$st=$conn->prepare($sql);
 			$st->execute();
 			$row=$st->fetch();
 		}catch(PDOException $e){
 			echo "selectBrandByName() failed:".$e->getMessage();
 			return false;
 		}		
 		return $row;
	}
	/**
	 * 插入新的渠道
	 */
	public function insertBrand($data){
 		$conn=parent::getConn();
 		$sql="insert into brand (name) values(:name) ";
 		
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":name",$data["name"],PDO::PARAM_STR);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "insertChannel() failed:".$e->getMessage();
 			return false;
 		}	
	} 
	public function updateRecommend($id,$state){
		$conn=parent::getConn();

 		$sql="UPDATE brand Set recommend=:state where id=:id ";
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":id",$id,PDO::PARAM_INT);
 			$st->bindValue(":state",$state,PDO::PARAM_INT);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "updateRecommend():".$e->getMessage();
 			return false;
 		}			
	}
	public function updateField($id,$para,$value){
		$conn=parent::getConn();

 		$sql="UPDATE brand Set {$para}=:value where id=:id ";
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":id",$id,PDO::PARAM_INT);
 			$st->bindValue(":value",$value,PDO::PARAM_INT);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "updateDeleted():".$e->getMessage();
 			return false;
 		}			
	}
	public function updateDeleted($id,$state){
		$conn=parent::getConn();

 		$sql="UPDATE brand Set deleted=:state where id=:id ";
 		try{
 			$st=$conn->prepare($sql);
 			$st->bindValue(":id",$id,PDO::PARAM_INT);
 			$st->bindValue(":state",$state,PDO::PARAM_INT);
 			$st->execute();
 			return true;
 		}catch(PDOException $e){
 			echo "updateDeleted():".$e->getMessage();
 			return false;
 		}			
	}
	
}
	//$db=new BrandDB();
	//$da=array("name"=>"里面2","scale"=>"等待上市","logo"=>"limian2.png","info"=>"一家好吃的面馆","article"=>"palapalapala");
	//$db->insertBrand($da);
?>
