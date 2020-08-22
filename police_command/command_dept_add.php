<?php
require_once('../models/Connection.php');

   //include_once("../header.php");
if(isset($_GET['cid']) && isset($_GET['did']) ){
      $cid = $_GET['cid'];
      $did = $_GET['did'];
 ?>
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">
      <form action="dept_search.php" method="post"  class="w3-container" style="padding-top:22">
      </form>

      <?php
      require_once('../models/Connection.php');
      require_once('../models/Local_Command.php');
      require_once('../models/Police_Department.php');
      require_once('../models/Police.php');

      $depts=$conn->getBySql("Select * from police_department WHERE department_id= ". $did);
      $commands=$conn->getBySql("Select * from police_command_areas WHERE command_id= ". $cid);
      $police=$conn->getBySql("Select * from police WHERE police_command_id= ". $cid. " AND department_id=". $did);
      ?>
      <br /><br />

      <?php
        if (isset($_SESSION["dept"])== true){
          echo "<p>" . $_SESSION["dept"]. "</p>";
        } else {
          $_SESSION["dept"] = "";

        } 

      ?>
      <h2>Add Command department</h2>
      <form action ="command_dept_add.php" method="post"  class="w3-container" style="padding-top:22px">
        <?php
        echo"<br>Select police department <select name=\"command\" class=\"form-control\">";  
        
          // output data of each row
          while($row = $commands->fetch_assoc()) {
            echo "<option value={$row["command_id"]}>{$row["street"]}</option> ";
        }
            ?>
      </select>
      <br><br><?php
      echo"<br>Select police base <select name=\"department\" class=\"form-control\">";  
        
          // output data of each row
          while($rows = $depts->fetch_assoc()) {
            echo "<option value={$rows["department_id"]}>{$rows["name"]}</option> ";
        }
            ?>
      </select>
      <br><br>
              <?php
        echo"<br>Select Head of Department <select name=\"police\" class=\"form-control\">";  
        
          // output data of each row
        
          while($rown = $police->fetch_assoc()) {
            echo "<option value={$rown["police_id"]}>{$rown["Name"]}</option> ";
        }
            ?>
      </select>
      <br><br>
        <input type="submit" value="Update" name="comdeptad" class="btn btn-secondary" style="margin-bottom:4rem">
      </form>
  </div>
   <?php
      include_once("../footer.php");
    }else{
    
   ?>


<?php
  require_once('../models/Connection.php');
  if (isset($_POST["comdeptad"])){
    //echo $_POST['police'];

   $sql = "UPDATE command_dept SET police_id = " . $_POST["police"];
      $sql .= " WHERE command_id =  {$_POST['command']} AND department_id = {$_POST['department']}";
     // echo $sql;
    $ql = $conn->query($sql);

    echo "<script>alert(\"Data updated\")</script>";
    header("Location: command_add.php");
      $_SESSION["comdept"] =
  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Data updated</strong> .
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
   
  /*$conn->query($localCom);
  $_SESSION["comdept"] =
  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police department created!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";*/
 // header("Location: dept_add.php");
}
}

?>