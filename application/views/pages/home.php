<div class="container-fluid px-0">
	<div class="main-slider">
		<div>
			<img src="<?php echo base_url('assets/img/main_slider_img1.jpg') ?>" alt="Avatar" style="width:100%;">
		</div>
		<div>
			<img src="<?php echo base_url('assets/img/main_slider_img2.jpg') ?>" alt="Avatar" style="width:100%;">
		</div>
		<div>
			<img src="<?php echo base_url('assets/img/main_slider_img3.jpg') ?>" alt="Avatar" style="width:100%;">
		</div>
	</div>

	<div class="container announcements-section">
		<h3>Τα τελευταία νέα μας...</h3>
		<hr>
		<div class="row">
			<?php $order = 0;
			foreach ($posts

			as $post): ?>
			<?php if ($order === 0): ?>
			<div class="col-12 col-sm-6 announcements-section-item">
				<?php if (!empty($post['image'])): ?>
					<img src="<?= base_url('assets/img/posts/' . $post['image']) ?>" <?php endif; ?>
				<div class="col-12">
					<h4> <?= $post['title'] ?></h4>
					<p>
						<?= $post['small_body'] ?>
					</p>
					<a href="#" class="see-more-btn col-12">
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
							<img src="<?= base_url('assets/img/posts/' . $post['image']) ?>" <?php endif; ?>
						<div class="col-12">
							<h6> <?= $post['title'] ?></h6>
							<a href="#" class="see-more-btn col-12">
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
		<div class="row">
			<div class="col-3">
				<img src="assets/img/building.png"
			</div>
		</div>
		<div class="col-4">
					<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
						ullamco	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
						in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
						cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
		</div>
	</div>
</div>
<div class="container departments-slider">
		<div class="col-4 department-section-item px-2">
				<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
				in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
			<img src="<?php echo base_url('assets/img/departments/disaster_resc.png') ?>"
		</div>
	</div>
	<div class="col-4 department-section-item">
				<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
				in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
		<img src="<?php echo base_url('assets/img/departments/disaster_resc.png') ?>"
	</div>
</div>
<div class="col-4 department-section-item">
				<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
				in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
	<img src="<?php echo base_url('assets/img/departments/disaster_resc.png') ?>"
</div>
</div>
<div class="col-4 department-section-item">
				<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
				in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
	<img src="<?php echo base_url('assets/img/departments/disaster_resc.png') ?>"
</div>
</div>
<div class="col-4 department-section-item">
				<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco	laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
				in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
				cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </span>
	<img src="<?php echo base_url('assets/img/departments/disaster_resc.png') ?>"

</div>
</div>
</div>
