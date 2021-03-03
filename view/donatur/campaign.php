<body class="bg">
<?php echo $_SESSION['name']; ?>
<p> Welcome To Together We Can!
<form method="POST" action="halamandepan">
	<p>
	</p>
	
	<fieldset>
		<legend>Search by Name</legend>
		<input type="text" name="filter" >
		<input type="submit" value="SEARCH">
	</fieldset>
</form>
<?php  
 
$value=$_GET['var'];
		echo "<table>";
		foreach ($result as $key => $row) {
			echo "<tr>";
			$tang=$row->gettanggal();
			if($tang<=date('yy-m-d')&&$row->gettanggalakhir()>=date('yy-m-d')){	
			echo "<td>".$row->getid()."</td>";
			echo "<td onclick=".$_SESSION['nama'.$value]=$value.">".$row->getnama()."</a></td>";			
			echo "Today is " . date("Y-m-d") . "<br>";
			echo "<td>".$row->gettanggal()."</td>";
			echo "<td>".$row->getmax()."</td>";
			echo "<td>".$row->getterkumpul()."</td>";
			echo "<td>".$row->getketerangan()."</td>";
			echo "<td> <img src='../../donatur/foto/".$row->getimage()."'></td>";
			echo "</tr>";
			echo "</table>";	
			echo "<a href='haldonasi?var=$value'>Donasi Sekarang</a>";
	
		}
	
		
		else{
			echo "<td>".$row->getid()."</td>";
			echo "<td onclick=".$_SESSION['nama'.$value]=$value.">".$row->getnama()."</a></td>";			
			echo "Today is " . date("Y-m-d") . "<br>";
			echo "<td>".$row->gettanggal()."</td>";
			echo "<td>".$row->getmax()."</td>";
			echo "<td>".$row->getterkumpul()."</td>";
			echo "<td>".$row->getketerangan()."</td>";
			echo "<td> <img src='../../donatur/foto/".$row->getimage()."'></td>";
			echo "</table>";	
			echo "</tr>";
			
		}
	}

		echo "</table>";	

?>

<a href="halamandepan/page?var=0">back</a>
</body>
