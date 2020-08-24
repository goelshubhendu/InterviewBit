<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container tc">
<h2>Interview Scheduler</h2>
<div class="row">
<div class="container col-sm-6  padding">
<div class="padding">
<h3> Schedule a New Interview</h3>
<?php echo form_open_multipart('home/new'); ?>
<div class="form-group">
	<input placeholder="Enter Title" type="text" id="title" class="form-control" required minlength="3" maxlength="40" name="title" />
</div>
<div class="form-group">

</div>
<div class="form-group">
<div class="form-group padding ">
			
<input type="submit" value="GO" class="btn btn-success form-control create_event" />
</form>
</div>
</div>
<div class="container col-sm-6">
<h3> View All Scheduled Interviews</h3>
</div>
</div>

</div>
</body>
</html>