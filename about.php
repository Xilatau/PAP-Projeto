<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sobre nós</title> 

<center>
<img src="logo1.gif" alt="Computer man" style="width:200px;height:200px;">
<div class="header">
	 <div class="navbar" id='nav'>
       <ul>
       	  <li onclick="location.href='index.php';">Home</li>
       	  <li onclick="location.href='about.php';">Sobre</li>
		  <li onclick="location.href='contacto.php';">Contacto</li>
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


body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #1b1c1e;
  overflow: hidden; /* Hide scrollbars */
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

p{
	color: white;
	font-family: sans-serif;
	font-size: 20px;
	text-align: center;
}

.column {
  float: left;
  width: 100%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
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
</style>
</head>
<body>


<h2 style="text-align:center">Sobre Xilakicks</h2>
<div class="row">
  <div class="column">
    <div class="card">
    <center>
    <img src="david.jpg" alt="Mike" width="7%" height="7%">
      <div class="container">
        <h2>David Lopes</h2>
        <p class="title">CEO & Founder</p>
        <p>Aluno finalista do curso de gestão e programação de sistemas informáticos  </p>
        <p>davidjlopes0@gmail.com</p>
        <p><button onclick="location.href='mailto:davidjlopes0@gmail.com';" class="button">Contact</button></p>
      </div>
    </div>
  </div>
  </div>

</body>
</html>