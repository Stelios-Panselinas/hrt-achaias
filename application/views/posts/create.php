<h1><?= $title; ?></h2>
<div class="container">
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="post-test-area form-control " id="body" name="body" placeholder="Add Body"></textarea>
    </div>
	<div class="form-group">
		<label for="userfile">Επιλέξτε εικόνα:</label>
		<input type="file" name="userfile" size="20" class="form-control" />
	</div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
