<!--A Design by Samuel Menawonu
Author: Samuel Menawonu
Matric No: RGU46767
License: Creative Commons Attribution 3.0 Unported
Github URL: http://github.com/licenses/by/3.0/
-->
<?php session_start();?>
<!DOCTYPE html>
<head>
  <title>Aberdeen Onlinline Police Reporting Dashboard | Home :: Samuel Menawonu</title>
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
            }
    </style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</head>
<body class="bg-light">

<!-- Top container -->
<div class="w3-container sticky fixed-top w3-dark-blue bg-primary w3-large w3-padding" style="z-index:4">
  <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right"><img src="../crime.png" width="100px" height="40px"></span>
  <span class="w3-right "><a href ="report.php" class="btn btn-secondary">Go to Reporter's page</a></span>
</div>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-dark-grey w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
       <div class="circle"></div>
    </div>
    <div class="w3-col s8">
      <span>Welcome, <strong><?php
        if(isset($_GET['username'])){
            echo $_GET['username'];
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
  <a href="http://localhost/crime/admin/dashboard.php?username=<?php
  if(isset($_GET['username'])){
      echo $_GET['username'];
  }else{
      echo " ";
  }
  ?>" class="  w3-padding w3-blue " onclick="home()"><i class="fa fa-users fa-fw"></i>  Home</a>
  <div id="accordion"/>
      <a href="#" class="w3-padding " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" ><i class="fa fa-eye fa-fw"></i>   Bases</a>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
          <a href="../police_command/command_add.php?username=<?php if(isset($_GET['username'])){
              echo $_GET['username'];
              }else{
              echo "";
              }?>" class="w3-padding btn btn-link"><i class="fa fa-bullseye fa-fw"></i>  Add Police Bases</a>
      </div>

      <a href="" class="w3-padding" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="fa fa-users fa-fw"></i>   Departments</a>

      <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
          <a href="../police_dept/dept_add.php?username=<?php if(isset($_GET['username'])){
              echo $_GET['username'];
          }else{
              echo "";
          }?>"" class="w3-padding btn btn-link"><i class="fa fa-bullseye fa-fw"></i>  Add Police Departments</a>
      </div>

      <a href="" class="w3-padding" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><i class="fa fa-bullseye fa-fw"></i>  Police Officer</a>

      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <a href="../police/police_add.php?username=<?php if(isset($_GET['username'])){
              echo $_GET['username'];
          }else{
              echo "";
          }?>"" class="w3-padding btn btn-link b"><i class="fa fa-bullseye fa-fw"></i>  Add Police </a>
      </div>

      <a href="" class="w3-padding" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-diamond fa-fw"></i>  Most wanted</a>

      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <a href="../mwanted/mwanted.php?username=<?php if(isset($_GET['username'])){
              echo $_GET['username'];
          }else{
              echo "";
          }?>""  class="w3-padding btn btn-link b"><i class="fa fa-bullseye fa-fw"></i>  Add Most Wanted</a>
      </div>

    <a href="../crime_files/cfile_list.php?username=<?php if(isset($_GET['username'])){
        echo $_GET['username'];
    }else{
        echo " ";
    }?>" class="w3-padding"  aria-expanded="true" aria-controls="collapseFive"><i class="fa fa-bell fa-fw"></i> List all CrimeFiles</a>

      <a href="" class="w3-padding"data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><i class="fa fa-bell fa-fw"></i>  Settings</a>
      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">

      <a href="../admin/admin_add.php?username=<?php if(isset($_GET['username'])){
          echo $_GET['username'];
      }else{
          echo "";
      }?>"" class="w3-padding"><i class="fa fa-bank fa-fw"></i>Add New Admin</a>
      <a href="../admin/admin_edit.php?username=<?php if(isset($_GET['username'])){
          echo $_GET['username'];
      }else{
          echo "";
      }?>"" class="w3-padding"><i class="fa fa-bank fa-fw"></i>Edit Profile</a>
      <a href="../admin/logout.php" class="w3-padding"><i class="fa fa-bank fa-fw"></i> Logout</a>
    </div>

</nav>


<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
