<?php
    //session_start();
    if(isset($_SESSION['delete'])){
              echo $_SESSION['delete'];
              $_SESSION['update'] = " ";
            }
    elseif(isset($_SESSION['update'])){
              $_SESSION['delete'] = "";
              echo $_SESSION['update'] ;
            }
    else{
              $_SESSION['delete'] = "";
              $_SESSION['update'] = "";
            }
  ?>
  <?php
    include_once("../header.php");
 ?>
 <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white;">
  <form action="seaarch.php" method="post" class="w3-container" style="padding-top:22px">
    <small>Search by Id </smal>
  	<input type="search" name="command"  class="form-control" >
  	<input type="submit" name="search" value="Search" class="btn btn-secondary" style="margin-top:1rem">
    <input type="submit" name="search2" value="List All Command bases" class="btn btn-secondary" style="margin-top:1rem">
  </form>

  <?php
    if (isset($_SESSION["com"])== true){
      echo "<p>" . $_SESSION["com"]. "</p>";
    } else {
      $_SESSION["com"] = "";

    } 

  ?>
  <h2>Add A Police Base</h2>
  <form action ="command_add.php" method="post">
    <div class="form-group">
    <label for="command_name">Command Name:<input required type="text" class="form-control" name="command_name" id="command_name" aria-describedby="command_name" placeholder="Police Scotland" required></label>  <br>
    <label for="command_div">Command Division:<input required type="text"  class="form-control" name="command_div" id="command_div" aria-describedby="command_div" placeholder="North Division" required></label><br>
    <label for="command_street">Street:<input type="text" name="street"  class="form-control" placeholder="Seaton" id="command_street" aria-describedby="command_street"  required></label><br>
    Town: <input type="text" name="town"  class="form-control" value="Aberdeen" readonly><br>
    Postcode:<input type="text" name="postcode" class="form-control"  required placeholder="AB1X 43"><br>
    <h4>Choose the department</h4><br>
    <?php 
      require_once('../models/Connection.php');
      $dept = $conn->getAllDepartments();
      while($rows = $dept->fetch_assoc()){
         ?>
    <input class="form-check-input"  type="checkbox" name="department_id[]"   value=<?php if($rows['department_id']==0){continue;echo $rows['department_id'];}?>><label class="form-check-label"><?php echo $rows['name'];?></label><br>
    <?php

    }

    ?>
    <input type="submit" value="Add Local Command" name="localad" class="btn btn-secondary" style="margin-bottom:4rem"></div>
  </form>
</div>
   <?php
      include_once("../footer.php");
   ?>

<?php
  require_once('../models/Connection.php');
  require_once('../models/Local_Command.php');
  if (isset($_POST["localad"])){

  $localCom = $commands->create($_POST);
  $conn->query($localCom);

  $com = $conn->getLastId();

  $dept=$_POST["department_id"];
  
  foreach ($dept as  $dep) {
    $sql  = "INSERT INTO command_dept (";
      $sql .="command_id, department_id";
      $sql .= ") VALUES ('";
      $sql .= $com    . "', '";
      $sql .= $dep . "') ";
      $conn->query($sql);
  }
  $_SESSION["com"] =
          "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police command created!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  header("Location: command_add.php");
}

?>