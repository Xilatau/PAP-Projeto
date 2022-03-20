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
    <link rel="stylesheet" type="text/css" href="estilos_sneakers.css">
    <title>Inserir Kicks</title>
</head>

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



<body>

</head>

<body>
<div class="row">
    <div class="topnav" id="myTopnav">
    <a href="home.php">XilaKicks</a>
		<a href="input_marca.php">Adicionar Marca</a>
		<a href="input_sneakers.php">Adicionar Sneakers</a>
        <a href="show_sneakers.php">Mostrar Sneakers</a>
        <a href="input_sales.php">Efetuar Vendas</a>
        <a style="float: right;display:block;" href="reset-password.php">Perfil</a>
				<a href="imagens.php">Adicionar Imagens</a>
        <a style="float: right;display:block;" href="logout.php">Logout</a>
        <!-- Para quando estiver no mobile a navbar ficar responsiva -->
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu_Mobile()">&#9776;</a>
    </div>
</div>
<br>
<br>

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
<h3 style="font-size: 25px;">Inserir Sneakers</h3>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";
    $conn = NEW Mysqli($servername, $username, $password, $database);
    $resultSet = $conn->query("SELECT Marca FROM marcas");
    $query = "SELECT * FROM marcas";

$result1 = mysqli_query($conn, $query);


?>


<div style="margin: 20px;border: 20px;">
<form method="post" action="insert_sneakers.php">
        <label for="Marca">Nome da Marca:</label>
    <br>
<select name="nomemarca">
<option value="">Escolher Marca</option>
<?php while($row1 = mysqli_fetch_array($result1)):;?>

<option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

<?php endwhile;?>
</select>

    </br>
        <label for="Modelo">Modelo:</label>
    </br>
        <input type="text" placeholder="Modelo..." name="modelo" id="modelo"> 
    </br>
        <label for="Quantidade">Quantidade:</label>
    </br>
        <input type="text" onkeypress="isInputNumber(event)" placeholder="Quantidade..." name="quantidade" id="quantidade"> 
    </br>
        <label for="Valor">Valor:</label>
    </br>
        <input type="text" onkeypress="isInputNumber(event)" placeholder="Valor..." name="valor" id="valor"> 
    </br><br>
        <input type="submit"  value="Inserir Sneakers" name="submit" id="submit">   
    </form>

</div>
</div>

<script>
            
            function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
                
            }
            
        </script>


</div>
<hr style="width:90%;">
</div>

<div class="footer">
	<p style="color:black;text-align:center;font-size:1em;">Copyright © 2021 EmpDrive.<br> All rights reserved.</p>
</div>

</body>

</html>