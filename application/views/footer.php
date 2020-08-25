<div id="flashdata">

</div>
</body>
</html>

<noscript>
    <style type="text/css">
        div 
        {
        	display:none;
        }
    </style>
    <h1 class="fontfam padding">
    You don't have javascript enabled. <br>To view this website enable javascript.
    </h1>
</noscript>
<script type="text/javascript">

$(document).ready(function(){
		var cnt=0;
		<?php 
		if(isset($members)){	
		 ?>
		 	cnt=<?php echo sizeof($members); ?>;	 
		<?php  }
		else{
			?>  cnt=2;
			
		<?php }
		?>
		
	var cls="#flashdata";
	for (var i = (cnt+1) ;i <=10; i++) {
		var temp='#member'+i;
		$(temp).hide();
	}
	$("#add_member").click(function(e){
		e.preventDefault();
		if(cnt==10){
			var data='<div class="alert alert-danger"><h3>No more than 10 members can attend a meeting.</h3></div>';
			$("#flashdata").fadeIn(100);
			$("#flashdata").html(data);
			$("#flashdata").fadeOut(5000);
		}
		else{
			cnt++;
			for(var i=1; i<=10;i++){
				if($("#member"+i).is(":hidden")){

					$("#member"+i).show();
					break;
				}
			}
		}
		
	});
	$(".remove_member").click(function(e){	
		e.preventDefault();
		$(this).parent('div').hide();	
		cnt--;
		
	});
	$('.create_event').click(function(e){
		
		e.preventDefault();
		
		var title=$("#title").val();
		var temp=title.replace(/\s/g, "");
		var type=$(this).data('type');
		var iid=0;
		if(type==1){
			iid=$(this).data('iid');
		}
		if(temp.length <3){
			$(cls).fadeIn(100);
			
			$(cls).html('<div class="alert alert-danger"><h2>Enter at least 3 characters in title</h2></div>');
			$(cls).fadeOut(5000);
			
		}

		else{
			var arr=[];
			for (var i = 1; i <= 10; i++) {
				if($("#mem"+i).is(":visible"))
				arr.push($("#mem"+i).val());
			}
			arr= Array.from(new Set(arr));
			var tot=arr.length;
			if(tot>=2){

				var sd=$("#start_date").val();
				var st=$("#start_time").val();
				var ed=$("#end_date").val();
				var et=$("#end_time").val();
				$.ajax({
					url : "<?php echo site_url('home/new') ?>",
					method : "POST",
					data : { title:title ,  members:arr , tot:tot , sd: sd, ed:ed,st:st , et:et , type:type , iid:iid},
					success:function(data){
						$(cls).fadeIn(100);
						$(cls).html(data);
						$(cls).fadeOut(5000);
					}
				});	
			}
			else{
				$(cls).fadeIn(100);
				$(cls).html('<div class="alert alert-danger"><h2>Select atleast 2 different members.</h2></div>');		
				$(cls).fadeOut(5000);
			
			}
		}
		
	});
	$('.delete_interview').click(function(){
		var iid=$(this).data('iid');
		var card="#interview"+iid;
		$.ajax({
			url : "<?php echo site_url('home/delete') ?>",
				method : "POST",
				data : { iid:iid},
				success:function(){
					$(card).fadeOut(1500);
				}
		});
	});
});
</script>