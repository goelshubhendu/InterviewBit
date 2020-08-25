<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container ">
<div class="justify-content-center tc">
<h2>Interview Scheduler</h2>

<div>
<a href="<?php echo site_url('home/all') ?>" class="btn btn-success"><h3>View All Interviews</h3></a>
</div>
<div class="container  tc" style="max-width:50%;">
<h3> Edit Interview</h3>
<?php echo form_open_multipart('home/new'); ?>
<div class="form-group">
	<h5>Title</h5>
	<input placeholder="Enter Title" type="text" id="title" class="form-control" required minlength="3" maxlength="40" name="title" value="<?php echo $interview[0]['title'] ?>" />
</div>
<div id="timings">
<div class="container">
<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
	<h5>Start Date</h5>
	<input class="form-control" type="date" name="start_date" id="start_date" required value="<?php echo $start_date; ?>">
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
	<h5>Start Time</h5>
	<input class="form-control" type="time" name="start_time" id="start_time" required value="<?php echo $start_time; ?>">
	</div>
	</div>
	</div>
</div>

<div class="container">
<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
	<h5>End Date</h5>
	<input class="form-control" type="date" name="end_date" id="end_date" required  value="<?php echo $end_date; ?>">
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
	<h5>End Time</h5>
	<input class="form-control" type="time" name="end_time" id="end_time" required value="<?php echo $end_time; ?>">
	</div>
	</div>
	</div>
</div>
</div>
<div id="members">
<h4>Participants</h4>	
	
<?php 	
	$index=0;
	$selected_members=sizeof($members);
	for($i=1;$i<=10;$i++){ ?>
		<div class="form-group" id="member<?php echo $i; ?>">
			<select id="mem<?php echo $i; ?>" name="member<?php echo $i; ?>" class="form-control">
			<?php 
				foreach ($users as $key => $value) {
					$uid=$value['uid'];
					if($index<$selected_members && $uid==$members[$index]){ ?>
						<option value="<?php echo $value['uid']; ?>" selected>
						<?php echo $value['name']." (".$value['email'].") "; ?>
						</option>
						<?php
					}
					else{ ?>
						<option value="<?php echo $value['uid']; ?>" >
						<?php echo $value['name']." (".$value['email'].") "; ?>
						</option>
					<?php }
						
				}
			$index++;
			?>
				</select>
			<button class="btn btn-warning remove_member">Remove</button>
		</div>
		<?php  
	} 
	?>		
<div >
</div>	
</div>
<div class="form-group">
<button class="btn btn-success" id="add_member">Add Member</button>
</div>

<input type="submit" value="GO" class="btn btn-success form-control create_event"  data-type="1" data-iid="<?php echo $interview[0]['iid'] ?>"/>
</form>
</div>
</div>

</div>