
<?php
session_start();
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
  $db = mysqli_connect('localhost', 'root', 'root', 'Library_Management_System');
  $sql = "SELECT * FROM Book_Details";

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
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="diksha.css">
    <script type="text/javascript" src="shivali2.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="admindsa.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
    $(document).ready(function(){
      document.getElementById('con1').style.display = 'none';
      document.getElementById('con2').style.display = 'none';
      document.getElementById('con3').style.display = 'block';
       document.getElementById('con4').style.display = 'none';
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
   document.getElementById('con4').style.display = 'none';

}
function add(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='block';
   document.getElementById('con4').style.display = 'none';


}
function edit(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='block';
  document.getElementById('con3').style.display='none';
   document.getElementById('con4').style.display = 'none';
}

function edit2(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='none';
  document.getElementById('con3').style.display='block';
   document.getElementById('con4').style.display = 'none';
}
function issue(){
  document.getElementById('con1').style.display='none';
  document.getElementById('con2').style.display='none';
  document.getElementById('con3').style.display='block';
   document.getElementById('con4').style.display = 'block';
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
  <a onclick="edit2();">Add Admin</a>
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
                                <form action="addbook.php" method="POST">
                                  <ul>
                        <div class="frstdiv">            
                    <li ><label for="title" name="Title" >Title </label></li>
                    <li><input type ="text" id="title" placeholder="Enter" name="title"></li>
                      
                    <li><label for="Subject" name="subject">Author Name</label></li>
                    <li><input type="text" id="subject" placeholder="Enter" name="aname"> </li>
                  

                     <li><label for="title" name="Title" >Cover Page</label></li>
                    <li><input type ="text" id="title" placeholder="Enter" name="cp"></li>
                  
                    <li><label for="Subject" name="subject">Purchase Date</label></li>
                    <li><input type="date" id="subject" placeholder="Enter" name="pd"></li>
                    

                     <li><label for="title" name="Title" >Status</label></li>
                    <li><input type ="text" id="title" placeholder="Enter" name="st"></li>
                  </div>
                           
                           <div class="seconddiv">
                    <li><label for="Subject" name="subject">Subject</label></li>
                    <li><input type="text" id="subject" placeholder="Enter" name="sb"></li>
                    <li><label for="title" name="Title" >STOCK</label></li>
                    <li><input type ="text" id="title" placeholder="Enter" name="sto"></li>
                    
                    <li><label for="Subject" name="subject">Book ID</label></li>
                    <li><input type="text" id="subject" placeholder="Enter" name="bi"></li>

                    <li><label for="title" name="Title" >Price</label></li>
                    <li><input type ="text" id="title" placeholder="Enter" NAME="prc"></li>
                  </div>



                    
                  

                    <li class="two1"><button type="submit" name="button" class="button">ADD</button></li>
                    
                    
                    
                  </ul>

                                </form>
                              
                   </div>            
</div>


                    <!-- code ends here-->




<!--code starts here for issued books-->
<div id="con3" class="issue">

        <div class="container">
          <h1 style='margin-left:500px;margin-top:40px;width:200px;'>ISSUED BOOKS</h1>
          <div class="tatti">
            <?php


    $conn = mysqli_connect("localhost","root","root","Library_Management_System");
   $sql = "select * from Books_Issued;";
    $result = $conn -> query($sql);
    


    
      while($row = mysqli_fetch_assoc($result))
      {
            $_SESSION['title'] = $row['Title'];
            echo"<div style=' border:solid white 1px; height:300px;margin-top:100px;background-color:rgba(0,0,0,0.5);'>";
          echo"<img src='7.jpeg' style='width: 50%;'>"."</br>"."</br>";
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
  

<div id="con4" class="issue">
  <div class="context">
    <table id="tab2" width="400" cellpadding="15px">
       <tr>
      <th class="heading1">Issued By</th>
    </tr>

    <?php
    $title =  $_SESSION['title'];

 $conn = mysqli_connect("localhost","root","root","Library_Management_System");
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


<!--CODE ENDS-->






























    </body>
    </html>