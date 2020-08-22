<?php
    //session_start();
    if(isset($_SESSION['pdelete'])){
              echo $_SESSION['pdelete'];
              $_SESSION['pupdate'] = " ";
            }
    elseif(isset($_SESSION['pupdate'])){
              $_SESSION['pddelete'] = "";
              echo $_SESSION['pupdate'] ;
            }
    else{
              $_SESSION['pdelete'] = "";
              $_SESSION['pupdate'] = "";
            }
  ?>
  <?php
    include_once("../header.php");
 ?>
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">
<form action="police_search.php?username=<?php if(isset($_GET['username'])){
            echo $_GET['username'];
        }else{
            echo " ";
        }?>" method="post"  class="w3-container" style="padding-top:22px">
  <small>Search by Id </small>
	<input type="text" name="police_id"  class="form-control" >
	<input type="submit" name="police_search" value="Search" class="btn btn-secondary" style="margin-top:1rem">
  <input type="submit" name="police_search2" value="Search All Police info" class="btn btn-secondary" style="margin-top:1rem">
</form>

<?php
require_once('../models/Connection.php');
require_once('../models/Police.php');
$dept=$conn->getAllDepartments();
$com=$conn->getAllLocalCommands();
?>
<br /><br />

<?php
        if(isset($_SESSION['police'])){
            echo $_SESSION['police'];
        }else{
            echo " ";
        }
        ?>
<h2>Add New Police Record</h2>
<form action ="police_add.php?username=<?php if(isset($_GET['username'])){
            echo $_GET['username'];
        }else{
            echo " ";
        }?>" method="post"  class="w3-container bg-dark text-light" style="padding-top:22px">
  Police Name:<input required type="text" name="name"    class="form-control" placeholder="John SOn" required><br>
  <?php
  echo"<br>Select police department<select class=\"form-control\" name=\"department_id\">";  
    echo"<option value=0>Not Assigned</option>";
    // output data of each row
    while($row = $dept->fetch_assoc()) {
      
      echo "<option value={$row["department_id"]}>{$row["name"]}</option> ";
  }
      ?>
</select>
<br><br>
<?php
  echo"<br><p>Select police command</p><select class=\"form-control\" name=\"police_command_id\">";  
  
    // output data of each row
    while($row = $com->fetch_assoc()) {
      echo "<option value={$row["command_id"]}>{$row["street"]}</option> ";
  }
      ?>
</select>
<br><br>
<p>Role</p> <select class="form-control" name="role">
<option value="PC/DC"> Constable </option>
<option value="Sgt/DS"> Sergeant </option>
<option value="Insp/DI"> Inspector </option>
<option value="Ch Insp/DCI"> Chief Inspector </option>
<option value="Supt/DSupt"> Superintendent </option>
</select>
<br><br>
<p>Date of birth </p><input type="date" name="dob" class="form-control" required>
<br><br>
<p>Join Date</p><input type="date" name="join_date" class="form-control" required>
<br><br>
<p>Exit date</p><input type="date" name="exit_date" class="form-control" >
<br><br>
<p>Username</p><input type="text" name="username"class="form-control" required>
<br><br>
<p>Password</p><input type="password" name="password" class="form-control" required>
<br><br>
<p>Email</p><input type="email" name="email" class="form-control" required>
<br><br>
<p>Phone</p><input type="tel" name="phone" class="form-control" required>
<br / ><br / >
  <input type="submit" value="Add Police" name="policead" class="btn btn-secondary" style="margin-top:1rem">
</form>

<?php
  require_once('../models/Connection.php');
  require_once('../models/Police.php');
  if (isset($_POST["policead"])){

  $localCom = $police->create($_POST);
  $conn->query($localCom);
  $_SESSION["police"] = 
"<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police  created!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
 // header("Location: police_add.php");
}

?>