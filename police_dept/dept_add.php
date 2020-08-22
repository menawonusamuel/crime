<?php
    //session_start();
    if(isset($_SESSION['cdelete'])){
              echo $_SESSION['cdelete'];
              $_SESSION['cupdate'] = " ";
            }
    elseif(isset($_SESSION['cupdate'])){
              $_SESSION['cddelete'] = "";
              echo $_SESSION['cupdate'] ;
            }
    else{
              $_SESSION['cdelete'] = "";
              $_SESSION['cupdate'] = "";
            }
  ?>
  <?php
    include_once("../header.php");
 ?>
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">
      <form action="dept_search.php" method="post"  class="w3-container" style="padding-top:22px">
        <small>Search by Id </small>
      	<input type="text" name="dept_id"  class="form-control" >
      	<input type="submit" name="dept_search" value="Search" class="btn btn-secondary" style="margin-top:1rem">
        <input type="submit" name="dept_search2" value="Search All Departments info" class="btn btn-secondary" style="margin-top:1rem">
      </form>

      <?php
      require_once('../models/Connection.php');
      require_once('../models/Police_Department.php');
      $cases=$conn->getAllCases();
      ?>
      <br /><br />

      <?php
        if (isset($_SESSION["dept"])== true){
          echo "<p>" . $_SESSION["dept"]. "</p>";
        } else {
          $_SESSION["dept"] = "";

        } 

      ?>
      <h2>Add department</h2>
      <form action ="dept_add.php" method="post"  class="w3-container" style="padding-top:22px">
        Department Name:<input required type="text" name="dept_name"   class="form-control" placeholder="Special Anti-Robbery Unit" required><br>
        <?php
        echo"<br>Select crime <select name=\"crime\">";  
        
          // output data of each row
          while($row = $cases->fetch_assoc()) {
            echo "<option value={$row["case_types_id"]}>{$row["case_name"]}</option> ";
        }
            ?>
      </select>
      <br><br>
        <input type="submit" value="Add Department" name="deptad" class="btn btn-secondary" style="margin-bottom:4rem">
      </form>
  </div>
   <?php
      include_once("../footer.php");
   ?>


<?php
  require_once('../models/Connection.php');
  require_once('../models/Local_Command.php');
  if (isset($_POST["deptad"])){

  $localCom = $depts->create($_POST);
  $conn->query($localCom);
  $_SESSION["dept"] =
  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police department created!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
 // header("Location: dept_add.php");
}

?>