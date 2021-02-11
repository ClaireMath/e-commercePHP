<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>categorieHome</title>
	<link rel="stylesheet" type="text/css" href="categoriesHome.css">
	<link rel="stylesheet" type="text/css" href="produit.css">
    <link rel="stylesheet" type="text/css" href="categoriesHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

<nav>

	<ul>
			<li id=""><a href="categoriesHome.php?categ=entree">Entrées </a>

				<ul class="sous">
				</ul>	
			</li>

			<li class=""><a href="categoriesHome.php?categ=plat" >Plats </a>
				<ul class="sous"> 
					
				</ul>	
			</li>	
			

			<li class=""><a href="categoriesHome.php?categ=dessert" >Desserts </a>
				<ul class="sous">

				</ul>	
			</li>

			<li class=""><a href="categoriesHome.php?categ=boisson" >Boissons</a>
				<ul class="sous">
				
				</ul>	
			</li>

    </ul>
</nav>

<?php 
	if (isset($_GET["categ"])){
	switch($_GET["categ"]){
		case "entree":
			require("entree.php");
			break;
	}
	}
?>

<?php 
	if (isset($_GET["categ"])){
	switch($_GET["categ"]){
		case "plat":
			include("plat.php");
	}
	}
?>

<?php 
	if (isset($_GET["categ"])){
	switch($_GET["categ"]){
		case "dessert":
			include("dessert.php");
	}
	}
?>

<?php 
	if (isset($_GET["categ"])){
	switch($_GET["categ"]){
		case "boisson":
			include("boisson.php");
	}
	}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>

