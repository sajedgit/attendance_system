<?php


require_once getcwd()."/vendor/autoload.php";

// Create the Transport
$transport = (new Swift_SmtpTransport('mail.synesisit.info', 25))
    ->setUsername('attendanceinfo@synesisit.info')
    ->setPassword('synesis@HR#2021')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Test Subject'))
    ->setFrom(['attendanceinfo@synesisit.info' => 'Ahmed Khan'])
    ->setTo(['sajedaiub@gmail.com', 'sajed.ahmed@synesisit.info' => 'Sajed Khan'])
    ->setBody('Here is the message itself')
;

// Send the message
$result = $mailer->send($message);





die();

?>
