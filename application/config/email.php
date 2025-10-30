<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol']  = 'smtp';
$config['smtp_host'] = 'localhost';     // Plesk often listens locally
$config['smtp_port'] = 587;             // or 25 if 587 blocked
$config['smtp_user'] = 'no-reply@hrt-achaia.org.gr'; // full mailbox created in Plesk
$config['smtp_pass'] = 'o40bB25?f';
$config['smtp_crypto']= 'tls';          // try 'tls', or '' if not supported
$config['mailtype']  = 'html';
$config['charset']   = 'utf-8';
$config['newline']   = "\r\n";
$config['crlf']      = "\r\n";
$config['wordwrap']  = true;
