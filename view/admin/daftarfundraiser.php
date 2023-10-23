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

<form method="POST" action="daftarfundraiser" >
	<fieldset>
		<legend>Search by Name</legend>
		<input type="text" name="filter2" value="<?php echo $name; ?>">
		<input type="submit" value="SEARCH">
	</fieldset>
</form>
<br>
<hr>
<table>
	<tr>
		<th></th>
		<th>id</th>
		<th>username</th>
		<th>passwrod</th>
		<th>nama orgnanisasi</th>
		<th>alamat organisasi</th>
		<th>notelp</th>
		<th>norek</th>
		<th>valid</th>
	</tr>	
	<form method="POST">
	<?php
	$tes=new adminController();
		foreach ($result as $key => $row) {
			echo "<tr>";
			echo "<td>".$row->getid()."</td>";
			echo "<td>".$row->getusername()."</td>";
			echo "<td>".$row->getpassword()."</td>";
			echo "<td>".$row->getnamaorganisasi()."</td>";
			echo "<td>".$row->getalamatorganisasi()."</td>";
			echo "<td>".$row->getnotelp()."</td>";
			echo "<td>".$row->getnorek()."</td>";
			echo "<td>".$row->getvalid()."</td>";
			$value=$row->getid();
			echo "<td><a href='verifikasi?var=$value'> Verifikasi</a>";
			echo "<td><a href='unverifikasi?var=$value'> Unverifikasi</a>";
			echo "</tr>";
		}
	?>
	</form>
</table>

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