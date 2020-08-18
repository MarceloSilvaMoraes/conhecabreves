<div class="container">
  <a href="<?php echo BASE_URL ?>addComercio" class="btn btn-primary">Adicionar Dados Comercio</a><br><br>
  <form method="GET">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-12 col-form-label">Buscar por:<br>
        <select name="id_tipo" class="form-control">
          <option></option>
          <?php foreach ($tipo as $item) : ?>
            <option value="<?php echo $item['id_tipo'] ?>" required><?php echo $item['nome_tipo'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
    <input type="submit" class='btn btn-primary' value="Buscar"><br><br>
  </form>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Tipo</th>
          <th scope="col">Nome</th>
          <th scope="col">Facebook</th>
          <th scope="col">Whatsapp</th>
          <th scope="col">Instagram</th>
          <th scope="col">Maps</th>
          <th scope="col">Site</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <?php if (count($dados_comer) > 0) : ?>
        <?php foreach ($dados_comer as $dados) : ?>
          <tbody class="">
            <tr>
              <td><?php echo $dados['nome_tipo'] ?></td>

              <td><?php echo $dados['nome'] ?></td>
              <td><?php echo $dados['facebook'] ?></td>
              <td><?php echo $dados['wts'] ?></td>
              <td><?php echo $dados['instagram'] ?></td>
              <td><?php echo $dados['url_maps'] ?></td>
              <td><?php echo $dados['site'] ?></td>
              <td>
                <a href="<?php echo BASE_URL ?>dadosComercio/addParceria/<?php echo $dados['id'] ?>" class="btn btn-primary"> Parceria</a>
                <a href="<?php echo BASE_URL ?>dadosComercio/edit_dados_comercio/<?php echo $dados['id'] ?>" class="btn btn-primary"> Editar</a>
                <a href="<?php echo BASE_URL ?>dadosComercio/delete_dados_comercio/<?php echo $dados['id'] ?>" class="btn btn-danger"> Excluir</a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>
</body>

</html>