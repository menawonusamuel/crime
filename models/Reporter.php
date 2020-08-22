<?php
require_once('Connection.php');

class Reporter extends Connection
{
   
   /*private $conn ;*/
  /* private $crime;
   private $crimead ;
   private $phone ;
   private $desc ;
   private $evid;
   private $fn ;
   private $addr;
   private $ip ;
   private $mac;
   private $loc ;
   private $browse ;
   private $model;*/



   public function __construct()
   {
      parent::__construct();
   }

   public function escape($value)
   {
      return parent::escape_value($value);
   }

   public function create($report)
   {
      
      $sql  = "INSERT INTO crimes (";
      $sql .="case_types_id, crime_addr, crimearea, crime_street, postcode, crime_desc, ip_addr, mac_addr, location, browser, model, reporter_full_name, reporter_address, reporter_street, reporter_town, phone";
      $sql .= ") VALUES ('";
      $sql .= $this->escape($report["crime"]) . "', '";
      $sql .= $this->escape($report["crimead"]) . "', '";
      $sql .= $this->escape($report["crimearea"]) . "', '";
      $sql .= $this->escape($report["crimestr"]) . "', '";
      $sql .= $this->escape($report["pstcde"]) . "', '";
      $sql .= $this->escape($report["crimedesc"]) . "', '";
      $sql .= $this->escape($report["ip"]) . "', '";
      $sql .= $this->escape($report["mac"]) . "', '";
      $sql .= $this->escape($report["location"]) . "', '";
      $sql .= $this->escape($report["browser"]) . "', '";
      $sql .= $this->escape($report["model"]) . "', '";
      $sql .= $this->escape($report["reporter_fn"]) . "', '";
      $sql .= $this->escape($report["reporter_addr"]) . "', '";
      $sql .= $this->escape($report["reporter_str"]) . "', '";
      $sql .= $this->escape($report["reporter_twn"]) . "', '";
      $sql .= $this->escape($report["phone"]) . "') ";
      return $sql;
   }

   public function update($id, $report)
   {
      $sql  = "UPDATE crimes SET ";
      $sql .= "police_id = '" . $this->escape($report["police"]) . "', ";
      $sql .= "approval = '" . $this->escape($report["approval"]) . "', ";
      $sql .= "status = '" . $this->escape($report["status"]) . "', ";
      $sql .= "solved = '" . $this->escape($report["solved"]) . "'";
      $sql .= " WHERE crime_id =  {$this->escape($id)}";
      return $sql;
   }
}
$report = new Reporter();
?>