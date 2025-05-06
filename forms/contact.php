<?php
// Email recipient (your Gmail)
$receiving_email_address = 'leoninjayson468@gmail.com';

// Load the PHP Email Form library
$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';

if (file_exists($php_email_form_path)) {
  include($php_email_form_path);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// Email to
$contact->to = $receiving_email_address;

// Form Data
$contact->from_name = htmlspecialchars($_POST['name']);
$contact->from_email = htmlspecialchars($_POST['email']);
$contact->subject = htmlspecialchars($_POST['subject']);

// SMTP Configuration
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'leoninjayson468@gmail.com', // Your Gmail
  'password' => 'your_app_password_here',     // Gmail App Password (NOT your Gmail password!)
  'port' => 587,
  'encryption' => 'tls'
);

// Message Content
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send Email
echo $contact->send();
?>
