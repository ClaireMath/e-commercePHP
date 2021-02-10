<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>categorieHome</title>
	<link rel="stylesheet" type="text/css" href="categoriesHome.css">
</head>
<body>

<nav>

	<ul>
			<li id=""><a href="entree.php" >Entrées </a>

				<ul class="sous">
				
				</ul>	
			</li>

			<li class=""><a href="#sport ">Plats </a>

				<ul class="sous"> 
					
				</ul>	
			</li>	
			

			<li class=""><a href="#mondeOuvert">Desserts </a>

				<ul class="sous">

				</ul>	
			</li>

			<li class=""><a href="#">Boissons</a>

				<ul class="sous">
				
				</ul>	
			</li>

    </ul>
</nav>

<?php 
	if (isset($_GET["categ"])){
		echo $_GET["categ"] ;
	}
?>

</body>
</html>

