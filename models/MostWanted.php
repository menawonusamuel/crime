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
      $sql  = "INSERT INTO wanted(";
      $sql .="crime_id, cd_id, name, age, description, last_seen, date, image";
      $sql .= ") VALUES ('";
      $sql .= $this->escape(trim($police["crime_id"]) ). "', '";
      $sql .= $this->escape(trim($police["cd_id"]) ). "', '";
      $sql .= $this->escape(trim($police["name"]) ). "', '";
      $sql .= $this->escape(trim($police["age"]) ). "', '";
      $sql .= $this->escape(trim($police["description"]) ). "', '";
      $sql .= $this->escape(trim($police["last_seen"]) ). "', '";
      $sql .= $this->escape(trim($police["date"]) ). "', '";
      $sql .= $this->escape(trim($police["image"])) . "') ";
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
    $wanted = new MostWanted();
?>