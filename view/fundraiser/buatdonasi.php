<body class="riwayat">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<form method="POST"action="checkvalid" enctype="multipart/form-data">
    <div class="align">
    <div>form campaign</div>
        <label>nama</label><input type="text" name="nama" id="namadon"><br>
        <label>tanggal di buka</label><input type="date" name="tanggal" id="tgl1"><br>
        <label>tanggal akhir</label><input type="date" name="tanggalakhir" id="tgl2"><br>
        <label>max</label><input type="number" name="max" id="max"><br>
        <label>keterangan</label><input type="text" name="keterangan" id="ket"><br>
        <input type="hidden" name="size" value="1000000">
        <input type="file" name="image"><br>

        <input type="submit" name='upload' value="daftar" id="daftar" ><br>
        <a href="/tugasbesar/view/fundraiser/login/halamandepan" id="back">back</a>
    </div>
    <div class='h10'>we care, we share, we love</div>
</form>
</body>