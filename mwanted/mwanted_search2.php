<?php session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Police.php');
  
 

 if(isset($_POST["wantedupdate"])){
  $id = $_POST["wid"];
  

    $sql  = "UPDATE wanted SET ";
    $sql .= "crime_id = '" . $conn->escape_value(trim($_POST["crime_id"]) ). "', ";
      $sql .="name =  '" . $conn->escape_value(trim($_POST["want_name"]) ). "', ";
      $sql .= "age = '". $conn->escape_value(trim($_POST["want_age"]) ). "', ";
      $sql .= "description = '". $conn->escape_value(trim($_POST["description"]) ). "', ";
      $sql .= "last_seen= '". $conn->escape_value(trim($_POST["last_seen"]) ). "', ";
      $sql .= "date= '". $conn->escape_value(trim($_POST["want_date"]) ) . "'";
      //$sql .= "image= '". $conn->escape_value(trim($target_file)) . "'";
      $sql .= " WHERE wid =  {$conn->escape_value($id)}";
      //echo $sql;
      $conn->query($sql);
      header('Location: mwanted.php');
    }
  /*$conn->query($upCom);
  $_SESSION["pupdate"] = 
  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  
  header('Location: police_add.php');
}
*/
if(isset($_POST["wanteddelete"])){
  $id = $_POST["wid"];
  //$delCom = $police->delete($id);
  $sql  = "DELETE FROM wanted where wid=". $id;
  $conn->query($sql);
  $_SESSION["pdelete"] = 
 "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
          <strong>Police  is deleted!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  
  header('Location: mwanted.php');
}

?>