<?php
	require_once('Connection.php');
	/**
	 * 
	 */
	class Photo extends Connection
	{
		
		  public $target ;
	      public $file ;
	      public $target_file;
	      public $fileType;
	      public $temp ;
	      public $file_error;
	      public $ext=array("jpg", "jpeg", "png", "txt", "doc", "pdf", "tiff", "psd", "mp3", "ogg", "wav", "mpeg", "mp4","m2a");
		
		public function __construct()
		{
			//upload folder
			parent::__construct();
			$this->target = "uploads/";

		}

		public function get_file(){
			 $this->target_file = $this->target . $this->file;
			 return $this->target_file;
		}

		//setting file attributes
		public function attach_file()
		{
			$this->file = basename($_FILES['evid']['name']);
			$this->fileType = pathinfo($this->file,PATHINFO_EXTENSION);
			$this->temp = $_FILES['evid']['tmp_name'];
			$this->file_error = $_FILES['evid']['error'];
		}

		//checking if file exists
		public function exists()
		{
			file_exists($this->target_file);
			return true;
		}

		//checking if filename is empty
		public function empty_file()
		{
			empty($this->file)||!is_array($this->file);
		}


		//checking file extension if its acceptable
		public function find_array()
		{
			in_array($this->fileType, $this->ext);
		}

		//upoading file
		public function upload_file()
		{
			//$this->attach_file($evid);
			move_uploaded_file($this->temp, $this->get_file());
			unset($this->temp);
		}

		//escaping special chars
		public function escape($value)
	    {
	      return parent::escape_value($value);
	    }

		//saving file in database
		public function create($crime_id){
			$sql  = "INSERT INTO reporter_files (";
            $sql .="crime_id, file_path";
            $sql .= ") VALUES ('";
            $sql .= $this->escape($crime_id) . "', '";
            $sql .= $this->escape($this->target_file) . "') ";
            return $sql;
		}
	}
	$photo = new Photo;
?>