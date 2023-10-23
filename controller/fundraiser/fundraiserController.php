<?php
session_start();
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/fundraiser.php";
require_once "model/donasi.php";
require_once "model/fundraiserkedonasi.php";
require_once "model/riwayatfundraiser.php";

class fundraiserController{
    protected $db;

    public function __construct(){
		$this->db = new MySQLDB("localhost","root","","tugasbesar");
	}

    public function view_login(){
        return View::createView2('fundraiser/login.php');
  }
  public function view_haldepan(){
    return View::createView2('fundraiser/haldepan.php');
}
    public function checklogin(){
        $name="";
        $pw="";
        $_SESSION['cek']='betul';
        $query= "SELECT * from fundraiser";
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
        $_SESSION['cek']='betul';
        $_SESSION['name'] = $name;
        }
        else{
          $_SESSION['cek']='salah';
        }
       
        $this->db->betulgak($check,'login/halamandepan','login');
          }
    }

    public function dapetuser(){
      $name=$_POST['cari'];
      return $name;
    }

    public function checksignup(){
         $username = $_POST['username'];
         $password = $_POST['pasword'];
         $nama = $_POST['namaorganisasi'];
         $alamat = $_POST['alamatorg'];
         $notelp = $_POST['notelp'];
         $norek = $_POST['norek'];
         $image=$_FILES['image']['name'];
         $temp=$_FILES['image']['tmp_name'];
         if (isset($nama) &&isset($alamat) && isset($username) &&isset($password) &&isset($notelp) && isset($norek) && $nama != ""  && $username != ""&& $password != "" && $alamat != ""  && $notelp != ""&& $norek != "") {
             $nama = $this->db->escapeString($nama);
             $username = $this->db->escapeString($username);
             $password = $this->db->escapeString($password);
             $notelp = $this->db->escapeString($notelp);
             $norek = $this->db->escapeString($norek);
             $alamat = $this->db->escapeString($alamat);
             $querytes = "SELECT namaorganisasi,username,password FROM  fundraiser WHERE nama='$nama' and username='$username' and password='$password'";
             $res_u =$this->db->ngitungbaris($querytes);
             if ($res_u > 0) {
                echo "<script type='text/javascript'>alert('udah ada');history.go(-1);</script>";
              }
             else{
              move_uploaded_file($temp,"C:/xampp/htdocs/tugasbesar/view/fundraiser/foto/$image");
              $query = "INSERT INTO fundraiser (username,password,namaorganisasi,alamatorganisasi,notelp,norek,image) VALUES ('$username','$password','$nama','$alamat','$notelp','$norek','$image')";
             $this->db->executeNonSelectQuery($query);
             header('Location: /tugasbesar/view/fundraiser/login/verif');
         }
      }
      else{
        echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
       }
 }

 //email
 public function email(){
  return View::createView2('donatur/verifemail.php');
  }

//buat donasi
 public function checkdonasi(){
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal']; 
    $tanggalakhir = $_POST['tanggalakhir'];
    $max = $_POST['max'];
    $keterangan = $_POST['keterangan'];
    $image=$_FILES['image']['name'];
    $temp=$_FILES['image']['tmp_name'];
    $msg="";
    if (isset($nama) &&isset($tanggal) && isset($max)  &&isset($keterangan) && $nama != ""  && $tanggal != ""&& $max != ""  && $keterangan != "") {
        $nama = $this->db->escapeString($nama);
        $tanggal = $this->db->escapeString($tanggal);
        $tanggalakhir = $this->db->escapeString($tanggalakhir);
        $max = $this->db->escapeString($max);
        $keterangan = $this->db->escapeString($keterangan);
        $querytes = "SELECT nama FROM  donasi WHERE nama='$nama'";
        $res_u =$this->db->ngitungbaris($querytes);
        if ($res_u > 0) {
           echo "<script type='text/javascript'>alert('udah ada');history.go(-1);</script>";
         }
        else{
          move_uploaded_file($temp,"C:/xampp/htdocs/tugasbesar/view/donatur/foto/$image");
           $query = "INSERT INTO donasi (nama,tanggal,tanggalakhir,max,terkumpul,keterangan,image) VALUES ('$nama','$tanggal','$tanggalakhir','$max',0,'$keterangan','$image')";
        $this->db->executeNonSelectQuery($query);
        $idf=$this->getid($_SESSION['name']);
        $idd=$this->getidd($nama);
        $query1 = "INSERT INTO fundraiserkedonasi (idd,idf) VALUES ('$idd','$idf')";
        $this->db->executeNonSelectQuery($query1);
        header('Location: /tugasbesar/view/fundraiser/login/halamandepan');
    }
 }
 else{
   echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
  }

}

