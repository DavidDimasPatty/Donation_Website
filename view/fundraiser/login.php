<img src="../css/test1.png" id="logo">
<body class="bg">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<form method="POST"action="check" >
<div class="test">
<input type="text" name="cari" id='cek' placeholder="username">
<?php 
 if ($_SESSION['cek']=='salah'){echo'<style> #ida{  visibility: visible; color:red; }  #pw{  visibility: visible;  color:red;} </style>';}else{echo'<style> #ida{  visibility: hidden;} #pw{  visibility: hidden;  } </style>';};?>
<p id="ida">Wrong Username<p>
<input type="password" name="check" id='cek' placeholder="password">
<p id="pw">Wrong Password<p>
<input type="submit" value="LOGIN" id='submit'> <br>
don't have account yet? <a href="signup" id="sign">sign up!</a><br>
<a href="../../" id="home">home</a>
</div>
<div class='h8'>we care, we share, we love</div>
</form>
</body>