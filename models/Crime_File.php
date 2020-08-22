<?php
/**
 * 
 */
class CrimeFile extends Connection
{
	
	public function __construct()
	{
		parent::__construct();
	}
   

   public function escape($value)
   {
      return parent::escape_value($value);
   }


   public function listCrimeFile()
   {
      parent::getAllPolice();
   }
   public function listCrimeFileById($id)
   {
      parent::getAllCrimeFileById($id);
   }

	public function create($cfile)
   {
      $sql  = "INSERT INTO police(";
      $sql .="Name, role, department_id, police_command_id";
      $sql .= ") VALUES ('";
      $sql .= $this->escape($police["police_id"]) . "', '";
      $sql .= $this->escape($police["role"]) . "', '";
      $sql .= $this->escape($police["department_id"]) . "', '";
      $sql .= $this->escape($police["police_command_id"]) . "') ";
      return $sql;
   }

   public function update($id, $police)
   {
      $sql  = "UPDATE police SET ";
      $sql .= "Name= '" . $this->escape($police["name"]) . "', ";
      $sql .= "Title= '" . $this->escape($police["title"]) . "', ";
      $sql .= "role= '" . $this->escape($police["role"]) . "', ";
      $sql .= "department_id= '" . $this->escape($police["departtment_id"]) . "', ";
      $sql .= "police_command_id = '" . $this->escape($police['police_command_id']) . "'";
      $sql .= " WHERE police_id =  {$this->escape($id)}";
      return $sql;
   }


   public function delete($id)
   {
      $sql ="DELETE FROM police WHERE police_id = " . $this->escape($id);
      return $sql;
   }
}
$police = new Police();
?>

<?php
/**
 * 
 */
class Police extends Connection
{
	
	public function __construct()
	{
		parent::__construct();
	}
   

   public function escape($value)
   {
      return parent::escape_value($value);
   }


   public function listPolice()
   {
      parent::getAllPolice();
   }
   public function listPoliceById($id)
   {
      parent::getAllPoliceById($id);
   }

	public function create($police)
   {
      $sql  = "INSERT INTO police(";
      $sql .="Name, role, department_id, police_command_id";
      $sql .= ") VALUES ('";
      $sql .= $this->escape($police["name"]) . "', '";
      $sql .= $this->escape($police["role"]) . "', '";
      $sql .= $this->escape($police["department_id"]) . "', '";
      $sql .= $this->escape($police["police_command_id"]) . "') ";
      return $sql;
   }

   public function update($id, $police)
   {
      $sql  = "UPDATE police SET ";
      $sql .= "Name= '" . $this->escape($police["name"]) . "', ";
      $sql .= "Title= '" . $this->escape($police["title"]) . "', ";
      $sql .= "role= '" . $this->escape($police["role"]) . "', ";
      $sql .= "department_id= '" . $this->escape($police["departtment_id"]) . "', ";
      $sql .= "police_command_id = '" . $this->escape($police['police_command_id']) . "'";
      $sql .= " WHERE police_id =  {$this->escape($id)}";
      return $sql;
   }


   public function delete($id)
   {
      $sql ="DELETE FROM police WHERE police_id = " . $this->escape($id);
      return $sql;
   }
}
$cfile = CrimeFile();
?>

