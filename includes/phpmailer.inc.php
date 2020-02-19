<?php
//phpmailer.inc.php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';

$mailer = new PHPMailer();