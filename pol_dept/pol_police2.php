<?php
	

    include_once("header.php");

  //session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Crime.php');
  if(isset($_GET['role']) && $_GET['role']=="Supt/DSupt"){
   
//$id = $conn->escape_value($_GET['id']);
  $localCom = $conn->getBySql("SELECT * FROM crimes");?>
  <div class="w3-main bg-light" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">    
    <h5 class="text-primary">Police record</h5>
    <br/><br/><a href="pol_police.php?id=<?php
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
        ?>" class="btn btn-primary">Back</a><br>
    <hr>

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
          <?php
          $localCom = $conn->getBySql("SELECT Name, role FROM police WHERE police_id=".$pol);
          
          if (mysqli_num_rows($localCom)>0){
            while($rows = mysqli_fetch_array($localCom)){
        
          echo "<td>". $rows['Name']."</td>";
          echo  "<td>".$rows['role']."</td>";
        }
      }
      ?>
          <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes  WHERE status = 'approved' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=   >" . $rows['COUNT(crime_id)'] . "</a>";?></td>
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
    } 
   ?> </table>
<?php
    }
    else{
      ?>
      
      <?php
      $localCom = $conn->getBySql("SELECT * FROM police WHERE police_id=".$pol);
          
          if (mysqli_num_rows($localCom)>0){
            while($rows = mysqli_fetch_array($localCom)){
          echo  "<td>". $rows['police_id'] . "</td>";
          echo  "<td>". $rows['Name']."</td>";
          echo  "<td>".$rows['role']."</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
        }
      }
    }
  }else{
    $pol = $conn->escape_value($_GET['police']);
//$id = $conn->escape_value($_GET['id']);
  $localCom = $conn->getBySql("SELECT * FROM crimes WHERE police_id=".$pol);?>
  <div class="w3-main bg-light" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">    
    <h5 class="text-primary">Police record</h5>
    <br/><br/><a href="pol_police.php?id=<?php
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
        ?>" class="btn btn-primary">Back</a><br>
    <hr>

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
          <?php
          $localCom = $conn->getBySql("SELECT Name, role FROM police WHERE police_id=".$pol);
          
          if (mysqli_num_rows($localCom)>0){
            while($rows = mysqli_fetch_array($localCom)){
        
          echo "<td>". $rows['Name']."</td>";
          echo  "<td>".$rows['role']."</td>";
        }
      }
      ?>
          <td><?php 
          $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes  WHERE status = 'approved' and police_id = {$row['police_id']}");
            $rows = $localCom->fetch_array(); 
            echo "<a href=   >" . $rows['COUNT(crime_id)'] . "</a>";?></td>
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
    } 
   ?> </table>
<?php
    }
    else{
      ?>
      
      <?php
      $localCom = $conn->getBySql("SELECT * FROM police WHERE police_id=".$pol);
          
          if (mysqli_num_rows($localCom)>0){
            while($rows = mysqli_fetch_array($localCom)){
          echo  "<td>". $rows['police_id'] . "</td>";
          echo  "<td>". $rows['Name']."</td>";
          echo  "<td>".$rows['role']."</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
          echo  "<td>0</td>";
        }
      }
    }
  }

    include_once("../footer.php");
?>