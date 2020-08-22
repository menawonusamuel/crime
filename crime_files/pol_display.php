<?php
  

include_once("../header.php");

  //session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Crime.php');
  
$crid = $conn->escape_value($_GET['crid']);
//$id = $conn->escape_value($_GET['id']);
  $localCom = $conn->getBySql("SELECT * FROM crimes WHERE crime_id={$crid}");?>
  <div class="w3-main bg-light" style="margin-left:300px;margin-top:43px; color: black; padding: 1px;">
    <h5 class="text-primary">Complaint record</h5>
    <br/><br/><a href="cfile_list.php?username=<?php
        if(isset($_GET['username'])){
            echo $_GET['username'];
        }else{
            echo " ";
        }?>" class="btn btn-primary">Back</a><br>
    <hr>
     <?php
  while($row =$localCom->fetch_assoc()){
        
      ?>

      <?php
  $locCom = $conn->getBySql("SELECT * FROM case_types WHERE case_types_id = {$row['case_types_id']}");
          while($rown =$locCom->fetch_assoc()){
             echo"<h5>Case type  :</h5>".$rown['case_name'];
          }

          ?>

       <p><?php echo"<h5>Crime Address :</h5>".$row['crime_addr'];?></p>
        <p><?php echo"<h5>Crime Description :</h5>".$row['crime_desc'];?></p>
        <p><?php echo"<h5>Crime Area :</h5>". $row['crimearea'];?></p>
        <p><?php echo"<h5>Crime Town :</h5>". $row['crime_town'];?></p>
        <p><?php echo"<h5>Postcode :</h5>". $row['postcode'];?></p>
        <p><?php echo"<h5>Ip Address :</h5>". $row['ip_addr'];?></p>
        <p><?php echo"<h5>Mac Address :</h5>". $row['mac_addr'];?></p>
        <p><?php echo"<h5>Browser/Phone Model :</h5>". $row['browser'];?></p>
        <p><?php echo"<h5>Reporter's name :</h5>". $row['reporter_full_name'];?></p>
        <p><?php echo"<h5>Reporter's Address :</h5>". $row['reporter_address'];?></p>
        <p><?php echo"<h5>Reporter's street :</h5>". $row['reporter_street'];?></p>
        <p><?php echo"<h5>Reporter's town :</h5>". $row['reporter_town'];?></p>
        <p><?php echo"<h5>Reporter's phone :</h5>". $row['phone'];?></p>
        <br><br>
      
      <?php
  }
  $files = $conn->getBySql("SELECT * FROM reporter_files WHERE crime_id = {$_GET['crid']}");
  if(mysqli_num_rows($files)>0){
    while($rowd =$files->fetch_assoc()){
      echo "Files uploaded by reporter<br>";
      echo"<img src=../{$rowd['file_path']} width=150 height= 150><br><br><br><hr -2>";
    }
  }else{
    echo "No pictures found";
  }?>
  </div>
  <?php
  include_once("../footer.php");
  ?>