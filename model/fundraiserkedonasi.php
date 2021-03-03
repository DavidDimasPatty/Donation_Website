<?php

class fundraiserkedonasi{
	protected $idf;
	protected $idd;
	protected $nama;
	protected $tanggal;
	protected $tanggalakhir;
	protected $max;
	protected $terkumpul;
	protected $keterangan;
	protected $image;

	public function __construct($idf,$idd,$nama,$tanggal,$tanggalakhir,$max,$terkumpul,$keterangan,$image){
		$this->idf = $idf;
		$this->idd = $idd;
		$this->nama = $nama;
		$this->tanggal = $tanggal;
		$this->tanggalakhir = $tanggalakhir;
		$this->max = $max;
		$this->terkumpul = $terkumpul;
		$this->keterangan = $keterangan;		
		$this->image = $image;
	}

	public function getidf(){
		return $this->idf;
	}
	public function getidd(){
		return $this->idd;
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
	
}


?>