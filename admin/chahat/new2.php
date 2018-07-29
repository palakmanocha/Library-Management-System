<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>UIET | Library</title>
    <link rel="stylesheet" href="navbar.css">
    <link href="admindsa.css" rel="stylesheet">
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

        <div class="wrapper">
 
    
    <input type="text" class="search-input" data-ic-class="search-input" placeholder="Enter Roll No...   ">
    <button type="search-input">Search User</button>
    
  </div>


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
    
    <h2 class="icon icon-stack"><font color="white">Hii,Chahat</font></h2>
    <div class="area"></div>
    <nav class="main-menu">
            <ul>
                <li>
                    <a href="http://justinfarrow.com">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                            Book details
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-group fa-2x"></i>
                        <span class="nav-text">
                            Member details
                        </span>
                    </a>
                    
                </li>
                
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Reports
                        </span>
                    </a>
                </li>
                
                
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
        
  </nav>


<div class="st-content" >
      <!-- this is the wrapper for the content -->
      <div class="st-content-inner">
        <!-- extra div for emulating position:fixed of the menu -->
        <!-- Top Navigation -->

      <div class="mainclearfix">
          <div id="st-trigger-effects" class="column">
            
           
            <button data-effect="st-effect-14">>></button>
          </div>
           <!-- /main -->
       </div>

<?php 

$conn = mysqli_connect("localhost","root","","Library_Management_System");
   $sql = "select * from student_details;";
    $result = $conn -> query($sql);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0)
    {
      while($row = mysqli_fetch_assoc($result))
      {
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
        echo"</tr>";
      echo"</tbody>";
    echo"</table>";
  echo"</div>";
  echo"</section>";

      }

    }





 ?>
 </div>
      <!-- /st-content-inner -->
    </div>
    <!-- /st-content -->
  </div>
</div>


 <script type="text/javascript" >

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
    </script>
    
        
  </body>
    </html>
