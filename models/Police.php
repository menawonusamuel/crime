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

      $password_hashed = password_hash($police["password"], PASSWORD_DEFAULT);
      $sql  = "INSERT INTO police(";
      $sql .="Name, role, department_id, police_command_id, dob, joined_date, exit_date, username, password, email, phone";
      $sql .= ") VALUES ('";
      $sql .= $this->escape(trim($police["name"]) ). "', '";
      $sql .= $this->escape(trim($police["role"]) ). "', '";
      $sql .= $this->escape(trim($police["department_id"]) ). "', '";
      $sql .= $this->escape(trim($police["police_command_id"])). "', '";
      $sql .= $this->escape(trim($police["dob"])). "', '";
      $sql .= $this->escape(trim($police["join_date"])). "', '";
      $sql .= $this->escape(trim($police["exit_date"])). "', '";
      $sql .= $this->escape(trim($police["username"])). "', '";
      $sql .= ($password_hashed). "', '";
      $sql .= $this->escape(trim($police["email"])). "', '";
      $sql .= $this->escape(trim($police["phone"])) . "') ";
      return $sql;
   }

   public function update($id, $police)
   {
      $sql  = "UPDATE police SET ";
      $sql .= "Name= '" . $this->escape($police["name"]) . "', ";
      $sql .= "role= '" . $this->escape($police["role"]) . "', ";
      $sql .= "department_id= '" . $this->escape($police["department_id"]) . "', ";
      $sql .= "police_command_id = '" . $this->escape($police['police_command_id']) . "', ";
      $sql .= "dob = '" .$this->escape(trim($police["dob"])). "', ";
      $sql .= "joined_date = '" . $this->escape(trim($police["join_date"])). "', ";
      $sql .= "exit_date = '" . $this->escape(trim($police["exit_date"])). "', ";
      $sql .= "username = '" . $this->escape(trim($police["username"])). "', ";
      $sql .= "password = '" . $this->escape(trim($police["password"])). "', ";
      $sql .= "email =  '" . $this->escape(trim($police["email"])). "', ";
      $sql .= "phone = '" . $this->escape(trim($police["phone"])) . "'";
      $sql .= " WHERE police_id =  {$this->escape($id)}";
      return $sql;
   }

public function updatepol($id, $police)
   {
      $sql  = "UPDATE police SET ";
      
      $sql .= "username = '" . $this->escape(trim($police["username"])). "', ";
      $sql .= "email =  '" . $this->escape(trim($police["email"])). "', ";
      $sql .= "phone = '" . $this->escape(trim($police["phone"])) . "'";
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

