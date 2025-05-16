<html>

<head>
    <title>ΕΟΔ Αχαΐας</title>
	<link rel="icon" type="image/x-icon" href="assets/img/hrt_logo.png">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/slick/slick.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/img/hrt_logo.png')?>slick/slick-theme.css"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/_home.css') ?>">
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?php echo base_url();?>">
			<img src="<?php echo base_url('assets/img/hrt_logo.png')?>" alt="Avatar Logo" style="width:50px;">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
				</li>
				<?php if(!$this->session->userdata('logged_in')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>users/login">Περιοχή Μελών</a>
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('is_department_leader')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>departments/get_department_members">Μέλη Τμήματος</a>
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('is_ds')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>posts/create">Προσθήκη Ανακοίνωσης</a>
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('is_ds')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>users/register">Προσθήκη Μέλους</a>
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('is_ds')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>departments/all_members">Προβολή Μελών</a>
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('is_ds')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>operations/create">Δημιουργία Επιχείρησης</a>
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('logged_in')): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>	
				</li>
				<?php endif; ?>
				<?php if($this->session->userdata('logged_in')): ?>
				<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>users/profile/<?php echo $this->session->userdata('user_id'); ?>">Profile</a>	
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
