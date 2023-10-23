<body class="riwayat">


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

<center>
	<?php  
	$value=$_GET['var'];
			echo "<table>";
			echo "<td><a href='edit?var=$value'>Edit</a></td>";
			
			foreach ($result as $key => $row) {
				echo "<tr>";
				echo "<td>".$row->getid()."</td>";
				echo "<td onclick=".$_SESSION['nama'.$value]=$value.">".$row->getnama()."</a></td>";
				echo "<td>".$row->gettanggal()."</td>";
				echo "<td>".$row->getmax()."</td>";
				echo "<td>".$row->getterkumpul()."</td>";
				echo "<td>".$row->getketerangan()."</td>";
				echo "<td> <img src='../donatur/foto/".$row->getimage()."'></td>";
				echo "</tr>";
					break;
				}

				echo "<tr> <h2 style='color:white;'>Interaksi dengan Donasi</h2> </tr>";

				foreach ($result as $key => $row) {
					echo "<tr>";
					if($row->getanonim()!='anonim'){
					echo "<td>".$row->getnamauser()."</td>";
					}else{
						echo "<td> Anonim</td>";
					}
					echo "<td>".$row->getkomen()."</td>";
					echo "<td>".$row->getjumlaht()."</td>";
					echo "<td>".$row->gettanggal()."</td>";
					echo "<tr>";
				}	

					// echo'Total Donasi Terkumpul';
					// $total= new fundraiserController();
					// $duit= current($total->duit($_GET['var']));
					
					// if (reset($duit)==""){
					// echo "<br>belum ada donasi yang masuk";
					// }
					// else{
					// echo reset($duit);
					// echo "<form method=POST action=penarikan/riwayat?var=".$_GET['var'].">";
					// echo "<br>Penarikan:<input type='number' name='tarik' min=10000>";
					// echo "<input type='radio'  name='rekening' value='1'>BCA <br>";
					// echo "<input type='radio'  name='rekening' value='2'> Mandiri<br>";

					// echo "<input type='submit' value='Tarik Donasi'>";
					// echo "</form> ";
					// }

			echo "</table>";	
	?>

<a href="riwayat/page?var=0">Back</a>
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
