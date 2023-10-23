
<header>
		<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
			<a href="riwayat/page?var=0">riwayat</a>
			<a href="profil">profil</a>
			<a href="login">log out</a>
		</div>
		<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
			<?php 
			echo '<span class="ms-3">'.$_SESSION['name']."</span>";
			echo '<span class="ms-3">'.date('d-m-y')."</span>";
			?>
		</span>
			<center>
				<a class="textwecan" href="login/halamandepan/page?var=0">together we can</a>
			</center>
</header>

<body class="riwayat">
		<center class="posisi">
		<u> Profil Donatur</u>
		<div>
			<a>id:</a>
		</div>
		<?php
			foreach ($result as $key => $row) {
				echo "<a id='daw'>".$row->getid()."</a>";	
			} 
		?>
			<br>
		<a>

			<a>nama : </a>
		</a>
		<?php
			foreach ($result as $key => $row) {
				echo "<a id='daw1'>".$row->getnama()."</a>";
			}
		?>
				<br>
		<a>

			<a>username : 
		
			</a>
		</a>
		<?php
			foreach ($result as $key => $row) {
				echo "<a>".$row->getusername()."</a>";
			} 
		?>
			<br>
		<a>

			<a>password : 
			
			</a>
		</a>
		<?php
			foreach ($result as $key => $row) {
				echo "<a>".$row->getpassword()."</a>";
			} 
		?>
			<br>

			<a>email :
		</a>
		<?php
			foreach ($result as $key => $row) {
				echo "<a>".$row->getemail()."</a>";
			} 
		?>
			<br>

			<a>no telepon :</a>
		</a>
		<?php
			foreach ($result as $key => $row) {
				echo "<a>".$row->getnotelp()."</a>";
			} 
		?>
			<br>
		<a>
			<a>no rekening :</a>
		</a>
		<?php
			foreach ($result as $key => $row) {
				echo "<a>".$row->getnorek()." </a>";
			}
		 ?>
		<?php
				foreach ($result as $key => $row) {
					echo "<p> <img src='fotouser/".$row->getimage()."' width= 100 px></p>";
					echo $row->getimage();
				}
				
		?>
	

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