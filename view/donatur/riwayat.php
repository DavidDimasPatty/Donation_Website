<body class="riwayat">
<form method="POST" action="?var=0">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<header>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
	<a href="../riwayat/page?var=0">riwayat</a>
	<a href="../profil">profil</a>
	<a href="../login">log out</a>
</div>
<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
	<?php 
		echo '<span class="ms-3">'.$_SESSION['name']."</span>";
		echo '<span class="ms-3">'.date('d-m-y')."</span>";
	?>
</span>
<center><a >Together We Can</a></center>
</header>
<div class="searchdonasi">
<legend>cari apa yang kamu bantu</legend>
<input type="text" name="filter" value="<?php echo $nama; ?>" id="caridonasi" class="mb-2">
</div>
</form>
<div class="kotak">
<table id="myTable" class="table table-striped">
	<tr>
		<th>id</th>
		<th>nama</th>
		<th>tanggal</th>
		<th>jumlah donasi</th>
		<th>keterangan</th>
		<th>status</th>
	</tr>	
	<?php
	
$halaman=0;
	$max=4;
	$_SESSION['max']=4;
foreach ($result as $key => $row) {
	if(sizeof($row)>0){
    echo "<tr>";
    echo "<td>".$row->getid()."</td>";
    $value=$row->getid();
    echo "<td onclick=".$_SESSION['nama'.$value]=$value."><a href='/tugasbesar/view/donatur/login/campaign?var=$value'>".$row->getnama()."</a></td>";
      echo "<td>".$row->gettanggal()."</td>";
    echo "<td>".$row->getjumlaht()."</td>";
	echo "<td>".$row->getketerangan()."</td>";
    echo "<td>".$row->getanonim()."</td>";
    echo "</tr>";
}
}
echo'</table>';
		$nopage=0;
		for ($halaman; $halaman <= $_SESSION['jumlah']; $halaman=$halaman+4) {
			$nopage++;
			if($nama!=""){
				$_SESSION['s']=$nama;
				$_SESSION['halaman']=$halaman;
				echo " <center> <a href='../riwayat/page?var=$halaman'>$nopage </a> </center>";
			}
			else if($nama==""){
				$_SESSION['s']="";
				$_SESSION['halaman']=$halaman;
				echo " <center> <a href='../riwayat/page?var=$halaman'>$nopage </a> </center>";
			}	
		}
?>

</table>
<center> <a href="../login/halamandepan/page?var=0" style="font-size:30px">Back</a> </center>
<div class='h6'>we care, we share, we love</div>
</div>
</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>