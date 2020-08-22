<?php
	  require_once('../models/Connection.php');
  $sql = $conn->getAllCrimeFiles();
  
  ?>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
      <thead>
      <td>S/N</td>
      <td> Crime description </td>
      <td> Case type </td>
      <td> File </td>
      </thead></tr>echo $row['crime_id']
      <?php
  while($row =$localCom->fetch_assoc()){
?>
   	<tr>
        <td><?php echo $row['reporter_files_id']?></td>
        <td><?php
        $seql=$conn->getBySql("SELECT * FROM crimes WHERE crime_id=". $row["crime_id"]);
        while ($rows = $seql->fetch_assoc()) {
        	 echo "<td>" . $rows['case_types_id']. "</td>";
        	  echo "<td>" . $rows['crime_desc']. "</td>";
        }
         ?></td>
        <td><?php echo $row['role']?></td>
        <td>
      }
}
?>