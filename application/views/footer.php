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
	for (var i = 3 ;i <=10; i++) {
		var temp='#member'+i;
		$(temp).hide();
	}
	$("#add_member").click(function(e){
		e.preventDefault();
		if(cnt==10){
			var data='<div class="alert alert-danger"><h3>No more than 10 members can attend a meeting.</h3></div>';
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
		console.log(cnt);
	});
	$('.create_event').click(function(e){
		e.preventDefault();
		var title=$("#title").val();
		var arr=[];
		for (var i = 1; i <= cnt; i++) {
			arr.push($("#mem"+i).val());
		}
		var cls="#flashdata";
		$.ajax({
			url : "<?php echo site_url('home/new') ?>",
			method : "POST",
			data : { title:title ,  members:arr , tot:cnt},
			success:function(data){
				if(data=='YES'){
					$(cls).html('<div class="alert alert-success"><h3>Interview Scheduled Successfully</h3></div>');
					$(cls).fadeOut(5000);
				}
				else{
					$(cls).html(data);
				}
				console.log(data);
			}
		});
	});
});
</script>