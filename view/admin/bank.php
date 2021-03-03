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
			$total=$total+$row->getterkumpul();
			echo "<td>".$row->getnamadonatur()."</td>";
			echo "<td>".$row->getterkumpul()."</td>";
			echo "<td>".$row->getjumlaht()."</td>";
			echo "<td>".$row->gettanggal()."</td>";
			echo "</tr>";
			
		}
		
		echo'</table>';
		echo'Total Donasi Terkumpul di Rekening BCA:';
		$total1= new adminController();
		$duit1= current($total1->duit1());
		echo reset($duit1);
	
		echo "<br>";

		echo'Total Donasi Terkumpul di Rekening MANDIRI:';
		$total2= new adminController();
		$duit2= current($total2->duit2());

		echo reset($duit2);
		$nopage=0;
		for ($halaman; $halaman <= $_SESSION['jumlah']; $halaman=$halaman+10) {
			$nopage++;
			if($name!=""){
				$_SESSION['s']=$name;
				echo " <a href='bankadmin?var=$halaman'>$nopage </a>";
			}
			else if($name==""){
				$_SESSION['s']="";
				echo " <a href='bankadmin?var=$halaman'>$nopage </a>";
			}	
		}


	
	?>

<a href="/tugasbesar/view/admin/login/halamandepan">Back to home</a>