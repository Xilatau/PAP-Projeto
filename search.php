<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Xilakicks</title>
<center>
<img src="logo1.gif" alt="Computer man" style="width:200px;height:200px;">
<div class="header">
	 <div class="navbar" id='nav'>
       <ul>
       	  <li onclick="location.href='index.php';">Home</li>
       	  <li onclick="location.href='about.php';">Sobre</li>
		  <li onclick="location.href='search.php';">Procurar</li>
      
      <div class="dropdown">
		  <li onclick="location.href='#';">Marcas</li>
          <div class="dropdown-content">
          <?php
          include 'dbconn.php';
          $sql = "SELECT * FROM marcas";
          $result = $conn->query($sql);
//Fetch Data form database
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
        <a onclick="location.href='search.php?search=<?php echo $row['Marca']; ?>';" style="text-align: center;cursor:pointer"><?php echo $row['Marca']; ?></a>
        <?php
	}
}
?>
          </div>
          </div>

       </ul>

	 </div>
</div>
</center>

<div class="box"></div>


<!-- add some javascript code -->

   <script type="text/javascript">
   	
   	 var  nav = document.getElementById('nav');
      
      window.onscroll = function(){

      	if (window.pageYOffset >100) {

      		nav.style.background = "grey";
      		nav.style.boxShadow = "grey";
      	}
      	else{
      		nav.style.background = "transparent";
      		nav.style.boxShadow = "none";
      	}
      }



   </script>

<style>

.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 15px 40px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}


body{
	   	 background-color: #1b1c1e;
            font-family: sans-serif;
            overflow: scroll; /* Show scrollbars */
	   }

.header{
	   	 width: 100%;
	   	 height: 100%;
	   	 background-size: cover;

	   }

.p{
	color: white;
	font-family: sans-serif;
	font-size: 30px;
	text-align: center;
}

     .navbar ul li{
	   	list-style-type: none;
	   	display:inline-block;
	   	padding: 10px 50px;
	   	color: white;
	   	font-size: 24px;
	   	font-family: sans-serif;
	   	cursor: pointer;
	   	border-radius:10px;
	   	transition: .5s;
	   }

	   .navbar ul li:hover{
	   	background: red;
	   }


.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 30%;
  color: white;
  background-color: black;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}


* {
  box-sizing: border-box;
}


.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}

input[type=text] {
    width: 20%;
    background-color: white;
    color: black;
    padding: 14px 5px;
    margin: 8px 0;
    border: none;
    border-radius: 5px;
    font-family: sans-serif;
  }

  button[type=submit] {
    width: 20%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: sans-serif;
  }

</style>
</head>
<body>
<br>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";
$conn = NEW Mysqli($servername, $username, $password, $database);
?>

<div style="margin: 20px;border: 20px;">
<center>
<form action="" method="GET">
    <div class="input-group mb-3">
    <h3 style="font-size: 30px;">Procurar Sneakers</h3>
    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Procurar Sneakers">
    <br>
    <button type="submit">Procurar</button>
    <br>
    </div>
    <br>
</form>


    <?php 
    $con = mysqli_connect("localhost","root","","xilakicks");
        if(isset($_GET['search']))
        {
        $filtervalues = $_GET['search'];


        $query = "SELECT * FROM sneakers INNER JOIN images ON sneakers.Modelo = images.Modelo WHERE (Marca) LIKE '%$filtervalues%'";


        $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
            foreach($query_run as $items)
            {
            ?>
<div class="row">
<div class="col-12">
                <div class="card">
                <div class="container">
                <img src="<?php echo $items['image_url']?> ." alt="Avatar" style="width:100%">
                    <h4><b>Modelo: <?php echo $items['Modelo'] ?> </b></h4> 
                    <p>Marca: <?php echo $items['Marca'] ?> </p> 
                    <p>Preco: <?php echo $items['Valor'] ?>€ </p> 
                    <p style="text-align: right;color:green;">Quantidade Disponivel: <?php echo $items['Quantidade'] ?> </p> 
                </div>
                </div>   
                </div>   
                </div>  
                        
            <?php
            }
            }
else
    {?>
        <p style="color: red; font-size: 20px;"> Sem Resultados!</p> 
        

<?php
    }
        }
?>
<center>
    </div>

    </div>
<hr style="width:90%;">
</div>

<div  class="footer">
	<p style="color:black;text-align:center;font-size:1em;">Copyright © 2021 Xilakicks.<br> All rights reserved.</p>
  <center><p><a href="mailto:davidjlopes0@gmail.com">Contacto</a></p></center>
</div>
    
</body>
</html> 