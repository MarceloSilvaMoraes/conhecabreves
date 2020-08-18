<div class="container">
  <a href="<?php echo BASE_URL ?>anunciosParceiros/addAnuncioParceiro" class="btn btn-primary">Adicionar Anúncio Parceio</a><br><br>
  <form method="GET">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-12 col-form-label">Buscar por:<br>
        <select name="id" class="form-control">
          <option></option>
          <?php foreach ($pegarParceiros as $item) : ?>
            <option value="<?php echo $item['id'] ?>" required><?php echo $item['url'] ?>
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
          <th scope="col">Foto</th>
          <th scope="col">descricao</th>
          <th scope="col">valor</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <?php if (isset($parceiros)) : ?>
        <?php foreach ($parceiros as $dados) : ?>

          <tbody class="">
            <tr>
              <td>
                <?php if (!empty($dados['url_img_parceiro'])) : ?>
                  <img width="100" alt="tipos de empreendimentos" src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $dados['url_img_parceiro'] ?>">
                <?php else : ?>
                  <img width="100" alt="tipos de empreendimentos" src="<?php echo BASE_URL ?>assets/arquivos/121.png">
                <?php endif; ?>
              </td>

              <td><?php echo $dados['descricao'] ?></td>
              <td><?php echo $dados['valor'] ?></td>
              <td>
                <a href="<?php echo BASE_URL ?>anunciosParceiros/edit_dados_parceiro/<?php echo $dados['id'] ?>" class="btn btn-primary"> Editar</a>
                <a href="<?php echo BASE_URL ?>anunciosParceiros/delete_dados_parceiro/<?php echo $dados['id'] ?>" class="btn btn-danger"> Excluir</a>
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