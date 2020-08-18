<form method="POST" style="margin-top: 50px;" id="form">
    <h1>Cadastrar usuário</h1>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-12 col-form-label">Buscar por:<br>
        <select name="id_parceiro" class="form-control">
          <option></option>
          <?php foreach ($pegarParceiros as $item) : ?>
            <option value="<?php echo $item['id'] ?>" required><?php echo $item['url'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
    <div class="form-group row">
        <label for="descricao" class="col-sm-12">Descricao:
            <textarea  name="descricao" class="form-control" required ></textarea>
        </label>
    </div>
    <div class="form-group row">
        <label for="valor" class="col-sm-12">valor:
            <input type="text"  name="valor" class="form-control" required >
        </label>
    </div>
    <input type="submit" value="Cadastrar" class="btn btn-primary">
</form>