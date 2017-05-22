<?php 

class Model_Classes extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	/*
	*------------------------------------
	* count total classes information 
	*------------------------------------
	*/	
	public function countTotalClass() 
	{
		$sql = "SELECT * FROM class";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

}