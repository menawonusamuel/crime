<?php
require_once('../models/Connection.php');

    include_once("../header.php");
    if(isset($_GET['cid']) && isset($_GET['did']) ){
     $cid = $_GET['cid'];
      $pid = $_GET['pid'];
      $did = $_GET['did'];
     $comdepts=$conn->getBySql("SELECT * FROM police_command_areas INNER JOIN command_dept ON police_command_areas.command_id = ". $cid . " INNER JOIN police_department ON command_dept.department_id=".$did);

 ?>


 <div class="w3-main " style="margin-left:300px;margin-top:43px;">

  <form action="comdept_search.php" method="post" class="w3-container" style="padding-top:22px">
    <?php if(mysqli_num_rows($comdepts)>0){?>
   </form>
<h1>Departments Under Command Base <?php echo $cid;?></h1>
<table class="table table-striped">
  <tr>
      <thead>
        <td><h3>Department Id</h3></td>
        <td><h3>Departments</h3></td>
        <td><h3>Head of Department</h3></td>
      </thead>
    </tr>
  		<?php
  		

	while ($rows = $comdepts->fetch_array()) { ?>

  	
  		
  		<tr>
  		<td><?php echo( $rows[8]);?></td>
  		<td><?php 
      $depts = $conn->getBySql("Select * from police_department where department_id =". $did);
      while($rown = $depts->fetch_assoc()) {
           //echo( $rows[4]);
         echo("<a>" . $rown['name']. "</a>");
        }
     ?></td>
     <td><?php 
      $pol = $conn->getBySql("SELECT * FROM police WHERE police_id = ". $pid );
      if(mysqli_num_rows($pol)>0){
      while($rol = $pol->fetch_assoc()) {
           //echo( $rows[4]);
         echo("<a>" . $rol['Name']. "</a>");
        }
      }else{
        echo("Not Assigned");
      }
        
     ?></td>
     <td><?php echo("<a href=command_dept_add.php?cid={$cid}&did={$did} class=\"btn btn-success\">Edit</a>");?></td>
     <td><?php echo("<a href=command_dept_del.php?cdid={$rows[6]} class=\"btn btn-danger\">Delete</a>");?></td>
      
  	</tr> <?php
}
}else{
        echo " No departments assigned<br>";
        echo "<a href=command_add.php?cid={$cid}&did={$did}&pid={$pid} class='btn btn-info'>Add Police Base Department </a>";
}
 include_once("../footer.php");?>