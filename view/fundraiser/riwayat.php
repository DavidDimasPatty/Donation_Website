<body class="riwayat">
<form method="POST" action="page?var=0" >
<header>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
	<a href="../profil">profil</a>
	<a href="../login">log out</a>
</div>
<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
<?php echo $_SESSION['name']?>
</span>
<a class="textwecan2">together we can</a>
</header>
<div class="searchdonasi">
<legend>cari apa yang kamu bantu</legend>
<input type="text" name="filter" value="<?php echo $nama; ?>" id="caridonasi">
</div>
	
</form>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<table>
	<tr>
		<th></th>
		<th>id</th>
		<th>nama</th>
		<th>tanggal</th>
		<th>max</th>
		<th>terkumpul</th>
		<th>keterangan</th>
		<th>valid</th>
<table>
<?php 

$halaman=0;
$max=4;
$_SESSION['max']=4;
$mel= new fundraiserController();
foreach ($result as $key => $row) {
    echo "<tr>";
    echo "<td>".$row->getidd()."</td>";
    $value=$mel->getidd($row->getnama());
    echo "<td onclick=".$_SESSION['id']=$value."><a href='../riwayat?var=$value'>".$row->getnama()."</a></td>";
	echo "<td>".$row->gettanggal()."</td>"; 
	echo "<td>".$row->gettanggalakhir()."</td>";
    echo "<td>".$row->getmax()."</td>";
    echo "<td>".$row->getterkumpul()."</td>";
    echo "<td>".$row->getketerangan()."</td>";
    echo "<td> <img src='../../donatur/foto/".$row->getimage()."'></td>";
    echo "</tr>";
}
echo'</table>';
		$nopage=0;
		for ($halaman; $halaman <= $_SESSION['jumlah']; $halaman=$halaman+4) {
			$nopage++;
			if($nama!=""){
				$_SESSION['s']=$nama;
				$_SESSION['halaman']=$halaman;
				echo " <a href='../riwayat/page?var=$halaman'>$nopage </a>";
			}
			else if($nama==""){
				$_SESSION['s']="";
				$_SESSION['halaman']=$halaman;
				echo " <a href='../riwayat/page?var=$halaman'>$nopage </a>";
			}	
		}
		
?>

<a href="../login/halamandepan">Back</a>
</table>
	</body>
	<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>