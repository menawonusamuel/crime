<?php
require_once('../models/Connection.php');
 session_start();
 if(isset($_GET['role']) && $_GET['role']=="Supt/DSupt"){
 	 $id = $conn->escape_value($_GET["crime"]);
  $sql="DELETE FROM crimes WHERE crime_id =".$id;
  $conn->query($sql);
 $_SESSION["cridelete"] = 
 "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
          <strong>Police  is deleted!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  
  header('Location: pol_complaints.php?id='.$_GET["id"].'&name='.$_GET["name"].'&role='.$_GET['role'].'&base='.$_GET['base'].'&department='.$_GET['department'].'');
 }else{
  $id = $conn->escape_value($_GET["crime"]);
  $sql="DELETE FROM crimes WHERE crime_id =".$id;
  $conn->query($sql);
 $_SESSION["cridelete"] = 
 "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
          <strong>Police  is deleted!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  
  header('Location: pol_complaints.php?id='.$_GET["id"].'&name='.$_GET["name"].'&role='.$_GET['role'].'&base='.$_GET['base'].'&department='.$_GET['department'].'');
}
?>