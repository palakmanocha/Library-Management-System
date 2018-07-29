<?php
session_start();
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="chahat3.css" rel="stylesheet">
    <link href="diksha.css" rel="stylesheet">
      <link href="style2.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <a href="index.html"> <img class="home" src="images/home-logo.png" alt="Home"> </a>
      </div>
    </nav>
    <div class="head">
    </div>
    <div id="st-container" class="st-container">
        <div class="st-pusher">
    <!--
                    example menus
                    these menus will be under the push wrapper
                -->
    <nav class="st-menu st-effect-14" id="menu-14">

      <div class="img-con">
        <img class="img" src="n.jpg" alt="user-pic">
      </div>

    <?php
      $conn = mysqli_connect("localhost","root","palak","Library_Management_System");
    $sql = "select * from Admin_Details where Username='palakmanocha';";
     $result = $conn -> query($sql);
     $resultCheck = mysqli_num_rows($result);


     if($resultCheck > 0)
     {
       while($row = mysqli_fetch_assoc($result))
       {


          echo" <h2 class='icon icon-stack'><font color='white'>"."Hii,".$row['Name']."</font></h2>";








        }
      }

            ?>
    <div class="area"></div>
    <nav class="main-menu">
            <ul>
                <li>
                    <a href="#" onclick="dash();">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#" onclick="showBooks();">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                            Book details
                        </span>
                    </a>

                </li>
                 <li class="has-subnav">
                    <a href="#" onclick="edit();">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                            Edit Library Asset
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#" onclick="mem();">
                       <i class="fa fa-group fa-2x"></i>
                        <span class="nav-text">
                            Member details
                        </span>
                    </a>

                </li>

            <li>
                   <a href="#" onclick="add();">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Add admin
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="bookiss();">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Books Issued
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="#" onclick="logout();">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>

  </nav>

    <div class="st-content" id="3">

      <div class="st-content-inner" id="3i">
      <div class="mainclearfix">
          <div id="st-trigger-effects" class="column">


            <button data-effect="st-effect-14">>></button>
          </div>

       </div>






 <section class="table1">

    <span class="hoverCSS3">
    MEMBER DETAILS
</span>
 <div class="wrapper">
    <form action="search.php" method="post">

    <input type="text" class="search-input" data-ic-class="search-input" placeholder="Enter Roll No of user" name="rn">
    <button type="search-input" onclick = 'chahat();'>Search User</button>
  </form>



  </div>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>NAME</th>
          <th>ROLL NO</th>
          <th>BRANCH</th>
          <th>YEAR</th>
          <th>MOBILE NO</th>
          <th>EMAIL ID</th>
          <th>DATE OF BIRTH</th>
          <th>USERNAME</th>
          <th>   </th>

        </tr>
      </thead>
    </table>
  </div>

       <?php

    $conn = mysqli_connect("localhost","root","palak","Library_Management_System");
   $sql = "select * from Student_Details;";
    $result = $conn-> query($sql);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {

        $_SESSION['rollno'] =$row['RollNo'] ;

        /* echo "<div style='  width:800px;
                    margin-top:200px;
                   margin-left:100px;
                         height:200px;
                 background: rgba(35, 35, 35, 0.5);border:solid white 2px;s'>";






         echo "<img src='4.jpg' style='position:absolute;width:20%;height:12%;font-size:20px;margin-top:10px;margin-left:20px;border-radius:50%;'>";
          echo"<h4 style ='position:absolute;color:cyan; margin-top:160px;margin-left:60px;font-size:30px;'>".$row['Name']."</h4>";

          echo"<h3 style='position:absolute;color:cyan;float: right; margin-top:30px;margin-left:350px;font-family: Arial, Verdana, Sans-serif;letter-spacing:2px;font-size:15px;'>"."RollNo:".$row['RollNo']."<br>"."Branch1:" .$row['Branch']."<br>"."Year:".$row['Year']."<br>"."MobileNo:".$row['Mobile']."<br>"."EmailID:".$row['Email']."<br>"."Date Of Birth:".$row['DOB']."<br>"."Username:".$row['Username']."<br>"."</h3>";

          echo"<button type='submit' style='margin-top:170px;margin-left:600px; cursor: pointer; display: inline-block;border-radius: 5%;color:white;background:black'>"."DELETE ACCOUNT"."</button>";
          <h3> Branch: Computer Science</h3><br><br>
          <h3> Year: First</h3><br><br>
          <h3> Moblile No: 9653697152</h3><br><br>
          <h3>Date of Birth :2017/05/05</h3><br><br>
          <h3>Username : mark@2786</h3><br><br>
       echo "</div>" ;*/


       echo"<div class='tbl-content'>";
    echo"<table cellpadding='0' cellspacing='0' border='0'>";
      echo"<tbody>";
        echo"<tr>";
          echo"<td>".$row['Name']."</td>";
          echo"<td>".$row['RollNo']."</td>";
          echo"<td>".$row['Branch']."</td>";
          echo"<td>".$row['Year']."</td>";
          echo"<td>".$row['Mobile']."</td>";
          echo"<td>".$row['Email']."</td>";
          echo"<td>".$row['DOB']."</td>";
          echo"<td>".$row['Username']."</td>";
          echo"<td>"."<img src='5.png'  onclick='goto();' style='height:20px; margin-left:50px; margin-top:20px; cursor:'pointer'>"."</td>";
        echo"</tr>";
      echo"</tbody>";
    echo"</table>";
  echo"</div>";

 /* echo"<script type='text/javascript' >";
  echo"function goto(){
      window.location.href = 'delete.php';

    }";*/






      }

    }




    ?>

  </section>
