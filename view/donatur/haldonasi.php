<body class="riwayat">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<header>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;
	<a href="../riwayat/page?var=0">riwayat</a>
	<a href="../profil">profil</a>
	<a href="../login">log out</a>
</div>
<span style="font-size:25px;cursor:pointer;font-family:MANDATOR;color:white;" onclick="openNav()">&#9776;
	<?php 
	echo $_SESSION['name'];
	echo date('yy-m-d');
	?>
</span>
<a class="textwecan">together we can</a>
</header>

<form method="POST" action="checkbayar?var=".<?php $_GET['var'] ?> >
<div class="pembayaran">
		<p id="bayar1">pembayaran</p>
        <?php
        echo $_GET['var'];
        $_SESSION['ide']=$_GET['var'];
        ?>
        <p>pesan kepada fundraiser:</p>
        <textarea name="comment" id="comment"></textarea>
        <p id="jumlah">jumlah transfer:</p>
        <input type="number" min="10000" name="tf" id="bayar" >
        <br>
        <input type="radio"  name="rekening" value="1" id="bca"><a id="bc">bca</a>
        <input type="radio"  name="rekening" value="2" id="mandiri"><a id="man">mandiri</a><br>
        <input type="checkbox" id="male" name="status" value="anonim">
        <label for="anonim" id="anon">anonim</label><br>
        <input type="submit" value="DONASI SEKARANG" id="donasi1">
    </div>
    <a href="campaign?var=<?php echo $_GET['var'];?>">back</a>
    <div class='h7'>we care, we share, we love</div>
</form>
</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>