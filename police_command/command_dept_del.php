<?php
require_once('../models/Connection.php');
    $id = $_GET['cdid'];
    $comdepts=$conn->getBySql("Delete FROM command_dept Where cd_id =". $id);
    ?>
    <script type="text/javascript">
    	$quest =confirm("Do you want to delete this data");
    	if($quest==true){
     
    <?php
    $ql = $conn->query($comdepts);
 ?>
open("Location: command_add.php")
}
</script>