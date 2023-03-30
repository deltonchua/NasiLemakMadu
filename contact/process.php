<?php

define( 'MAX_LINE_LENGTH', 998 );
define( 'CONTENT_TYPE', 'Content-Type: text/plain; charset="utf-8"' );
$formUrl = "./";
$httpReferrer = getenv( "HTTP_REFERER" );
$mailFrom = "contact-form@nasilemakmadu.com";
$mailTo = "contact@nasilemakmadu.com";
$lineSep = "\r\n" ;
$name = trim($_POST['name']) ;
$email = trim($_POST['email']) ;
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (empty($email) || (substr_count($email,'@') != 1) || (strlen($email) > 254) || preg_match("/[\s<>,;'\"]/", $email) ||
	empty($name) || (strlen($name) > 729) || preg_match("/[\r\n@<>,;\"]/", $name)) {
	header( "Location: $formUrl" );
	exit ;
}

$body =
	"This message was sent from:" . $lineSep .
	$httpReferrer . $lineSep .
	"------------------------------------------------------------" . $lineSep .
	"Name: $name" . $lineSep .
    "Email: $email" . $lineSep .
    "Mobile No.: $mobile" . $lineSep .
	"------------------------- MESSAGE --------------------------" . $lineSep . $lineSep .
	$message . $lineSep . $lineSep .
	"------------------------------------------------------------" . $lineSep ;
$body = wordwrap( $body, MAX_LINE_LENGTH, $lineSep, true ) ;

$headers =
	"From: \"$name\" <$mailFrom>" . $lineSep . "Reply-To: \"$name\" <$email>" . $lineSep . "X-Mailer: chfeedback.php 2.21.0" .
	$lineSep . 'MIME-Version: 1.0' . $lineSep . CONTENT_TYPE ;

if(isset($_POST['submit'])) {
    mail($mailTo, $subject, $body, $headers);
    header("Location: $formUrl");
}

?>