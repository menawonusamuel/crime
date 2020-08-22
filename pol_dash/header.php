<!--A Design by Samuel Menawonu
Author: Samuel Menawonu
Matric No: RGU46767
-->
<?php session_start();?>
<!DOCTYPE html>
<head>
    <title>Aberdeen Online Police Reporting Dashboard | Home :: Samuel Menawonu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Online Reporting template , Bootstrap Templates, Android Compatible web template,
  Smartphone Compatible web template,  Responsive Web design" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- W3-css -->
    <link rel="stylesheet" type="text/css" href="../css/lib/w3.css">
    <!-- Custom CSS -->
    <link href="../css/design.css" rel='stylesheet' type='text/css' />
    <!-- fontawesome CSS -->
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.css">

    <style>
        html,body,h1,h2,h3,h4,h5 {
            font-family: "Raleway", sans-serif;
        }s
    </style>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</head>
<body class="bg-light">

<!-- Top container -->
<div class="w3-container sticky fixed-top w3-dark-blue bg-primary w3-large w3-padding" style="z-index:4">
    <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-right"><img src="../crime.png" width="100px" height="40px"></span>
</div>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-dark-grey w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <div class="circle"></div>
        </div>
        <div class="w3-col s8">
      <span>Welcome, <strong><?php
              if(isset($_GET['name'])){
                  echo $_GET['name'];
              }else{
                  echo " ";
              }
              ?></strong></span><br>
            <span>Role: <strong><?php
                    if(isset($_GET['role'])){
                        echo $_GET['role'];
                    }else{
                        echo " ";
                    }
                    ?></strong></span><br>
            <span>Department <strong><?php
                    if(isset($_GET['department'])){
                        echo $_GET['department'];
                    }else{
                        echo " ";
                    }
                    ?></strong></span><br>
            <span>Command Base <strong><?php
                    if(isset($_GET['base'])){
                        echo $_GET['base'];
                    }else{
                        echo " ";
                    }
                    ?></strong></span><br>
            <a href="#" class="w3-hover-none w3-hover-text-red w3-show-inline-block"><i class="fa fa-envelope"></i></a>
            <a href="#" class="w3-hover-none w3-hover-text-green w3-show-inline-block"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-hover-none w3-hover-text-blue w3-show-inline-block"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>

    <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="http://localhost/crime/pol_dash/pol_dashboard.php?id=<?php
    if(isset($_GET['id'])){
        echo $_GET['id'];
    }else{
        echo " ";
    }?>&name=<?php
    if(isset($_GET['name'])){
        echo $_GET['name'];
    }else{
        echo " ";
    }?>&role=<?php
    if(isset($_GET['role'])){
        echo $_GET['role'];
    }else{
        echo " ";
    }
    ?>&base=<?php
    if(isset($_GET['base'])){
        echo $_GET['base'];
    }else{
        echo " ";
    }
    ?>&department=<?php
    if(isset($_GET['department'])){
        echo $_GET['department'];
    }else{
        echo " ";
    }
    ?>" class="  w3-padding w3-blue " onclick="home()"><i class="fa fa-users fa-fw"></i>  Home</a>


    <a href="http://localhost/crime/pol_dash/pol_complaints.php?id=<?php
    if(isset($_GET['id'])){
        echo $_GET['id'];
    }else{
        echo " ";
    }?>&name=<?php
    if(isset($_GET['name'])){
        echo $_GET['name'];
    }else{
        echo " ";
    }?>&role=<?php
    if(isset($_GET['role'])){
        echo $_GET['role'];
    }else{
        echo " ";
    }
    ?>&base=<?php
    if(isset($_GET['base'])){
        echo $_GET['base'];
    }else{
        echo " ";
    }
    ?>&department=<?php
    if(isset($_GET['department'])){
        echo $_GET['department'];
    }else{
        echo " ";
    }
    ?>" class="w3-padding" ><i class="fa fa-eye fa-fw"></i>   View Cases</a>




    <a href="" class="w3-padding"data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><i class="fa fa-bell fa-fw"></i>  Settings</a>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">

        <a href="../pol_dash/pol_edit.php?id=<?php
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }else{
            echo " ";
        }?>&name=<?php
        if(isset($_GET['name'])){
            echo $_GET['name'];
        }else{
            echo " ";
        }?>&role=<?php
        if(isset($_GET['role'])){
            echo $_GET['role'];
        }else{
            echo " ";
        }
        ?>&base=<?php
        if(isset($_GET['base'])){
            echo $_GET['base'];
        }else{
            echo " ";
        }
        ?>&department=<?php
        if(isset($_GET['department'])){
            echo $_GET['department'];
        }else{
            echo " ";
        }
        ?>" class="w3-padding"><i class="fa fa-bank fa-fw"></i>Edit Profile</a>
        <?php
        if($_GET['role']=="Insp/DI" || $_GET['role']=="Supt/DSupt" || $_GET['role']=="Ch Insp/DCI") {
            ?>
            <a href="../pol_dept/index.php?id=<?php
            if(isset($_GET['id'])){
                echo $_GET['id'];
            }else{
                echo " ";
            }?>&name=<?php
            if(isset($_GET['name'])){
                echo $_GET['name'];
            }else{
                echo " ";
            }?>&role=<?php
            if(isset($_GET['role'])){
                echo $_GET['role'];
            }else{
                echo " ";
            }
            ?>&base=<?php
            if(isset($_GET['base'])){
                echo $_GET['base'];
            }else{
                echo " ";
            }
            ?>&department=<?php
            if(isset($_GET['department'])){
                echo $_GET['department'];
            }else{
                echo " ";
            }
            ?>" class="w3-padding"><i class="fa fa-bank fa-fw"></i>Enter Police Department</a>
            <?php
        }else{
            echo " ";
        }


        ?>
        <a href="../pol_dash/pol_logout.php" class="w3-padding"><i class="fa fa-bank fa-fw"></i> Logout</a>

    </div>
</nav>


<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>