<?php
/**
 * 
 */
class PoliceDepartment extends Connection
{
	
	public function __construct()
	{
		parent::__construct();
	}
   

   public function escape($value)
   {
      return parent::escape_value($value);
   }


   public function listDepartments()
   {
      parent::getAllDepartments();
   }
   public function listDepartmentsById($id)
   {
      parent::getAllDepartmentsById($id);
   }

	public function create($dept)
   {
      $sql  = "INSERT INTO police_department(";
      $sql .="name, case_types_id";
      $sql .= ") VALUES ('";
      $sql .= $this->escape($dept["dept_name"]) . "', '";
      $sql .= $this->escape($dept["crime"]) . "') ";
      return $sql;
   }

   public function update($id, $dept)
   {
      $sql  = "UPDATE police_department SET ";
      $sql .= "name= '" . $this->escape($dept["name"]) . "', ";
      $sql .= "case_types_id = '" . $this->escape($dept['crime']) . "'";
      $sql .= " WHERE department_id =  {$this->escape($id)}";
      return $sql;
   }


   public function delete($id)
   {
      $sql ="DELETE FROM police_department WHERE department_id = " . $this->escape($id);
      return $sql;
   }
}
$depts = new PoliceDepartment;
?>