</div>
</div>

       <div class="dash1" id="1">
         <div class="mainclearfix">
          <div id="st-trigger-effects" class="column">


            <button data-effect="st-effect-14">>></button>
          </div>

       </div>






        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


        <div class ="ct">
       <div class="foo">
  <span class="letter" data-letter="W">W</span>
  <span class="letter" data-letter="E">E</span>
  <span class="letter" data-letter="L">L</span>
  <span class="letter" data-letter="C">C</span>
  <span class="letter" data-letter="O">O</span>
  <span class="letter" data-letter="M">M</span>
  <span class="letter" data-letter="E">E</span>
  <span class="letter" data-letter=""> </span>
  <span class="letter" data-letter="A">A</span>
  <span class="letter" data-letter="D">D</span>
  <span class="letter" data-letter="M">M</span>
  <span class="letter" data-letter="I">I</span>
  <span class="letter" data-letter="N">N</span>

</div>

        </div>

<div class="profile-card">
  <div class="middle-div">
    <div class="inner-middle-div">
      <div class="card-body">
        <div class="user-info">


         <!-- <div class='user-pic' >


            <span class='edit'>
          <i class='fas fa-camera'></i>
        </span>
          </div>
          <h3 class="user-name">Amanda Seyfried</h3>
          <p>Web Designer</p>-->
           <?php


   $sql = "select * from Admin_Details where Username='palakmanocha';";
    $result = $conn -> query($sql);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {



         echo" <div class='user-pic' style=' position: relative;width: 90px;height: 90px;margin: auto;border-radius: 100%;background-image: url(https://images.pexels.com/photos/851658/pexels-photo-851658.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260); background-repeat: no-repeat;background-size: cover; background-position: center; border: 3px solid #fff;z-index: 1;'>";


           echo"  <span class='edit' style='position: absolute; bottom: 0; right: 0; width: 28px;height: 28px;background-color: #feca4a;
  z-index: -1;border-radius: 100%;text-align: center;line-height: 27px;cursor: pointer;'>";
          echo"<i class='fas fa-camera' style='font-size: 14px;vertical-align: middle;'></i>";
        echo"</span>";
         echo" </div>";
          echo"<h3 class='user-name'>".$row['Name']."</h3>";
         echo" <p style=' margin: 5px 0 0 0; font-size: 14px; opacity: 0.7; font-weight: 400;'>".$row['Designation']."</p>";
         echo" <p style=' margin: 8px 0 0 0; font-size: 14px; opacity: 0.7; font-weight: 400;'>".$row['Email']."</p>";





       }
     }

           ?>


        </div>
      </div>
      <div class="card-footer">
        <ul class="list">
          <li class="list-item">
            <span class="count">3</span>
            <span>Posts</span>
          </li>
          <li class="list-item">
            <span class="count">80</span>
            <span>Followers</span>
          </li>
          <li class="list-item">
            <span class="count">7</span>
            <span>Following</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>





