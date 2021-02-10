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
			<li id=""><a href="categoriesHome.php?categ=entree">Entrées </a>
				<ul class="sous">
					<li><a >Entrées 1</a></li>
					<li><a >Entrées 2</a></li>				
                    <li><a>Entrées 3</a></li>
					
				</ul>	
			</li>

			<li class=""><a href="#sport ">Plats </a>
				<ul class="sous"> 
					<li ><a href="" >Plats 1</a></li>
					<li><a href=".html" >Plats 2</a></li>
					<li><a href=".html" >Plats 3</a></li>
				</ul>	
			</li>	
			

			<li class=""><a href="#mondeOuvert">Desserts </a>
				<ul class="sous">
					<li ><a href="" >Desserts 1 </a></li>
					<li><a href=".html" >Desserts 2 </a></li>
					<li><a href=".html" >Desserts 3 </a></li>

				</ul>	
			</li>

			<li class=""><a href="#">Boissons</a>
				<ul class="sous">
					<li ><a href=".html">Boissons 1</a></li>
					<li><a href=".html" >Boissons 2</a></li>
					<li><a href=".html" >Boissons 3</a></li>
				
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

