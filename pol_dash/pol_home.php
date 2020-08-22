
<!-- !PAGE CONTENT! -->
 <?php
    include_once("header.php");
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
          require_once('../models/Connection.php');
          require_once('../models/Crime.php');
  
  $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes WHERE solved=1 AND police_id = 2");
  $row =$localCom->fetch_assoc();
          echo "<h3>" . $row['COUNT(crime_id)'] . "</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Solved Crimes</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container  bg-info w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
        $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes WHERE status='pending' AND police_id = 2");
        $row =$localCom->fetch_assoc();
          echo "<h3>" . $row['COUNT(crime_id)'] . "</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Pending Crimes</h4>
      </div>
    </div>
    
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
        $localCom = $conn->getBySql("SELECT COUNT(crime_id) FROM crimes WHERE status='approved' AND police_id = 2");
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
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="third">
          <h5>Ratings</h5>
            <p>New Visitors</p>
            <div class="progress w3-grey">
                <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated w3-green" style="width:25%">
                    <div class="w3-center w3-text-white">+25%</div>
                </div>
            </div>
             <p>New Users</p>
    <div class="progress w3-grey">
      <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated w3-orange" style="width:50%">
        <div class="w3-center w3-text-white">50%</div>
      </div>
    </div>

    <p>Bounce Rate</p>
    <div class="progress w3-grey">
      <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated w3-red" style="width:75%">
        <div class="w3-center w3-text-white">75%</div>
      </div>
    </div>
    </div><hr>
      <div class="w3-twothird"><br />
        <h5>Crime Records</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-blue w3-padding-tiny"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-red w3-padding-tiny"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-orange w3-text-white w3-padding-tiny"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-red w3-padding-tiny"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-light-blue w3-padding-tiny"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-red w3-padding-tiny"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-green w3-padding-tiny"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
      
    </div>
  <hr>

  <div class="w3-container">
    <h5>General Record</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white table table-dark">
      <tr>
        <td>Police Commands</td>
        <td>65</td>
      </tr>
      <tr>
        <td>Police Department</td>
        <td>15</td>
      </tr>
      <tr>
        <td>Police Officers</td>
        <td>5</td>
      </tr>
      <tr>
        <td>Number of Sergeants</td>
        <td>20</td>
      </tr>
      <tr>
        <td>Number of Divisional Polices</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>Number of Sherrif</td>
        <td>1.5%</td>
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