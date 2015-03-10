<?php
class Brand{
	static public function showBrandCard($id,$name,$industry,$info){
		echo "<div class='brand-card'> " ; 
		echo "	<div class='logo-img'>";						
  		echo " 		<a href='brand.php?id={$id}'><img src='img/brand/{$id}/logo.png' class='img-circle img-responsive' alt='图片呢'> </a>" ;
  		echo "  </div>";				
  		echo "  <div class='brand-footer'> ";
  		echo "  	<h4 class='brand-name'><a href='brand.php?id={$id}' class='edit-text' data-edit='name' data-name='品牌名'>{$name}</a></h4> ";
  		echo " 		<h5 class='brand-financ edit-text' data-edit='industry' data-name='行业'>$industry</h5> ";
  		echo "  </div> " ;
  		echo "  <div class='row brand-info'> ";
  		echo "  	<p>{$info}</p> " ; 
  		echo "  </div> ";	
  		echo "</div> ";
	} 
}
?>
