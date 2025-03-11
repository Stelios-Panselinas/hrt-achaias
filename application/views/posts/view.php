<div class="container">
	<div class="row">

		<h2 class="justify-content-center d-flex"><?php echo $post['title']; ?></h2>
		<small class="post-data justify-content-center d-flex">Posted on: <?php echo $post['created_at']; ?> </small>
		<img class="w-4" src="<?= base_url('assets/img/posts/' . $post['image']) ?>">
		<div class="post-body container">
			<?php echo $post['body']; ?>
		</div>

		<hr>
		<a class="btn btn-primary col-1" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
		<?php echo form_open('/posts/delete/' . $post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
		</form>
		
	</div>
</div>