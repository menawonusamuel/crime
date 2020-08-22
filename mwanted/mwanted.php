<?php
    //session_start();
    if(isset($_SESSION['mdelete'])){
              echo $_SESSION['mdelete'];
              $_SESSION['mupdate'] = " ";
              session_unset();
            }
    elseif(isset($_SESSION['mupdate'])){
              $_SESSION['mdelete'] = "";
              echo $_SESSION['mupdate'] ;
              session_unset();
            }
    else{
              $_SESSION['mdelete'] = "";
              $_SESSION['mupdate'] = "";
            }
  ?>
  <?php
   include_once("../header.php");
   require_once('../models/Connection.php');
    ?>
 <div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white;">
  <form action="mwanted_search.php" method="post" class="w3-container" style="padding-top:22px">
    <small>Search by Id </small>
  	<input type="search" name="mwid"  class="form-control" >
  	<input type="submit" name="wsearch" value="Search" class="btn btn-secondary" style="margin-top:1rem">
    <input type="submit" name="wsearch2" value="Search All Most Wanted" class="btn btn-secondary" style="margin-top:1rem">
  </form>

  <?php
    if (isset($_SESSION["com"])== true){
      echo "<p>" . $_SESSION["com"]. "</p>";
    } else {
      $_SESSION["com"] = "";

    } 

  ?>
  <form action ="mwanted.php?username=<?php if(isset($_GET['username'])){
      echo $_GET['username'];
  }else{
      echo " ";
  }?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="name">Wanted Name:
      <input  type="text" class="form-control" name="name" id="name" aria-describedby="command_name" placeholder="John Scotland" ></label>  <br>
    <label for="age">Age:
      <input  type="tel"  class="form-control" name="age" id="age" aria-describedby="command_div" placeholder="24" ></label><br>
     Choose crime: 
      <select name="crime_id" class="form-control">
      <?php
        $crime = $conn->getBySql("Select * from crimes INNER JOIN case_types ON crimes.case_types_id = case_types.case_types_id");
        
        while ($row= mysqli_fetch_assoc($crime)) {
          echo "<option  value = {$row['crime_id']}>";
          
           echo"   {$row['case_name']}  {$row['created_at']}";

         
         echo"</option>";
        }
      ?></select><br>
    Description<br>
      <textarea name="description" rows="5" cols="80"class="form-control"></textarea><br>
    Last seen<br>
      <textarea name="last_seen" rows="5" cols="80" class="form-control" fixed></textarea><br><br>
    Date<br>
      <input type="date" name="date" class="form-control"> <br><br>
    
    Insert image<br>
      <input type="file" name="img" id="fileToUpload" class="form-control " >
   <br><br>
    <input type="submit" value="Add Most wanted" name="wantlad" class="btn btn-secondary" style="margin-bottom:4rem"></div>
  </form>
</div>
   <?php
      include_once("../footer.php");
   ?>

<?php
  
  if (isset($_POST["wantlad"])){
    $target ="most_wanted/";
    $target_file = $target .basename($_FILES['img']['name']);
    $imageType = pathinfo($target_file,PATHINFO_EXTENSION);
      $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
      //  echo "<script>alert('File is an image - " . $check["mime"] . ".');</script>";
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.');</script>";
    $uploadOk = 0;
}if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.');</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file ". basename( $_FILES["img"]["name"]). " has been uploaded.');</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }

    $sql  = "INSERT INTO wanted(";
      $sql .="crime_id, name, age, description, last_seen, date, image";
      $sql .= ") VALUES ('";
      $sql .= $conn->escape_value(trim($_POST["crime_id"]) ). "', '";
      $sql .= $conn->escape_value(trim($_POST["name"]) ). "', '";
      $sql .= $conn->escape_value(trim($_POST["age"]) ). "', '";
      $sql .= $conn->escape_value(trim($_POST["description"]) ). "', '";
      $sql .= $conn->escape_value(trim($_POST["last_seen"]) ). "', '";
      $sql .= $conn->escape_value(trim($_POST["date"]) ). "', '";
      $sql .= $conn->escape_value(trim($target_file)) . "') ";
      $conn->query($sql);
}
 
  /*$localCom = $wanted->create($_POST);
 

  $com = $conn->getLastId();

  $dept=$_POST["department_id"];
  
  foreach ($dept as  $dep) {
    $sql  = "INSERT INTO command_dept (";
      $sql .="command_id, department_id";
      $sql .= ") VALUES ('";
      $sql .= $com    . "', '";
      $sql .= $dep . "') ";
      $conn->query($sql);
  }
  $_SESSION["com"] =
          "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Police command created!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>";
  header("Location: command_add.php");*/
}

?>