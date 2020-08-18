<html>

<body>
	<form method="POST" enctype="multipart/form-data" id="formEdit">
		<div class="form-group row">
			<label for="validacao_parceiro" class="col-sm-12"> validacao_parceiro:
				<input type="checkbox" name="validacao_pareiro" value="1" class="form-control">
			</label>
		</div>
		<div class="form-group row">
			<label for="url" class="col-sm-12"> url:
				<input type="text" name="url" value="teste" class="form-control">
			</label>
		</div>
		<div class="fotosParceiros">
			<div class="form-group">
				<label for="add_foto">Fotos do anúncio:</label>
				<input type="file" name="img_parceiro[]" multiple /><br />
				<div class="card card-default">
					<div class="card-header">Fotos do Anúncio</div>
					<div class="panel-body">
						<?php foreach ($info['img'] as $foto) : ?>
							<div class="foto_item">
								<img src="<?php echo BASE_URL; ?>assets/arquivos/<?php echo $foto['img_parceiro']; ?>" class="img-thumbnail" border="0" /><br />
								<a href="<?php echo BASE_URL; ?>tipoComercio/excluirFoto/<?php echo $foto['id']; ?>" class="btn btn-warning">Excluir Imagem</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="add_foto">img_baner:</label>
				<input type="file" name="img_baner[]" multiple /><br />
				<div class="card card-default">
					<div class="card-header"> img_baner</div>
					<div class="panel-body">
						<?php foreach ($info['img'] as $foto) : ?>
							<div class="foto_item">
								<img src="<?php echo BASE_URL; ?>assets/arquivos/<?php echo $foto['img_baner']; ?>" class="img-thumbnail" border="0" /><br />
								<a href="<?php echo BASE_URL; ?>tipoComercio/excluirFoto/<?php echo $foto['id']; ?>" class="btn btn-warning">Excluir Imagem</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<input type="submit" value="Enviar" class="btn btn-primary">

	</form>
	<div class="resultado"></div>
</body>

</html>
<style type="text/css">
	.foto_item {
		width: 190px;
		height: 200px;
		float: left;
		text-align: center;
		margin-right: 10px;

	}

	.foto_item img {
		width: 180px;
		height: 150px;

	}

	.panel-body {
		border: 1px solid #ccc;
		height: 200px;
	}
	.fotosParceiros{
		display: flex;
		justify-content: space-between;
	}
</style>