<?
/*
    CHFEEDBACK.PHP Feedback Form PHP Script Ver 2.02.
    Generated by thesitewizard.com's Feedback Form Wizard.
    Copyright 2000-2004 by Christopher Heng. All rights reserved.
    thesitewizard and thefreecountry are trademarks of Christopher Heng.

    $Id: phpscript.txt 3.3 2004/06/18 11:33:40 chris Exp $

    Get the latest version, free, from:
        http://www.thesitewizard.com/wizards/feedbackform.shtml

    You can contact me at:
        http://www.thesitewizard.com/feedback.php

    LICENCE TERMS
    
    1. You may use this script on your website, with or
    without modifications, free of charge.
    
    2. You may NOT distribute or republish this script,
    whether modified or not. The script is meant for your
    personal use on your website, and can only be
    distributed by the author, Christopher Heng.
    
    3. THE SCRIPT AND ITS DOCUMENTATION ARE PROVIDED
    "AS IS", WITHOUT WARRANTY OF ANY KIND, NOT EVEN THE
    IMPLIED WARRANTY OF MECHANTABILITY OR FITNESS FOR A
    PARTICULAR PURPOSE. YOU AGREE TO BEAR ALL RISKS AND
    LIABILITIES ARISING FROM THE USE OF THE SCRIPT,
    ITS DOCUMENTATION AND THE INFORMATION PROVIDED BY THE
    SCRIPTS AND THE DOCUMENTATION.

    If you cannot agree to any of the above conditions, you
    may not use the script. 
    
    Although it is NOT required, I would be most grateful
    if you could also link to thesitewizard.com at:

       http://www.thesitewizard.com/

*/

// ------------- CONFIGURABLE SECTION ------------------------

// $mailto - set to the email address you want the form
// sent to, eg
//$mailto		= "youremailaddress@example.com" ;

$mailto = 'ravelli@maindee.com' ;

// $subject - set to the Subject line of the email, eg
//$subject	= "Feedback Form" ;

$subject = "Re: Lester Family Tree" ;

// the pages to be displayed, eg
//$formurl		= "http://www.example.com/feedback.html" ;
//$errorurl		= "http://www.example.com/error.html" ;
//$thankyouurl	= "http://www.example.com/thankyou.html" ;

$formurl = "http://www.maindee.com/lester/mailTest.html" ;
$errorurl = "http://www.maindee.coom/lester/mailError.html" ;
$thankyouurl = "http://www.maindee.com/lester/thanks.html" ;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$name = $_POST['name'] ;
$email = $_POST['email'] ;
$comments = $_POST['comments'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (empty($name) || empty($email) || empty($comments)) {
   header( "Location: $errorurl" );
   exit ;
}
if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =

	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------- COMMENTS -------------------------\n\n" .
	$comments .
	"\n\n------------------------------------------------------------\n" ;

mail($mailto, $subject, $messageproper, "From: \"$name\" <$email>\nReply-To: \"$name\" <$email>\nX-Mailer: chfeedback.php 2.02" );
header( "Location: $thankyouurl" );
exit ;

?>

