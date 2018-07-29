<?php
 session_start();

  if(!isset($_SESSION['user']))
  {
    header('location: ../');
  }

  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";

  $db = mysqli_connect('localhost','root','palak','Library_Management_System');
  // $sql = "SELECT Id, Title, Author, Cover, Total_no, Available, Price , Book_Id FROM Book_Details";
  $sql = "SELECT * FROM Book_Details";
  $result = mysqli_query($db, $sql);

  $sql2 ="SELECT * FROM Student_Details WHERE Username = '".$_SESSION['user']."'";
  $result2 = mysqli_query($db,$sql2);

  $edit = mysqli_fetch_assoc($result2);
  $_SESSION['roll_no'] = $edit['RollNo'];



  if ($result) {
    echo " <script> console.log('Database connection successful'); </script>";

    $n = mysqli_num_rows($result);
    $details = array();

    while ($rows = mysqli_fetch_assoc($result)) {
      $details[] = $rows;
    }
    for ($i=0; $i < $n ; $i++) {
      echo "
        <script>
          $(document).ready(function(){
            $('#issue').append(`
              <div id = ".$details[$i]['Id']." class='b-con'>
                <div class='details'>
                <br><br>
                  <p>Title : ".$details[$i]['Title']."  <br> Author : ".$details[$i]['Author']." </p>
                  <a href='issue.php?Book_Id=".$details[$i]['Book_Id']."'><button type='button' name='button'>Issue</button></a>
                  <a href='buy.php?Book_Id=".$details[$i]['Book_Id']."'><button type='button' name='button'>Buy</button></a>
                  <p> ".$details[$i]['Available']." Copies Available<br> Price : Rs. ".$details[$i]['Price']."</p>
                </div>
              </div>
            `);
          });
          $(document).ready(function () {
            document.getElementById(".$details[$i]['Id'].").style.backgroundImage = 'url(../../".$details[$i]['Cover'].")';
          })
      </script>
      ";
    }
  }
  else {
    echo "
      <script>
        console.log('Database connection error');
      </script>
    ";
  }
  // Search Book
  $search = $_GET['search'];
  if(!empty($search))
  {
    echo "
      <script>
        $(document).ready(function(){
          showSearch();
        });
      </script>;
    ";
    $search = strtoupper($search);
    $msg = 0;
    for($i=0;$i<$n;$i++)
    {
      $title=strtoupper($details[$i]['Title']);
      $id = $details[$i]['Id'];
      if($search==$title)
      {
        $msg = $msg + 1;
        echo "
        <script>
          $(document).ready(function () {
            document.getElementById('".$id."').style.display = 'inline-block';
          });
        </script>";
      }
      else {
        echo "
        <script>
          $(document).ready(function () {
            document.getElementById('".$id."').style.display = 'none';
          });
        </script>";
      }
    }

    if (!$msg) {
      echo "
      <script>
        $(document).ready(function(){
          document.getElementById('notfound').style.display = 'block';
        });
      </script>
      ";
    }
  }
  else {
    for($i=0;$i<$n;$i++){
      echo "
        <script>
          $(document).ready(function () {
            document.getElementById('".$details[$i]['Id']."').style.display = 'inline-block';
          });
        </script>
      ";
    }
  }
// clearing input field after search
  echo "
  <script>
    $(document).ready(function(){
      document.getElementById('sbar').value = '".$_GET['search']."';
    });
  </script>
  ";
