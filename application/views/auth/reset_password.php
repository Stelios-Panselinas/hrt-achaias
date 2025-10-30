<!doctype html>
<html>
<head><title>Reset Password</title></head>
<body>
  <?php if($this->session->flashdata('error')): ?>
    <p style="color:red;"><?= html_escape($this->session->flashdata('error')); ?></p>
  <?php endif; ?>
  <?= validation_errors('<p style="color:red;">', '</p>'); ?>

  <?= form_open('reset-password/submit'); ?>
    <label for="password">New password</label><br>
    <input type="password" name="password" id="password" minlength="8" required><br><br>

    <label for="password_confirm">Confirm password</label><br>
    <input type="password" name="password_confirm" id="password_confirm" minlength="8" required><br><br>

    <button type="submit">Change password</button>
  <?= form_close(); ?>
</body>
</html>
