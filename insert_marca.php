<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>

    <script>
function myFunction() {
  alert("Editado com sucesso!!!");
}
</script>


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

        $select = mysqli_query($conn, "SELECT * FROM marcas WHERE Marca = '".$_POST['nomemarca']."'");
        $test = mysqli_num_rows($select);

        if(mysqli_num_rows($select)) {
            echo('<script type="text/JavaScript">
            alert("A marca já existe!!!");
            location.replace("input_marca.php");
            </script>');
            exit;
        }
        if (empty($marca)){
            echo('<script type="text/JavaScript">
            alert("É necessario escrever uma marca!!!");
            location.replace("input_marca.php");
            </script>');
            exit;
        } elseif (mysqli_query($conn, $sql)){
            echo('<script type="text/JavaScript">
            alert("Marca adicionada com sucesso!!!");
            location.replace("input_marca.php");
            </script>');
            exit;
        } else {
            echo "ERRO:$sql. " 
                        . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
</body>
  
</html>