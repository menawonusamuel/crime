 <?php
    include_once("header.php");
      if(isset($_GET['role']) && $_GET['role']=="Supt/DSupt"){?>
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
<form action="pol_police.php?id=<?php
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }else{
            echo " ";
        }?>&name=<?php
        if(isset($_GET['name'])){
            echo $_GET['name'];
        }else{
            echo " ";
        }?>&role=<?php
        if(isset($_GET['role'])){
            echo $_GET['role'];
        }else{
            echo " ";
        }
        ?>&base=<?php
        if(isset($_GET['base'])){
            echo $_GET['base'];
        }else{
            echo " ";
        }
        ?>&department=<?php
        if(isset($_GET['department'])){
            echo $_GET['department'];
        }else{
            echo " ";
        }
        ?>" method="post"  class="w3-container" style="padding-top:22px">
  <small>Search by Id </small>
  <input type="text" name="police_id"  class="form-control" >
  <input type="submit" name="police_search" value="Search" class="btn btn-secondary" style="margin-top:1rem">
  <input type="submit" name="police_search2" value="Search All Police info" class="btn btn-secondary" style="margin-top:1rem">
</form>
<?php
if(isset($_POST['police_search'])){
require_once('../models/Connection.php');
require_once('../models/Police.php');
$localCom = $conn->getBySql("SELECT * FROM police") ; 
?>
 <div class="w3-main bg-dark" style="margin-top:43px; color: white; ">    
    <h5>Complaint record : Incident Notes </h5>
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table-responsive">
    <tr>
      <thead>
      <td>Police id</td>
      <td>Police name </td>
      <td>Title </td>
      <td> Approved Cases </td>
      <td> Pending Cases </td>
      <td>Closed Cases</td>
      <td>Approval Request</td>
      <td>No of Solved Cases  </td>
      </thead>
    </tr>
     <?php
    if (mysqli_num_rows($localCom)>0){
    while($row = mysqli_fetch_array($localCom)){
     
        ?>
        <tr>
          <td><?php echo   $row['police_id'];?></td>
          <td><?php echo  $row['Name'];  ?></td>
          <td><?php echo  "<a href={$row['role']}>" . $row['role'] . "</a>"; ?></td>
          <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes  WHERE status = 'approved' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=>" . $rows['COUNT(crime_id)'] . "</a>";?></td>
          <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(status) FROM crimes  WHERE status = 'pending' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=>" . $rows['COUNT(status)'] . "</a>";?></td>
            <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(status) FROM crimes  WHERE status = 'approved' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=>" . $rows['COUNT(status)'] . "</a>";?></td>
            <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(status) FROM crimes  WHERE status = 'closed' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=>" . $rows['COUNT(status)'] . "</a>";?></td>
            <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(solved) FROM crimes  WHERE status = '1' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=>" . $rows['COUNT(solved)'] . "</a>";?></td>
        </tr>

    <?php  
  }?>
<?php
}else{
   ?>
  <tr style="color: red;">No data available</tr><?php ;
}?>
</table>
<?php
}
?>
<?php
if(isset($_POST['police_search2'])){
require_once('../models/Connection.php');
require_once('../models/Police.php');
   // $query = ($_POST['police_id']);
 $localCom = $conn->getBySql("SELECT * FROM police") ; ?>
 <div class="w3-main bg-dark" style="margin-top:43px; color: white; ">    
    <h5>Complaint record : Incident Notes </h5>
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table-responsive">
    <tr>
      <thead>
      <td>Police id</td>
      <td>Police name </td>
      <td>Title </td>
      <td>More details</td>
      </thead>
    </tr>
     <?php
    if (mysqli_num_rows($localCom)>0){
    while($row = mysqli_fetch_array($localCom)){
     
        ?>
        <tr>
          <td><?php echo $row['police_id'] ;?></td>
          <td><?php echo $row['Name'] ;?></td>
          <td><?php echo $row['role'] ;?></td>
           <td><a href="pol_police2.php?id=<?php
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }else{
            echo " ";
        }?>&name=<?php
        if(isset($_GET['name'])){
            echo $_GET['name'];
        }else{
            echo " ";
        }?>&role=<?php
        if(isset($_GET['role'])){
            echo $_GET['role'];
        }else{
            echo " ";
        }
        ?>&base=<?php
        if(isset($_GET['base'])){
            echo $_GET['base'];
        }else{
            echo " ";
        }
        ?>&department=<?php
        if(isset($_GET['department'])){
            echo $_GET['department'];
        }else{
            echo " ";
        }
        ?>&police=<?php echo $row['police_id'];?>">View </a></td>
        </tr>

    <?php  
  }
} ?> </table>
<?php
} 
      }
      else{
 ?>

  <div class="w3-main" style="margin-left:300px;margin-top:43px;">
<form action="pol_police.php?id=<?php
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }else{
            echo " ";
        }?>&name=<?php
        if(isset($_GET['name'])){
            echo $_GET['name'];
        }else{
            echo " ";
        }?>&role=<?php
        if(isset($_GET['role'])){
            echo $_GET['role'];
        }else{
            echo " ";
        }
        ?>&base=<?php
        if(isset($_GET['base'])){
            echo $_GET['base'];
        }else{
            echo " ";
        }
        ?>&department=<?php
        if(isset($_GET['department'])){
            echo $_GET['department'];
        }else{
            echo " ";
        }
        ?>" method="post"  class="w3-container" style="padding-top:22px">
  <small>Search by Id </small>
	<input type="text" name="police_id"  class="form-control" >
	<input type="submit" name="police_search" value="Search" class="btn btn-secondary" style="margin-top:1rem">
  <input type="submit" name="police_search2" value="Search All Police info" class="btn btn-secondary" style="margin-top:1rem">
