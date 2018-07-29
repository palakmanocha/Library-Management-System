<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="group.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  </head>
  <body>

    <nav class="nav-bar">
      <div class="nav1">
        <img class="logo" height="80%" src="images/logo.png" alt="logo">
        <p class="logo-text">
          Library<br>Management<br>System
        </p>
      </div>
      <div class="nav2">

        <!--<div class="wrapper">
    <form action="search.php" method="post">

    <input type="text" class="search-input" data-ic-class="search-input" placeholder="Enter Roll No of user" name="rn">
    <button type="search-input" onclick = 'chahat()'>Search User</button>
  </form>



  </div>-->


        <a href="index.html"> <img class="home" src="images/home-logo.png" alt="Home"> </a>
      </div>
    </nav>
    <div class="head">
    </div>
    <div id="st-container" class="st-container">
        <div class="st-pusher">



    <div class="st-content">

      <div class="st-content-inner">



      <h1>SEARCH RESULTS</h1>



       <?php
        $rn = $_POST['rn'];
    $conn = mysqli_connect("localhost","root","palak","Library_Management_System");
   $sql = "select * from Student_Details where RollNo = '$rn';";
    $result = $conn -> query($sql);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {



         echo "<div style='  width:1000px;
                    margin-top:100px;
                   margin-left:100px;
                         height:300px;
                 background: rgba(35, 35, 35, 0.5);border:solid white 2px;s'>";






         echo "<img src='../".$row['Profile_Pic']."' style='position:absolute;width:20%;height:30%;font-size:10px;margin-top:30px;margin-left:20px;border-radius:50%;'>";
          echo"<h4 style ='position:absolute;color:	#D3D3D3; margin-top:250px;margin-left:60px;font-size:30px;'>".$row['Name']."</h4>";

          echo"<h3 style='position:absolute;color:	#D3D3D3;float: right; margin-top:70px;margin-left:400px;font-family: Arial, Verdana, Sans-serif;letter-spacing:2px;font-size:15px;'>"."RollNo:".$row['RollNo']."<br>"."Branch1:" .$row['Branch']."<br>"."Year:".$row['Year']."<br>"."MobileNo:".$row['Mobile']."<br>"."EmailID:".$row['Email']."<br>"."Date Of Birth:".$row['DOB']."<br>"."Username:".$row['Username']."<br>"."</h3>";

          echo"<button type='submit' style='margin-top:250px;margin-left:800px; cursor: pointer; display: inline-block;border-radius: 5%;color:white;background:black' onclick='sr();'>"." GO TO DASHBOARD"."</button>";

       echo "</div>" ;








      }

    }




    ?>


















      </div>

    </div>

  </div>
</div>


<script type="text/javascript" >


  function sr(){
      window.location.href = 'admem.php';
    }




    </script>


  </body>
    </html>