//update donasi
public function checkupdate(){
  $id=$_GET['var'];
  $nama = $_POST['nama'];
  $tanggal = $_POST['tanggal'];
  $tanggalakhir = $_POST['tanggalakhir'];
  $max = $_POST['max'];
  $keterangan = $_POST['keterangan'];
  $image=$_FILES['image']['name'];
  $temp=$_FILES['image']['tmp_name'];
  if (isset($nama) &&isset($tanggal) && isset($max) &&isset($keterangan) && $nama != ""  && $tanggal != ""&& $max != "" && $keterangan != "") {
      $nama = $this->db->escapeString($nama);
      $tanggal = $this->db->escapeString($tanggal);
      $tanggalakhir = $this->db->escapeString($tanggalakhir);
      $max = $this->db->escapeString($max);
      $keterangan = $this->db->escapeString($keterangan);
      $querytes = "SELECT nama FROM  donasi WHERE nama='$nama'";
      $res_u =$this->db->ngitungbaris($querytes);
      if ($res_u > 1) {
         echo "<script type='text/javascript'>alert('udah ada');history.go(-1);</script>";
       }
      else{
     move_uploaded_file($temp,"C:/xampp/htdocs/tugasbesar/view/donatur/foto/$image");
        $query = "UPDATE donasi SET nama='$nama', tanggal='$tanggal', tanggalakhir='$tanggalakhir', max='$max', keterangan='$keterangan',image='$image' where id=$id";
      $this->db->executeNonSelectQuery($query);
      header('Location: /tugasbesar/view/fundraiser/riwayat?var='.$_GET['var']);
  }
}
else{
 echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
}

}

