<?php if($this->session->userdata('is_ds') && !is_null($this->session->userdata('logged_in'))): ?>
<h1 class="d-flex justify-content-center"><?= $title; ?></h2>
	<div class="container col-4">
		<?php echo validation_errors(); ?>
		<?php echo form_open('trainings/create'); ?>
		<div class="form-group">
			<label>Όνομα</label>
			<input type="text" class="form-control" id="training_name" name="training_name" placeholder="Όνομα Εκπαίδευσης">
		</div>
		<div class="form-group">
			<label >Ημερομηνία</label>
			<input type="date" class="form-control" id="date" name="date">
		</div>
		<div class="form-group">
			<label>Άτομα</label>
			<div id="people" class="form-select" multiple>
				<?php foreach ($users as $user): ?>
					<label>
						<input type="checkbox" name="people[]" value="<?= $user['user_id']; ?>">
						<?= $user['name'] . ' ' . $user['surname']; ?>
					</label>
					<br>
				<?php endforeach; ?>
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
<?php else: ?>
	<?php redirect('home');?>
<?php endif;?>
