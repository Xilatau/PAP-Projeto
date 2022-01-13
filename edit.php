<!DOCTYPE html>
<html>

<head>
    <title>Editar Sneakers</title>
    <link rel="stylesheet" type="text/css" href="estilos_sneakers.css">

<style>
    <?php include "estilos_showsneakers.css" ?>
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
<h3 style="font-size: 25px;">Editar Sneakers</h3>

<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "xilakicks";

$query = "SELECT * FROM marcas";
$conn = NEW mysqli($servername, $username, $password, $database);
$result1 = mysqli_query($conn, $query);

$id1 = $_GET['edit_id'];
$sql1 = "SELECT * FROM sneakers where ID = $id1";
$resultSet = $conn->query($sql1);
if($resultSet->num_rows !=1){
die('id is not in db');
}

$data = $resultSet->fetch_assoc();

  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Check connection
  if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
  }

        if (isset($_POST['submit']))
        {
            $id = '';
            $marca = $_POST['nomemarca'];
            $modelo = $_POST['modelo'];
            $quntidade = $_POST['quantidade'];
            $valor = $_POST['valor'];
            $id2 = $_GET['edit_id'];
    
            // Performing insert query execution
            // here our table name is college
            $sql = "UPDATE sneakers set id='$id2',Marca='$marca',Modelo='$modelo',Quantidade='$quntidade',Valor='$valor' where id=$id2";
              
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo "Editado com sucesso!!!";
            }else{
                die(mysqli_error($conn));
            }
            // Close connection
            mysqli_close($conn);
        }

?>

<div style="margin: 20px;border: 20px;">
<form method="post">
        <label for="Marca">Nome da Marca:</label>
    <br>
<select name="nomemarca">
<option value="">Escolher Marca</option>
<?php while($row1 = mysqli_fetch_array($result1)):;?>
<option value="<?php echo $row1[1];?>"><?php echo $row1[1];?>
</option>

<?php endwhile;?>

</select>
    </br>
        <label for="Modelo">Modelo:</label>
    </br>
        <input type="text" placeholder="Modelo..." value="<?= $data['Modelo']?>" name="modelo" id="modelo"> 
    </br>
        <label for="Quantidade">Quantidade:</label>
    </br>
        <input type="text" placeholder="Quantidade..." value="<?= $data['Quantidade']?>" name="quantidade" id="quantidade"> 
    </br>
        <label for="Valor">Valor:</label>
    </br>
        <input type="text" placeholder="Valor..." value="<?= $data['Valor']?>" name="valor" id="valor"> 
    </br></br>
        <input type="submit" value="Editar" name="submit" id="submit">   
</form>
    </div>

</body>
</html>