//Reissue
$sql1 = "SELECT * FROM Books_Issued as B , Book_Details as D Where B.Book_Id = D.Book_Id AND B.Username = '".$_SESSION['user']."'";
$result1 = mysqli_query($db,$sql1);
$n1 = mysqli_num_rows($result1);
$issue = array();

    while($row = mysqli_fetch_assoc($result1)){
      $issue[] = $row;
    }
    for ($i = 0; $i < $n1 ; $i++) {
      echo "
        <script>
          $(document).ready(function(){
            $('#reissue').append(`
              <div id = 'i".$i."' class='b-con'>
                <div class='details'>
                <br><br>
                <p>Title : ".$details[$i]['Title']."  <br> Author : ".$details[$i]['Author']." </p>
                <a href='reissue.php?Book_Id=".$issue[$i]['Book_Id']."'><button type='button' name='button'>Re-Issue</button></a>
                <p> Due Date : ".$issue[$i]['Due_Date']."</p>
                  </div>
              </div>
            `);
          });
          $(document).ready(function () {
            document.getElementById('i".$i."').style.backgroundImage = 'url(../../".$issue[$i]['Cover'].")';
          })
      </script>
      ";
    }

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Student</title>
    <link rel="stylesheet" href="../../navbar.css">
    <link href="rindex.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB33PB87_lLQKC6YQj86GEv4-XVlIY7fxU&callback=initMap">
    </script>
    <script type="text/javascript">

      function initMap(){
        var uluru = {lat: 30.748788, lng:  76.756450};
        var map = new google.maps.Map(document.getElementById('map'), {zoom : 17 , center : uluru});
        var marker = new google.maps.Marker({ position : uluru , map : map});
      }
    </script>
    <script type="text/javascript">

      var shownav=()=>{
        document.getElementById('side-nav').style.width = "20vw";
        document.getElementById('sicon').style.display = "none";
        var elements = document.getElementsByClassName("right-container");
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.width = "79.9vw";
        }
      }
      var hidenav=()=>{
          document.getElementById('side-nav').style.width = "0";
          document.getElementById('sicon').style.display = "block";
          var elements = document.getElementsByClassName("right-container");
          for (var i = 0; i < elements.length; i++) {
              elements[i].style.width = "100%";
          }
        }
        $(document).ready(function(){
        showMyAccount();
      });

      function showMyAccount(){
        document.getElementById('myaccount').style.display = "block";
        document.getElementById('issue').style.display = "none";
        document.getElementById('reissue').style.display = "none";
        document.getElementById('notifications').style.display = "none";
        document.getElementById('reach').style.display = "none";
        $('#sicon').attr("src","../../images/wmenu.png");

      }
      function showIssue(){
        document.getElementById('myaccount').style.display = "none";
        document.getElementById('issue').style.display = "block";
        document.getElementById('reissue').style.display = "none";
        document.getElementById('notifications').style.display = "none";
        document.getElementById('reach').style.display = "none";
        $('#sicon').attr("src","../../images/menu.png");

      }
      function showReissue(){
        document.getElementById('myaccount').style.display = "none";
        document.getElementById('issue').style.display = "none";
        document.getElementById('reissue').style.display = "block";
        document.getElementById('notifications').style.display = "none";
        document.getElementById('reach').style.display = "none";
        $('#sicon').attr("src","../../images/menu.png");

      }
      function showReach(){
        document.getElementById('myaccount').style.display = "none";
        document.getElementById('issue').style.display = "none";
        document.getElementById('reissue').style.display = "none";
        document.getElementById('notifications').style.display = "none";
        document.getElementById('reach').style.display = "block";
        $('#sicon').attr("src","../../images/menu.png");

      }
      function showNotifications(){
        document.getElementById('myaccount').style.display = "none";
        document.getElementById('issue').style.display = "none";
        document.getElementById('reissue').style.display = "none";
        document.getElementById('notifications').style.display = "block";
        document.getElementById('reach').style.display = "none";
        $('#sicon').attr("src","../../images/menu.png");

      }
      $(document).ready(function(){
        document.getElementById('myaccount').style.display = "none";
        document.getElementById('issue').style.display = "block";
        document.getElementById('reissue').style.display = "none";
        document.getElementById('notifications').style.display = "none";
        document.getElementById('reach').style.display = "none";
        $('#sicon').attr("src","../../images/menu.png");
      });
      function showSearch() {
        document.getElementById('search').style.display = "block";
      }
      function closeSearch() {
        var array = document.getElementsByClassName('b-con');
        for (var i = 0; i < array.length; i++) {
          array[i].style.display = "inline-block";
        }
        document.getElementById('sbar').value = "";
        document.getElementById('search').style.display = "none ";
        document.getElementById('notfound').style.display = 'none';
        window.location.href = '.';
      }
      function edit(){
        var e = document.getElementsByClassName('edit-input');
        for (var i = 0; i < e.length; i++) {
          e[i].disabled=false;
        }
        document.getElementById('done').style.display = 'block';
        document.getElementById('ebtn').style.display = 'none';
      }
      function done(){
        var e = document.getElementsByClassName('edit-input');
        for (var i = 0; i < e.length; i++) {
          e[i].disabled=true;
          document.getElementById('ebtn').style.display = 'block';
          document.getElementById('done').style.display = 'none';
        }
      }
    </script>
  </head>
  <body>
    <nav class="nav-bar">
      <div class="nav1">
        <img class="logo" height="80%" src="../../images/logo.png" alt="logo">
        <p class="logo-text">
          Library<br>Management<br>System
        </p>
      </div>
      <div class="nav2">
        <a href="logout.php"><img class="logout" src="../../images/logout.png" alt="logout"> </a>
        <form id="searchform" method="get" action="<?php $_SERVER['PHP_SELF'] ?>">
          <input id="sbar" onkeyup="" type="search" name="search" placeholder="Search">
          <button id="sbtn" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div id="side-nav" class="side-nav">
      <img onclick="hidenav()" style="margin-top:10px;float:right;" src="../../images/close.png" width="30px">
      <div class="img-con">
        <img class="img" src="../<?php echo $edit['Profile_Pic']; ?>" alt="user-pic">
      </div>
      <p>Welcome <?php echo $edit['Name'] ?></p>
      <br><div class="menu">

        <a onclick="showIssue();" ><div id="s" class="li">Issue/Buy</div></a>

        <a onclick="showReissue();" ><div id="r" class="li">Reissue</div></a>

        <a onclick="showNotifications();" ><div id="n" class="li">Notifications</div></a>

        <a onclick="showMyAccount();"><div id="a" class="li"> My Account</div></a>

        <a onclick="showReach();" ><div id="b" class="li">Reach Us</div></a>

      </div>
    </div>

    <div class="main">
      <img id="sicon" onclick="shownav()" src="../../images/menu.png" width="30px">
      <!-- Search -->
      <div id="issue" class="right-container">
        <div id="search" class="search">
          <br>
          Search Results...
          <a onclick="closeSearch();">
            <img id="sclose" src="https://cdn3.iconfinder.com/data/icons/navigation-and-settings/24/Material_icons-01-09-512.png" alt="">
          </a>
          <hr style="margin-left:15px;">
        </div>
        <div id="notfound">
          No Results Found...
        </div>
      </div>

      <div id="reissue" class="right-container">

        </div>

      <div id="notifications" class="right-container">
        <div class="not">
        <span>
          Do You Want Email <br>Notifications?
        </span> <br>
          <a href="notifications.php?notifications=TRUE"><button id="y" type="button" name="Yes">Yes</button></a>
          <a href="notifications.php?notifications=FALSE"><button id="" type="button" name="No">No</button></a>
        </div>
      </div>
      <!-- MyAccount       -->

      <div id="myaccount" class="right-container">
        <div class="myacc">
          <div class="edit">
            <button onclick="edit()" id="ebtn" type="button" name="button">Edit</button>
          </div>
          <div class="content">
            <span id="head">
              My Account <br> <br>
            </span>

            <form action="edit.php" method="post">

              <label for="name">Name</label> <br>
              <input id="name"  type="text" value="<?php echo $edit['Name'] ?>" name="name" disabled= True><br>

              <label for="roll_no">Roll Number</label><br>
              <input id="roll_no"   type="text" value="<?php echo $edit['RollNo'] ?>" name="roll_no" disabled= True><br>

              <label for="branch">Branch</label><br>
              <input id="branch" type="text" value="<?php echo $edit['Branch'] ?>" name="branch" value="" disabled= True><br>

              <label for="year">Year</label><br>
              <input id="year" type="text" value="<?php echo $edit['Year'] ?>" name="year" value="" disabled= True><br>

              <label for="mob">Mobile No.</label><br>
              <input class="edit-input" id="mob" type="number" value="<?php echo $edit['Mobile'] ?>" name="mob" disabled= True><br>

              <label for="dob">Date Of Birth</label><br>
              <input class="edit-input" id="dob" type="date" value="<?php echo $edit['DOB'] ?>" name="dob" disabled = True><br>

              <label for="user">Username</label><br>
              <input class="edit-input" id="user" type="text" value="<?php echo $edit['Username'] ?>" name="user" disabled = True><br>

              <label for="pass">Password</label><br>
              <input class="edit-input" id="pass" type="password" value="<?php echo $edit['Password'] ?>" name="pass"disabled = True><br>

              <button id="done" type="submit" name="button">Done</button>
            </form>
          </div>

        </div>
      </div>
      <!-- Reach Us -->
      <div id='reach' class="right-container">
        <div class="container">
          <div class="jumbotron">
            <div id="map">

            </div>
          </div>
          <div id="feedback" class="jumbotron">
            <p>Reach Us!</p>
            <form action="comments.php" method="post">
              <label for="name">Name</label>
              <input class ="control" type="text" name="name">
              <br>
              <label for="email">Email</label>
              <input class = "control" type="email" name="email">
              <br>
              <label for="comments">Comments</label>
              <textarea name="comments" rows="6"></textarea>
              <br>
              <button type="submit" class="btn">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
