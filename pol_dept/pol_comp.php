<?php
 include_once("header.php");
 require_once('../models/Connection.php');
 require_once('../models/Reporter.php');
if(isset($_GET['role']) && $_GET['role']=="Supt/DSupt"){
    if (isset($_GET['police']) && isset($_GET['crime'])) {
$case=$conn->escape_value($_GET['case']);
$base=$conn->escape_value($_GET['base']);
$id= $conn->escape_value($_GET['police']);
$cid= $conn->escape_value($_GET['crime']);

}else{
    $id = "";
    $cid = "";
    $base = "";
    $department="";
}

$crimes= $conn->getBySql("Select * from crimes where police_id ='$id' AND crime_id = '$cid'");

if(mysqli_num_rows($crimes)>0){
    while($row = mysqli_fetch_array($crimes)){
        ?>
         <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white;">
            <br/><br/><a href="pol_complaints.php?id=<?php
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
            <h3><?php if(isset($_SESSION["criupdate"])){
                echo $_SESSION["criupdate"];
            }
            else{ echo " ";}?>
            </h3>
        <form action ="pol_comp2.php?id=<?php
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
        ?>" method="post" class="pb-4 " style="padding: 13px;"><br/>
            <p>Crime id:<input required type="text" name="crime_id" value=<?php echo $row[0];?> readonly></p>
                <p>Reporter's name:<input required readonly type="text" class="form-control" name="reporter_fn" value=<?php echo $row[13];?> ></p>
                <p>Reporter's address:<input required readonly type="text" class="form-control" name="reporter_addr" value=<?php echo $row[14];?> ></p>
                <p>Reporter's street:<input required readonly type="text" class="form-control" name="reporter_str" value=<?php echo $row[15];?> ></p>
                <p>Reporter's town:<input required readonly  type="text" class="form-control" name="reporter_twn" value=<?php echo $row[16];?> ></p>
                <p>Phone Number:<input type="tel" name="phone" required class="form-control" value=<?php echo $row[17];?>></p>
                <p>Address of crime:<input required type="text" name="crimead" class="form-control" value=<?php echo $row[3];?>></p>
                <p>Street of crime<input required type="text" name="crimestr" class="form-control" value=<?php echo $row[4];?>></p>
                <!-- <p><input  type="hidden" name="crimetwn" value="Aberdeen"></p> -->
                
State case: <br> <textarea required  rows="10" cols="31" class="form-control" name="crimedesc" readonly ><?php echo $row[6];?> 

</textarea>
<br>
Status<select name="status" class="form-control">
    <option value="pending">Pending</option>
    <option value="approved">Approved</option>
    <option value="closed">Closed</option>
</select>
<br>Case approved<select name="approval" class="form-control">
    <option value="1">Yes</option>
    <option value="0">No</option>
</select>
Case solved<select name="solved" class="form-control">
    <option value="1">Yes</option>
    <option value="0">No</option>
</select>
<br>
<?php
 $crimesfile= $conn->getBySql("Select * from reporter_files where crime_id = " . $conn->escape_value($row[0]));
    while($rows = mysqli_fetch_array($crimesfile)){
?>
<h5><a href=" . <?php echo $rows[0]; ?>"><?php }?>Click here to see files</a></h5><br>
Ip:<label><?php echo $row[8];?> </label><br>
Mac:<label><?php echo $row[9];?> "</label><br>
Location:<label><?php echo $row[10];?> </label><br>
Browser:<label><?php echo $row[11];?> "</label><br>
Phone Model:<label><?php echo $row[12];?> "</label><br>

<?php

 $police= $conn->getBySql("SELECT DISTINCT police.police_id, police.Name FROM police INNER JOIN police_department ON police.department_id = police_department.department_id WHERE police.police_command_id ={$base} and police_department.case_types_id={$case}");
 
 echo"<br>Assign police<select name=\"police\" class=form-control>"; 
    while($rown = mysqli_fetch_array($police)){
echo "<option value={$rown[0]}>{$rown[1]}</option> ";
}?>
</select> <br><br/>
<input type="submit" value="Update Complaint" name="submit">
 <br><br/>
</form>
<?php
}
}else{
    $_SESSION["message"]="No police id with number {$id} assigned to this case";
    //header("Location: pol_complaints.php");
}
}
else{
if (isset($_GET['police']) && isset($_GET['crime'])) {
$case=$conn->escape_value($_GET['case']);
$base=$conn->escape_value($_GET['base']);
$id= $conn->escape_value($_GET['police']);
$cid= $conn->escape_value($_GET['crime']);

}else{
	$id = "";
	$cid = "";
	$base = "";
    $department="";
}

$crimes= $conn->getBySql("Select * from crimes where police_id ='$id' AND crime_id = '$cid'");

if(mysqli_num_rows($crimes)>0){
	while($row = mysqli_fetch_array($crimes)){
		?>
		 <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white;">
		 	<br/><br/><a href="pol_complaints.php?id=<?php
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
		 	<h3><?php if(isset($_SESSION["criupdate"])){
		 		echo $_SESSION["criupdate"];
		 	}
		 	else{ echo " ";}?>
		 	</h3>
		<form action ="pol_comp2.php?id=<?php
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
        ?>" method="post" class="pb-4 " style="padding: 13px;"><br/>
			<p>Crime id:<input required type="text" name="crime_id" value=<?php echo $row[0];?> readonly></p>
                <p>Reporter's name:<input required readonly type="text" class="form-control" name="reporter_fn" value=<?php echo $row[13];?> ></p>
                <p>Reporter's address:<input required readonly type="text" class="form-control" name="reporter_addr" value=<?php echo $row[14];?> ></p>
                <p>Reporter's street:<input required readonly type="text" class="form-control" name="reporter_str" value=<?php echo $row[15];?> ></p>
                <p>Reporter's town:<input required readonly  type="text" class="form-control" name="reporter_twn" value=<?php echo $row[16];?> ></p>
                <p>Phone Number:<input type="tel" name="phone" required class="form-control" value=<?php echo $row[17];?>></p>
                <p>Address of crime:<input required type="text" name="crimead" class="form-control" value=<?php echo $row[3];?>></p>
                <p>Street of crime<input required type="text" name="crimestr" class="form-control" value=<?php echo $row[4];?>></p>
                <!-- <p><input  type="hidden" name="crimetwn" value="Aberdeen"></p> -->
                
State case: <br> <textarea required  rows="10" cols="31" class="form-control" name="crimedesc" readonly ><?php echo $row[6];?> 

</textarea>
<br>
Status<select name="status" class="form-control">
	<option value="pending">Pending</option>
	<option value="approved">Approved</option>
	<option value="closed">Closed</option>
</select>
<br>Case approved<select name="approval" class="form-control">
	<option value="1">Yes</option>
	<option value="0">No</option>
</select>
Case solved<select name="solved" class="form-control">
	<option value="1">Yes</option>
	<option value="0">No</option>
</select>
<br>
<?php
 $crimesfile= $conn->getBySql("Select * from reporter_files where crime_id = " . $conn->escape_value($row[0]));
 	while($rows = mysqli_fetch_array($crimesfile)){
?>
<h5><a href=" . <?php echo $rows[0]; ?>"><?php }?>Click here to see files</a></h5><br>
Ip:<label><?php echo $row[8];?> </label><br>
Mac:<label><?php echo $row[9];?> "</label><br>
Location:<label><?php echo $row[10];?> </label><br>
Browser:<label><?php echo $row[11];?> "</label><br>
Phone Model:<label><?php echo $row[12];?> "</label><br>

<?php

 $police= $conn->getBySql("SELECT DISTINCT police.police_id, police.Name FROM police INNER JOIN police_department ON police.department_id = police_department.department_id WHERE police.police_command_id ={$base} and police_department.case_types_id={$case}");
 
 echo"<br>Assign police<select name=\"police\" class=form-control>"; 
 	while($rown = mysqli_fetch_array($police)){
echo "<option value={$rown[0]}>{$rown[1]}</option> ";
}?>
</select> <br><br/>
<input type="submit" value="Update Complaint" name="submit">
 <br><br/>
</form>
<?php
}
}else{
	$_SESSION["message"]="No police id with number {$id} assigned to this case";
	//header("Location: pol_complaints.php");
}
}
?>