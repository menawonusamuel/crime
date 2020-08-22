<?php

/**
 * 
 */
class LocalCommand extends Connection
{
	
	public function __construct()
	{
		parent::__construct();
	}

   public function escape($value)
   {
      return parent::escape_value($value);
   }


	public function listCommands()
   {
      return parent::getAllLocalCommands();
   }

   public function getCommands($id)
   {
      return parent::getAllLocalCommandsById($id);
   }

	public function create($report)
   {
      $sql  = "INSERT INTO police_command_areas (";
      $sql .="command_name, command_division, street, town, postcode";
      $sql .= ") VALUES ('";
      $sql .= $this->escape($report["command_name"]) . "', '";
      $sql .= $this->escape($report["command_div"]) . "', '";
      $sql .= $this->escape($report["street"]) . "', '";
      $sql .= $this->escape($report["town"]) . "', '";
      $sql .= $this->escape($report["postcode"]) . "') ";
      return $sql;
   }
   public function create_dept($com, $report)
   {
      $sql  = "INSERT INTO command_dept (";
      $sql .="command_id, department_id";
      $sql .= ") VALUES ('";
      $sql .= $com . "', '";
      $sql .= $this->escape($report["department_id"]['$i']) . "') ";
      return $sql;
   }
   public function update($id, $command)
   {
      $sql  = "UPDATE police_command_areas SET command_name = '"  . $this->escape($command["command_name"]) . "', ";
      $sql .= "command_division = '".$this->escape($command["command_div"]) . "', ";
      $sql .= "street ='" . $this->escape($command["street"]) . "', ";
      $sql .= "town = '" . $this->escape($command["town"]) . "', ";
      $sql .= "postcode = '" . $this->escape($command["postcode"]) . "'";
      $sql .= " WHERE command_id =  {$this->escape($id)}";
      return $sql;
   }

   public function delete($id)
   {
      $sql ="DELETE FROM police_command_areas WHERE command_id = " . $this->escape($id);
      return $sql;
   }
}
$commands = new LocalCommand();
?>