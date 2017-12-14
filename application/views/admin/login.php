<?php echo form_open('admin/login'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<br>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username" required="autofocus">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required="autofocus">
			</div>
  			<button type="submit" class="btn btn-helpl btn-block">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>
