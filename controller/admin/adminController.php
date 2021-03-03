<?php
session_start();
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/donatur.php";
require_once "model/fundraiser.php";
require_once "model/donasi.php";
require_once "model/bankadmin.php";
require_once "model/banktarik.php";

class adminController{
    protected $db;

    public function __construct(){
		$this->db = new MySQLDB("localhost","root","","tugasbesar");
	}

    public function view_login(){
        return View::createView2('admin/login.php');
    }
    

    
    public function checklogin(){
        $name="";
        $pw="";
        $query= "SELECT * from admin";
       $check=false;
        if(isset($_POST['cari'])&&isset($_POST['check'])){
        $name=$_POST['cari'];
        $pw=$_POST['check'];
        if(isset($name)&& $name!=""&&isset($pw)&& $pw!=""){
            $name=$this->db->escapeString($name);
            $pw=$this->db->escapeString($pw);
            $query .= " WHERE username LIKE '$name' AND password LIKE '$pw'";    
        }
        $result = $this->db->ngitungbaris($query);
       if($result>0&& $name!=""&& $pw!=""){
        $check=true;
        }
        $this->db->betulgak($check,'login/halamandepan');
          }
    }



    public function getAllUserWithName($name){
		$query = "SELECT * from user";
		if ($name != "") {
			$query .= " WHERE nama LIKE '%$name%'";
		}

		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
            $result[] = new donatur($value['id'], $value['nama'], $value['username'],$value['password'],$value['email'],$value['notelp'],$value['norek'],$value['image']);
		}
		
