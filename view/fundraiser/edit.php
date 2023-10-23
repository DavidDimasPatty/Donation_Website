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
  
        <form method="POST" action='checkupdate?var=<?php echo $_GET['var']?>' enctype="multipart/form-data" style="color:white;">
            <?php
            foreach ($result as $key => $row) { 
                echo "<div>Nama Donasi</div>";
                echo '<span><textarea name="nama" rows="4" cols="50">'.$row->getnama().'</textarea></span>';
         
                echo "<div>Tanggal Awal</div>";
                echo '<span><input type="date" name="tanggal" value='.$row->gettanggal().'></span>';
              
                echo "<div>Tanggal Akhir</div>";
                echo '<span><input type="date" name="tanggalakhir" value='.$row->gettanggalakhir().'></span>';
           
                echo "<div>Keterangan</div>";
                echo '<span><textarea name="keterangan" rows="4" cols="50">'.$row->getketerangan().'</textarea></span>';
              
                echo "<div>Maksimal Donasi</div>";
                echo '<span><input type="number" name="max" value='.$row->getmax().'></span>';
            
                echo "<h2>Edit Foto</h2>";
                 echo "<input type='hidden' name='size' value='1000000'>";
                 echo '<input type="file" name="image" value="'.$row->getimage().'"><br>';
                $_SESSION['gambar']=$row->getimage();
            
            }

            ?>
            <td>  <center> <input type="submit" name="hasil"> </center></td>
        </form>
        </center>
    <center>
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
