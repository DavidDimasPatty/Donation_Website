<link rel="stylesheet" type="text/css" href="/tugasbesar/view/css/style.css">

<header>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
	<a href="../../riwayat/page?var=0">riwayat</a>
	<a href="../../profil">profil</a>
	<a href="../../login">log out</a>
</div>
<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
	<?php 
	echo '<span class="ms-3">'.$_SESSION['name']."</span>";
	echo '<span class="ms-3">'.date('d-m-y')."</span>";
	?>
</span>
	<center>
	<a class="textwecan">together we can</a>
	</center>
</header>


<body class="bg">

<form method="POST"action="page?var=0" class="mb-3">
	<center>
	<fieldset>
		<legend style="color:white;">Search by Name</legend>
		<input type="text" name="filter" value="<?php echo $nama; ?>">
		<input type="submit" value="SEARCH">
	</fieldset>
    </center>
</form>

<table id="myTable" class="table table-striped">
	<tr>
	
		<th>id</th>
		<th>nama</th>
		<th>tanggal</th>
		<th>tanggalakhir</th>
		<th>max</th>
		<th>terkumpul</th>
		<th>keterangan</th>
	</tr>	
	<?php
		$halaman=0;
		$max=4;
		$_SESSION['max']=4;
		foreach ($result as $key => $row) {
			echo "<tr>";
			$tang=$row->gettanggal();
			if($tang<=date('yy-m-d')&&$row->gettanggalakhir()>=date('yy-m-d')){	
				//buat get
				$value=$row->getid();
				//BERAPA HARI LAGI
				$datetime1 = strtotime(date('y.m.d'));
				$datetime2 = strtotime($row->gettanggalakhir());
				$secs = $datetime2 - $datetime1;// == <seconds between the two times>
				$days = $secs / 86400;
				$days=intval($days);
			
				echo "<td onclick=".$_SESSION['nama'.$value]=$value."><a href='../campaign?var=$value'>".$row->getnama()." </a></td>";
				echo "<td>".$row->gettanggal()."</td>";
				echo "<td>".$days."Hari Lagi</td>";
				echo "<td>".$row->getnamafund()."</td>";
				echo "<td>".$row->getmax()."</td>";
				echo "<td>".$row->getterkumpul()."</td>";
				echo "<td>".$row->getketerangan()."</td>";
				echo "<td> <img src='../../../donatur/foto/".$row->getimage()."'></td>";
				echo "</tr>";
			}
			else{
				$value=$row->getid();
				echo "<td >".$row->getnama()." (Donasi Sudah Ditutup)</td>";
				echo "<td>".$row->gettanggal()."</td>";
				echo "<td>".$row->gettanggalakhir()."</td>";
				echo "<td>".$row->getnamafund()."</td>";
				echo "<td>".$row->getmax()."</td>";
				echo "<td>".$row->getterkumpul()."</td>";
				echo "<td>".$row->getketerangan()."</td>";
				echo "<td> <img src='../../../donatur/foto/".$row->getimage()."'></td>";
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
				echo " <a href='../halamandepan/page?var=$halaman'>$nopage </a>";
			}
			else if($nama==""){
				$_SESSION['s']="";
				$_SESSION['halaman']=$halaman;
				echo " <a href='../halamandepan/page?var=$halaman'>$nopage </a>";
			}	
		}
	?>
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