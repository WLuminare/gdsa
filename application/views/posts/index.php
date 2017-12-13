<h2><?=$title ?></h2>
<br>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<br>
	<?php echo $post['body'];?>
	<br>
	<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']) ;?>">Read More</a></p>
	<br><br>
<?php endforeach; ?>