<!doctype html>
<html>
<body>
  <p>Hello<?= isset($user['name']) ? ' ' . html_escape($user['name']) : '' ?>,</p>
  <p>We received a request to reset your password. Click the link below to set a new one:</p>
  <p><a href="<?= html_escape($reset_url); ?>">Reset your password</a></p>
  <p>This link will expire at <?= html_escape($expires); ?>.</p>
  <p>If you didn't request this, you can safely ignore this email.</p>
</body>
</html>
