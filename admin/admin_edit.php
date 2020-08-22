<?php
include_once("../header.php");

require_once('../models/Connection.php');
require_once('../models/Admin.php');

$admin= $conn->getBySql("Select * from users where username =". $_SESSION["username"]." LIMIT 1");
if(mysqli_num_rows($admin)){
    while($row = mysqli_fetch_array($admin)){
        ?>
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <form action ="admin_edit.php" method="post" style="padding: 3em;">
            <?php	if(isset($_SESSION['adminupdate'])){
                echo  $_SESSION['adminupdate'];
            }
            else{
                $_SESSION['adminupdate'] = "";
            }?>
            <p>Admin no:<input required type="text" class ="form-control" name="id" value=<?php echo $row[0];?> ></p>
            <p>Username:<input required type="text" class ="form-control" name="user" value=<?php echo $row[1];?> ></p>
            <p>Email:<input required  type="text"  class ="form-control" name="email" value=<?php echo $row[2];?> ></p>
            <input type="submit" value="Update Admin Info" class="btn btn-secondary" name="submit">
        </form>
        <?php
    }
}
?>
<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $upAd = $admine->update($id, $_POST);
    $conn->query($upAd);
    $_SESSION["adminupdate"] ="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
          <strong>Admin is updated!</strong> You should check in on some of those fields below.
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>" ;
}
?>