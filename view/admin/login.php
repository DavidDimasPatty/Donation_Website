

<body class="bg">
    <div class="vh-100 d-flex justify-content-center align-items-center">      
        <div class="row">
            <center>
                <h2 class="h4 mb-4" style="font-size:40px">Hallo Admin!</h2>

                <form method="POST"action="check">
                    <input type="text" name="cari" id='cek' placeholder="username">
                    <?php 
                        if ($_SESSION['cek']=='salah'){echo'<style> #ida{  visibility: visible; color:red; }  #pw{  visibility: visible;  color:red;} </style>';}
                        else{echo'<style> #ida{  visibility: hidden;} #pw{  visibility: hidden;  } </style>';};
                    ?>
                    <p id="ida">wrong username<p>
                    <input type="password" name="check" id='cek' placeholder="password">
                    <p id="pw">wrong password<p>
                    <input type="submit" id='submit' value="Log In">               
                </form>
    
                <div class="row mt-2"> 
                    <a href="../../">Home</a>
                </div>

            </center>
        </div>
    </div>
</body>

