<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Conheça Breves - Marajó</title>
	<link rel="icon" href="<?php echo BASE_URL ?>assets/imagens/band_bvs.webp" type="image/x-icon" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,intial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />
	<script src="<?php echo BASE_URL ?>assets/js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
	<script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
	<script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style_locais.css">
</head>
<?php
$local = new Parceiros();
$parceiros = $local->parceirosCadastrados();
// print_r($parceiros);

foreach ($parceiros as $parca) :
	$url = str_replace("", "", $_SERVER["REQUEST_URI"]);
	$urlParceiro = '/APIS/projeto-bvs-mvc/parceiro/' . $parca["url"];
	if ($url == $urlParceiro) :
?>

		<body>
			<div class="header bannerParceiro">
				<div class="corpoBanner">
					<div class="nav corpoBanner1">
						<a href="#img0"><img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $parca['img_baner'] ?>"></a>
					</div>
					<div class="nav corpoBanner2">
						<a href="#img<?php echo $parca['id'] ?>"><img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $parca['img_parceiro'] ?>"></a>
					</div>
				</div>
			</div>
			<div class="">
				<div class="lbox" id="img0">
					<div class=" box_img">
						<div class="imgX1">
							<div>
								<a href="" class="btnbotao" id="close">X</a>
							</div>
							<div>
								<img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $parca['img_baner'] ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="lbox" id="img<?php echo $parca['id'] ?>">
					<div class=" box_img">
						<div class="imgX2">
							<div>
								<a href="" class="btnbotao" id="close">X</a>
							</div>
							<div>
								<img src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $parca['img_parceiro'] ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$this->loadViewTemplate($viewName, $viewData);
			?>
			<div class="redesSociais">
				<span class="textoParca">
					Socias <?php echo $parca['nome'] ?>.
				</span>
				<div class="socialParca">
					<div>
						<a class="nav-link" target="_blank" href="<?php echo $parca['facebook'] ?>">
							<img alt="logo facebook" src="<?php echo BASE_URL ?>assets/imagens/facebook.webp">
						</a>
					</div>
					<div>
						<a class="nav-link" target="_blank" href="<?php echo $parca['instagram'] ?>">
							<img alt="logo instagram" src="<?php echo BASE_URL ?>assets/imagens/instagram.webp">
						</a>
					</div>
					<div>
						<a class="btn whats-index ds-whats" target="_blank" title="" href="https://wa.me/<?php echo $parca['wts'] ?>?text=Olá, gostaria de saber mais sobre o site. Aguardo contato, obrigado!">
							<img alt="logo Whatsapp" src="<?php echo BASE_URL ?>assets/imagens/Whatsapp.webp">
						</a>
					</div>
				</div>
			</div>

		<?php endif; ?>
	<?php endforeach; ?>
		</body>

</html>
<style>
	* {
		margin: 0;
		padding: 0;
	}

	.bannerParceiro {
		width: 100%;
		/* height: 400px; */
		/* background: red; */

	}

	.corpoBanner {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		width: 100%;
	}

	.corpoBanner1 a img {
		width: 100%;
		height: 300px;
	}
	.corpoBanner1 a {
		width: 100%;
	}
	.corpoBanner1 {
		width: 100%;
		height: 300px;
		background: #ccc;
		display: flex;
		justify-content: center;
	}

	.corpoBanner2 {
		width: 200px;
		height: 200px;
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: -100px;
		position: relative;
		overflow: hidden;
		background: linear-gradient(to right, #04a6f3, #0072ff);

	}


	.corpoBanner2 img {
		width: 190px;
		height: 190px;
		border-radius: 50%;
		/* z-index: 1; */
	}

	.box_img img {
		/* width: 100%; */
		/* max-width: 700px; */
		/* max-height: 400px; */
		/* height: auto; */
		/* margin-top: -100px; */
		background-position: center;
		background-size: cover;

	}

	.imgX1,
	.imgX2 {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		text-align: center;
		width: 100%;
		height: auto;
	}

	.imgX1 div,
	.imgX2 div {
		/* width: 100%; */
		margin-top: 50px;
	}

	.imgX1 img {
		width: 100%;
		height: 300px;
	}

	.imgX2 img {
		width: 300px;
		height: 250px;
	}

	.min {
		width: 100%;
		padding: 20px !important;
		/* margin: 30px !important; */
		z-index: 10;
	}

	.lbox {
		visibility: hidden;
		opacity: 0;
		height: 0;
	}

	/* .container {
		height: calc(100% - 60px);
		box-sizing: border-box;
	} */

	.lbox:target {
		visibility: visible;
		opacity: 1;
		width: 100%;
		height: 100%;
		position: fixed;
		background: rgba(10, 10, 10, .7);
		top: 0;
		left: 0;
		z-index: 10000;

	}

	.box_img {
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		/* margin: 150px auto; */
		top: 0;
		/* margin: 0; */
	}

	.btnbotao {
		color: #fff;
		font-family: "Arial";
		text-decoration: none;
		position: absolute;
		width: 50px;
		height: 50px;
		font-size: 40px;
		text-align: center;
	}

	#close {
		/* right: 2%; */
		top: 0%;
	}

	.box_img img {
		opacity: 0;
		/* height: 0; */
	}

	.lbox:target .box_img img {
		opacity: 1;
		transition: opacity .4s linear;
		width: auto;
	}

	.redesSociais {
		width: 100%;
		height: 200px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		/* background: #ccc; */
		margin-top: 100px;
		z-index: 1;
		position: relative;
	}

	.socialParca {
		display: flex;
	}

	.socialParca img {
		filter: contrast(50%);
		filter: grayscale(1);
	}
</style>