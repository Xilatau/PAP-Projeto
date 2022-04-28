<?php
ob_start();
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
  <title>Home</title>
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

th{
	text-align:center;
}

img{ 
  width: 220px; 
  height: 200px;
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
		<a href="imagens.php">Adicionar Imagens</a>
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
    <h3 style="font-size: 25px;">Adicionar Imagens</h3>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";
$conn = NEW mysqli($servername, $username, $password, $database);
$resultSet = $conn->query("SELECT Modelo FROM sneakers");
$query = "SELECT * FROM sneakers";

$result1 = mysqli_query($conn, $query);



?>


<div style="margin: 20px;border: 20px;">
<form enctype="multipart/form-data" method="post" action="">
        <label for="Marca">Modelo Sneaker:</label>
    <br>
<select name="modelos">
<option value="">Escolher Sneaker</option>
<?php while($row1 = mysqli_fetch_array($result1)):;?>

<option value="<?php echo $row1[2];?>"><?php echo $row1[2];?></option>

<?php endwhile;?>
</select>
    </br><br>

          <input style="color: green;" type="file" name="my_image" id="imagem">
    </br><br>
        <input style="font-family: 'Courier New', Courier, monospace;" type="submit"  value="Inserir Sneakers" name="submit" id="submit">   
    </form>

<?php


if (!$conn) {
	echo "Falha a conectar á base de dados.";
	exit();
}

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	$modelos = filter_input(INPUT_POST, 'modelos', FILTER_SANITIZE_STRING);
	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Erro, imagem muito pesada.";
		    header("Location: erro.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO images(modelo,image_url) VALUES ('$modelos','$img_upload_path')";
				mysqli_query($conn, $sql);
                echo('<script type="text/JavaScript">
                alert("Imagem adicionada com sucesso!");
                location.replace("imagens.php");
                </script>');
			}else {
				$em = "Nao é possivel adicionar imagens deste tipo.";
		        header("Location: imagens.php?error=$em");
			}
		}
	}else {
        echo('<script type="text/JavaScript">
        alert("É necessario preencher todos os campos!");
        location.replace("imagens.php");
        </script>');
	}
}else {
}

ob_end_flush();
?>

<?php
$sql4 = "SELECT * FROM images";  
$result = mysqli_query($conn, $sql4);  
?>
<br>
<br>
<center>
<table border="1" align="center" style="line-height:25px;font-family: 'Courier New', Courier, monospace;">
                          <tr>  
                               <th>Modelo</th>  
                               <th>Imagem</th>  
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td width="200" height="200"><center><?php echo $row["Modelo"];?></td>  </center>
                               <td width="200" height="200"><center><?php echo "<img src =".$row['image_url'] ." />"; ?></td>
                            </center>
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                        </center>

</body>
</html>