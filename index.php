<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";
$conn = NEW Mysqli($servername, $username, $password, $database);

$query = "SELECT * FROM sneakers INNER JOIN images ON sneakers.Modelo = images.Modelo;"; 
$query_run = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($query_run)){
  ?>
<div class="card">
  <div class="container">
  <img src="<?php echo $row['image_url']?> ." alt="Avatar" style="width:100%">
      <h4><b> <?php echo $row['Modelo'] ?> </b></h4> 
      <p> <?php echo $row['Marca'] ?> </p> 
      <p> <?php echo $row['Valor'] ?> </p> 
  </div>
</div>

<?php
}
?>

</body>
</html> 