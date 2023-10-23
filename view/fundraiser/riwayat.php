<body class="riwayat">

<body class="riwayat">
		<link rel="stylesheet" type="text/css" href="../../css/style.css">

		<header>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
			<a href="/tugasbesar/view/fundraiser/login/halamandepan">Home</a>
			<a href="/tugasbesar/view/fundraiser/login/profil">profil</a>
			<a href="../login">log out</a>
			</div>
			<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
			<?php 	
			echo '<span class="ms-3">'.$_SESSION['name']."</span>";
			echo '<span class="ms-3">'.date('d-m-Y')."</span>";
			?>
			</span>
			<center><a style="color:white; font-size:40px;"><u>Together We Can</u></a></center>
		</header>

		<form method="POST" action="page?var=0" class="mb-2">
			<div class="searchdonasi">
			<legend>cari apa yang kamu bantu</legend>
			<input type="text" name="filter" value="<?php echo $nama; ?>" id="caridonasi">
			</div>
		</form>

		<center>
		<table>
			<tr>
				<th></th>
				<th>id</th>
				<th>nama</th>
				<th>tanggal</th>
				<th>max</th>
				<th>terkumpul</th>
				<th>keterangan</th>
				<th>Image</th>
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
		</center>

		<center>	
			<a href="../login/halamandepan">Back</a>
	    </center>
	</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>