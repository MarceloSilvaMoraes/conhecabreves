<!DOCTYPE html>
<html>
<head>
	<title>Painel Breves</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,intial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo BASE_URL?>assets/imagens/logo.webp" type="image/x-icon" />
	<script src="<?php echo BASE_URL ?>assets/js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/mask.js"></script>

	<link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/main.css">
	<script src="<?php echo BASE_URL ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL ?>assets/js/main.js"></script>


</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL?>adm">
				<img src="<?php echo BASE_URL ?>assets/imagens/band_bvs.webp" width="30" height="30">
			</a>
		</div>
		<a href="#" class="nav-trigger"><span></span></a>
		<div class="notif">
			
		</div>
	</div>
	<div class="side-nav">
		<div class="logo1">
			<div>
				<a href="<?php echo BASE_URL?>adm">
					<img width="85" height="80" src="<?php echo BASE_URL ?>assets/imagens/band_bvs.webp" />
				</a>
			</div>
		</div>
		<nav>
			<ul id="nave">
				<a class="a" href="<?php echo BASE_URL?>comerciosCadastrados " id="comercio_cad" disabled>
					<li>
						<span><i class="fa fa-cash-register"></i></span>
						<span>Comercios cadastrados</span>
					</li>
				</a>
				<a class="a" href="<?php echo BASE_URL?>dadosComercio" id="dados_comer_cads">
					<li>
						<span><i class="fa fa-cash-register"></i></span>
						<span>Dados dos Comercios</span>
					</li>
				</a>
				<a class="a" href="<?php echo BASE_URL?>dadosRecebidos" id="usuarios">
					<li>
						<span><i class="fa fa-check"></i></span>
						<span>Dados Recebidos</span>
					</li>
				</a>
				<a class="a" href="<?php echo BASE_URL?>anunciosParceiros" id="usuarios">
					<li>
						<span><i class="fa fa-check"></i></span>
						<span>Anúncios Parceiros</span>
					</li>
				</a>
				<a class="a" href="<?php echo BASE_URL?>usuarios" id="usuarios">
					<li>
						<span><i class="fa fa-check"></i></span>
						<span>Usuários</span>
					</li>
				</a>
			</ul>
			<ul>
				<a href="<?php echo BASE_URL?>adm/logout">
					<li>
						<span><i class="fa fa-sign-out-alt"></i></span>
						<span>Sair</span>
					</li>
				</a>
			</ul>
		</nav>
	</div>
	<div class="main-content">
		<div class="container">
			<?php 

			$this->loadViewTemplate($viewName, $viewData);

			?>
		</div>
	</div>
	<script type="text/javascript">

	</script>
	<script type="text/javascript" src="<?php echo BASE_URL?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo BASE_URL?>assets/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>assets/css/bootstrap.min.css">


</body>

</html>