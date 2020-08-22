<?php //session_start(); 
    include_once("../header.php");

 require_once('../models/Connection.php');
  require_once('../models/Reporter.php');
if(isset($_SESSION['cridelete'])){
              echo $_SESSION['cridelete'];
              $_SESSION['criupdate'] = " ";
              session_unset();
            }
    elseif(isset($_SESSION['criupdate'])){
              $_SESSION['criddelete'] = "";
              echo $_SESSION['criupdate'] ;
              session_unset();
            }
    else{
              $_SESSION['cridelete'] = "";
              $_SESSION['criupdate'] = "";
            }
 $crimes= $conn->getBySql("Select * from crimes");

if($crimes!=false){
	while($row = mysqli_fetch_array($crimes)){
		?>
		 <div class="w3-main" style="margin-left:300px;margin-top:43px;">
		<form action ="command_report.php" method="post">
			<p>Crime id:<input required type="text" name="crime_id" value=<?php echo $row[0];?> readonly></p>
                <p>Reporter's name:<input required readonly type="text" name="reporter_fn" value=<?php echo $row[11];?> ></p>
                <p>Reporter's address:<input required readonly type="text" name="reporter_addr" value=<?php echo $row[12];?> ></p>
                <p>Reporter's street:<input required readonly type="text" name="reporter_str" value=<?php echo $row[13];?> ></p>
                <p>Reporter's town:<input required readonly  type="text" name="reporter_twn" value=<?php echo $row[14];?> ></p>
                <p>Phone Number:<input type="tel" name="phone" required value=<?php echo $row[15];?>></p>
                <p>Address of crime:<input required type="text" name="crimead" value=<?php echo $row[2];?>></p>
                <p>Street of crime<input required type="text" name="crimestr" value=<?php echo $row[3];?>></p>
                <!-- <p><input  type="hidden" name="crimetwn" value="Aberdeen"></p> -->
                
State case: <br> <textarea required  rows="10" cols="31" name="crimedesc" ><?php echo $row[11];?> 

</textarea>
Status<select name="status">
	<option value="pending">Pending</option>
	<option value="approved">Approved</option>
	<option value="closed">Closed</option>
</select>
Case solved<select name="solved">
	<option value="on">On</option>
	<option value="off">Off</option>
</select>
<br>
<?php
 $crimesfile= $conn->getBySql("Select * from reporter_files where crime_id = " . $conn->escape_value($row[0]));
 	while($rows = mysqli_fetch_array($crimesfile)){
?>
<a href=" . <?php echo $rows[2]; ?>"><?php }?>Click here to see files</a><br>
Ip<input type="text" name="ip"readonly value="<?php echo $row[6];?> "><br>
Mac<input type="text" name="mac" readonly  value="<?php echo $row[7];?> "><br>
Location<input type="text" name="location" readonly  value="<?php echo $row[8];?> "><br>
Browser<input type="text" name="browser"readonly  value="<?php echo $row[9];?> "><br>
Phone Model<input type="text" name="model" readonly  value="<?php echo $row[10];?> "><br>

<?php

 $police= $conn->getBySql("Select * from police");
 
 echo"<br>Select crime <select name=\"police\">"; 
 	while($rown = mysqli_fetch_array($police)){
echo "<option value={$rown[0]}>{$rown[1]}</option> ";
}?>
</select> <br>
<input type="submit" value="Update Complaint" class="btn btn-secondary" name="submit">
</form>
<?php
}
}

?>

<?php
if(isset($_POST['submit'])){
	$id= $_POST['crime_id'];
	$upCrime = $report->update($id, $_POST);
  $conn->query($upCrime);
  $_SESSION["criupdate"] ="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police Department is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>" ;
  
  //header('Location: command_report.php');
}
?>