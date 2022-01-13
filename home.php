<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos_sneakers.css">
  <title>Home</title>
<style>
<?php include "estilos_sneakers.css" ?>

@media screen and (max-width: 600px) 
{
                    .topnav a:not(:first-child), .dropdown .dropbtn {
                        display: none;
                    }
                    .headerrigth a{
                        display: none;
                    }

                    .topnav a.icon {
                        float: right;
                        display: block;
                    }
                   
}

@media screen and (max-width: 600px) 
{
                    .topnav.responsive {position: fixed;}
                    .topnav.responsive .icon {
                        position: absolute;
                        right: 0;
                        top: 0;
                }
                .topnav.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }
               
                .topnav.responsive .dropdown {float: none;}
                .topnav.responsive .dropdown-content {position: relative;}
                .topnav.responsive .dropdown .dropbtn {
                    display: block;
                    width: 100%;
                    text-align: left;
                }
               
                .headerrigth{
                    position: relative;
                    display: block;
                    width: 100%;
                    float: none;
                }
               
}


</style>
</head>
<body>
<div class="row">
    <div class="topnav" id="myTopnav">
    <a href="home.php">XilaKicks</a>
		<a href="input_marca.php">Adicionar Marca</a>
		<a href="input_sneakers.php">Adicionar Sneakers</a>
        <a href="show_sneakers.php">Mostrar Sneakers</a>
        <a href="#vendas">Efetuar Vendas</a>  
        <a style="float: right;display:block;" href="reset-password.php">Perfil</a>
        <a style="float: right;display:block;" href="logout.php">Logout</a>
        <!-- Para quando estiver no mobile a navbar ficar responsiva -->
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu_Mobile()">&#9776;</a>
    </div>
</div>

<script>
                function Menu_Mobile() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
</script>






<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>
<hr style="width:90%;">
</div>

<div class="footer">
	<p style="color:black;text-align:center;font-size:1em;">Copyright © 2021 EmpDrive.<br> All rights reserved.</p>
</div>

</body>
</html>