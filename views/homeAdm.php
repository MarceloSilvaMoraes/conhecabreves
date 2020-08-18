<h3 style="line-height: 100px; text-align: center;">Bem Vindo ao Painel de Controle
	<?php
	foreach ($info as $dados) :
		$dados['token'];
		if ($_SESSION['token'] == $dados['token']) :
			echo $dados['nome'] . "<br>";
			// print_r($dados);
	?>
</h3>
<div class="img_sexo" style="display: flex;justify-content: center; align-items: center;">
	<?php if ($dados['sexo'] == "masculino") : ?>
	<img class='img_mas' src="<?php echo BASE_URL ?>assets/imagens/homem.png">
	<?php else : ?>
		<img class='img_fem' src="<?php echo BASE_URL ?>assets/imagens/mulher.png">
	<?php endif; ?>

</div>
<?php endif; ?>

<?php endforeach; ?>
<style>
	.img_sexo .img_mas, .img_sexo .img_fem{
			width: 450px;
		}
	@media(max-width:500px){
		.img_sexo .img_mas, .img_sexo .img_fem{
			width: 100%;
		}
	}
</style>