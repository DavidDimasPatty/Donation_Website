<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<header>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
      <a href="../login">log out</a>
    </div>
    <span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
    </span>
</header>

<body class="bg">
	<form method="POST" action="?var=0" >
		<center>
			<legend style="color:white;">Search by Name</legend>
			<input type="text" name="filter" value="<?php echo $name;?>" placeholder="Cari Nama Donasi">
			<input type="submit" value="SEARCH">
		</center>
	</form>
	<br>
	<hr>
	<center>
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
				$total=$total+$row->getterkumpul();
				echo "<td>".$row->getnamadonatur()."</td>";
				echo "<td>".$row->getterkumpul()."</td>";
				echo "<td>".$row->getjumlaht()."</td>";
				echo "<td>".$row->gettanggal()."</td>";
				echo "</tr>";
				
			}
			
			echo'</table>';
			echo' <h4 style="color:white;">Total Donasi Terkumpul di Rekening BCA:</h4>';
			$total1= new adminController();
			$duit1= current($total1->duit1());
		
			echo "<br>";

			echo'<h4  style="color:white;">Total Donasi Terkumpul di Rekening MANDIRI:</h4>';
			$total2= new adminController();
			$duit2= current($total2->duit2());

			$nopage=0;
			for ($halaman; $halaman <= $_SESSION['jumlah']; $halaman=$halaman+10) {
				$nopage++;
				if($name!=""){
					$_SESSION['s']=$name;
					echo "<center><a href='bankadmin?var=$halaman'>$nopage </center></a>";
				}
				else if($name==""){
					$_SESSION['s']="";
					echo " <center><a href='bankadmin?var=$halaman'>$nopage </center> </a>";
				}	
			}


		
		?>
	</center>
	<center>
		<a href="/tugasbesar/view/admin/login/halamandepan">Back to home</a>
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