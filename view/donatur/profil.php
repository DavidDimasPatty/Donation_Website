<body class="riwayat">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<header>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
	<a href="riwayat/page?var=0">riwayat</a>
	<a href="profil">profil</a>
	<a href="login">log out</a>
</div>
<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
	<?php 
	echo $_SESSION['name'];
	echo date('yy-m-d');
	?>
</span>
<a class="textwecan">together we can</a>
</header>
<br>
	<div class="posisi">
	<a>
		<a>id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a id='daw'>".$row->getid()."</a>";	
		} ?>
		<br>
	<a>
		<a>nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a id='daw1'>".$row->getnama()."</a>";
		} ?>
			<br>
	<a>
		<a>username
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a>".$row->getusername()."</a>";
		} ?>
		<br>
	<a>
		<a>password
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a>".$row->getpassword()."</a>";
		} ?>
			<br>
	<a>
		<a>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a>".$row->getemail()."</a>";
		} ?>
				<br>
	<a>
		<a>no telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a>".$row->getnotelp()."</a>";
		} ?>
		<br>
	<a>
		<a>no rekening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</a>
	</a>
	<?php
		foreach ($result as $key => $row) {
			echo "<a>".$row->getnorek()." </a>";
		} ?>
<?php
		foreach ($result as $key => $row) {
			echo "<p> <img src='fotouser/".$row->getimage()."' width= 100 px></p>";
			echo $row->getimage();
		}
		
?>
	</div>
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

<a href="../donatur/login/halamandepan/page?var=0">back</a>
</body>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>