</div>
















     <div id="con1" class="libraryasset">
        <div class="mainclearfix">
          <div id="st-trigger-effects" class="column">


            <button data-effect="st-effect-14">>></button>
          </div>

       </div>



     <div class="dis">
                      <h2 class="first">Library Asset</h2>
                      <div class="new">
                        <div class="content">
                      <h1>Asset List</h1>
                      <br></br>
                      <a class="abutton" onclick="add1();">Add +</a>
                       <div class="wrapper">
    <form action="searchb.php" method="post">

    <input type="text" class="search-input" data-ic-class="search-input" placeholder="ENTER BOOK ID"  name="id">
    <button type="search-input" onclick ='chahatb();'>Search book</button>
  </form>

</div>
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


  $sql = "SELECT * FROM Book_Details";

  $result = mysqli_query($conn, $sql);
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


                    </div>

                    </div>
                  </div>
</div>



                    <!-- code ends here-->



                    <!-- code for edit library assset starts here. second codeeeee-->
                    <div id="con2" class ="top">

                               <p class ="ed"> Edit Library Asset</p>
                               <div class="editlibrary">
                                <p class="abc">Add Library Assets </p>
                                <form action= "addbook.php" method="POST" enctype="multipart/form-data">
                                  <ul>
                        <div class="firstdiv">
                    <li ><label for="title" name="Title" >Title </label></li>
                    <li><input type ="text" id="title" class="la" placeholder="Enter" name="tt"></li>

                    <li><label for="Subject" name="subject">Author Name</label></li>
                    <li><input type="text" id="subject"  class="la" placeholder="Enter" name="an"></li>


                     <li><label for="title" name="Title" >Cover Page</label></li>
                    <li><input type="file" id="inputImage" Name="fileToUpload" class="la" ></li>



                  <!--  <li><input type="text" id="inputImage" Name="imageUpload" class="la" >-->

                    <li><label for="Subject" name="subject">Purchase Date</label></li>
                    <li><input type="date" id="subject" class="la" name="pd"></li>


                     <li><label for="title" name="Title" >Status</label></li>
                    <li><input type ="text" id="title" class="la"  placeholder="Enter" name="st"></li>
                  </div>

                           <div class="seconddiv">
                    <li><label for="Subject" name="subject">Subject</label></li>
                    <li><input type="text" id="subject" class="la" placeholder="Enter" name ="sb"></li>

                    <li><label for="title" name="Title" >Total Number </label></li>
                    <li><input type ="text" id="title" class="la" placeholder="Enter" name="tn"></li>

                    <li><label for="Subject" name="subject">Book Id</label></li>
                    <li><input type="text" id="subject"  class="la" placeholder="Enter" name="bi"></li>

                    <li><label for="title" name="Title" >Price</label></li>
                    <li><input type ="text" id="title" class="la" placeholder="Enter" name="prc"></li>
                  </div>





                         <div class="fourthdiv">

                    <button class="button1" value="Submit" >ADD</button>


                    </div>


                                </form>

                   </div>
</div>

