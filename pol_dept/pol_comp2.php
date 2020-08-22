<?php
 //include_once("header.php");
 require_once('../models/Connection.php');
 require_once('../models/Reporter.php');
 session_start();

  if(isset($_GET['role']) && $_GET['role']=="Supt/DSupt"){
  	if(isset($_POST['submit'])){
	$id= $_POST['crime_id'];
	$upCrime = $report->update($id, $_POST);
  $conn->query($upCrime);
  $_SESSION["criupdate"]= "<script>alert(\"Police Department is updated!</strong>\");</script>" ;
  
 header('Location: pol_complaints.php?id='.$_GET["id"].'&name='.$_GET["name"].'&role='.$_GET['role'].'&base='.$_GET['base'].'&department='.$_GET['department'].'');
}
  	}
    else{
if(isset($_POST['submit'])){
	$id= $_POST['crime_id'];
	$upCrime = $report->update($id, $_POST);
  $conn->query($upCrime);
  $_SESSION["criupdate"]= "<script>alert(\"Police Department is updated!</strong>\");</script>" ;
  
 header('Location: pol_complaints.php?id='.$_GET["id"].'&name='.$_GET["name"].'&role='.$_GET['role'].'&base='.$_GET['base'].'&department='.$_GET['department'].'');
}
}
?>