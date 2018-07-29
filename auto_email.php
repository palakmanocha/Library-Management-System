<?php
$cur_date = date_create(date('Y-m-d'));
date_add($cur_date,date_interval_create_from_date_string("2 days"));
$db = mysqli_connect('localhost','root','palak','Library_Management_System');
// $sql = "SELECT S.Email, B.Title, B.Due_Date From Books_Issued AS B, Student_Details AS S WHERE B.Username = S.Username AND S.Notifications = TRUE AND B.Due_Date= '".date_format($cur_date,'Y-m-d')."'";
$sql = "SELECT S.Email, B.Title, B.Due_Date , S.Mobile From Books_Issued AS B, Student_Details AS S WHERE B.Username = S.Username AND S.Notifications = TRUE AND B.Due_Date= '2018-07-05'";
$result = mysqli_query($db,$sql);
if($result){


  require 'PHPMailerAutoload.php';
  require '../credentials.php';
  include('way2sms-api.php');

  $arr = array();

  while($rows = mysqli_fetch_assoc($result))
  {
    $arr[]=$rows;

  }
  for ($i=0; $i < count($arr); $i++) {
      $to = $arr[$i]['Email'];
      $book = $arr[$i]['Title'];
      $date =$arr[$i]['Due_Date'];
      $mobile = $arr[$i]['Mobile'];
      $sms = 'The due date of the book '.$book.' you have issued is '.$date.'. This is an auto generated sms | Copyright © 2018,UIET Library';
      $mail = new PHPMailer;
      $mail->SMTPDebug = 3;

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = EMAIL;
      $mail->Password = PASS;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom(EMAIL, 'UIET Library');
      $mail->addAddress($to);

      $mail->isHTML(true);

      $mail->Subject = 'Remaider regarding due date of your issued book '.$book;
      $mail->Body    = '<div style="color:black;">The due date of the book <b><I>'.$book.' </b></I> you have issued is <b>'.$date.'</b>.<br><br><hr color=\'lightgrey\'>This is an auto generated email | Please don\'t reply<br><b>Copyright © 2018,UIET Library</b></div>';

      $mail->send();

      if(sendWay2SMS('9530917208', 'palak27', $mobile, $sms)){
        echo "yes";
      }
      else{
        echo "no";
      }

    }



  }



 ?>
