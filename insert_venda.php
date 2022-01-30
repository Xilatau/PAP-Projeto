<?php ob_start(); ?>
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
        <a href="input_sales.php">Efetuar Vendas</a>
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
$id2 = $_GET['venda_id'];

$conn = NEW mysqli($servername, $username, $password, $database);
$sql2 = "SELECT * FROM sneakers where ID = $id2;";
$result2 = $conn->query($sql2);



?>

<h3 style="font-size: 25px;">
<?php if ($row2 = $result2->fetch_assoc()) {
	echo $row2['Marca'] . ' ' . $row2['Modelo'];
	$qunti = $row2['Quantidade'];
	$valori = $row2['Valor'];
}
?>

</h3> 

<script>
function myFunction() {
  alert("Venda efetuada com sucesso!!!");
}
</script>

<script>
function myFunction1() {
  alert("Quantidade não existente!!!");
}
</script>


<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "xilakicks";

$query = "SELECT * FROM marcas";
$conn = NEW mysqli($servername, $username, $password, $database);
$result1 = mysqli_query($conn, $query);

$id1 = $_GET['venda_id'];
$sql1 = "SELECT * FROM sneakers where ID = $id1";
$resultSet = $conn->query($sql1);
if($resultSet->num_rows !=1){
die('<h3 style="color:red;">ID não existe!!!</h3>');
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
            $quntidade1 = $_POST['quantidade'];
            $valor1 = $_POST['valor'];
            $id2 = $_GET['venda_id'];
    
            // Performing insert query execution
            // here our table name is college
            $sql = "UPDATE sneakers SET Quantidade = Quantidade - $quntidade1, Valor= Valor - $valor1 WHERE ID=$id2";

            $result = mysqli_query($conn, $sql);
			if(($result)) {
				echo('<script type="text/JavaScript">
				alert("Venda efetuada com sucesso!!!");
				location.replace("input_sales.php");
				</script>');
				exit;
			}
			if (empty($quntidade1 and $valor1)){
            echo('<script type="text/JavaScript">
            alert("É necessario preencher todos os campos!!!");
            location.replace("input_sales.php");
            </script>');
            exit;	
            }
			if (($quntidade1 > $qunti)){
            echo('<script type="text/JavaScript">
            alert("Quantidade não existente!!!");
            location.replace("input_sales.php");
            </script>');
            exit;
			}
			if (($valor1 > $valori)){
            echo('<script type="text/JavaScript">
            alert("Quantidade não existente!!!");
            location.replace("input_sales.php");
            </script>');
            exit;
			}else{
            die(mysqli_error($conn));
            }
            // Close connection
            mysqli_close($conn);
        }

?>

<?php
$sql2 = "SELECT Marca FROM sneakers WHERE ID='$id1'";
$result2 = mysqli_query($conn,$sql2);
$data2=$result2->fetch_assoc();
?>


<div style="margin: 20px;border: 20px;">
<form method="post">
    </br>
        <label for="Quantidade">Quantidade:</label>
    </br>
        <input type="text" placeholder="Quantidade..." onkeypress="isInputNumber(event)"  name="quantidade" id="quantidade"> 
    </br>
        <label for="Valor">Valor:</label>
    </br>
        <input type="text" placeholder="Valor..." onkeypress="isInputNumber(event)" name="valor" id="valor"> 
    </br></br>
        <input type="submit" onclick= value="Editar" name="submit" id="submit">   
</form>
    </div>

    <script>
            
            function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
                
            }
            
        </script>


</body>
</html>
<?php ob_end_flush(); ?>