<?php
    include_once("../header.php");
     require_once('../models/Connection.php');
 ?>

    <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">
    <h5>Record of List of Criminal files</h5>


<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
    <thead>
      <td>Crime file id</td>
      <td>Crime id </td>
      <td> Image </td>
      <td> Crime description </td>
    </thead>
    </tr>
    <?php //session_start();




//if(isset($_POST['wsearch2'])){
    $localCom = $conn->getBySql("Select * from reporter_files");
    if (mysqli_num_rows($localCom)>0){
      while($row = mysqli_fetch_assoc($localCom)){

        ?>
    <tr>
        <td><?php echo $row['reporter_files_id']?></td>
        <td><?php echo $row['crime_id']?></td>
        <td><img width=100px height=100  src=../<?php echo $row['file_path'];?>></td>

   <td><a style="color: blue;" href ="pol_display.php?username=<?php
        if(isset($_GET['username'])){
            echo $_GET['username'];
        }else{
            echo " ";
        }?>&crid=<?php echo $row['crime_id'];?>">View</a></td>
    </tr>

    <?php
  }
  echo "</table>";
}
?>