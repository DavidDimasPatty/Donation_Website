<?php

class MySQLDB{
	protected $servername;
	protected $username;
	protected $password;
	protected $dbname;

	protected $db_connection;

	public function __construct($servername,$username,$password,$dbname){
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
	}

	public function openConnection(){
		//create connection
		$this->db_connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		//check connection
		if ($this->db_connection->connect_error) {
			die('Could not connect to '.$this->servername.' server');
		}
	}

	public function executeSelectQuery($sql){ //clean input
		$this->openConnection();
		$query_result = $this->db_connection->query($sql);
		$result = [];
		if($query_result!=false){
		if ($query_result->num_rows > 0) {
			//output data of each row
			while($row = $query_result->fetch_assoc()){
				$result[] = $row;
			}
		}
	}
		$this->closeConnection();
		return $result;
	}

	public function executeNonSelectQuery($sql){ //clean input
		$this->openConnection();
		$query_result = $this->db_connection->query($sql); //TRUE or FALSE
		$this->closeConnection();
		return $query_result;
	}

	public function getConnection(){
		return $this->db_connection;
	}

	public function escapeString($str){
		$this->openConnection();
		return $this->db_connection->escape_string($str);
	}

	public function closeConnection(){
		$this->db_connection->close();
	}

	public function ngitungbaris($sql){
		$this ->openConnection();
		$query_result=$this->db_connection->query($sql);
		$result=[];
		$hasil=0;
		if($query_result!=false){
		if($query_result->num_rows>0){
			while($row=$query_result->fetch_assoc()){
				$result[]=$row;
			}
		}
		$hasil=count($result);
		$this->closeConnection();
		}
		return $hasil;
		}
	
	public function betulgak($check,$loc){
	if($check==true){
		header("Location:$loc");
	}
	else if($check==false){
		$message = "Salah Username atau Password";
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
		
	}
	
	}



	
}
?>