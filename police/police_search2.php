<?php session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Police.php');
  
 

 if(isset($_POST["policeupdate"])){
  $id = $_POST["police_id"];
  $upCom = $police->update($id, $_POST);
  $conn->query($upCom);
  $_SESSION["pupdate"] = 
  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  
  header('Location: police_add.php');
}
if(isset($_POST["policedelete"])){
  $id = $_POST["police_id"];
  $delCom = $police->delete($id);
  $conn->query($delCom);
  $_SESSION["pdelete"] = 
 "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
          <strong>Police  is deleted!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";

    if(isset($_GET['username'])){
        echo header('Location: police_add.php?username={$_GET["username"]}');
    }else{
        echo header('Location: police_add.php');
    };
}

?>