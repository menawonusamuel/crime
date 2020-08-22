<?php

include_once("header.php");
require_once('../models/Connection.php');
require_once('../models/Crime.php');
?>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
                <div class="w3-container  bg-primary w3-padding-16">
                    <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <?php

                        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM crimes INNER JOIN police_command_areas on crimes.crime_street = police_command_areas.street WHERE police_command_areas.command_id={$_GET['base']} AND crimes.police_id<>0 ");
                        $row =$localCom->fetch_assoc();
                        echo "<h3>" . $row['COUNT(police_id)'] . "</h3>";
                        ?>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Assigned Cases</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container  bg-info w3-padding-16">
                    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <?php
                        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police  WHERE police.police_command_id={$_GET['base']}");
                        $row =$localCom->fetch_assoc();
                        echo "<h3>" . $row['COUNT(police_id)'] . "</h3>";
                        ?>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Police Officers</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-teal w3-padding-16">
                    <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <?php
                        $localCom = $conn->getBySql("SELECT  COUNT(police_id) FROM crimes INNER JOIN police_command_areas on crimes.crime_street = police_command_areas.street WHERE police_command_areas.command_id=". $_GET['base']);
                        $row =$localCom->fetch_assoc();
                        echo "<h3>" . $row['COUNT(police_id)'] . "</h3>";
                        ?>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Crimes</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <?php
                        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM crimes INNER JOIN police_command_areas on crimes.crime_street = police_command_areas.street WHERE police_command_areas.command_id={$_GET['base']} AND crimes.status='closed' ");
                        $row =$localCom->fetch_assoc();
                        echo "<h3>" . $row['COUNT(police_id)'] . "</h3>";
                        ?>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Closed Crime files</h4>
                </div>
            </div>
        </div>


        <hr>

        <div class="w3-container">
            <h5>General Record</h5>
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table table-dark">
                <tr>
                    <td>Police Department</td>
                    <?php
                    $localCom = $conn->getBySql("SELECT  COUNT(department_id) FROM police_department");
                    $row =$localCom->fetch_assoc();
                    echo "<td>" . $row['COUNT(department_id)'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Police Officers</td>
                    <?php
                    $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE police.police_command_id=".$_GET['base']);
                    $pol =$localCom->fetch_assoc();
                    echo "<td>" . $pol['COUNT(police_id)'] . "</td>";
                    ?>
                </tr>      <tr>
                    <td>Number of Constable</td>
                    <?php
                    $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='PC/DC' and police_command_id=".$_GET['base']);
                    $row =$localCom->fetch_assoc();
                    echo "<td>" . $row['COUNT(police_id)'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Number of Sergeants</td>
                    <?php
                    $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='Sgt/DS' and police_command_id=".$_GET['base']);
                    $row =$localCom->fetch_assoc();
                    echo "<td>" . $row['COUNT(police_id)']  . "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Number of Inspector</td>
                    <?php
                    $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='Insp/DI' and police_command_id=".$_GET['base']);
                    $row =$localCom->fetch_assoc();
                    echo "<td>" . $row['COUNT(police_id)'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Number of Supretendient</td>
                    <?php
                    $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='Supt/DSupt' and police_command_id=".$_GET['base']);
                    $row =$localCom->fetch_assoc();
                    echo "<td>" . $row['COUNT(police_id)'] . "</td>";
                    ?>
                </tr>

            </table><br>
        </div>
        <hr>
    </div>

<?php
include_once("../footer.php");
?>