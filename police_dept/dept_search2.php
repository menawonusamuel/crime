<?php session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Police_Department.php');
  
 

 if(isset($_POST["deptupdate"])){
  $id = $_POST["dept_id"];
  $upCom = $depts->update($id, $_POST);
  $conn->query($upCom);
  $_SESSION["dupdate"] ="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police Department is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>" ;
  
  header('Location: dept_add.php');
}
if(isset($_POST["deptdelete"])){
  $id = $_POST["dept_id"];
  $delCom = $depts->delete($id);
  $conn->query($delCom);
  $_SESSION["ddelete"] = 
  "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
          <strong>Police Department is deleted</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  
  header('Location: dept_add.php');
}

?>