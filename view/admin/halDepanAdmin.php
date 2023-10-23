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
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <center>
        <div style="margin-top:3%;">
             <a href="halamandepan/daftardonatur">SEMUA DAFTAR DONATUR</a>
        </div>
        <div style="margin-top:1%;">
             <a href="daftardonasi/page?var=0">SEMUA DAFTAR DONASI</a>
        </div>
        <div style="margin-top:1%;">
             <a href="halamandepan/daftarfundraiser">SEMUA DAFTAR FUNDRAISER</a>
        </div>
        <div style="margin-top:1%;">
            <a href="halamandepan/bankadmin?var=0">BANK PEMASUKAN</a>
        </div>
        <div style="margin-top:1%;">
            <a href="halamandepan/banktarik?var=0">BANK TARIK</a>
        </div>
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