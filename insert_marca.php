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
        $id = '';
        $marca = $_POST['nomemarca'];
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO marcas VALUES ('$id','$marca')";

        if (empty($marca)){
            echo "É necessario escrever uma marca!!!";
        } elseif (mysqli_query($conn, $sql)){
            echo "<h3>Marca Adicionada com sucesso!!!</h3>";
        } else {
            echo "ERRO:$sql. " 
                        . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
</body>
  
</html>