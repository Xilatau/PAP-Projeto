<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
//Connection for database
include 'dbconn.php';
$sql = "SELECT * FROM sneakers";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<body>

<title>Mostrar Sneakers</title>

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

.main{
	background-color:white;
	color:black;
	padding:15px;
}    


</style>   

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

<div class="col-12 col-s-12">
<h3 style="text-align: center;font-family: 'Courier New', Courier, monospace;">Detalhes Sneakers</h3>
<table border="1" align="center" style="line-height:25px;font-family: 'Courier New', Courier, monospace;">
<link rel="stylesheet" type="text/css" href="estilos_showsneakers.css">

<div class="col-12 col-s-12">
<tr>
<th>ID</th>
<th>Marca</th>
<th>Modelo</th>
<th>Quantidade</th>
<th>Valor</th>
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
        <!--Edit option -->
        <td><input type="submit" value="Editar" style="font-family: 'Courier New', Courier, monospace;" onclick="window.location.href='edit.php?edit_id=<?php echo $row['ID']?>'" alt="edit" ></td>
        <!-- Delete Buttion -->
        <td><input type="submit" style="font-family: 'Courier New', Courier, monospace;" onClick="deleteme(<?php echo $row['ID']; ?>)" name="Delete" value="Eliminar"></td>
        </tr>
        
        <!-- Javascript function for deleting data -->
        <script language="javascript">
		function deleteme(delid)
		{
			if(confirm("Queres mesmo apagar?")){
				window.location.href='delete.php?del_id=' +delid+'';
				return true;
			}
		}		
		</script>
        <?php
	}
}
else
{
	?>
	<tr>
    <th colspan="2">Detalhes não encontrados!!!</th>
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