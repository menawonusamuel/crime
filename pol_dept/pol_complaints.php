<?php
include_once("header.php");

?>
<?php //session_start(); 
require_once('../models/Connection.php');
require_once('../models/Crime.php');
if(isset($_GET['role']) && $_GET['role']=="Supt/DSupt"){
    $localCom = $conn->getBySql("SELECT * FROM crimes ");

    ?>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <h3>
        <?php
        if(isset($_SESSION["criupdate"])){
            echo $_SESSION["criupdate"];
            $_SESSION["cridelete"]= "";
            unset($_SESSION["criupdate"]);
        }elseif (isset($_SESSION["cridelete"])) {
            $_SESSION["criupdate"]="";
            echo $_SESSION["cridelete"];
            unset($_SESSION["cridelete"]);
        }
        else{
            echo " ";
        }
        ?>
    </h3><br/>
    <h5>Complaint record : Incident Notes </h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table-responsive">
        <tr>
            <thead>
            <td>Crime id</td>
            <td>Case type name </td>
            <td> Crime description </td>
            <td> Status </td>
            <td>Police assigned</td>
            <td>Approval Request</td>
            <td> Solved </td>
            </thead>
        </tr>
        <?php
        while($row =$localCom->fetch_array()){

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
                <td><?php echo $row['status'] ; ?></td>
                <td><select>
                        <?php
                        $police=$conn->getBySql("SELECT * FROM police WHERE police_id = {$row[19]}");
                        if(mysqli_num_rows($police)){
                            while($rows = $police->fetch_assoc()) {
                                echo "<option value={$rows['police_id']}>" . $rows['Name'] . "</option>";

                            }
                        }
                        else{
                            echo "<option>" . $rows['Name'] . "</option>";
                        }
                        ?>
                    </select> </td>
                <td><?php if($row['approval']==0)
                    {echo "No";}
                    else{echo "Yes";}
                    ?></td>
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
                    ?>&police=<?php echo $row[19];?>&crime=<?php echo($row['crime_id']);?>&case=<?php echo($row['case_types_id']);?>" class="btn btn-primary btn-outline-secondary">Edit</a></td>
                <td><a href="pol_delete.php?id=<?php
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
                    ?>&crime=<?php echo $row['crime_id'];?>" class="btn btn-primary btn-outline-secondary">Delete</a></td>
            </tr>
            <?php
        }

        ?>
    </table>
    <?php
}
else{

    if(isset($_GET['base'])){
        $localCom = $conn->getBySql("SELECT * FROM crimes INNER JOIN police_command_areas ON crimes.crime_street = police_command_areas.street WHERE police_command_areas.command_id=".$_GET['base']);
    }
    else{ $_GET['base']= 0;
        $localCom = $conn->getBySql("SELECT * FROM crimes INNER JOIN police_command_areas ON crimes.crime_street = police_command_areas.street WHERE police_command_areas.command_id=".$_GET['base']);
    }?>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <h3>
        <?php
        if(isset($_SESSION["criupdate"])){
            echo $_SESSION["criupdate"];
            $_SESSION["cridelete"]= "";
            unset($_SESSION["criupdate"]);
        }elseif (isset($_SESSION["cridelete"])) {
            $_SESSION["criupdate"]="";
            echo $_SESSION["cridelete"];
            unset($_SESSION["cridelete"]);
        }
        else{
            echo " ";
        }
        ?>
    </h3><br/>
    <h5>Complaint record : Incident Notes </h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table-responsive">
        <tr>
            <thead>
            <td>Crime id</td>
            <td>Case type name </td>
            <td> Crime description </td>
            <td> Status </td>
            <td>Police assigned</td>
            <td>Approval Request</td>
            <td> Solved </td>
            </thead>
        </tr>
        <?php
        while($row =$localCom->fetch_array()){

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
                <td><?php echo $row['status'] ; ?></td>
                <td><select>
                        <?php
                        $police=$conn->getBySql("SELECT * FROM police WHERE police_id = {$row[19]}");
                        if(mysqli_num_rows($police)){
                            while($rows = $police->fetch_assoc()) {
                                echo "<option value={$rows['police_id']}>" . $rows['Name'] . "</option>";

                            }
                        }
                        else{
                            echo "<option>" . $rows['Name'] . "</option>";
                        }
                        ?>
                    </select> </td>
                <td><?php if($row['approval']==0)
                    {echo "No";}
                    else{echo "Yes";}
                    ?></td>
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
                    ?>&police=<?php echo $row[19];?>&crime=<?php echo($row['crime_id']);?>&case=<?php echo($row['case_types_id']);?>" class="btn btn-primary btn-outline-secondary">Edit</a></td>
                <td><a href="pol_delete.php?id=<?php
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
                    ?>&crime=<?php echo $row['crime_id'];?>" class="btn btn-primary btn-outline-secondary">Delete</a></td>
            </tr>
            <?php
        }

        ?>
    </table>
    <?php
}
?>