<div id="con4" class ="top2">

  <div class="mainclearfix">
          <div id="st-trigger-effects" class="column">


            <button data-effect="st-effect-14">>></button>
          </div>

       </div>

                               <p class ="ed"> Edit Library Asset</p>
                               <div class="editlibrary">
                                <p class="abc">Edit Library Asset </p>

                                <div class="wrapper">

    <form action = "showdetails.php" method= 'POST'>
    <input type="text" class="search-input" data-ic-class="search-input" placeholder="ENTER BOOK ID"  name="id">
    <button type="search-input">Show Details</button>
    </form>
 </div>
                                <form action="editbook.php" method="POST">
                                  <ul>
                         <div class="firstdiv">
                    <li ><label for="title" name="Title" >Title </label></li>
                    <li><input type ="text" id="title" class="la" placeholder="Enter" name="tt"></li>

                    <li><label for="Subject" name="subject">Author Name</label></li>
                    <li><input type="text" id="subject"  class="la" placeholder="Enter" name="an"></li>


                     <li><label for="title" name="Title" >Cover Page</label></li>
                    <li><input type="file" id="inputImage" Name="cp" class="la" ></li>
                   <!--


                    <li><input type="text" id="inputImage" Name="imageUpload" class="la" >-->

                    <li><label for="Subject" name="subject">Purchase Date</label></li>
                    <li><input type="date" id="subject" class="la" name="pd"></li>


                     <li><label for="title" name="Title" >Status</label></li>
                    <li><input type ="text" id="title" class="la"  placeholder="Enter" name="st"></li>
                  </div>

                           <div class="seconddiv">
                    <li><label for="Subject" name="subject">Subject</label></li>
                    <li><input type="text" id="subject" class="la" placeholder="Enter" name ="sb"></li>

                    <li><label for="title" name="Title" >Total Number </label></li>
                    <li><input type ="text" id="title" class="la" placeholder="Enter" name="tn"></li>

                    <li><label for="Subject" name="subject">Book Id</label></li>
                    <li><input type="text" id="subject"  class="la" placeholder="Enter" name="bi"></li>

                    <li><label for="title" name="Title" >Price</label></li>
                    <li><input type ="text" id="title" class="la" placeholder="Enter" name="prc"></li>
                  </div>



                         <div class="thirddiv">
                          <ul>
                <li ><button class="button1" value="Update">EDIT</button></li>

                    </ul>
                    </div>
                  </ul>

                                </form>

                   </div>
</div>


<div id="con3" class="issue">

        <div class="container1">
          <h1 style='margin-left:500px;margin-top:40px;width:200px;'>ISSUED BOOKS</h1>
          <div class="tatti">
            <?php


    $conn = mysqli_connect("localhost","root","palak","Library_Management_System");
   $sql = "select * from Books_Issued;";
    $result = $conn -> query($sql);




      while($row = mysqli_fetch_assoc($result))
      {
            $_SESSION['title'] = $row['Title'];
            echo"<div style=' border:solid white 1px; height:300px;width:500px;margin-top:100px;background-color:rgba(0,0,0,0.5);'>";
          echo"<img src='7.jpeg' style='width: 20%;'>"."</br>"."</br>";
        echo"<p class='heading3'>".$row['Title']."</br>";
          echo"<strong>"."Author Name:"."</strong>".$row['Author']."</br>";

          echo"<strong>"."Issued Date:"."</strong>".$row['Issue_Date']."</br>";
          echo"<strong>"."Due Date:"."</strong>".$row['Due_Date']."</br>";
          echo"<button type='submit' onclick='issue();' style='border: 2px solid #ed407f;
  background-color: #ed407f;
color: white;
  width: 39.2%;
  height:9%;
  font-size: 20px;
  cursor: pointer;
  text-align: center;
  padding: 3px;'>"."ISSUED BY"."</button>";
  echo"</div>";


      }










    ?>


        </div>

        </div>
      </div>


