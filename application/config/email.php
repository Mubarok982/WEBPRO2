<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'mail'; // Bisa juga pakai 'smtp' jika ingin pakai SMTP
$config['mailpath'] = '/usr/sbin/sendmail'; // Path ke sendmail, biasanya default
$config['charset'] = 'utf-8';
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html'; // Bisa 'text' atau 'html'
