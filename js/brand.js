;(function($){
	
  		$(".open-brand").click(function(){
  			//����鿴�������ʾƷ������
  			var id=$(this).attr("date-brand-id");
  			var attr="date-brand-id="+id;
  			$(".brand-model").html($(".brand-show["+attr+"]").html());
  			//�ı�ͼƬ����ʾ
  			var length=$(".brand-card-container").length;
  			console.log(length);
  			$(".logos-imgs img").removeClass("img-rounded");
  			$(".prev").show();
  			$(".next").show();
  			if((length-id)<6){
  				$(".prev").hide();
  				var index=6;
  				for(var i=length;i>length-6;i--){
  					//console.log(".brand-card-container[date-brand-id="+i+"]");
  					var l=$(".brand-card-container[date-brand-id="+i+"] .logo-img").html();
  					$(".logos-imgs>div[date-brand-id="+index+"]").html(l);
  					if(i==id){
  						$(".logos-imgs>div[date-brand-id="+index+"] img").addClass("img-rounded");
  					}else
  						$(".logos-imgs>div[date-brand-id="+index+"] img").addClass("img-thumbnail");
  					index--;
  				}
  				
  			}else{
  				//���id����Ļ������Ͱ� id ��ͼƬ���ڵ�һ��
  				var index=1;
  				for(var i=id;i<id+6;i++){
  					var l=$(".brand-card-container[date-brand-id="+i+"] .logo-img").html();
  					$(".logos-imgs>div[date-brand-id="+index+"]").html(l);
  					if(i==id){
  						$(".logos-imgs>div[date-brand-id="+index+"] img").addClass("img-rounded");
  					}else
  						$(".logos-imgs>div[date-brand-id="+index+"] img").addClass("img-thumbnail");
  					index++;
  				}
  			}
  			//���ȿ��� �� id �� length ֮���ͼƬ�� С�� 6 �ʹӺ���ǰ ��������
  			
  			if(id==1)
  				$(".next").hide();
  			$("#over-layout").show();
  		});
  	
  		$(".prev").click(function(){
  			var length=$(".brand-card-container").length;
  			var last=$($(".logof")[5]).attr("date-brand-id");
  			if(last<length){
  				//ѭ��ǰ5�����
  				for(var i=0;i<5;i++){
  					$($(".logof")[i]).html($($(".logof")[i+1]).html());
  					$($(".logof")[i]).attr("date-brand-id",$($(".logof")[i+1]).attr("date-brand-id"));
  				}
  				//�������һ��
  				var next=parseInt(last)+1;
  				console.log(next);
  				var l=$(".brand-card-container[date-brand-id="+next+"] .logo-img").html();
  				console.log(l);
  				$($(".logof")[5]).html(l);
  				$($(".logof")[5]).attr("date-brand-id",next);
  				$(".next").show();
  			}else{
  				$(".prev").hide();
  			}
  		});
  		
  		$(".next").click(function(){
  			var length=$(".brand-card-container").length;
  			var first=$($(".logof")[0]).attr("date-brand-id");
  			if(first>1){
  				//ѭ��ǰ5�����
  				for(var i=6;i>1;i--){
  					$($(".logof")[i]).html($($(".logof")[i-1]).html());
  					$($(".logof")[i]).attr("date-brand-id",$($(".logof")[i-1]).attr("date-brand-id"));
  				}
  				//�������һ��
  				var next=parseInt(first)-1;
  				console.log(next);
  				var l=$(".brand-card-container[date-brand-id="+next+"] .logo-img").html();
  				console.log(l);
  				$($(".logof")[0]).html(l);
  				$($(".logof")[0]).attr("date-brand-id",next);
  				$(".prev").show();
  			}else{
  				$(".next").hide();
  			}
  		});
  		/***�ر�����ģ��***/
  		$("#close-model").click(function(){
  			$("#preview").hide();
  		});
  		
  		$(".navbar-nav li").removeClass("active");
		$(".navbar-nav a[href='brand.php']").parent().addClass("active");

	})(jQuery);