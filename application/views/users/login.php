<?php echo form_open('users/login'); ?>
<div class="container">
    <div class="row">
        <h1 class="text-center col-12"><?php echo $title; ?></h1>
        <div class="col-12 d-flex justify-content-center">
            <div class="form-group text-center" style="max-width: 400px; width: 100%;">
                <input type="text" name="username" class="form-control mb-3" placeholder="Enter Username" required autofocus>
                
                <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>
                
                <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
                
                <!-- Forgot password link -->
                <div class="mt-2">
                    <a href="<?php echo site_url('forgot-password'); ?>">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
