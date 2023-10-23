<?php
session_start();
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/donatur.php";
require_once "model/donasi.php";
require_once "model/userkedonasi.php";
require_once "model/haldonatur.php";

class donaturController{
    protected $db;
    
    public function __construct(){
    $this->db = new MySQLDB("localhost","root","","tugasbesar");
    }
  //nampilin donasi
    public function getAllDonasiWithName($nama){
      $max= $_SESSION['max'];
      $page=$_GET['var'];
      $now=date('y.m.d');
      $query = "SELECT distinct fundraiser.namaorganisasi as s3,donasi.id,donasi.nama,donasi.tanggal,donasi.tanggalakhir,donasi.max,donasi.terkumpul,donasi.keterangan,donasi.image,donasi.verif from donasi inner join fundraiserkedonasi on fundraiserkedonasi.idd=donasi.id inner join fundraiser on fundraiser.id=fundraiserkedonasi.idf ";
      $_SESSION['jumlah']=$this->db->ngitungbaris($query);
   
      if ($nama != "") {
      $query .= " WHERE nama LIKE '%$nama%' and donasi.tanggal < '$now' LIMIT $page, $max";
      $_SESSION['jumlah']=$this->db->ngitungbaris($query);
    }
    else {
			$query .= " WHERE donasi.tanggal < '$now' LIMIT $page, $max";
      $_SESSION['jumlah']=$this->db->ngitungbaris($query);
   
    }
  $query_result = $this->db->executeSelectQuery($query);
		$result = [];
		foreach ($query_result as $key => $value) {
            $result[] = new haldonatur($value['s3'],$value['id'], $value['nama'],$value['tanggal'],$value['tanggalakhir'],$value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif']);
        }
		return $result;
    }
    
    public function getAllDonasiWithName1($name){
      $now=date('y.m.d');
      $query = "SELECT distinct fundraiser.namaorganisasi as s3,donasi.id,donasi.nama,donasi.tanggal,donasi.tanggalakhir,donasi.max,donasi.terkumpul,donasi.keterangan,donasi.image,donasi.verif from donasi inner join fundraiserkedonasi on fundraiserkedonasi.idd=donasi.id inner join fundraiser on fundraiser.id=fundraiserkedonasi.idf where donasi.id=$name ";
     $query_result = $this->db->executeSelectQuery($query);
     
      $result = [];
      foreach ($query_result as $key => $value) {
              $result[] = new haldonatur($value['s3'],$value['id'], $value['nama'],$value['tanggal'],$value['tanggalakhir'],$value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif']);
            }
      return $result;
      }

      public function view_donasi(){
      $nama=$_SESSION['s'];
      if (isset($_POST['filter']) && $_POST['filter'] != "") {
        $nama = $this->db->escapeString($_POST['filter']);
      }
      else if (isset($_POST['filter']) && $_POST['filter'] == "") {
        $nama ="";
      }
      $result = $this->getAllDonasiWithName($nama);
      return View::createView('donatur/haldepan.php',
        [
          "nama"=> $nama,
          "result"=> $result
        ]);
    }

  //
  public function view_selected_donasi(){
		//validate
		$name ="";
		if (isset($_POST['filter']) && $_POST['filter'] != "") {
			$name = $this->db->escapeString($_POST['filter']);
      $result = $this->getAllDonasiWithName($name);
    }
    else{
      $name= $_GET['var'];
     	$name = $this->db->escapeString($name);
      $result = $this->getAllDonasiWithName1($name);
    }	
		return View::createView('donatur/campaign.php',
			[
				"name"=> $name,
				"result"=> $result
			]);
	}
 

//tampilan login
	public function view_login(){
          return View::createView2('donatur/login.php');
	}
//ngecheck waktu di oper ke /check
	public function checklogin(){
        $name="";
        $pw="";
        $_SESSION['cek']='betul';
        $query= "SELECT * from donatur";
       $check=false;
       $atas=false;
       $bawah=true;
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
         $_SESSION['name'] = $name;
         $_SESSION['cek']='betul';
        }
        else{
          $_SESSION['cek']='salah';
        }
        $this->db->betulgak($check,'login/halamandepan/page?var=0');
        }
    }

