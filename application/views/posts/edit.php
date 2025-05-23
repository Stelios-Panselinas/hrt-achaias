<?php if($this->session->userdata('is_ds') && !is_null($this->session->userdata('logged_in'))): ?>
<h1><?= $title; ?></h2>
<div class="container">
    <?php echo validation_errors(); ?>
    <?php echo form_open('posts/create'); ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="post-test-area form-control" id="body" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php else: ?>
	<?php redirect('home');?>
<?php endif;?>
