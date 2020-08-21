<!DOCTYPE html>
<html lang="pt-br">

<head>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166301253-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-166301253-1');
	</script>
	<title>Conheça Breves - Marajó</title>
	<link rel="icon" href="<?php echo BASE_URL ?>assets/imagens/band_bvs.webp" type="image/x-icon" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,intial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Breves, conheça breves, https://www.conhecabreves.com.br/, Marajó" />
	<meta name="description" content="Conheça Breves - Sistema para divulgar nossos empreendimentos, espaços públicos 
	e culturais, artistas da terra e personalidades" />
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />
	<meta name="google-site-verification" content="p0OVCRX-kCjon7kKWqaJBla_vGfEFQhEcLuahkWbGg0" />
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style_locais.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar" style="font-weight: bold!important; color:white!important;background: #107890 !important;z-index:90000000000;top: 0; position:fixed; width:100%;">
		<a class="navbar-brand" href="<?php echo BASE_URL ?>home"><img width="35" height="30" alt="brasão de Breves" src="<?php echo BASE_URL ?>assets/imagens/band_bvs.webp" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
					<li class="nav-item">
						<a class="nav-link " href="sair.php">
							Sair
						</a>
					</li>
				<?php else : ?>
						
					<li class="nav-item">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL ?>home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#estabelecimentos">Estabelecimentos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#Clima">Clima</a>
					</li>
					<li>
						<a class="nav-link " href="<?php echo BASE_URL ?>login">
							<!-- <img src="<?php ?>assets/imagens/account-logout-3x.png" width="20" height="20"> -->
							Login
						</a>
					</li>
					<form class="form-inline" method="GET" action="<?php echo BASE_URL ?>home/pesquisa" style="margin-right: 30px;">
							<input class="form-control mr-lg-2" name="nome" type="Pesquisar" placeholder="Pesquisar" aria-label="Search">
							<button class="btn btn-success my-4 my-sm-0" type="submit">Buscar</button>
					</form>
				<?php endif; ?>

			</ul>
		</div>
	</nav>
	<?php

	$this->loadViewTemplate($viewName, $viewData);

	?>
	<footer>
		<div class="rodape">
			<div class="info">
				<span class="texto">
					Parcerias, Dúvidas e sugestões.
				</span>
				<div class="social">
					<a class="nav-link" target="_blank" href="https://www.facebook.com/omarcelo.silva.moraes"><img alt="logo facebook" src="<?php echo BASE_URL ?>assets/imagens/facebook.webp"></a>
					<a class="nav-link" target="_blank" href="https://www.instagram.com/omarcelo_silva/"><img alt="logo instagram" src="<?php echo BASE_URL ?>assets/imagens/instagram.webp"></a>
					<a class="btn whats-index ds-whats" target="_blank" title="" href="https://wa.me/5591993910084?text=Olá, gostaria de saber mais sobre o site. Aguardo contato, obrigado!">
						<img alt="logo Whatsapp" src="<?php echo BASE_URL ?>assets/imagens/Whatsapp.webp">
					</a>
				</div>
			</div>
			<div class="copy">
				Desenvolvedor Web Marcelo Silva, todos os direitos reservados.
			</div>
		</div>
	</footer>

	<script data-ad-client="ca-pub-6479601410776276" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<script src="<?php echo BASE_URL ?>assets/js/jquery-3.2.1.min.js"></script>

	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
	<script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
	<script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo BASE_URL ?>assets/js/mask.js"></script>
	<script src="<?php echo BASE_URL ?>assets/js/npm.js">
</script>

</body>

</html>