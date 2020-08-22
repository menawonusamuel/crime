<?php session_start(); 
  require_once('../models/Connection.php');
  require_once('../models/Local_Command.php');
  
    if(isset($_POST["localupdate"])){
        $id = $_POST["command_id"];
        $upCom = $commands->update($id, $_POST);
        $conn->query($upCom);

        $dept=$_POST["department_id"];
  
        foreach ($dept as  $dep) {
          $sql  = "UPDATE command_dept SET department_id = '{$dep}'";
          $sql .= " WHERE command_id =  {$conn->escape_value($id)}";
          $conn->query($sql);
        }
        
        $_SESSION["update"] = "
        <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police Command is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
        header('Location: command_add.php');
    }
    if(isset($_POST["localdelete"])){
        $id = $_POST["command_id"];
        $upCom = $commands->delete($id);
        $conn->query($upCom);
        $dept=$_POST["department_id"];
  
        foreach ($dept as  $dep) {
          $sql  = "DELETE FROM command_dept";
          $sql .= " WHERE command_id =  {$conn->escape_value($id)}";
          $conn->query($sql);
        }

        $_SESSION["delete"] = 
        "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
          <strong>Police Command is deleted</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
          
        header('Location: command_add.php');
    }
    
?>