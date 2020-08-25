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
		
	var cnt=2;
	var cls="#flashdata";
	for (var i = 3 ;i <=10; i++) {
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
			var temp='#member'+cnt;
			$(temp).show();
		}		
	});
	$(".remove_member").click(function(e){	
		e.preventDefault();
		$(this).parent('div').hide();	
		cnt--;
		//console.log(cnt);
	});
	$('.create_event').click(function(e){
		
		e.preventDefault();
		
		var title=$("#title").val();
		var temp=title.replace(/\s/g, "");

		if(temp.length <=3){
			$(cls).fadeIn(100);
			
			$(cls).html('<div class="alert alert-danger"><h2>Enter at least 3 characters in title</h2></div>');
			$(cls).fadeOut(5000);
			
		}

		else{
			var arr=[];
			for (var i = 1; i <= cnt; i++) {
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
					data : { title:title ,  members:arr , tot:tot , sd: sd, ed:ed,st:st , et:et},
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