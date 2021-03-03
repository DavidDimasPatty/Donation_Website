<?php

class banktarik{
	protected $namadonasi;
	protected $namafundraiser;
	protected $tanggal;
	protected $jumlaht;	
	protected $namabank;

	public function __construct($namadonasi,$namafundraiser,$tanggal,$jumlaht,$namabank){
		$this->namadonasi = $namadonasi;
		$this->namafundraiser = $namafundraiser;
		$this->tanggal = $tanggal;
		$this->jumlaht = $jumlaht;
		$this->namabank=$namabank;
		}

	public function getnamadonasi(){
		return $this->namadonasi;
	}
	public function getjumlaht(){
		return $this->jumlaht;
	}

	public function gettanggal(){
		return $this->tanggal;
	}
	public function getnamafundraiser(){
		return $this->namafundraiser;
	}
	public function getnamabank(){
		return $this->namabank;
	}
}


?>