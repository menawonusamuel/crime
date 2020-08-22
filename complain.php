<?php
session_start();
require_once('models/Connection.php');
require_once('models/Reporter.php');
$_SESSION["msg"] = "Complaint successfully sent"; 

//if submit button is clicked
if (isset($_POST["submit"]) && !empty($_FILES['evid']['name'])){
   /*
   no restriction on file size
   reaad exif data
   */    
   $target ="uploads/";
    $target_file = $target .basename($_FILES['evid']['name']);
    $imageType = pathinfo($target_file,PATHINFO_EXTENSION);
      $check = getimagesize($_FILES["evid"]["tmp_name"]);
    if($check !== false) {
        echo "<script>alert('File is an image - " . $check["mime"] . ".');</script>";
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
    if (move_uploaded_file($_FILES["evid"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file ". basename( $_FILES["evid"]["name"]). " has been uploaded.');</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }

   

               

               //saving form data into database 
               $crime =$report->create($_POST);
                 $conn->query($crime); 
                   $crime_id= $conn->getLastId();
            $sql  = "INSERT INTO reporter_files (";
            $sql .="crime_id, file_path";
            $sql .= ") VALUES ('";
            $sql .= $conn->escape_value($crime_id) . "', '";
            $sql .= $conn->escape_value($target_file) . "') ";
            //echo $sql;
              $conn->query($sql); 
              $_SESSION["msg"] = "Data saved and File uploaded successfully";
              header("Location: report.php");

            
      
         }
      
   }
   else{
        //saving form data into database 
        $crime =$report->create($_POST);
         $conn->query($crime);
         $_SESSION["msg"] = "<script>
          alert(\"Data saved! We will be in your vicinity soon\");
          </script>";
         
        header("Location: report.php");

   }
   

?>