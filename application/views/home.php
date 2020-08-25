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
	<h5>Title</h5>
	<input placeholder="Enter Title" type="text" id="title" class="form-control" required minlength="3" maxlength="40" name="title" />
</div>
<div id="timings">
<div class="container">
<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
	<h5>Start Date</h5>
	<input class="form-control" type="date" name="start_date" id="start_date" required >
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
	<h5>Start Time</h5>
	<input class="form-control" type="time" name="start_time" id="start_time" required value="00:00:00">
	</div>
	</div>
	</div>
</div>

<div class="container">
<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
	<h5>End Date</h5>
	<input class="form-control" type="date" name="end_date" id="end_date" required >
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
	<h5>End Time</h5>
	<input class="form-control" type="time" name="end_time" id="end_time" required value="00:00:00">
	</div>
	</div>
	</div>
</div>
</div>
<div id="members">
<h4>Participants</h4>	
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