</form>
<?php
if(isset($_POST['police_search'])){
require_once('../models/Connection.php');
require_once('../models/Police.php');
    $query = ($_POST['police_id']);
$localCom = $conn->getBySql("SELECT * FROM police where police_id={$query}") ; 
?>
 <div class="w3-main bg-dark" style="margin-top:43px; color: white; ">    
    <h5>Complaint record : Incident Notes </h5>
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table-responsive">
    <tr>
      <thead>
      <td>Police id</td>
      <td>Police name </td>
      <td>Title </td>
      <td> Approved Cases </td>
      <td> Pending Cases </td>
      <td>Closed Cases</td>
      <td>Approval Request</td>
      <td>No of Solved Cases  </td>
      </thead>
    </tr>
     <?php
    if (mysqli_num_rows($localCom)>0){
    while($row = mysqli_fetch_array($localCom)){
     
        ?>
        <tr>
        	<td><?php echo   $row['police_id'];?></td>
        	<td><?php echo  $row['Name'];  ?></td>
        	<td><?php echo  "<a href={$row['role']}>" . $row['role'] . "</a>"; ?></td>
        	<td><?php 
        	$localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes  WHERE status = 'approved' and police_id = {$row['police_id']}");
        	  $rows = $localCom->fetch_array(); 
        	  echo "<a href=>" . $rows['COUNT(crime_id)'] . "</a>";?></td>
        	<td><?php 
        	$localCom = $conn->getBySql("SELECT COUNT(status) FROM crimes  WHERE status = 'pending' and police_id = {$row['police_id']}");
        	  $rows = $localCom->fetch_array(); 
        	  echo "<a href=>" . $rows['COUNT(status)'] . "</a>";?></td>
        	  <td><?php 
        	$localCom = $conn->getBySql("SELECT COUNT(status) FROM crimes  WHERE status = 'approved' and police_id = {$row['police_id']}");
        	  $rows = $localCom->fetch_array(); 
        	  echo "<a href=>" . $rows['COUNT(status)'] . "</a>";?></td>
        	  <td><?php 
        	$localCom = $conn->getBySql("SELECT COUNT(status) FROM crimes  WHERE status = 'closed' and police_id = {$row['police_id']}");
        	  $rows = $localCom->fetch_array(); 
        	  echo "<a href=>" . $rows['COUNT(status)'] . "</a>";?></td>
        	  <td><?php 
        	$localCom = $conn->getBySql("SELECT COUNT(solved) FROM crimes  WHERE status = '1' and police_id = {$row['police_id']}");
        	  $rows = $localCom->fetch_array(); 
        	  echo "<a href=>" . $rows['COUNT(solved)'] . "</a>";?></td>
        </tr>

    <?php  
  }?>
<?php
}else{
   ?>
  <tr style="color: red;">No data available</tr><?php ;
}?>
</table>
<?php
}
?>
<?php
if(isset($_POST['police_search2'])){
require_once('../models/Connection.php');
require_once('../models/Police.php');
   // $query = ($_POST['police_id']);
 $localCom = $conn->getBySql("SELECT * FROM police WHERE police_command_id=".$_GET['base']) ; ?>
 <div class="w3-main bg-dark" style="margin-top:43px; color: white; ">    
    <h5>Complaint record : Incident Notes </h5>
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table-responsive">
    <tr>
      <thead>
      <td>Police id</td>
      <td>Police name </td>
      <td>Title </td>
      <td>More details</td>
      </thead>
    </tr>
     <?php
    if (mysqli_num_rows($localCom)>0){
    while($row = mysqli_fetch_array($localCom)){
     
        ?>
        <tr>
          <td><?php echo $row['police_id'] ;?></td>
          <td><?php echo $row['Name'] ;?></td>
          <td><?php echo $row['role'] ;?></td>
           <td><a href="pol_police2.php?id=<?php
        if(isset($_GET['id'])){
            echo $_GET['id'];
        }else{
            echo " ";
        }?>&name=<?php
        if(isset($_GET['name'])){
            echo $_GET['name'];
        }else{
            echo " ";
        }?>&role=<?php
        if(isset($_GET['role'])){
            echo $_GET['role'];
        }else{
            echo " ";
        }
        ?>&base=<?php
        if(isset($_GET['base'])){
            echo $_GET['base'];
        }else{
            echo " ";
        }
        ?>&department=<?php
        if(isset($_GET['department'])){
            echo $_GET['department'];
        }else{
            echo " ";
        }
        ?>&police=<?php echo $row['police_id'];?>">View </a></td>
        </tr>

    <?php  
  }
} ?> </table>
<?php
}

}

?>