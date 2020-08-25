<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container justify-content-center tc">
<h2>Interview Scheduler</h2>
<div>
<a href="<?php echo site_url('home') ?>" class="btn btn-success"><h3>New Interview</h3></a>
</div><br>
<div class="container">
<?php foreach ($interview as $key => $value) {
	?>
		<div class="card padding" id="interview<?php echo $value['iid'] ?>">
		<div class="row">
		<div class="col-sm-3">
		<h3><?php echo $value['title']; ?></h3>
		<a href="<?php echo site_url('home/edit/'.$value['iid'].'') ?>" class="btn btn-warning">EDIT</a>
		<button href="<?php echo site_url('home/edit/'.$value['iid'].'') ?>" class="btn btn-danger delete_interview" data-iid="<?php echo $value['iid']; ?>">DELETE</button>
		</div>
		<div class="col-sm-3">
			<h4>Start : <?php echo $value['start_time'] ?></h4><br>
			<h4>End : <?php echo $value['end_time'] ?></h4><br>
		</div>
		<div class="col-sm-6">
			
		</div>
		</div>
		</div>
		<?php  	
} ?>

</div>

</div>