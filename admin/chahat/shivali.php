<?php
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
  $db = mysqli_connect('localhost', 'root', 'root', 'Library_Management_System');
  $sql = "SELECT * FROM Book_details";

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
                <td></td>

               </tr>
              `);

          });
        </script>";

    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="books.css">
    <script type="text/javascript" src="shivali2.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="shivali.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
    $(document).ready(function(){
      document.getElementById('con1').style.display = 'block';
      document.getElementById('con2').style.display = 'none';
      document.getElementById('con3').style.display = 'none';
      //document.getElementById('con4').style.display = 'none';
    });


    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
function showBooks () {
  document.getElementById('con1').style.display = 'block';
  document.getElementById('con2').style.display = 'none';
  document.getElementById('con3').style.display = 'none';

}
function add(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='block';


}
function edit(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='block';
  document.getElementById('con3').style.display='none';
}
    </script>
  </head>
  <body>
    <!--code of header-->

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

    <!-- code ends -->

    <!--code for sidebar starts from here-->
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Users</a>
  <a onclick= "showBooks();">Books</a>
  <a onclick="edit();">Edit Library Asset</a>
  <a href="#">Add Admin</a>
</div>

<!--code ends-->

<!--code for main starts from here-->
               <div id="main">
                <span style="overflow : hidden;   font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>



                    <!-- code for all library assets///////////-->

                    <div id="con1" class="libraryasset">
                      <h2 class="first">Library Asset</h2>
                      <div class="new">
                        <div class="content">
                      Asset List
                      <br></br>
                      <a class="abutton" onclick="add();">Add +</a>
                      <table id="tab">
       <tr>
    <th>Title</th>
    <th>Author</th>
    <th>Cover</th>
    <th>Total Numbers</th>
    <th>Status</th>
    <th>Price</th>

  </tr>
</table>


                      </div>

                    </div>
</div>



                    <!-- code ends here-->



                    <!-- code for edit library assset starts here. second codeeeee-->
                    <div id="con2" class ="top">

                               <p class ="ed"> Edit Library Asset</p>
                               <div class="editlibrary">
                                <p class="abc">Add Library Assets </p>
                                <form action="#" method="POST">
                                  <ul>
                        <div class="frstdiv">
                    <li ><label for="title" name="Title" >Title </label></li>
                    <li><input type ="text" id="title" placeholder="Enter"></li>

                    <li><label for="Subject" name="subject">Author Name</label></li>
                    <li><input type="text" id="subject" placeholder="Enter"></li>


                     <li><label for="title" name="Title" >Department </label></li>
                    <li><input type ="text" id="title" placeholder="Enter"></li>

                    <li><label for="Subject" name="subject">Purchase Date</label></li>
                    <li><input type="text" id="subject" placeholder="Enter"></li>


                     <li><label for="title" name="Title" >Status</label></li>
                    <li><input type ="text" id="title" placeholder="Enter"></li>
                  </div>

                           <div class="seconddiv">
                    <li><label for="Subject" name="subject">Subject</label></li>
                    <li><input type="text" id="subject" placeholder="Enter"></li>
                    <li><label for="title" name="Title" >Publisher </label></li>
                    <li><input type ="text" id="title" placeholder="Enter"></li>

                    <li><label for="Subject" name="subject">Asset type</label></li>
                    <li><input type="text" id="subject" placeholder="Enter"></li>

                    <li><label for="title" name="Title" >Price</label></li>
                    <li><input type ="text" id="title" placeholder="Enter"></li>
                  </div>






                    <li class="two1"><input class="two1" type="button" class="button" value="Submit"></li>
                    <li class="two2"><input  class="two2"type="button" class="button" value="Cancel"></li>


                  </ul>

                                </form>

                   </div>
</div>


                    <!-- code ends here-->




<!--code starts here for issued books-->
  <div id="con3" class="issue">

        <div class="container">
          <img src="7.jpeg" class="ma">
             <div class="middle">
    <div class="text"></div>
  </div>

        </div>
        <div class="context">
          Book Name= OOps</br>
          Author Name= balaguruswamy</br>
          Issued By= shivali</br>
          Isseud date=2323</br>
          Due date=7829</br>

        </div>
    </div></br></br>
</div>





<!--CODE ENDS-->






























    </body>
    </html>
