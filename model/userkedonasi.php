<?php

class userkedonasi{
	protected $id;
	protected $nama;
	protected $tanggal;
	protected $jumlaht;
	protected $keterangan;
	protected $anonim;
	
	public function __construct($id,$nama,$tanggal,$jumlaht,$keterangan,$anonim){
		$this->id = $id;
		$this->nama = $nama;
		$this->tanggal = $tanggal;
		$this->jumlaht= $jumlaht;
		$this->keterangan= $keterangan;
		$this->anonim= $anonim;
		

	}

	public function getid(){
		return $this->id;
	}
	public function getnama(){
		return $this->nama;
	}
	public function gettanggal(){
		return $this->tanggal;
	}
	public function getjumlaht(){
		return $this->jumlaht;
	}
	public function getketerangan(){
		return $this->keterangan;
	}
	public function getanonim(){
		return $this->anonim;
	}
}


?>