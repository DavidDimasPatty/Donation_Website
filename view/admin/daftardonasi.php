<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<header>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
      <a href="../login">log out</a>
    </div>
    <span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
    </span>
      <center><a style="color:white; font-size:40px;" class="mb-5"><u>Selamat Datang Admin</u></a></center>
</header>

<body class="bg">
	<form method="POST" action="page?var=0" >
		<fieldset>
			<legend>Search by Name</legend>
			<input type="text" name="filter" value="<?php echo $name;?>">
			<input type="submit" value="SEARCH">
		</fieldset>
	</form>
	<br>
	<hr>
	<table>
		<tr>
			<th>id</th>
			<th>nama</th>
			<th>tanggal</th>
			<th>tanggal akhir</th>
			<th>max</th>
			<th>terkumpul</th>
			<th>keterangan</th>
			<th>valid</th>
		</tr>	
		<?php
		$halaman=0;
			$max=4;
			$_SESSION['max']=4;
			foreach ($result as $key => $row) {
				echo "<tr>";
				echo "<td>".$row->getid()."</td>";
				echo "<td>".$row->getnama()."</td>";
				echo "<td>".$row->gettanggal()."</td>";
				echo "<td>".$row->gettanggalakhir()."</td>";
				echo "<td>".$row->getmax()."</td>";
				echo "<td>".$row->getterkumpul()."</td>";
				echo "<td>".$row->getketerangan()."</td>";
				echo "<td>".$row->getverif()."</td>";
				$value=$row->getid();
				echo "<td> <img src='../../../donatur/foto/".$row->getimage()."'></td>";
				echo "<td> <a href='donasi/verifikasi?var=$_GET[var]&var2=$value'> Verifikasi</a>";
				echo "<td> <a href='donasi/unverifikasi?var=$_GET[var]&var2=$value'> Unverifikasi</a>";
				echo "</tr>";
			}
			
			echo'</table>';
			$nopage=0;
			for ($halaman; $halaman <= $_SESSION['jumlah']; $halaman=$halaman+4) {
				$nopage++;
				if($name!=""){
					$_SESSION['s']=$name;
					echo " <a href='../daftardonasi/page?var=$halaman'>$nopage </a>";
				}
				else if($name==""){
					$_SESSION['s']="";
					echo " <a href='../daftardonasi/page?var=$halaman'>$nopage </a>";
				}	
			}
		
		?>

	<a href="/tugasbesar/view/admin/login/halamandepan">Back to home</a>

</body>

<a href="/tugasbesar/view/admin/login/halamandepan">Back to home</a>

<script>
	function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	}
</script>