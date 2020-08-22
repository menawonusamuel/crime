<?php session_start(); 
 require_once('../models/Connection.php');
 require_once('../models/Police_Department.php');
  
 

if(isset($_POST['crime_search'])){
    $query =  $_POST['crime_id'];
    $crimeCom = $conn->getAllCasesById($query);
    
    if ($crimeCom != false){
    while($row = mysqli_fetch_assoc($crimeCom)){
     
        ?>
        
<form action ="crime_search2.php" method="post">

    <input type = "hidden" name="crime_id" value=<?php echo $row['case_types_id'];?>> 
    Crime Name:<input required type="text" name="case_name" value=<?php echo $row['case_name'];?> required><br>
<br><br>
<input type="submit" value="Update Crime" name="crimeupdate">
   <input type="submit" value="Delete Crime" name="crimedelete">
</form>
      <?php  
    }
  }
}

if(isset($_POST['crime_search2'])){
  //$option =  $_POST['option'];
  //$query =  $_POST['command'];
  $crimeCom = $conn->getAllCases();
  while($row =$crimeCom->fetch_assoc()){
   
      ?>
      
<table border cellspacing=5>
    <tr>
      <thead>
      <td>Crime id</td>
      <td>Crime name </td>
      </thead>
        <td><?php echo $row['case_types_id']?></td>
        <td><?php echo $row['case_name']?></td>
    </tr>
</table>
    <?php  
  }
}
?>