<img src="../css/test1.png" id="logo">
<body class="bg">
<form method="POST" action="check" id='tes'>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<div class="test">
    <input type="text" name="cari" id='cek' placeholder="username">
    <?php 
        if ($_SESSION['cek']=='salah'){echo'<style> #ida{  visibility: visible; color:red; }  #pw{  visibility: visible;  color:red;} </style>';}
        else{echo'<style> #ida{  visibility: hidden;} #pw{  visibility: hidden;  } </style>';};
    ?>
    <p id="ida">wrong username<p>
    <input type="password" name="check" id='cek' placeholder="password">
    <p id="pw">wrong password<p>
    <input type="submit" value="LOGIN" id='submit'> <br>
    don't have account yet? <a href="signup" id="sign">sign up!</a><br>
    <a href="../../" id="home">home</a>
</div>
<div class='h4'>we care, we share, we love</div>
</form>
</body>



