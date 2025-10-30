<!doctype html>
<html>
<head><title>Forgot Password</title></head>
<body>
  <?php if($this->session->flashdata('info')): ?>
    <p><?= html_escape($this->session->flashdata('info')); ?></p>
  <?php endif; ?>
  <?php if($this->session->flashdata('error')): ?>
    <p style="color:red;"><?= html_escape($this->session->flashdata('error')); ?></p>
  <?php endif; ?>
  <?= validation_errors('<p style="color:red;">', '</p>'); ?>

  <?= form_open('forgot-password/send'); ?>
    <label for="email">Email address</label><br>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send reset link</button>
  <?= form_close(); ?>
</body>
</html>
