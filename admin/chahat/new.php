


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

    <div class="st-content">
      <!-- this is the wrapper for the content -->
      <div class="st-content-inner">
        <!-- extra div for emulating position:fixed of the menu -->
        <!-- Top Navigation -->

      <div class="mainclearfix">
          <div id="st-trigger-effects" class="column">
            
           
            <button data-effect="st-effect-14">>></button>

            
           
         </div>
       </div>
          
        <div class="details" id="user1">
          
          <img src="4.jpg">
          <h4>MARK ZUKERBERG</h4>

          <h3>Roll Number : UE173025</h3><br><br>
          <h3> Branch: Computer Science</h3><br><br>
          <h3> Year: First</h3><br><br>
          <h3> Moblile No: 9653697152</h3><br><br>
          <h3>Date of Birth :2017/05/05</h3><br><br>
          <h3>Username : mark@2786</h3><br><br>
        </div>







       
      
        
       
        </div>
        <!-- /main -->
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

 
