<?php
//session_start();
require_once('models/Connection.php');
$cases=$conn->getAllCases();
$commands=$conn->getAllLocalCommands();
?>

<form action ="complain.php" method="post" enctype="multipart/form-data" class="signup-form">
              <div class="form-header">
                <h2>Report a crime </h2>
                <h4><i>Complaint form</i></h4>
                <p>Tell the Police. The police can help you, the police is your friend</p>
              </div>
              <div class="form-content"/>
  <?php 
 
  echo"<br>Click to Select crime <select name=\"crime\">";  
  
    // output data of each row
    while($row = $cases->fetch_assoc()) {
        echo "<option value={$row["case_types_id"]}>{$row["case_name"]}</option> ";
    }
        ?>
  </select>
 
  <br><br>
                
                <p>Reporter's name:<input required type="text" name="reporter_fn" placeholder="Full name"></p>
                <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <p>Reporter's home address:<input required type="text" name="reporter_addr" placeholder="Your address"></p>                <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <p>Reporter's street:<input required type="text" name="reporter_str" placeholder="Your address"></p>                <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <p>Reporter's town:<input required type="text" name="reporter_twn" placeholder="Your address"></p>                <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <p>Phone Number:<input type="tel" name="phone" required placeholder="+447 868 8686"></p>                <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <p>Address of crime:<input required type="text" name="crimead" placeholder="Address of crime"></p>                <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <p>Street of crime<input required type="text" name="crimearea" placeholder="Street of crime"></p> 
                               <?php 
 
  echo"<br>Click to Select Police Station closer to you <select name=\"crimestr\">";  
  
    // output data of each row
    while($row = $commands->fetch_assoc()) {
        echo "<option value={$row["street"]}>{$row["street"]}</option> ";
    }
        ?>
  </select>
                  <p><small>
                  <?php if (isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                          } else {
                            $_SESSION["error"] = "";
                            
                          } ?></small></p>
                <!-- <p><input  type="hidden" name="crimetwn" value="Aberdeen"></p> -->

                <p> Postcode of crime<input required type="text" name="pstcde" placeholder="AX12 3AB"> </p>
State case: <br> <textarea required  rows="10" cols="24" name="crimedesc" placeholder="I want to report a ." >

</textarea>
<br>


Click to show evidence:
    <input type="file" name="evid" id="fileToUpload" >
<br>
<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']?>">
<input type="hidden" name="mac" value="<?php echo exec('getmac')?>">
<input type="hidden" name="location" value="<?php echo "Aberdeen"?>">
<input type="hidden" name="browser" value="<?php echo $_SERVER['HTTP_USER_AGENT']?>">
<input type="hidden" name="model" value="<?php echo $_SERVER['HTTP_USER_AGENT']?>">
<input type="submit" value="Submit Complaint" name="submit">
</form>
