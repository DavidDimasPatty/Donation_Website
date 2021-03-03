<?php

class bankadmin{
	protected $namadonasi;
	protected $namadonatur;
	protected $tanggal;
	protected $jumlaht;
	protected $terkumpul;

	public function __construct($namadonasi,$namadonatur,$tanggal,$jumlaht,$terkumpul){
		$this->namadonasi = $namadonasi;
		$this->namadonatur = $namadonatur;
		$this->tanggal = $tanggal;
		$this->jumlaht = $jumlaht;
		$this->terkumpul = $terkumpul;
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
	public function getterkumpul(){
		return $this->terkumpul;
	}
	public function getnamadonatur(){
		return $this->namadonatur;
	}
}


?>