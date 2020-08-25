<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container tc">
<h2>Interview Scheduler</h2>
</div>
<div class="row">
<div class="container col-sm-6">
<h3> Schedule a New Interview</h3>
<?php echo form_open_multipart('home/new'); ?>
<div class="form-group">
	<input placeholder="Enter Title" type="text" id="title" class="form-control" required minlength="3" maxlength="40" name="title" />
</div>
<div id="members">
<div class="form-group">
<select id="mem1" class="form-control" name="member1">
<?php foreach ($users as $key => $value) {?>
	<option value="<?php echo $value['uid']; ?>" >
	<?php echo $value['name']." (".$value['email'].") "; ?>
	</option>
<?php } ?>
</select>
</div>
<div class="form-group">
<select id="mem2" name="member2" class="form-control">
	<?php foreach ($users as $key => $value) {?>
	<option value="<?php echo $value['uid']; ?>">
	<?php echo $value['name']." (".$value['email'].") "; ?>
	</option>
<?php } ?>
</select>
</div>
<?php 
	
	for($i=3;$i<=10;$i++){?>
		<div class="form-group" id="member<?php echo $i; ?>">
			<select id="mem<?php echo $i; ?>" name="member<?php echo $i; ?>" class="form-control">
			<?php foreach ($users as $key => $value) {?>
			<option value="<?php echo $value['uid']; ?>">
			<?php echo $value['name']." (".$value['email'].") "; ?>
			</option>
			<?php } ?>
			</select>
			<button class="btn btn-warning remove_member">Remove</button>
		</div>	
	<?php 
	}

?>
<div >
</div>	
</div>
<button class="btn btn-success" id="add_member">Add Member</button>


<input type="submit" value="GO" class="btn btn-success form-control create_event" />
</form>
</div>
<div class="container col-sm-6">
<h3> View All Scheduled Interviews</h3>
</div>

</div>
</body>
</html>