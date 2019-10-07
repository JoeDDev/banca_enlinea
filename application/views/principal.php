<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rodas</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css")?>">
	<link href="https://fonts.googleapis.com/css?family=Baloo|Fascinate+Inline|Lobster|Lobster+Two|Nunito|Poiret+One |Ranga|Titillium+Web" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Ceviche+One|Cookie|Covered+By+Your+Grace|Damion|Great+Vibes|Just+Another+Hand|Leckerli+One|Ruslan+Display|Yellowtail|Yesteryear" rel="stylesheet">

	<style type="text/css">
		body{
		   background-color: white;
		   font-family: Verdana;
		   color: black;
		   padding: 10px;
		   margin: 10px;
		}
	</style>
	<script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js")?>"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#"><strong>Banca en Linea</strong></a>
    		</div>
    	<ul class="nav navbar-nav">
      		<li><a href="#">Nuevo Cajero</a></li>
      		<li><a href="#">Status Cajero</a></li>
      		<li><a href="#">Monitor Transferencias</a></li>
    	</ul>
  		</div>
		</nav>
	</header>
	<section>
		<!-- Aqui va el cuerpo o vista secundaria -->
		<?php (isset($vista)) ? $this->load->view($vista) : "Hola :)"; ?>
	</section>
</body>
</html>

