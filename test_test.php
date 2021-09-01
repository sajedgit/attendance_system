<?php


$email="sajedaiub@gmail.com";
$password="123456";
$subject="Your account has been created to hr.synesisit.info";
$header="From: hr.synesisit.info";
$content="Your new account has been created to hr.synesisit.info and Your password is <b>$password</b>. <br/> ";
$content.="<br/> PLEASE CHANGE THE PASSWORD after login to this system ( http://hr.synesisit.info/attendance ) ";
if(mail($email, $subject, $content, $header))
	echo "email send";
else
	echo "email not send";


?>