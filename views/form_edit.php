<?php 
$lines = file('data/bb.csv',FILE_IGNORE_NEW_LINES);

// Get the band association with the 'band' parameter in the query string
$band = explode(',',$lines[$_GET['band']]);
?>

<h2>Edit User</h2>

<form class="form-horizontal" action="actions/edit.php" method="post">
	<input type="hidden" name="linenum" value="<?php echo $_GET['band'] ?>" />
	<div class="control-group">
		<label class="control-label" for="role">Role</label>
		<div class="controls">
			<?php echo input('role','required',$band[0]) ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<?php echo input('email','required',$band[1]) ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<?php echo input('password','required',$band[2]) ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="username">User Name</label>
		<div class="controls">
			<?php echo input('username','required',$band[3])?>
		</div>
	</div>

	<div class="form-actions">
		<button type="submit" class="btn btn-warning"><i class="icon-edit icon-white"></i> Edit User</button>
		<!-- <button type="button" class="btn btn-warning">Cancel</button> -->
		<a type="button" class="btn btn-warning" href = "index.php">Cancel</a>
	</div>
</form>