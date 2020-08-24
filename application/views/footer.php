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
	
	$('.create_event').click(function(e){
		e.preventDefault();
		var title=$("#title").val();
		var cls="#flashdata";
		$.ajax({
			url:"<?php echo site_url('home/new') ?>",
			method:"POST",
			success:function(data){
				alert(data);
			}
		});
	});
});
</script>