//dapetin id dari session fundraiser
public function getid($name){
  $query = "SELECT * from fundraiser where username='$name'";
  $query_result = $this->db->executeSelectQuery($query);
  $result = [];
  foreach ($query_result as $key => $value) {
          $result[] = new fundraiser($value['id'], $value['username'],$value['password'], $value['namaorganisasi'],$value['alamatorganisasi'],$value['notelp'],$value['norek'],$value['valid'],$value['image']);
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
  $query = "SELECT * from donasi where nama='$name'";
  $query_result = $this->db->executeSelectQuery($query);
  $result = [];
  foreach ($query_result as $key => $value) {
          $result[] = new donasi($value['id'], $value['nama'],$value['tanggal'],$value['tanggalakhir'], $value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif']);
      }
        $tes=0;
      foreach ($result as $key => $row) {
        $tes=$row->getid();
      break;
      }
      return $tes;
  }

  

    //buat riwayat
  public function getAllriwayat($name,$nama){
    $dapet=$this->getid($name);
    $max= $_SESSION['max'];
    $query = "SELECT distinct idf,idd,donasi.nama,donasi.tanggal,donasi.tanggalakhir,donasi.max,donasi.terkumpul,donasi.keterangan,donasi.image from donasi inner join fundraiserkedonasi on donasi.id=fundraiserkedonasi.idd inner join fundraiser on fundraiser.id=fundraiserkedonasi.idf";
    $page=$_GET['var'];
    if ($nama != "") {
		 	$query .= " where fundraiser.id=$dapet and donasi.nama like '%$nama%' order by verif asc  LIMIT $page, $max";
       $_SESSION['jumlah']=$this->db->ngitungbaris($query);
    }
    else {
      $query .= " where fundraiser.id=$dapet order by verif asc  LIMIT $page, $max";
      $_SESSION['jumlah']=$this->db->ngitungbaris($query);
    
		}
		$query_result = $this->db->executeSelectQuery($query);
    $result = [];
    foreach ($query_result as $key => $value) {
            $result[] = new fundraiserkedonasi($value['idf'], $value['idd'],$value['nama'],$value['tanggal'],$value['tanggalakhir'],$value['max'],$value['terkumpul'],$value['keterangan'],$value['image']);
        }
    return $result;
    }

    public function view_riwayat(){
    $name = $_SESSION['name'];
    $nama=$_SESSION['s'];
    if (isset($_POST['filter']) && $_POST['filter'] != "") {
			$nama = $this->db->escapeString($_POST['filter']);
		}
		else if (isset($_POST['filter']) && $_POST['filter'] == "") {
			$nama ="";
		}
    $result = $this-> getAllriwayat($name,$nama);
    return View::createView('fundraiser/riwayat.php',
      [
        "nama"=> $nama,
        "result"=> $result
      ]);
  }

        //total duit
        public function duit($id){
          $query = "SELECT sum(jumlaht) from userkedonasi  inner join donasi on userkedonasi.idD=donasi.id where donasi.id=$id";
          $query_result = $this->db->executeSelectQuery($query);
          $result = $query_result;
          return $result;
          }

          //penarikan duit
          public function tarik(){
            $id=$_GET['var'];
            $dapet=$_POST['tarik'];
            $bank = $_POST['rekening'];
            $user=$_SESSION['name'];
            $user=$this->getid($user);
            $tanggal=date('y.m.d');
            if (isset($_POST['rekening']) &&isset($_POST['tarik']) && $_POST['tarik'] != ""&& $bank != "") {
            $dapet = $this->db->escapeString($dapet);
              $query = "UPDATE donasi set terkumpul=terkumpul-$dapet where id=$id";
              $bankadmin="UPDATE bank SET jumlah=jumlah-$dapet where id=$bank";
              $tarik="INSERT INTO tarik (idf,idd,jumlahtarik,tanggal,idb)VALUES ($user,$id,$dapet,'$tanggal',$bank)";
              $this->db->executeNonSelectQuery($query);
              $this->db->executeNonSelectQuery($bankadmin);
              $this->db->executeNonSelectQuery($tarik);
              return header('Location: /tugasbesar/view/fundraiser/riwayat?var='.$id);
            }
          else{
            echo "<script type='text/javascript'>alert('masukan donasi atau bank');history.go(-1);</script>";
    
          }
          }
    
    //buat riwayat selected
    public function getAllDonasiWithName1($name){
      $query = "SELECT donasi.id,donasi.nama,donasi.tanggal,donasi.max,donasi.terkumpul,donasi.keterangan,donasi.image,donasi.verif,riwayatfundraiser.komentar,riwayatfundraiser.anonim,riwayatfundraiser.jumlaht,riwayatfundraiser.namauser as nama2 from donasi inner join riwayatfundraiser on donasi.id=riwayatfundraiser.idD inner join user on user.id=riwayatfundraiser.idU where donasi.id=$name";
      $query_result = $this->db->executeSelectQuery($query);
      $result = [];
      if ($query_result) {
      foreach ($query_result as $key => $value) {
              $result[] = new riwayatfundraiser($value['id'], $value['nama'],$value['tanggal'],$value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif'],$value['komentar'],$value['anonim'],$value['jumlaht'],$value['nama2']);
      }
     }
      return $result;
      }

    public function view_selected_donasi(){
	    $name= $_GET['var'];
     	$name = $this->db->escapeString($name);
      $result = $this->getAllDonasiWithName1($name);
    
		return View::createView('fundraiser/select.php',
			[
				"name"=> $name,
				"result"=> $result
      ]);
    }


    //buat profil
    public function view_fundraiser(){
    $name = $_SESSION['name'];
    $result = $this->getAllUserWithName($name);
    return View::createView('fundraiser/profil.php',
      [
        "name"=> $name,
        "result"=> $result
      ]);
    }
    
    public function getAllUserWithName($name){
      $query = "SELECT * from fundraiser";
      if ($name != "") {
        $query .= " WHERE username='$name'";
      }
  
      $query_result = $this->db->executeSelectQuery($query);
      $result = [];
      foreach ($query_result as $key => $value) {
              $result[] = new fundraiser($value['id'], $value['username'], $value['password'],$value['namaorganisasi'],$value['alamatorganisasi'],$value['notelp'],$value['norek'],$value['valid'],$value['image']);
          }
      return $result;
      }
  

//edit
public function getAllDonasiWithName2($name){
  $query = "SELECT * from donasi where id=$name";
 $query_result = $this->db->executeSelectQuery($query);
  $result = [];
  foreach ($query_result as $key => $value) {
          $result[] = new donasi($value['id'], $value['nama'],$value['tanggal'],$value['tanggalakhir'],$value['max'],$value['terkumpul'],$value['keterangan'],$value['image'],$value['verif']);
      }
  return $result;
  }

public function view_selected_edit(){

  $name= $_GET['var'];
   $name = $this->db->escapeString($name);
  $result = $this->getAllDonasiWithName2($name);

return View::createView('fundraiser/edit.php',
  [
    "name"=> $name,
    "result"=> $result
  ]);
  }


//check edit pp
  public function checkeditpp(){
    $nama=$_SESSION['name'];
    $image=$_FILES['image']['name'];
    $temp=$_FILES['image']['tmp_name'];
   
    if (isset($image) && $image!="") {
        $nama = $this->db->escapeString($nama);
        $querytes = "UPDATE  fundraiser SET image='$image' where username='$nama'";
        $this->db->executeNonSelectQuery($querytes);
        move_uploaded_file($temp,"C:/xampp/htdocs/tugasbesar/view/fundraiser/foto/$image");
       
    
 }
 header('Location: /tugasbesar/view/fundraiser/login/profil');
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
     $querytes = "SELECT * FROM  fundraiser WHERE nama='$nama' and password='$password'";
     $res_u =$this->db->ngitungbaris($querytes);
       if ($res_u > 0) {
       $query = "UPDATE  fundraiser SET password='$password2' where nama='$nama'";
       $this->db->executeNonSelectQuery($query);
       header('Location: /tugasbesar/view/fundraiser/login/profil');
      }
    else{
      echo "<script type='text/javascript'>alert('salah password lama');history.go(-1);</script>";
    }
}
else{
echo "<script type='text/javascript'>alert('Fill Entire Form');history.go(-1);</script>";
}
}


}