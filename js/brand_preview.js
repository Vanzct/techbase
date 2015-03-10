
;$(function(){
	var id=$("#container").attr("data-id");
	$(".close-model").click(function(e){
		e.preventDefault();
		$("#edit-div").hide();
	});
	
	$("#close-result").click(function(e){
		e.preventDefault();
		$("#result").hide();
	});
	/*点击可编辑的文字*/
	$(".edit-text").click(function(e){
		e.preventDefault();
		var offset=$(this).offset();
		//数据库列名
		var para=$(this).attr("data-edit");
		//字段名
		var name=$(this).attr("data-name");
		//文本
		var text=$(this).text();
		console.log(para+"|"+name+"|"+text);
		$("#edit-text-label").text(name);
		$("#edit-text-value").val(text);
		$("#edit-text-para").val(para);
		$("#edit-article").hide();
		$("#edit-div").show();
	});	
	/*点击Logo*/
	$(".logo-img").click(function(e){
		e.preventDefault();
		
		$("#edit-div").show();
	})
	//添加品牌介绍
	$("#add-pro-article").click(function(e){
		e.preventDefault();
		$("#edit-text").hide();
		$("#edit-div").show();
	})
	$("#add-team-article").click(function(e){
		e.preventDefault();
		$(".edit").hide();
		$("#edit-member").show();
		$("#edit-div").show();
	});
	$("#submit-pro-article").click(function(){
		var url="ajax.brand.php?action=add_pro_article&id="+id;
		$img=$("#edit-article-img").val();
		$p=$("#edit-article-p").val();
		$.post(url ,{"img":$img,"p":$p}, function(data) {
			console.log(data);
			$("#edit-div").hide();
			
			if(data=="SUCCESS"){ 
		   		$('#result p').html("修改成功，请继续！");
	   			$('#result').show();
			}else{
				$('#result p').html("修改失败，请重试！");
	   			$('#result').show();
			}
			
	    });
	});
	$("#submit-member-article").click(function(){
		var url="ajax.brand.php?action=add_member_article&id="+id;
		$img=$("#edit-mem-img").val();
		$name=$("#edit-mem-name").val();
		$role=$("#edit-mem-role").val();
		$.post(url ,{"img":$img,"name":$name,"role":$role}, function(data) {
			console.log(data);
			$("#edit-div").hide();
			
			if(data=="SUCCESS"){ 
		   		$('#result p').html("修改成功，请继续！");
	   			$('#result').show();
			}else{
				$('#result p').html("修改失败，请重试！");
	   			$('#result').show();
			}
			
	    });
	});
	$("#submit-text").click(function(){
		//文字编辑
		var url="ajax.brand.php?action=update&id="+id;
		var $name=$("#edit-text-label").text();
		var $value=$("#edit-text-value").val();
		var $para=$("#edit-text-para").val();
		$.post(url ,{"name":$name,"value":$value,"para":$para}, function(data) {
			console.log(data);
			$("#edit-div").hide();
			$(".edit-text").each(function(){
				console.log($(this).attr("data-edit")+"|"+$para);
				if($(this).attr("data-edit")==$para){
					$(this).text($value);
				}
			});
			if(data=="SUCCESS"){ 
		   		$('#result p').html("修改成功，请继续！");
	   			$('#result').show();
			}else{
				$('#result p').html("修改失败，请重试！");
	   			$('#result').show();
			}
			
	    });
	});
	

	$("#submit-logo").click(function(e){
		e.preventDefault();
		$png=$("#upfile").val();
		console.log($png);
		var url="ajax.brand.php?action=update_article&id="+id;
		$.get(url ,{"png":$png}, function(data) {
			
			$("#edit-img-div").hide();
			if(data=="SUCCESS"){ 
		   		$('#result p').html("修改LOGO成功，请继续！");
	   			$('#result').show();
	   			$(".logo-img img").attr("src","img/brand/"+id+"/logo.png");
			}else{
				$('#result p').html("修改LOGO成功，请重试！");
	   			$('#result').show();
			}
		});
	});
	$("#upfile").change(function(){ 
        $("#upload-form").ajaxSubmit({ 
            dataType:  'json', //数据格式为json 
            beforeSend: function() { //开始上传 
                $("#pic-preview").hide();
                $("#upload-state p").text("上传中...").show();
            }, 
            uploadProgress: function(event, position, total, percentComplete) { 
             	
            }, 
            success: function(data) { //成功 
            	$(".img").val(data.path);
            	$("#upload-state p").hide();
                $("#pic-path").text(data.path);
            	$("#pic-info").text("宽"+data.width+"*高"+data.height+"*大小"+data.size);
                $("#pic-preview img").attr("src",data.path); 
                $("#pic-preview").show();
            }, 
            error:function(xhr){ //上传失败 
            	$("#pic-preview").hide();
            	$("#upload-state p").text(xhr.responseText).show();
            } 
        }); 
	}); 
});