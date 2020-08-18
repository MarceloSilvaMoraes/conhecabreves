<html>
<body>
    <form method="POST" enctype="multipart/form-data" id="formEdit">
        <div class="form-group row">
            <label for="nome" class="col-sm-12"> NOME:
                <input type="text" name="nome" value="<?php echo $comer['nome_tipo'] ?>" class="form-control">
            </label>
        </div>
        <div class="form-group" >
			<label for="add_foto" >Fotos do anúncio:</label>
			<input type="file" name="img[]" multiple /><br/>
			<div class="card card-default">
				<div class="card-header" >Fotos do Anúncio</div>
				<div class="panel-body" >
                <?php foreach($info['img'] as $foto): ?>
						<div class="foto_item">
							<img src="<?php echo BASE_URL;?>assets/arquivos/<?php echo $foto['img']; ?>" class="img-thumbnail" border="0" /><br/>
							<a href="<?php echo BASE_URL;?>tipoComercio/excluirFoto/<?php echo $foto['id']; ?>" class="btn btn-warning">Excluir Imagem</a>
                        </div>
                        <?php endforeach; ?>
				</div>
			</div>
		</div>
        <input type="submit" value="Enviar" class="btn btn-primary" >

    </form>
    <div class="resultado"></div>
</body>

</html>
