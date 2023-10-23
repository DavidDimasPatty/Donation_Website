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
	<form method="POST" action="?var=0" >
		<fieldset>
			<legend>Search by Name</legend>
			<input type="text" name="filter" value="<?php echo $name;?>" placeholder="Cari Nama Donasi">
			<input type="submit" value="SEARCH">
		</fieldset>
	</form>
	<br>
	<hr>
	<table>
		<tr>
			<th>nama donasi</th>
			<th>terkumpul</th>
			<th>max</th>
			<th>terkumpul</th>
			<th>keterangan</th>
			<th>valid</th>
		</tr>	
		<?php
		$halaman=0;
			
			$total=0;
			$_SESSION['max']=10;
			foreach ($result as $key => $row) {
				echo "<tr>";
				echo "<td>".$row->getnamadonasi()."</td>";
				echo "<td>".$row->getnamafundraiser()."</td>";
				echo "<td>".$row->getjumlaht()."</td>";
				echo "<td>".$row->gettanggal()."</td>";
				echo "<td>".$row->getnamabank()."</td>";
				echo "</tr>";
				
			}
			
			echo'</table>';
			echo'Total penarikan pada Rekening BCA:';
			$total1= new adminController();
			$duit1= current($total1->pengeluaran_duit1());
			if(reset($duit1)==0){
				echo "belum ada yang masuk";
			}
			else{
			echo reset($duit1);
			}
			echo "<br>";

			echo'Total penarikan pada Rekening MANDIRI:';
			$total2= new adminController();
			$duit2= current($total2->pengeluaran_duit2());
			if(reset($duit2)==0){
				echo "belum ada yang masuk";
			}
			else{
			echo reset($duit2);
			}
			$nopage=0;
			for ($halaman; $halaman <= $_SESSION['jumlah']; $halaman=$halaman+10) {
				$nopage++;
				if($name!=""){
					$_SESSION['s']=$name;
					echo " <a href='banktarik?var=$halaman'>$nopage </a>";
				}
				else if($name==""){
					$_SESSION['s']="";
					echo " <a href='banktarik?var=$halaman'>$nopage </a>";
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