<body class="riwayat">
<?php echo $_SESSION['name']?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<table>
<?php

		foreach ($result as $key => $row) {
			echo "<tr>";
			echo "<td>".$row->getid()."</td>";
			echo "<td>".$row->getusername()."</td>";
			echo "<td>".$row->getpassword()."</td>";
			echo "<td>".$row->getnamaorganisasi()."</td>";
			echo "<td>".$row->getalamatorganisasi()."</td>";
			echo "<td>".$row->getnotelp()."</td>";
			echo "<td>".$row->getnorek()."</td>";
			echo "<td> <img src='../foto/".$row->getimage()."'></td>";
			echo "</tr>";
		}
?>
</table>
</table>
<form method="POST"action="checkedit1" enctype="multipart/form-data" >
<P>Edit Foto</P>
<input type="hidden" name="size" value="1000000">
<input type="file" name="image"><br>
<input type="submit" value="Change Profil Picture" >
</form>

<form method="POST"action="checkedit2" >
<P>Ganti Password</P>
<label>Password Lama</label><input type="password" name="password" ><br>
<label>Password Baru</label><input type="password" name="password2" ><br>
<input type="submit" value="Change Password" >
</form>
<a href="halamandepan">back</a>
<body>