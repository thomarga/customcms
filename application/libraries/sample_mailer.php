<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'aquanotif@gmail.com';
$mail->Password = 'adminaqua';

$mail->setFrom('aquanotif@gmail.com', 'CSR Server');
$mail->addAddress('andreasardaniel@gmail.com');
$mail->Subject = 'Pesan 1';
$mail->Body = 'Keterangan...';

if ($mail->send())
    echo "Mail sent";
?>