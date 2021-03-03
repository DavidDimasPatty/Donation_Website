<?php

class riwayatfundraiser{
	protected $id;
	protected $nama;
	protected $tanggal;
	protected $max;
	protected $terkumpul;
	protected $keterangan;
	protected $image;
    protected $verif;
    protected $komen; 
    protected $anonim; 
    protected $jumlaht; 
    protected $namauser;


	public function __construct($id,$nama,$tanggal,$max,$terkumpul,$keterangan,$image,$verif,$komen,$anonim,$jumlaht,$namauser){
		$this->id = $id;
		$this->nama = $nama;
		$this->tanggal = $tanggal;
		$this->max = $max;
		$this->terkumpul = $terkumpul;
		$this->keterangan = $keterangan;
		$this->image = $image;
        $this->verif = $verif;
        $this->komen = $komen;
        $this->anonim = $anonim;
        $this->jumlaht = $jumlaht; 
		$this->namauser = $namauser;
		
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
    public function getkomen(){
		return $this->komen;
    }
    public function getanonim(){
		return $this->anonim;
    }
    public function getjumlaht(){
		return $this->jumlaht;
    }
    public function getnamauser(){
		return $this->namauser;
	}
}


?>