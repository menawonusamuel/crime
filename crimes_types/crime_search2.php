<?php session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Crime.php');
  
 
  
 

 if(isset($_POST["crimeupdate"])){
  $id = $_POST["crime_id"];
  $upcrimeCom = $crimes->update($id, $_POST);
  $conn->query($upcrimeCom);
  $_SESSION["cupdate"] = "Crime is updated" ;
  
  header('Location: crime_add.php');
}
if(isset($_POST["crimedelete"])){
  $id = $_POST["crime_id"];
  $delcrimeCom = $crimes->delete($id);
  $conn->query($delcrimeCom);
  $_SESSION["cdelete"] =  "Police Department is deleted" ;
  
  header('Location: crime_add.php');
}

?>