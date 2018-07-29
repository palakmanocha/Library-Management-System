<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="chahat3.css" rel="stylesheet">
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



   <div id="con1" class="libraryasset">


   <div class="dis">
                      <h2 class="first">Library Asset</h2>
                      <div class="new">
                        <div class="content">
                      <h1>SEARCH RESULTS</h1>
                      <br></br>

                      <table id="tab">
       <tr>
    <th>Title</th>
    <th>Author</th>
    <th>Cover</th>
    <th>Total Numbers</th>
    <th>Status</th>
    <th>Price</th>
    <th>Book Id</th>
 </tr>


  <?php
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
   $id = $_POST['id'];
  $db = mysqli_connect('localhost', 'root', 'palak', 'Library_Management_System');
  $sql = "select * from Book_Details where Book_Id = '$id';";

  $result = mysqli_query($db, $sql);
  if ($result) {
    $n = mysqli_num_rows($result);
    $book = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $book[] = $row;
    }

    for ($i=0; $i < $n; $i++) {
      echo "
        <script>
          $(document).ready(function(){
            $('#tab').append(`
              <tr>
                <td>".$book[$i]['Title']."</td>
                <td>".$book[$i]['Author']."</td>
                <td>".$book[$i]['Cover']."</td>
                <td>".$book[$i]['Total_no']."</td>
                <td>".$book[$i]['Available']."</td>
                 <td>".$book[$i]['Price']."</td>
                 <td>".$book[$i]['Book_Id']."</td>




               </tr>
              `);

          });
        </script>";

    }
  }

?>
</table>
<button type='submit' style='margin-top:250px;margin-left:800px; cursor: pointer; display: inline-block;border-radius: 5%;color:white;background:black' onclick='sr();'>GO TO DASHBOARD</button>

                      </div>

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
