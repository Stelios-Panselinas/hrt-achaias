<?php if($this->session->userdata('is_ds') && !is_null($this->session->userdata('logged_in'))): ?>
<div class="container col-4 d-flex justify-content-center">
    <div class="row">
        <h1><?= $title; ?></h1>


        <div class="validation-error" role="alert">
            <?php echo validation_errors(); ?>
        </div>

        <?php echo form_open('users/register'); ?>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Surame">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <label>AM</label>
            <input type="text" class="form-control" name="AM" placeholder="AM">
        </div>
        <div class="form-group">
            <label for="subgroupSelect1">Τμήμα 1</label>
            <select class="form-select" id="subgroupSelect1" name="subgroup1">
                <option selected>Επιλέξτε...</option>
                <?php foreach ($subgroups as $subgroup): ?>
                    <option value="<?= $subgroup['subgroup_id']; ?>"><?= $subgroup['sub_name']; ?></option>
                    <br>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="subgroupSelect2">Τμήμα 2</label>
            <select class="form-select" id="subgroupSelect2" name="subgroup2">
                <option selected>Επιλέξτε...</option>
                <?php foreach ($subgroups as $subgroup): ?>
                    <option value="<?= $subgroup['subgroup_id']; ?>"><?= $subgroup['sub_name']; ?></option>
                    <br>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label class="col-12">Είναι στο Δ.Σ;</label>
            <input class="form-check-input" type="radio" name="is_ds" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Ναι
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_ds" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Όχι
            </label>
        </div>
        <div class="form-group">
            <label class="col-12">Είναι Τμηματάρχης/ισσα;</label>
            <input class="form-check-input" type="radio" name="is_department_leader" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Ναι
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_department_leader" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Όχι
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo form_close(); ?>
    </div>
</div>
<?php else: ?>
	<?php redirect('home');?>
<?php endif;?>
