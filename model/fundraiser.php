<?php

class fundraiser{
	protected $id;
	protected $username;
	protected $password;
	protected $namaorganisasi;
	protected $alamatorganisasi;
	protected $notelp;
	protected $norek;
	protected $valid;
	protected $image;

	public function __construct($id,$username,$password,$namaorganisasi,$alamatorganisasi,$notelp,$norek,$valid,$image){
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->namaorganisasi= $namaorganisasi;
		$this->alamatorganisasi= $alamatorganisasi;
		$this->notelp = $notelp;
		$this->norek = $norek;
		$this->valid = $valid;
		$this->image = $image;
	}

	public function getid(){
		return $this->id;
	}

	public function getusername(){
		return $this->username;
	}
	

	public function getpassword(){
		return $this->password;
	}
	public function getnamaorganisasi(){
		return $this->namaorganisasi;
	}
	public function getalamatorganisasi(){
		return $this->alamatorganisasi;
	}
	public function getnotelp(){
		return $this->notelp;
	}
	public function getnorek(){
		return $this->norek;
	}
	public function getvalid(){
		return $this->valid;
	}
	public function getimage(){
		return $this->image;
	}
}


?>