<!-- !PAGE CONTENT! -->
 <?php
    include_once("../header.php");
 ?>
 <div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

    <?php
     require_once('../models/Connection.php');
     require_once('../models/Crime.php');
     ?>
  <div class="w3-row-padding w3-margin-bottom">

    <div class="w3-quarter">
      <div class="w3-container  bg-info w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
        $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes WHERE status='pending'");
        $row =$localCom->fetch_assoc();
          echo "<h3>" . $row['COUNT(crime_id)'] . "</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Pending Crimes</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
        $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes");
        $row =$localCom->fetch_assoc();
          echo "<h3>" . $row['COUNT(crime_id)'] . "</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Crimes reported</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
        $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes WHERE status='closed'");
        $row =$localCom->fetch_assoc();
          echo "<h3>" . $row['COUNT(crime_id)'] . "</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Closed Crime files</h4>
      </div>
    </div>
  </div>

  <div class="w3-container w3-section">

  <hr>

  <div class="w3-container">
    <h5>General Records</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table table-dark">
      <tr>
        <td>Police Commands</td>
        <?php
        $localCom = $conn->getBySql("SELECT COUNT(command_id) FROM police_command_areas");
        $row =$localCom->fetch_assoc();
          echo "<td>" . $row['COUNT(command_id)'] . "</td>";
          ?>
      </tr>
      <tr>
        <td>Police Departments</td>
        <?php
        $localCom = $conn->getBySql("SELECT COUNT(department_id) FROM police_department");
        $row =$localCom->fetch_assoc();
          echo "<td>" . $row['COUNT(department_id)'] . "</td>";
          ?>
      </tr>
      <tr>
        <td>Police Officers</td>
        <?php
        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police");
        $pol =$localCom->fetch_assoc();
          echo "<td>" . $pol['COUNT(police_id)'] . "</td>";
          ?>
      </tr>
        <tr>
            <td>Number of Constables</td>
            <?php
            $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='PC/DC'");
            $row =$localCom->fetch_assoc();
            echo "<td>" . $row['COUNT(police_id)'] . "</td>";
            ?>
        </tr>
      <tr>
        <td>Number of Sergeants</td>
        <?php
        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='Sgt/DS'");
        $row =$localCom->fetch_assoc();
          echo "<td>" . $row['COUNT(police_id)']  . "</td>";
          ?>
      </tr>
      <tr>
        <td>Number of Inspectors</td>
        <?php
        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='Insp/DI'");
        $row =$localCom->fetch_assoc();
          echo "<td>" . $row['COUNT(police_id)'] . "</td>";
          ?>
      </tr>
      <tr>
        <td>Number of Superintendents</td>
         <?php
        $localCom = $conn->getBySql("SELECT COUNT(police_id) FROM police WHERE role='Supt/DSupt'");
        $row =$localCom->fetch_assoc();
          echo "<td>" . $row['COUNT(police_id)'] . "</td>";
          ?>
      </tr>

    </table><br>
  </div>
  <hr>
</div>

<!-- <div id="bases" class="w3-main" style="margin-left:30px;margin-top:43px;">
   <?php //include_once('../police_command/command_add.php');?>
</div>

<div id="depts" class="w3-main" style="margin-left:30px;margin-top:43px;">
   <?php //include_once('../police_dept/dept_add.php');?>
</div>
<div id="police" class="w3-main" style="margin-left:30px;margin-top:43px;">
   <?php //  include_once('../police/police_add.php');?>
</div>
<div id="mwanted" class="w3-main" style="margin-left:30px;margin-top:43px;">
  <?php //include_once('../mwanted/mwanted_add.php'); ?>
</div> -->
 
 <?php
    include_once("../footer.php");
 ?>