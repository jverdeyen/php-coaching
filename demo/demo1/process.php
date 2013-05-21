<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$from = $name . ' <' . $email . '>';

$header = 'From: ' . $from;

mail('joeri@jverdeyen.be', 'contact form request', $header);

header('Location: thankyou.php');
exit(0);