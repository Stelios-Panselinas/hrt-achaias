<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url','form','security','string']);
        $this->load->library(['session','form_validation','email']);
        $this->load->model(['user_model','password_reset_model']);
    }

    /* 1) Show "Forgot password" form */
    public function forgot_password()
    {
        $this->load->view('auth/forgot_password');
    }

    /* 2) Handle submit, create token, email link */
    public function send_reset_link()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if (!$this->form_validation->run()) {
            return $this->load->view('auth/forgot_password');
        }

        $email = $this->input->post('email', true);
        $user  = $this->user_model->get_by_email($email);

        // Always show success (avoid user enumeration)
        $generic_msg = 'If that email exists in our system, a reset link has been sent. Please check your inbox.';

        if (!$user) {
            $this->session->set_flashdata('info', $generic_msg);
            return redirect('forgot-password');
        }

        // Optional: throttle requests per user/IP to prevent abuse
        if (!$this->password_reset_model->can_request_reset($user['id'], $this->input->ip_address())) {
            $this->session->set_flashdata('info', 'Please wait a few minutes before requesting another link.');
            return redirect('forgot-password');
        }

        // Generate selector + token
        $selector = bin2hex(random_bytes(8));             // 16 hex chars
        $token    = bin2hex(random_bytes(32));            // 64 hex chars
        $tokenHash= hash('sha256', $token);
        $expires  = new DateTime('+30 minutes');          // link valid for 30 mins

        // Persist reset record
        $this->password_reset_model->create($user['user_id'], $selector, $tokenHash, $expires);

        // Build reset URL
        $resetUrl = "hrt-achaia.org.gr/reset-password/{$selector}/{$token}";

        // Compose email
        $this->email->from('no-reply@hrt-achaia.org.gr', 'Support');
        $this->email->to($email);
        $this->email->subject('Password reset request');
        $this->email->message($this->load->view('emails/reset_password', [
            'reset_url' => $resetUrl,
            'user'      => $user,
            'expires'   => $expires->format('Y-m-d H:i')
        ], true));

        // Send email (don’t expose specific failures to user enumeration)
        $this->email->send();
        if (!$this->email->send()) {
            $dbg = $this->email->print_debugger(['headers']);
            log_message('error', 'Password reset email failed: '.$dbg);
        }

        $this->session->set_flashdata('info', $generic_msg);
        return redirect('forgot-password');
    }

    /* 3) Show "Set new password" form (via emailed link) */
    public function reset_password($selector = null, $token = null)
    {
        if (!$selector || !$token) show_404();

        $record = $this->password_reset_model->find_valid($selector);
        if (!$record) return $this->_invalid_link();

        // Verify token matches
        if (!hash_equals($record['token_hash'], hash('sha256', $token))) {
            return $this->_invalid_link();
        }

        // Save for submit step (in session) and render form
        $this->session->set_tempdata('reset_selector', $selector, 1800); // 30 min
        $this->session->set_tempdata('reset_token',    $token,    1800);

        $this->load->view('auth/reset_password');
    }

    /* 4) Handle new password submission */
    public function reset_password_submit()
    {
        $selector = $this->session->tempdata('reset_selector');
        $token    = $this->session->tempdata('reset_token');

        if (!$selector || !$token) return $this->_invalid_link();

        $this->form_validation->set_rules('password', 'New password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Confirm password', 'required|matches[password]');

        if (!$this->form_validation->run()) {
            return $this->load->view('auth/reset_password');
        }

        $record = $this->password_reset_model->find_valid($selector);
        if (!$record) return $this->_invalid_link();

        if (!hash_equals($record['token_hash'], hash('sha256', $token))) {
            return $this->_invalid_link();
        }

        // All good: update password
        $newHash = md5($this->input->post('password'));
        $this->user_model->update_password($record['user_id'], $newHash);

        // Invalidate reset record(s)
        $this->password_reset_model->mark_used($record['id']);

        // Clear tempdata
        $this->session->unset_tempdata('reset_selector');
        $this->session->unset_tempdata('reset_token');

        $this->session->set_flashdata('success', 'Your password has been updated. Please log in.');
        redirect('login');
    }

    private function _invalid_link()
    {
        $this->session->set_flashdata('error', 'That reset link is invalid or has expired. Please request a new one.');
        return redirect('forgot-password');
    }
}
