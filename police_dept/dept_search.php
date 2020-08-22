<?php
    include_once("../header.php");

 ?>
<?php //session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Police_Department.php');
  
 

if(isset($_POST['dept_search'])){
    $query =  $_POST['dept_id'];
    $localCom = $conn->getAllDepartmentsById($query);
    if (mysqli_num_rows($localCom)> 0){    
    while($row = mysqli_fetch_assoc($localCom)){
     
        ?>
        
  
<div class="w3-main bg-info" style="margin-left:300px;margin-top:43px; color: white;">
<form action ="dept_search2.php" method="post"  class="w3-container" style="padding-top:22px">

    <input type = "hidden" name="dept_id" value=<?php echo $row['department_id'];?>> 
    Department Name:<input required type="text" name="name" value=<?php echo $row['name'];?> required><br>
    <?php
  echo"<br>Select crime <select name=\"crime\">";  
  
    // output data of each row
    $cases=$conn->getBySql("SELECT * FROM case_types WHERE case_types_id = {$row['case_types_id']}");
    while($rows = $cases->fetch_assoc()) {
      echo "<option value={$rows["case_types_id"]}>{$rows["case_name"]}</option> ";
  }
      ?>
</select>
<br><br>
<input type="submit" value="Update Department" name="deptupdate" class="btn btn-secondary" style="margin-bottom:3rem">
   <input type="submit" value="Delete Department" name="deptdelete" class="btn btn-secondary" style="margin-bottom:3rem">
</form>



<?php
      include_once("../footer.php");
   ?>
      <?php  
    }
  }else{?>
    <div class="w3-main bg-info" style="margin-left:300px;margin-top:43px; color: white;">
    
   <h1 style="padding:8em">NO record found</h1></div><?php
}
}

if(isset($_POST['dept_search2'])){
  //$option =  $_POST['option'];
  //$query =  $_POST['command'];
  $localCom = $conn->getAllDepartments();?>
  <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">    
    <h5>Record of Police Department</h5>
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">

    <tr>
      <thead>
      <td><h5>Department id</h5></td>
      <td><h5>Department name </h5></td>
      <td><h5>Case type</h5></td>
      </thead>
    </tr>
    <?php
  while($row =$localCom->fetch_assoc()){
   
      ?>
    <tr>
        <td><?php echo $row['department_id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php
        $cases=$conn->getBySql("SELECT * FROM case_types WHERE case_types_id = {$row['case_types_id']}");
    while($rows = $cases->fetch_assoc()) {
      echo $rows['case_name'];
    
  }
      ?>
        </td>
    </tr>

    <?php  
  }
}
?>
</table>