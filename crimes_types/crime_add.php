<?php
    session_start();
    if(isset($_SESSION['cdelete'])){
              echo $_SESSION['cdelete'];
              $_SESSION['cupdate'] = " ";
              session_unset();
            }
    elseif(isset($_SESSION['cupdate'])){
              $_SESSION['cddelete'] = "";
              echo $_SESSION['cupdate'] ;
              session_unset();
            }
    else{
              $_SESSION['cdelete'] = "";
              $_SESSION['cupdate'] = "";
            }
  ?>
<form action="crime_search.php" method="post">
  <small>Search by Id </smal>
	<input type="text" name="crime_id">
	<input type="submit" name="crime_search" value="Search">
  <input type="submit" name="crime_search2" value="List All Crime Types">
</form>

<?php

  if (isset($_SESSION["crime"])== true){
    echo  $_SESSION["crime"];
  } else {
    $_SESSION["crime"] = "";

  } 

?>
<form action ="crime_add.php" method="post">
  Crime Name:<input required type="text" name="case_name" placeholder="Special Anti-Robbery Unit" required><br>
  
<br><br>
  <input type="submit" value="Add Crime" name="crimead">
</form>

<?php
  require_once('../models/Connection.php');
  require_once('../models/Crime.php');
  if (isset($_POST["crimead"])){

  $crimeCom = $crimes->create($_POST);
  $conn->query($crimeCom);
  $_SESSION["crime"] = "Crime added";
  header("Location: crime_add.php");
}

?>