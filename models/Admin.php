<?php
/**
 * 
 */
class Admin extends Connection
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function escape($value)
   {
      return parent::escape_value($value);
   }

   public function update($id, $admin)
   {
      $sql  = "UPDATE users SET ";
      $sql .= "username = '" . $this->escape($admin["user"]) . "', ";
      $sql .= "email = '" . $this->escape($admin["email"]) . "'";
      $sql .= " WHERE id	 =  '$id'";
      return $sql;
   }
}
$admine = new Admin();