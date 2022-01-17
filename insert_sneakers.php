<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "xilakicks";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  
  // Check connection
  if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
        // Taking all 5 values from the form data(input)
        if (isset($_POST['submit']))
        {
            $id = '';
            $marca = $_POST['nomemarca'];
            $modelo = $_POST['modelo'];
            $quntidade = $_POST['quantidade'];
            $valor = $_POST['valor'];
    
            // Performing insert query execution
            // here our table name is college
            $sql = "INSERT INTO sneakers VALUES ('$id','$marca','$modelo','$quntidade','$valor')";
              
            if (empty($marca)){
                echo('<script type="text/JavaScript">
                alert("É necessario preencher todos os campo!!!");
                location.replace("input_sneakers.php");
                </script>');
            } elseif (empty($modelo)){
                echo('<script type="text/JavaScript">
                alert("É necessario preencher todos os campo!!!");
                location.replace("input_sneakers.php");
                </script>');
            } elseif (empty($quntidade)){
                echo('<script type="text/JavaScript">
                alert("É necessario preencher todos os campo!!!");
                location.replace("input_sneakers.php");
                </script>');
            } elseif (empty($valor)){
                echo('<script type="text/JavaScript">
                alert("É necessario preencher todos os campo!!!");
                location.replace("input_sneakers.php");
                </script>');
            } elseif (mysqli_query($conn, $sql)){
                echo('<script type="text/JavaScript">
                alert("Sneakers adicionados com sucesso!!!");
                location.replace("input_sneakers.php");
                </script>');
            } else {
                echo "ERRO:$sql. " 
                            . mysqli_error($conn);
            }    
            // Close connection
            mysqli_close($conn);
        }

        ?>

</body>
  
</html>