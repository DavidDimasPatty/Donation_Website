<body class="bg">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<form method="POST"action="checkvalid" enctype="multipart/form-data">
    <div class="align">
        <div>register form</div>
            <label>username</label><input type="text" name="username" id="userfund"><br>
            <label>password</label><input type="password" name="pasword" id="passfund"><br>
            <label>nama organisasi</label><input type="text" name="namaorganisasi" id="namafund" ><br>
            <label>alamat organisasi</label><input type="text" name="alamatorg" id="alamat"><br>
            <label>no telepon</label><input type="text" name="notelp" id="telpfund" ><br>
            <label>no rekening</label><input type="text" name="norek" id="rekfund"><br>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image"><br>
            <input type="submit" value="daftar" id="daftar" ><br>
            <a href="/tugasbesar/view/fundraiser/login" id="back">back</a>
        </div>
        <div class='h11'>we care, we share, we love</div>
</form>
</body>