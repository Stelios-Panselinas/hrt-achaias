<div class="container-fluid px-0">
	<div class="main-slider">
		<div>
			<img src="assets/img/main_slider_img1.jpg" alt="Avatar" style="width:100%;">
		</div>
		<div>
			<img src="assets/img/main_slider_img2.jpg" alt="Avatar" style="width:100%;">
		</div>
		<div>
			<img src="assets/img/main_slider_img3.jpg" alt="Avatar" style="width:100%;">
		</div>
	</div>

	<div class="container">
		<?php if ($this->session->flashdata('user_registered')): ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
		<?php endif; ?>
		<?php if ($this->session->flashdata('user_loggedin')): ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
		<?php endif; ?>
		<?php if ($this->session->flashdata('login_failed')): ?>
			<?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
		<?php endif; ?>
	</div>

	<div class="container announcements-section">
		<h1>Τα τελευταία νέα της ΕΟΔ Αχαΐας</h1>
		<hr>
		<div class="row">
			<?php $order = 0;
			foreach ($posts as $post): ?>
				<?php if ($order === 0): ?>
					<div class="announcements-section-item col-md-12 col-xl-6">
						<?php if (!empty($post['image'])): ?>
							<img src="assets/img/posts/<?= $post['image']?>" <?php endif; ?> <div>
						<h4> <?= $post['title'] ?></h4>
						<p>
							<?= $post['small_body'] ?>
						</p>
						<a href="<?= base_url('/posts/' . $post['slug']) ?>" class="see-more-btn col-12">
							<div>
								Δείτε Περισσότερα
							</div>
						</a>
					</div>
					<div class="col-12 col-md-12 col-xl-6 announcements-section-secondary">
						<?php $order++;
				else: ?>
						<div class="announcements-section-secondary-item">
							<?php if (!empty($post['image'])): ?>
								<img src="assets/img/posts/<?= $post['image']?>" <?php endif; ?> <div
								class="col-12">
							<h6> <?= $post['title'] ?></h6>
							<a href="<?= base_url('/posts/' . $post['slug']) ?>" class="see-more-btn col-12">
								<div>
									Δείτε Περισσότερα
								</div>
							</a>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid eod-patras">
	<h2>Ελληνική Ομάδα Διάσωσης Παράρτημα Αχαΐας</h2>
		<hr>	
	<div class="row">
		<div class="col-3">
			<img src="assets/img/building.png" </div>
		</div>
	
		<div class="col-4">
			<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
				in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
		</div>
	</div>
</div>
<div class="container py-5">
	<div class="row">
		<h3>Τα Τμήματα της Ελληνικής Ομάδας Διάσωσης</h3>
		<hr>
		<div class="container departments-slider">
			<?php foreach ($subgroups as $sub): ?>
				<div class="col-4 department-section-item px-2">
					<h4><?= $sub['sub_name'] ?></h4>
					<span>
					<?php echo character_limiter($sub['sub_description'], 350);?>
						<a href="<?= base_url('/departments/view/' . $sub['subgroup_id']) ?>" class="see-more-btn col-12">
								<div>
									Δείτε Περισσότερα
								</div>
						</a>
					</span>
					<img src="assets/img/departments/<?= $sub['sub_badge']?>" </div>
				</div>	
			<?php endforeach; ?>
			
		</div>
		
	</div>
	
</div>
