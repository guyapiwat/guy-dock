<html>
<head>
    <title>PHPMailer Lite - DKIM and Callback Function test</title>
</head>
<body>

<?php
/* This is a sample callback function for PHPMailer Lite.
 * This callback function will echo the results of PHPMailer processing.
 */

/* Callback (action) function
 *   boolean $result        result of the send action
 *   string  $to            email address of the recipient
 *   string  $cc            cc email addresses
 *   string  $bcc           bcc email addresses
 *   string  $subject       the subject
 *   string  $body          the email body
 * @return boolean
 */
function callbackAction($result, $to, $cc, $bcc, $subject, $body)
{
    /*
    this callback example echos the results to the screen - implement to
    post to databases, build CSV log files, etc., with minor changes
    */
    $to = cleanEmails($to, 'to');
    $cc = cleanEmails($cc[0], 'cc');
    $bcc = cleanEmails($bcc[0], 'cc');
    echo $result . "\tTo: " . $to['Name'] . "\tTo: " . $to['Email'] . "\tCc: " . $cc['Name'] .
        "\tCc: " . $cc['Email'] . "\tBcc: " . $bcc['Name'] . "\tBcc: " . $bcc['Email'] .
        "\t" . $subject . "\n\n". $body . "\n";
    return true;
}

require_once '../PHPMailerAutoload.php';
$mail = new PHPMailer();

try {
    $mail->isMail();
    $mail->setFrom('you@example.com', 'Your Name');
    $mail->addAddress('another@example.com', 'John Doe'