
<?php
 require_once('../models/Connection.php');

if (isset($_GET['status']) && isset($_GET['crime'])) {
$stat= $conn->escape_value($_GET['status']);
$cid= $conn->escape_value($_GET['crime']);
if($stat=='pending'){
  $stat="approved";
}else{
  $stat="pending";
}
}else{
  $id = "";
  $cid = "";
}

	$id= $_POST['crime_id'];
	$upCrime = "UPDATE crimes SET status = '$stat' WHERE crime_id='$cid'";
  //echo $upCrime;
 $conn->query($upCrime);
  $_SESSION["criupdate"] ="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police Department is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>" ;

header('Location: pol_complaints.php?id='.$_GET["id"].'&name='.$_GET["name"].'&role='.$_GET['role'].'&base='.$_GET['base'].'&department='.$_GET['department'].'');

?>