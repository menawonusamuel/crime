<?php session_start(); 
  require_once('../models/Connection.php');
  require_once('../models/Local_Command.php');
  
    if(isset($_POST["command"])){
        $str = $conn->escape_value($_POST["command"]);

        $comdepts=$conn->getBySql("SELECT * FROM police_command_areas LEFT JOIN command_dept ON police_command_areas.command_id = command_dept.command_id LEFT JOIN police_department ON command_dept.department_id=police_department.department_id WHERE police_command_areas.street='{$str}%'");
        if(mysqli_num_rows($comdepts)==1){
	while ($rows = $comdepts->fetch_array()) { ?>
<table class="table table-striped">
  	<tr>
  		<thead>
  			<td>Command id</td>
  			<td>Command name</td>
  			<td>Command division</td>
  			<td>Street</td>
  			<td>Postcode</td>
  			<td>Department(s)</td>
  		</thead>
  	</tr>
  		
  		<tr>
  		<td><?php echo($rows[0]);?></td>
  		<td><?php echo($rows[1]);?></td>
  		<td><?php echo($rows[2]);?></td>
  		<td><?php echo($rows[3]);?></td>
  		<td><?php echo($rows[4]);?></td>
  		<td><?php echo($rows[9]);?></td>
  	</tr>
  </table>
  <?php
}
}
else{
  echo("NO record found");
}
}?>