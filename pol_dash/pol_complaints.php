<?php
include_once("header.php");

?>
<?php //session_start();
require_once('../models/Connection.php');
require_once('../models/Crime.php');


$localCom = $conn->getBySql("SELECT * FROM crimes WHERE police_id = {$_GET['id']}");
?>
<div class="w3-main bg-dark" style="margin-left:300px;margin-top:43px; color: white; padding: 1px;">
    <h5>Complaint record : Incident Notes </h5>
    <form>
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
            <tr>
                <thead>
                <td>Crime id</td>
                <td>Case type name </td>
                <td> Crime description </td>
                <td> Status </td>
                <td> Solved </td>
                </thead>
            </tr>
            <?php

            while($row =$localCom->fetch_assoc()){

                ?>


                <tr>
                    <td><?php echo $row['crime_id']?></td>

                    <td><?php
                        $cases=$conn->getBySql("SELECT * FROM case_types WHERE case_types_id = {$row['case_types_id']}");
                        while($rows = $cases->fetch_assoc()) {
                            echo $rows['case_name'];

                        }
                        ?>
                    </td>


                    <td><a style="color: blue;" href ="pol_display.php?id=<?php
                        if(isset($_GET['id'])){
                            echo $_GET['id'];
                        }else{
                            echo " ";
                        }?>&name=<?php
                        if(isset($_GET['name'])){
                            echo $_GET['name'];
                        }else{
                            echo " ";
                        }?>&role=<?php
                        if(isset($_GET['role'])){
                            echo $_GET['role'];
                        }else{
                            echo " ";
                        }
                        ?>&base=<?php
                        if(isset($_GET['base'])){
                            echo $_GET['base'];
                        }else{
                            echo " ";
                        }
                        ?>&department=<?php
                        if(isset($_GET['department'])){
                            echo $_GET['department'];
                        }else{
                            echo " ";
                        }
                        ?>&crid=<?php echo $row['crime_id'];?>">View</a></td>
                    <td>
                        <select>
                            <?php echo "<option value={$row['status']}>" . $row['status'] . "</option>"; ?>
                            <?php echo "<option value=!{$row['status']}>" . !($row['status']) . "</option>"; ?>
                    <td><?php if($row['solved']==0)
                        {echo "No";}
                        else{echo "Yes";}
                        ?></td>
                    <td><a href="pol_comp.php?id=<?php
                        if(isset($_GET['id'])){
                            echo $_GET['id'];
                        }else{
                            echo " ";
                        }?>&name=<?php
                        if(isset($_GET['name'])){
                            echo $_GET['name'];
                        }else{
                            echo " ";
                        }?>&role=<?php
                        if(isset($_GET['role'])){
                            echo $_GET['role'];
                        }else{
                            echo " ";
                        }
                        ?>&base=<?php
                        if(isset($_GET['base'])){
                            echo $_GET['base'];
                        }else{
                            echo " ";
                        }
                        ?>&department=<?php
                        if(isset($_GET['department'])){
                            echo $_GET['department'];
                        }else{
                            echo " ";
                        }
                        ?>&status=<?php echo($row['status']);?>&crime=<?php echo($row['crime_id']);?>" class="btn btn-primary btn-outline-secondary">Update</a></td>


                </tr>

                <?php
            }


            ?>
        </table>
    </form>