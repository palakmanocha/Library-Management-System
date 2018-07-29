<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="chahat3.css" rel="stylesheet">
    <link href="diksha.css" rel="stylesheet">

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
     <p class ="ed"> Edit Library Asset</p>
                               <div class="editlibrary">
                                <p class="abc">Edit Library Assets</p>



  <?php
  $id = $_POST['id'];
    $conn = mysqli_connect("localhost","root","palak","Library_Management_System");
   $sql = "select * from Book_Details;";
    $result = $conn-> query($sql);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
     $Title=$row['Title'];
       $Author=$row['Author'];
       $cover = $row['Cover'];
       $tn =  $row['Total_no'];
       $available = $row['Available'];
       $prc = $row['Price'];
     }
  }


?>

<form action="editbook.php" method="POST">
                                  <ul>
                        <div class="firstdiv1">



                     <li><label for="title" name="Title" >Title</label></li>
                    <li><input type ="text" id="title" class="la"  value="<?php echo $Title; ?>" color="white" name='tt'>

                    </li>

                    <li ><label for="title" name="Title" >Author Nmae</label></li>
                    <li><input type ="text" id="title" class="la" value="<?php echo $Author; ?>" name='an'></li>

                    <li><label for="title" name="Title" >TOTAL BOOKS</label></li>
                   <li><input type ="text" id="title" class="la"   value="<?php echo $tn; ?> " name='tn'></li>



                     </div>


                           <div class="seconddiv2">

                     <li><label for="title" name="Title" >TOTAL BOOKS</label></li>
                    <li><input type ="text" id="title" class="la"   value="<?php echo $tn; ?> " name='tn'></li>

                    <li><label for="Subject" name="subject">STATUS</label></li>
                    <li><input type="text" id="subject" class="la"  value="<?php echo $available; ?> " name='st'></li>

                    <li><label for="title" name="Title" >Price </label></li>
                    <li><input type ="text" id="title" class="la"  value="<?php echo $prc; ?> "name='prc'></li>

                    <li><label for="Subject" name="subject">Book ID</label></li>
                    <li><input type="text" id="subject"  class="la"  value="<?php echo $id; ?> " name='bi'></li>

                  </div>





                         <div class="thirddiv1">
                          <ul>
                <li ><button class="button1" value="Update">UPDATE</button></li>

                    </ul>
                    </div>
                  </ul>

                                </form>

<button type='submit' style="border: 2px solid #ed407f;
  background-color: #ed407f;
     color: white;
  width: 140px;
  font-size: 20px;
  cursor: pointer;
  text-align: center;
  padding: 3px;
  border-radius: 10px;
  height:60px;position:absolute;margin-left: 700px;
margin-top: 620px;
" onclick='sr();'>GO TO DASHBOARD</button>


                      </div>
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
