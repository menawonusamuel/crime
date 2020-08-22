<?php
    include_once("../header.php");

 ?>
<?php //session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Police.php');
 $dept=$conn->getAllDepartments();
 $com=$conn->getAllLocalCommands();
  
 

if(isset($_POST['police_search'])){
    $query =  $_POST["police_id"];
    $localCom = $conn->getAllPoliceById($query);
    if (mysqli_num_rows($localCom)> 0){
    while($row = mysqli_fetch_assoc($localCom)){
     
        ?>
<div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white;">
<form action ="police_search2.php?username=<?php if(isset($_GET['username'])){
            echo $_GET['username'];
        }else{
            echo " ";
        }?>" method="post" style="padding:2em;">
    <input type="submit"  class="btn btn-success" value="Update Police" name="policeupdate">
    <input type="submit" class="btn btn-danger" value="Delete Police" name="policedelete">
    <br /><br />
    <input type = "hidden" name="police_id" value=<?php echo $row['police_id'];?>> 
    Police Name:<input  class="form-control" type="text" value=<?php echo $row['Name'];?> name="name" placeholder="John SOn" required><br>
  <?php
  echo"<br>Select police department<select class=\"form-control\" name=\"department_id\">";  
    // output data of each row
    while($rows = $dept->fetch_assoc()) {
    
      echo "<option" ;
      if(($rows['department_id']== $row['department_id']))
      {echo " selected";} 
      echo " value={$rows["department_id"]}>{$rows["name"]}";  
      echo"</option> ";
  }
      ?>
</select>
        <br><br>
        <?php
          echo"<br>Select police command<select  class=\"form-control\" name=\"police_command_id\">";  
          
            // output data of each row
            while($rown = $com->fetch_assoc()) {
              echo "<option ";
              if(($rown['command_id']== $row['police_command_id']))
              {echo " selected";} 
              echo " value={$rown["command_id"]}>{$rown["street"]}</option> ";
          }
              ?>
        </select>
    <br><br>
<p>Role</p> <select class="form-control" name="role">
<option name="Sgt">Sgt </option>
<option name = "DPO"> Division Police Oficer </option>
<option name="AIG"> Assistant Inspector General </option>
<option name="IG"> Inspector General </option>
</select>
<br><br>
<p>Date of birth </p><input type="date" name="dob" value="<?php echo $row['dob'];?>" class="form-control" required>
<br><br>
<p>Join Date</p><input type="date" name="join_date"  value="<?php echo $row['joined_date'];?>"  class="form-control" required>
<br><br>
<p>Exit date</p><input type="date" name="exit_date"  value="<?php echo $row['exit_date'];?>" class="form-control" >
<br><br>
<p>Username</p><input type="text" name="username"class="form-control"  value="<?php echo $row['username'];?>" required>
<br><br>
<p>Password</p><input type="password" name="password" class="form-control"  value="<?php echo $row['password'];?>" required>
<br><br>
<p>Email</p><input type="email" name="email" class="form-control"  value="<?php echo $row['email'];?>" required>
<br><br>
<p>Phone</p><input type="tel" name="phone" class="form-control"  value="<?php echo $row['phone'];?>" required>
<br / ><br / >
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

if(isset($_POST['police_search2'])){
  //$option =  $_POST['option'];
  //$query =  $_POST['command'];
  $localCom = $conn->getAllPolice();?>
   <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">    
    <h5>Record of Police Officers</h5>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white text-justify">  
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
      <thead>
      <td>Police id</td>
      <td>Police name </td>
      <td> Police role </td>
      <td> Police department </td>
      <td> Police base </td>
      </thead></tr>
    <?php
  while($row =$localCom->fetch_assoc()){
   
      ?>
      
<tr>
        <td><?php echo $row['police_id']?></td>
        <td><?php echo $row['Name']?></td>
        <td><?php echo $row['role']?></td>
        <td><?php
        $cases=$conn->getBySql("SELECT * FROM police_department WHERE department_id = {$row['department_id']}");
    while($rows = $cases->fetch_assoc()) {
      echo $rows['name'];
    
  }
      ?>
        </td>
        <td><?php
        $comm=$conn->getBySql("SELECT * FROM police_command_areas WHERE command_id = {$row['police_command_id']}");
    while($rows = $comm->fetch_assoc()) {
      echo $rows['street'];
    
  }
      ?>
        </td>
    </tr>

    <?php  
  }
}
?>
</table>