    //bikin view bayar
    public function view_bayar(){
      return View::createView2('donatur/haldonasi.php');
  }
  
  //ngecek waktu dioper sekalian masukin db kalo bener
    public function bayardonasi(){
      $anonim = $_POST['status'];
      $comment = $_POST['comment'];
      $nama = $_SESSION['name'];
      $tf = $_POST['tf'];
      $id = $_SESSION['ide'];
      $bank = $_POST['rekening'];
      if (isset($tf) && $tf != "") {
          $anonim = $this->db->escapeString($anonim);
          $bank = $this->db->escapeString($bank);
          $comment = $this->db->escapeString($comment);
          $tf=$this->db->escapeString($tf);
          $id = $this->db->escapeString($id);
           $po=$this->getid($nama);
           $tanggal=date("Y-m-d");
          $query = "INSERT INTO userkedonasi (idU,idD,jumlaht,komentar,anonim,tanggal) VALUES ('$po','$id','$tf','$comment','$anonim','$tanggal')";
          $terkumpul="UPDATE donasi SET terkumpul=terkumpul+$tf where id=$id";
          $bankadmin="UPDATE bank SET jumlah=jumlah+$tf where id=$bank";
          $this->db->executeNonSelectQuery($query);
          $this->db->executeNonSelectQuery($terkumpul);
          $this->db->executeNonSelectQuery($bankadmin);
          header('Location:/tugasbesar/view/donatur/login/haldonasi?var='.$id);
      } else{
        echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
       }

    }

    //dapet id user
    public function getid($name){
      $query = "SELECT * from user where nama='$name'";
      $query_result = $this->db->executeSelectQuery($query);
      $result = [];
      foreach ($query_result as $key => $value) {
              $result[] = new donatur($value['id'], $value['nama'], $value['username'],$value['password'],$value['email'],$value['notelp'],$value['norek'],$value['image']);
          }
            $tes=0;
          foreach ($result as $key => $row) {
            $tes=$row->getid();
          break;
          }
          return $tes;
      }


