<?php
require_once('../models/Connection.php');
    include_once("../header.php");
    $id = $_GET['cdid'];?>
 ?>
 <div class="w3-main " style="margin-left:300px;margin-top:43px; color: white;">

 CRIME INFO FOR DEPARTMENT<br> 
<a href="command_dept.php">Go back</a>
<table class="table table-striped ">
  <tr>
      <thead>
        <td>Command id</td>
        <td>Case type</td>
        <td>Description</td>
        <td>Addres</td>
        <td>Postcode</td>
      </thead>
    </tr>
      <?php
      $comdepts=$conn->getBySql("SELECT * FROM police_command_areas LEFT JOIN crimes ON police_command_areas.street = crimes.crime_street LEFT JOIN police_department ON crimes.case_types_id=police_department.case_types_id LEFT JOIN case_types ON police_department.case_types_id= case_types.case_types_id WHERE department_id={$conn->escape_value($id)} ");

  while ($rows = $comdepts->fetch_array()) { ?>

    
      
      <tr>
      <td><?php echo($rows[3])?></td>
      <td><?php echo( $rows[30]);?></td>
      <td><?php echo( $rows[11]);?></td>
      <td><?php echo( $rows[8] . " " . $rows[9] . " " . $rows[10]);?></td>
      <td><?php echo( $rows[5]);?></td>
    </tr> <?php
}

  
?>
  </table>
 