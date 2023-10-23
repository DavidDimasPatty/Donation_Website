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
	<form method="POST" action="daftardonatur">
		<center>
			<legend>Search by Name</legend>
			<input type="text" name="filter1" value="<?php echo $name; ?>">
			<input type="submit" value="SEARCH">
		</center>
	</form>
	<br>
	<hr>
	<center>
	<table>
		<tr>
			<th></th>
			<th>id</th>
			<th>nama</th>
			<th>username</th>
			<th>passwrod</th>
			<th>email</th>
			<th>notelp</th>
			<th>norek</th>
		</tr>	
		<?php
			foreach ($result as $key => $row) {
				echo "<tr>";
				echo "<td>".$row->getid()."</td>";
				echo "<td>".$row->getnama()."</td>";
				echo "<td>".$row->getusername()."</td>";
				echo "<td>".$row->getpassword()."</td>";
				echo "<td>".$row->getemail()."</td>";
				echo "<td>".$row->getnotelp()."</td>";
				echo "<td>".$row->getnorek()."</td>";
				echo "</tr>";
			}
		?>
	</table>

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