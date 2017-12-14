<h2><?php echo $post['title']; ?></h2>
<br>
<div class="col-sm-3">
<div class="img-thumbnail">
	<img src="<?php echo site_url(); ?>resource/images/posts/<?php echo $post['post_image'];?>" class="rounded">
</div>
</div>
<div class="post-body">
	<?php echo $post['body']; ?>
</div>

<hr>

<a class="btn btn-default pull-left" href="<?php echo base_url();?>posts/edit/<?php echo $post['slug'];?>">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>
