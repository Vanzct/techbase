<div class="col-md-4" >
		<div id="upload-pic">
			<form action="ajax.uploadpic.php" enctype="multipart/form-data" method="post" name="upload-form" id="upload-form">
  			<legend>上传文件:</legend>
  			<input name="upfile" id="upfile" type="file">
  			<!--input type="submit" id="submit-upload" value="上传"-->
			</form>
			<div id="upload-success">
				<div id="upload-state"><p>上传并且修改图片</p></div>
				<p id="pic-path"></p>
				<p id="pic-info"></p>
				<div id="pic-preview" >
					<a href="#" id="delete-pic"><span class="glyphicon glyphicon-trash"></span></a>
					<a href="#" id="modify-pic"><span class="glyphicon glyphicon-pencil"></span></a>
					<img class="img-responsive" src="">
				</div>
			</div>
		</div>
		</div>

<script type="text/javascript">
$(function () {  
	
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
</script>

