<?php
    include_once("../header.php");

 ?>
<?php //session_start(); 
 require_once('../models/Connection.php');
  
 

if(isset($_POST['wsearch'])){
  $query = $_POST['mwid'];
    $localCom = $conn->getBySql("Select * from wanted where wid=". $query);
    if (mysqli_num_rows($localCom)){
    while($row = mysqli_fetch_assoc($localCom)){
     
        ?>
<div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white;">        
<form action ="mwanted_search2.php" method="post" style="padding:2em;">
    <input type="submit" value="Update Department" name="wantedupdate"  class="btn btn-success">
    <input type="submit" value="Delete Department" name="wanteddelete"  class="btn btn-danger">
    <br /><br />

    <input type = "hidden" name="wid" readonly="true" class="form-control" value=<?php echo $row['wid'];?> ><br>
    Crime id:
    <input type = "text" name="crime_id" readonly="true" class="form-control" value=<?php echo $row['crime_id'];?> ><br>
    Wanted Name:
    <input  type="text" class="form-control" value=<?php echo $row['name'];?> name="want_name"  required><br>
    Wanted Age:
    <input  type="tel" class="form-control" value=<?php echo $row['name'];?> name="want_age"  required><br>
    Description:
    <textarea name="description" class="form-control"><?php echo $row['description'];?></textarea><br>
    Last Seen:
    <textarea name="last_seen" class="form-control"><?php echo $row['last_seen'];?></textarea><br>
    Date:
    <input  type="date" class="form-control" value=<?php echo $row['date'];?> name="want_date"  required><br>
    Update  image<br><img width=200px height=200 src=<?php echo $row['image'];?>><br><br>
      <input type="file" name="img" id="fileToUpload" class="form-control " >
   <br><br>

</form>
<?php
      include_once("../footer.php");
   ?>

      <?php  
    }
  }
  else{?>
    <div class="w3-main bg-info" style="margin-left:300px;margin-top:43px; color: white;">
    
   <h1 style="padding:8em">NO record found</h1></div><?php
}
}

if(isset($_POST['wsearch2'])){
   $localCom = $conn->getBySql("Select * from wanted");
    if (mysqli_num_rows($localCom)){
      while($row = mysqli_fetch_assoc($localCom)){
     
        ?>
    <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">    
    <h5>Record of Most Wanted Crimnals</h5>
   
      
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
      <thead>
      <td>Wanted id</td>
      <td>Wanted name </td>
      <td> Wanted age </td>
      <td> Police description </td>
      <td> Last seen </td>
      <td> Date registered </td>
      <td> Image </td>
      </thead>
        <td><?php echo $row['wid']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['age']?></td>
        <td><?php echo $row['description']?></td>
        <td><?php echo $row['last_seen']?></td>
        <td><?php echo $row['date']?></td>
        <td><img width=100px height=100  src=<?php echo $row['image'];?>></td>
    </tr>
</table>
    <?php  
  }
}
}else{
  header('Location: report.php');
}
?>