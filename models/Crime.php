<?php
    class Crime extends Connection
    {
        public function __construct()
	{
		parent::__construct();
	}
   

   public function escape($value)
   {
      return parent::escape_value($value);
   }


   public function listCases()
   {
      parent::getAllCases();
   }
   public function listCasesById($id)
   {
      parent::getAllCasesById($id);
   }

	public function create($case)
   {
      $sql  = "INSERT INTO case_types(";
      $sql .="case_name";
      $sql .= ") VALUES ('";
      $sql .= $this->escape($case["case_name"]) . "') ";
      return $sql;
   }

   public function update($id, $case)
   {
      $sql  = "UPDATE case_types SET ";
      $sql .= "case_name = '" . $this->escape($case["case_name"]) . "'";
      $sql .= " WHERE case_types_id =  {$this->escape($id)}";
      return $sql;
   }


   public function delete($id)
   {
      $sql ="DELETE FROM case_types WHERE case_Types_id = " . $this->escape($id);
      return $sql;
   }
    }
    $crimes = new Crime();
?>