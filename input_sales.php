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
    <title>Efetuar Venda</title>
</head>

<style>
    <?php include "estilos_showsneakers.css" ?>

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
<h3 style="font-size: 25px;">Efetuar Vendas</h3>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";
    $conn = NEW Mysqli($servername, $username, $password, $database);
    $sql = "SELECT * FROM sneakers";
    $result = $conn->query($sql);
    
    $sql1 = "SELECT Modelo,Valor*Quantidade AS preco_total FROM sneakers;";
    $result1 = $conn->query($sql1);
    
    $sql2 = "SELECT SUM(Quantidade*Valor) AS preco_123 FROM sneakers;";
    $result2 = $conn->query($sql2);
    
?>

<table border="1" align="center" style="line-height:25px;font-family: 'Courier New', Courier, monospace;">
<div class="col-12 col-s-12">
<tr>
<th>ID</th>
<th>Marca</th>
<th>Modelo</th>
<th>Quantidade</th>
<th>Valor</th>
<th>Valor Total</th>
</tr>

<?php
//Fetch Data form database
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
		<tr style="text-align: center;">
        <td style="text-align: center;"><?php echo $row['ID']; ?></td>
        <td style="text-align: center;"><?php echo $row['Marca']; ?></td>
        <td style="text-align: center;"><?php echo $row['Modelo']; ?></td>
        <td style="text-align: center;"><?php echo $row['Quantidade']; ?></td>
        <td style="text-align: center;"><?php echo $row['Valor']; ?></td>
		<?php if ($row1 = $result1->fetch_assoc()) {}?>
		<td style="text-align: center;"><?php echo $row1['preco_total']; ?></td>
        <td><input type="submit" value="Efetuar Venda" style="font-family: 'Courier New', Courier, monospace;background-color: green;" onclick="window.location.href='insert_venda.php?venda_id=<?php echo $row['ID']?>'" alt="edit" ></td>
        </tr>
        <?php
	}
}
else
{
	?>
	<tr>
    <th style="color:red;" colspan="2">Detalhes não encontrados!!!</th>
    </tr>
    <?php
}
?>
</table>
</div>


</div>
<hr style="width:90%;">
</div>

<div class="footer">
	<p style="color:black;text-align:center;font-size:1em;">Copyright © 2021 EmpDrive.<br> All rights reserved.</p>
</div>

</body>

</html>