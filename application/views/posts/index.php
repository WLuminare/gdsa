<h2><?=$title ?></h2>
<br>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<br>
	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
				<img class="post-thumb" src="<?php echo site_url(); ?>resource/images/posts/<?php echo $post['post_image'];?>">
			</div>
		</div>
		<div class="col-sm-8">
			<small>Posted in categories <strong><?php echo $post['name'];?></strong></small>
			<br>
			<?php echo word_limiter($post['body'],10);?>
			<br>
			<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']) ;?>">Read More</a></p>
		</div>
	</div>
<?php endforeach; ?>