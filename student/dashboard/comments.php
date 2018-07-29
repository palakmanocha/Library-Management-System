<?php
require 'PHPMailerAutoload.php';
require '../../../credentials.php';
if($_REQUEST['comments'] && $_REQUEST['name'] && $_REQUEST['email']){

  $mail = new PHPMailer;

  $mail->SMTPDebug = 3;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom(EMAIL, 'Library_Management_System');
  $mail->addAddress('palakmanocha99@gmail.com');     // Add a recipient
  
  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Libray_Feedback';
  $mail->Body    = "Name : ".$_REQUEST['name']."<br>Email : ".$_REQUEST['email']." <br>Comment : ".$_REQUEST['comments']." ";
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
      echo "
        <script>
          alert('Feedback could not be submitted. <br> Mailer Error: ' . $mail->ErrorInfo);
            window.location.href='index.php';
        </script>";

  } else {
    echo "
    <script>
      window.location.href='index.php';
      alert('Feedback submitted.');
    </script>";
  }
}
else{
  echo "
  <script>
    window.location.href='index.php';
    alert('All the fields are required to be filled!');
  </script>";
}











 ?>
