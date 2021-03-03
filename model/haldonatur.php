<?php

class haldonatur{
	protected $namafund;
	protected $id;
	protected $nama;
	protected $tanggal;
	protected $tanggalakhir;
	protected $max;
	protected $terkumpul;
	protected $keterangan;
	protected $image;
	protected $verif;

	public function __construct($namafund,$id,$nama,$tanggal,$tanggalakhir,$max,$terkumpul,$keterangan,$image,$verif){
		$this->namafund = $namafund;
		$this->id = $id;
		$this->nama = $nama;
		$this->tanggal = $tanggal;
		$this->tanggalakhir = $tanggalakhir;
		$this->max = $max;
		$this->terkumpul = $terkumpul;
		$this->keterangan = $keterangan;
		$this->image = $image;
		$this->verif = $verif;
		}

		public function getnamafund(){
			return $this->namafund;
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
	public function gettanggalakhir(){
		return $this->tanggalakhir;
	}
	public function getmax(){
		return $this->max;
	}
	public function getterkumpul(){
		return $this->terkumpul;
	}
	public function getketerangan(){
		return $this->keterangan;
	}
	
	public function getimage(){
		return $this->image;
	}

	public function getverif(){
		return $this->verif;
	}
}


?>