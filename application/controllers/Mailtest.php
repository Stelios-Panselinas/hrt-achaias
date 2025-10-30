<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mailtest extends CI_Controller {
  public function index() {
    // --- EDIT THESE 3 LINES ---
    $to   = 'panselinastelios@GMAIL.COM';                  // where to send
    $user = 'no-reply@hrt-achaia.org.gr';             // Plesk mailbox (full address)
    $pass = 'o40bB25?f';                    // mailbox password
    $host = 'mail.hrt-achaia.org.gr';                 // often 'mail.domain.tld' on Plesk
    // --------------------------

    $config = [
      'protocol'    => 'smtp',
      'smtp_host'   => $host,
      'smtp_port'   => 465,        // try 587 (TLS) first; fallback to 25 without crypto
      'smtp_user'   => $user,
      'smtp_pass'   => $pass,
      'smtp_crypto' => 'ssl',      // if this fails, try '' (empty) and port 25
      'smtp_timeout'=> 10,
      'mailtype'    => 'html',
      'charset'     => 'utf-8',
      'newline'     => "\r\n",
      'crlf'        => "\r\n",
      'wordwrap'    => true,
    ];

    $this->load->library('email');
    $this->email->initialize($config);

    // Important: many Plesk setups require the From to match the authenticated user
    $this->email->from($user, 'CI Mail Test');
    $this->email->to($to);
    $this->email->subject('CodeIgniter SMTP test (Plesk)');
    $this->email->message('If you see this, SMTP auth worked.');

    if (!$this->email->send()) {
      echo '<pre>'.htmlspecialchars($this->email->print_debugger(['headers'])).'</pre>';
    } else {
      echo 'Mail sent! Check your inbox/spam.';
    }
  }
}
