<body class="riwayat">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <header>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
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
    <p class="welcome">welcome fundraiser!</p> <br>
    <div class="center">
      <a href="buatdonasi" id="buat">buat donasi</a>
      <a href="../riwayat/page?var=0" id="lihat">riwayat donasi</a>
    </div>
  <div class='h9'>we care, we share, we love</div>
</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>