      //dapetin id dari donasi
      public function getidd($name){
        $query = "SELECT * from donasi where nama like '$name'";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach ($query_result as $key => $value) {
                $result[] = new donasi($value['id'], $value['nama'],$value['tanggal'],$value['tanggal'], $value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif']);
            }
              $tes=0;
            foreach ($result as $key => $row) {
              $tes=$row->getid();
            break;
            }
            return $tes;
        }

      //riwayat donatur
      public function getAllriwayat($nama){
        $user=$_SESSION['name'];
        $dapet=$this->getid($user);
        $max= $_SESSION['max'];
        $page=$_GET['var'];
        $query = "SELECT donasi.id,donasi.nama,userkedonasi.tanggal,jumlaht,keterangan,userkedonasi.anonim from donasi inner join userkedonasi on donasi.id=userkedonasi.idD where userkedonasi.idU=$dapet  ";
       $_SESSION['jumlah']=$this->db->ngitungbaris($query);
        if ($nama != "") {
          $query .= " and  donasi.nama like '%$nama%' order by verif asc  LIMIT $page, $max";
          $_SESSION['jumlah']=$this->db->ngitungbaris($query);
       }
       else {
         $query .= " order by verif asc  LIMIT $page, $max";
       }
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach ($query_result as $key => $value) {
                $result[] = new userkedonasi($value['id'], $value['nama'],$value['tanggal'],$value['jumlaht'],$value['keterangan'],$value['anonim']);
            }
        return $result;
        }
  
       
      public function view_riwayatdon(){
        $nama=$_SESSION['s'];
        if (isset($_POST['filter']) && $_POST['filter'] != "") {
          $nama = $this->db->escapeString($_POST['filter']);
        }
        else if (isset($_POST['filter']) && $_POST['filter'] == "") {
          $nama ="";
        }
      $result = $this->getAllriwayat($nama);
      return View::createView('donatur/riwayat.php',
        [
          "nama"=> $nama,
          "result"=> $result
        ]);
    }
    //pencet riwayat donatur
    public function view_selected_riwayat(){
      $nama ="";
      if (isset($_POST['filter']) && $_POST['filter'] != "") {
        $name = $this->db->escapeString($_POST['filter']);
        $result = $this->getAllriwayat($nama);
      }
      else{
        $name= $_GET['var'];
         $name = $this->db->escapeString($nama);
        $result = $this->getAllriwayat($nama);
      }	
      return View::createView('donatur/riwayat.php',
        [
          "name"=> $nama,
          "result"=> $result
        ]);
    }
      
      //


      public function checksignup(){
        $username = $_POST['username'];
        $password = $_POST['pasword'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $notelp = $_POST['notelp'];
        $norek = $_POST['norek'];
        $image=$_FILES['image']['name'];
        $temp=$_FILES['image']['tmp_name'];
       
        if (isset($nama) &&isset($email) && isset($username) &&isset($password) &&isset($notelp) && isset($norek) && $nama != ""  && $username != ""&& $password != "" && $email != ""  && $notelp != ""&& $norek != "") {
            $nama = $this->db->escapeString($nama);
            $username = $this->db->escapeString($username);
            $password = $this->db->escapeString($password);
            $notelp = $this->db->escapeString($notelp);
            $norek = $this->db->escapeString($norek);
            $email = $this->db->escapeString($email);
            $image = $this->db->escapeString($image);
            $querytes = "SELECT nama,username,password FROM  donatur WHERE nama='$nama' and username='$username' and password='$password'";
            $res_u =$this->db->ngitungbaris($querytes);
            if ($res_u > 0) {
               echo "<script type='text/javascript'>alert('udah ada');history.go(-1);</script>";
              }
            else{
            echo $username;
            move_uploaded_file($temp,"C:/xampp/htdocs/tugasbesar/view/donatur/fotouser/$image");
            $query = "INSERT INTO donatur (username,password,nama,email,notelp,norek,image) VALUES ('$username','$password','$nama','$email','$notelp','$norek','$image')";
            $this->db->executeNonSelectQuery($query);
            header('Location:/tugasbesar/view/donatur/login/verif');
        }
     }
     else{
       echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
      }
}

public function view_user(){
  $name = $_SESSION['name'];
  $result = $this->getAllUserWithName($name);
  return View::createView('donatur/profil.php',
    [
      "name"=> $name,
      "result"=> $result
    ]);
  }
  

  public function getAllUserWithName($name){
		$query = "SELECT * from donatur";
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

    //check edit pp
    public function checkeditpp(){
      $nama=$_SESSION['name'];
      $image=$_FILES['image']['name'];
      $temp=$_FILES['image']['tmp_name'];
     
      if (isset($image) && $image!="") {
          $nama = $this->db->escapeString($nama);
          $querytes = "UPDATE  donatur SET image='$image' where nama='$nama'";
          $this->db->executeNonSelectQuery($querytes);
          move_uploaded_file($temp,"C:/xampp/htdocs/tugasbesar/view/donatur/fotouser/$image");
         
      
   }
   header('Location: /tugasbesar/view/donatur/profil');
}


//check edit password
public function checkeditpw(){
  $nama=$_SESSION['name'];
  $password= $_POST['password'];
  $password2 = $_POST['password2'];
 
  if (isset($password)&&$password !="" && $password2 != "" && isset($password2)) {
      $nama = $this->db->escapeString($nama);
       $password = $this->db->escapeString($password); 
       $password2 = $this->db->escapeString($password2);
       $querytes = "SELECT * FROM  donatur WHERE nama='$nama' and password='$password'";
       $res_u =$this->db->ngitungbaris($querytes);
         if ($res_u > 0) {
         $query = "UPDATE  donatur SET password='$password2' where nama='$nama'";
         $this->db->executeNonSelectQuery($query);
         header('Location: /tugasbesar/view/donatur/profil');
        }
      else{
        echo "<script type='text/javascript'>alert('salah password lama');history.go(-1);</script>";
      }
}
else{
 echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
}
}


//verifikasi email
public function email(){
  return View::createView2('donatur/verifemail.php');
  }


  }

    
  

    