<body class="riwayat">

<header>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
	  <a href="halamandepan">Home</a>
      <a href="profil">profil</a>
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

	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<center class="mt-2" style="color:white;">
		<?php echo "<img src= ../foto/".$result[0]->getimage()." />" ?>
		<?php echo "<h2 class='mt-4'> Nama Organisasi : ".$result[0]->getnamaorganisasi()." <h2>" ?>
		<?php echo "<h2> Alamat Organisasi :".$result[0]->getalamatorganisasi()." <h2>" ?>
		<?php echo "<h2> Alamat Organisasi :".$result[0]->getnotelp()." <h2>" ?>
	</center>

	<center style=>
		<center class="mt-4" style="border: 2px solid white; width: 50%; color: white; justify-content: center; display: flex;">
			<h2>Edit Foto</h2>
			<form method="POST"action="checkedit1" enctype="multipart/form-data" >
					<input type="hidden" name="size" value="1000000">
					<input type="file" name="image"><br>
					<input type="submit" value="Change Profil Picture" >
			</form>

			<h2>Ganti Password</h2>
			<form method="POST"action="checkedit2" >
				<label>Password Lama</label><input type="password" name="password" ><br>
				<label>Password Baru</label><input type="password" name="password2" ><br>
				<input type="submit" value="Change Password" >
			</form>
		</center>
	</center>
	<center>			
		<a href="halamandepan" style="font-size:30px">Back</a>
	</center>
<body>

<script>
	function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</script>