		return $result;
    }
    
    public function view_user(){
		//validate
		$name = "";
		if (isset($_POST['filter1']) && $_POST['filter1'] != "") {
			$name = $this->db->escapeString($_POST['filter1']);
		}
		
		$result = $this->getAllUserWithName($name);
		return View::createView('admin/daftardonatur.php',
			[
				"name"=> $name,
				"result"=> $result
			]);
    }
    

    public function getAllFundraiserWithName($name){
		$query = "SELECT * from fundraiser";
		if ($name != "") {
			$query .= " WHERE namaorganisasi LIKE '%$name%' order by validitas asc";
		}
		else {
			$query .= " order by validitas asc";
		}

		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
            $result[] = new fundraiser($value['id'], $value['username'],$value['password'],$value['namaorganisasi'],$value['alamatorganisasi'],$value['notelp'],$value['norek'],$value['validitas'],$value['image']);
		}
		return $result;
    }
    
    public function view_fundraiser(){
		//validate
		$name = "";
		if (isset($_POST['filter2']) && $_POST['filter2'] != "") {
			$name = $this->db->escapeString($_POST['filter2']);
		}
		
		$result = $this->getAllFundraiserWithName($name);
		return View::createView('admin/daftarfundraiser.php',
			[
				"name"=> $name,
				"result"=> $result
			]);
	}

	//donasi
    public function getAllDonasiWithName($name){
		$query = "SELECT * from donasi";
		$max= $_SESSION['max'];
		$page=$_GET['var'];
		
		$_SESSION['jumlah']=$this->db->ngitungbaris($query);
		
		if ($name != "") {
			$query .= " WHERE nama LIKE '%$name%' order by verif asc LIMIT $page, $max";
			$_SESSION['jumlah']=$this->db->ngitungbaris($query);
			
		}
		else {
			$query .= " order by verif asc  LIMIT $page, $max";
		}

		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
            $result[] = new donasi($value['id'], $value['nama'],$value['tanggal'],$value['tanggalakhir'],$value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif']);
        }
		return $result;
    }
    
    public function view_donasi(){
		//validate
		$name = $_SESSION['s'];
		if (isset($_POST['filter']) && $_POST['filter'] != "") {
			$name = $this->db->escapeString($_POST['filter']);
		}
		else if (isset($_POST['filter']) && $_POST['filter'] == "") {
			$name ="";
		}
			$result = $this->getAllDonasiWithName($name);
		return View::createView('admin/daftardonasi.php',
			[
				"name"=> $name,
				"result"=> $result
			]);
	}

	//total duit bca
	public function duit1(){
		$query = "SELECT jumlah from bank where id=1  ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = $query_result;
		return $result;
	}
	
	//total duit mandiri
	public function duit2(){
		$query = "SELECT jumlah from bank where id=2  ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = $query_result;
		return $result;
    }

	//total pengeluaran bca
	public function pengeluaran_duit1(){
		$query = "SELECT sum(jumlahtarik) from tarik where idb=1  ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = $query_result;
		return $result;
	}
	
	//total pengeluaran mandiri
	public function pengeluaran_duit2(){
		$query = "SELECT sum(jumlahtarik) from tarik  where idb=2  ";
		$query_result = $this->db->executeSelectQuery($query);
		$result = $query_result;
		return $result;
	}
	
	//bank dapet
 	public function caribank($name){
		$query = "SELECT donasi.nama as s1,user.nama as s2,userkedonasi.tanggal,userkedonasi.jumlaht,sum(userkedonasi.jumlaht) as s3 from donasi inner join userkedonasi on donasi.id=userkedonasi.idD inner join user on user.id=userkedonasi.idU  ";
		$max= $_SESSION['max'];
		$page=$_GET['var'];
		$_SESSION['jumlah']=$this->db->ngitungbaris($query);
		if ($name != "") {
			$query .= " WHERE donasi.nama LIKE '%$name%' group by  donasi.nama,user.nama,userkedonasi.tanggal,userkedonasi.jumlaht order by verif asc LIMIT $page, $max";
			$_SESSION['jumlah']=$this->db->ngitungbaris($query);
			
		}
		else if($name=="") {
			$query .= " group by  donasi.nama,user.nama,userkedonasi.tanggal,userkedonasi.jumlaht order by verif asc  LIMIT $page, $max";
			$_SESSION['jumlah']=$this->db->ngitungbaris($query);
		}

		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		
		foreach ($query_result as $key => $value) {
            $result[] = new bankadmin($value['s1'], $value['s2'],$value['tanggal'],$value['jumlaht'],$value['s3']);
		}
		
		return $result;
    }
    
    	public function view_bank(){
		$name = $_SESSION['s'];
		if (isset($_POST['filter']) && $_POST['filter'] != "") {
			$name = $this->db->escapeString($_POST['filter']);
		}
		else if (isset($_POST['filter']) && $_POST['filter'] == "") {
			$name ="";
		}
			$result = $this->caribank($name);

		return View::createView('admin/bank.php',
			[
				"name"=> $name,
				"result"=> $result
			]);
	}



	//bank dapet
	public function caribank2($name){
		$query = "SELECT donasi.nama as s1,fundraiser.namaorganisasi as s2,tarik.tanggal,tarik.jumlahtarik,bank.nama as s5 from donasi inner join tarik on donasi.id=tarik.idd inner join fundraiser on fundraiser.id=tarik.idf inner join bank on bank.id=tarik.idb ";
		$max= $_SESSION['max'];
		$page=$_GET['var'];
		$_SESSION['jumlah']=$this->db->ngitungbaris($query);
		if ($name != "") {
			$query .= " WHERE donasi.nama LIKE '%$name%' t order by tarik.tanggal asc LIMIT $page, $max";
			$_SESSION['jumlah']=$this->db->ngitungbaris($query);
			
		}
		else if($name=="") {
			$query .= " order by tarik.tanggal asc LIMIT $page, $max";
			$_SESSION['jumlah']=$this->db->ngitungbaris($query);
		}

		$query_result = $this->db->executeSelectQuery($query);
		$result = [];
		
		foreach ($query_result as $key => $value) {
            $result[] = new banktarik($value['s1'], $value['s2'],$value['tanggal'],$value['jumlahtarik'],$value['s5']);
		}
		
		return $result;
    }
    
    	public function view_banktarik(){
		$name = $_SESSION['s'];
		if (isset($_POST['filter']) && $_POST['filter'] != "") {
			$name = $this->db->escapeString($_POST['filter']);
		}
		else if (isset($_POST['filter']) && $_POST['filter'] == "") {
			$name ="";
		}
			$result = $this->caribank2($name);

		return View::createView('admin/banktarik.php',
			[
				"name"=> $name,
				"result"=> $result
			]);
	}
	


	//verif fund
	
  
	  public function view_selected_verif(){
		  $name= $_GET['var']; 
		  $updt="UPDATE fundraiser SET validitas='verified' where id=$name";
		  $this->db->executeNonSelectQuery($updt);
		   header('Location:/tugasbesar/view/admin/login/halamandepan/daftarfundraiser');
		}


	//unvirified fund
	public function view_selected_unverif(){
		$name= $_GET['var'];
		$updt="UPDATE fundraiser SET validitas='unverified' where id=$name";
		$this->db->executeNonSelectQuery($updt);
		 header('Location:/tugasbesar/view/admin/login/halamandepan/daftarfundraiser');
	  }

	  	//verif don
	
  
		  public function view_selected_verif_don(){
			$name= $_GET['var2']; 
			$updt="UPDATE donasi SET verif='verified' where id=$name";
			$this->db->executeNonSelectQuery($updt);
			 header('Location:/tugasbesar/view/admin/login/daftardonasi/page?var='.$_GET['var']);
		  }
  
  
	  //unvirified don
	  public function view_selected_unverif_don(){
		  $name= $_GET['var2'];
		  $updt="UPDATE donasi SET verif='unverified' where id=$name";
		  $this->db->executeNonSelectQuery($updt);
		   header('Location:/tugasbesar/view/admin/login/daftardonasi/page?var='.$_GET['var']);
		}
  



	}










?>