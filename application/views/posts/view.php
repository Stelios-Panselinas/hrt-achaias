<div class="container">
	<div class="row">
		
		<h2 class="justify-content-center d-flex"><?php echo $post['title'];?></h2>
		<small class="post-data justify-content-center d-flex">Posted on: <?php echo $post['created_at'];?> </small>
		<img class="w-4" src="<?= base_url('assets/img/posts/' . $post['image']) ?>">
		<div class="post-body container">
			<?php echo $post['body'];?>
		</div>
	</div>
</div>



