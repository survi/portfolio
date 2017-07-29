<?php
// Settings
$emailTo = 'enteryourmail@mail.com';
$emailFrom = sprintf( 'robot@%s', $_SERVER[ 'SERVER_NAME' ] );
$subject = sprintf( 'Message from %s', $_SERVER[ 'SERVER_NAME' ] );


$hasError = false;
$guestName = '';
$guestEmail = '';
$guestMessage = '';

// Name check
if ( !isset( $_POST[ 'name' ] ) || empty( $_POST[ 'name' ] ) )
{
	$hasError = true;
}
else
{
	$guestName = trim( $_POST[ 'name' ] );
}

// e-mail check
if ( !isset( $_POST[ 'email' ] ) || empty( $_POST[ 'email' ] ) )
{
	$hasError = true;
}
else
{
	$guestEmail = trim( $_POST[ 'email' ] );
}

// Check for messages
if ( !isset( $_POST[ 'message' ] ) || empty( $_POST[ 'message' ] ) )
{
	$hasError = true;
}
else
{
	$guestMessage = trim( $_POST[ 'message' ] );
}


//If there is no error, send the email
if ( !$hasError )
{
	$body = "Name: $guestName \n\nEmail: $guestEmail \n\nSubject: $subject \n\nComments:\n $guestMessage";
	$headers = "From: <" . $emailFrom . ">\r\nReply-To: " . $guestEmail . "";

	$sent = mail( $emailTo, $subject, $body, $headers );
	echo "SEND";
}
else
{
	echo "Please check if you've filled all the fields with valid information and try again. Thank you.";
}