<div id="con6" class="issue">
  <div class="context">
    <table id="tab2" width="400px" cellpadding="15px" style='position:absolute; margin-top:100px;margin-left:500px;'>
       <tr>
      <th class="heading1">Issued By</th>
    </tr>

    <?php
    $title =  $_SESSION['title'];

 $conn = mysqli_connect("localhost","root","palak","Library_Management_System");
   $sql = "select * from Books_Issued where Title='$title';";
    $result = $conn -> query($sql);




      while($row = mysqli_fetch_assoc($result))
      {

       echo"<tr>";
      echo "<td>".$row['Name']."</td>";
       echo"<tr>";
      }



?>

    </table>

    </div>

</div>




</div>
</div>


<script type="text/javascript" >
function goto(){
      window.location.href = 'delete.php';
    }

     function chahat(){
      window.location.href = 'search.php';
    }

    function chahatb(){
      window.location.href = 'searchb.php';
    }


     function mem(){
      document.getElementById('1').style.display = 'none';
       document.getElementById('3').style.display = 'block';
       document.getElementById('con1').style.display = 'none';
  document.getElementById('con2').style.display = 'none';

   document.getElementById('con4').style.display = 'none';

    document.getElementById('con3').style.display = 'none';
     document.getElementById('con6').style.display = 'none';
          }


    function dash(){
       document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'block';
       document.getElementById('con1').style.display = 'none';
  document.getElementById('con2').style.display = 'none';
  document.getElementById('con4').style.display = 'none';

   document.getElementById('con3').style.display = 'none';
    document.getElementById('con6').style.display = 'none';



    }
    function showBooks(){
  document.getElementById('con1').style.display = 'block';
  document.getElementById('con2').style.display = 'none';
  document.getElementById('con4').style.display = 'none';
  document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'none';

        document.getElementById('con3').style.display = 'none';
         document.getElementById('con6').style.display = 'none';

}
function add1(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='block';
  document.getElementById('con4').style.display = 'none';
  document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'none';

        document.getElementById('con3').style.display = 'none';
         document.getElementById('con6').style.display = 'none';


}
function edit(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='none';
  document.getElementById('con4').style.display = 'block';
  document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'none';

        document.getElementById('con3').style.display = 'none';
         document.getElementById('con6').style.display = 'none';

}

function issue(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='none';
  document.getElementById('con4').style.display = 'none';
  document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'none';

        document.getElementById('con3').style.display = 'block';
         document.getElementById('con6').style.display = 'block';

}
function bookiss(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='none';
  document.getElementById('con4').style.display = 'none';
  document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'none';

        document.getElementById('con3').style.display = 'block';
         document.getElementById('con6').style.display = 'none';

}


function addbook(){
   window.location.href = 'addbook.php';

}
function showdetails(){
   window.location.href = 'showdetails.php';

}
function add(){
   window.location.href = 'add_member.html';



}
function logout(){
   window.location.href = 'logout.php';



}

var click = document.querySelectorAll('div button');
    var menu = document.querySelector('#st-container');
    var pusher = document.querySelector('.st-pusher');
// to store the corresponding effect
     var effect;

// adding a click event to all the buttons
   for (var i = 0; i < click.length; i++) {
   click[i].addEventListener('click', addClass)
}

pusher.addEventListener('click', closeMenu);



function addClass(e) {
  // to get the correct effect
  effect = e.target.getAttribute('data-effect');
  // adding the effects
  menu.classList.toggle(effect);
  menu.classList.toggle('st-menu-open');

  // console.log(e.target.getAttribute('data-effect'));
}

function closeMenu(el) {
  // if the click target has this class then we close the menu by removing all the classes
  if (el.target.classList.contains('st-pusher')) {
    menu.classList.toggle(effect);
    menu.classList.toggle('st-menu-open');
    // console.log(el.target);
  }
}

  $(document).ready(function(){

          document.getElementById('3').style.display = 'none';
       document.getElementById('1').style.display = 'block';
       document.getElementById('con1').style.display = 'none';
  document.getElementById('con2').style.display = 'none';

  document.getElementById('con6').style.display = 'none';
  document.getElementById('con4').style.display = 'none';


      });


    </script>


  </body>
    </html>
