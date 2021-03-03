<?php

class donatur{
	protected $id;
	protected $nama;
	protected $username;
	protected $password;
	protected $email;
	protected $notelp;
	protected $norek;	
	protected $image;

	public function __construct($id,$nama,$username,$password,$email,$notelp,$norek,$image){
		$this->id = $id;
		$this->nama = $nama;
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->notelp = $notelp;
		$this->norek = $norek;
		$this->image = $image;
	}

	public function getid(){
		return $this->id;
	}

	public function getnama(){
		return $this->nama;
	}

	public function getusername(){
		return $this->username;
	}

	public function getpassword(){
		return $this->password;
	}

	public function getemail(){
		return $this->email;
	}
	public function getnotelp(){
		return $this->notelp;
	}
	public function getnorek(){
		return $this->norek;
	}
	public function getimage(){
		return $this->image;
	}
}


?>