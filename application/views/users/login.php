<?php echo form_open('users/login'); ?>
<div class="container">
    <div class="row">
        <h1 class="text-center col-12"><?php echo $title; ?></h1>
        <div class="col-12 d-flex justify-content-center">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required
                    autofocus>
                    <br>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>