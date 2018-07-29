<?php
$db = mysqli_connect('localhost','root','palak','Library_Management_System');
$sql = "SELECT * FROM Books_Issued  WHERE Username = 'palak'";
$result = mysqli_query($db,$sql);
$row =mysqli_fetch_assoc($result);
$one = date_create($row['Due_Date']);
$two = date_create($row['Issue_Date']);
$diff = date_diff($two,$one);

echo date_format($one,'Y-m-d');
echo "<br>";
echo date_format($two,'Y-m-d');
echo "<br>";
$a = $diff->format("%a");
echo $a;
if($a<10){
  
}

 ?>
