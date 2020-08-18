<form method="POST" id="editarDadosCome">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">Tipo:<br>
      <select name="id_tipo_comercio" class="form-control">
        <option></option>
        <?php foreach ($tipo as $item) : ?>
          <option value="<?php echo $item['id_tipo']?>" 
          <?php echo ($item['id_tipo'] == $info['id_tipo_comercio'])?'selected="selected"':''; ?>>
          <?php echo $item['nome_tipo'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      NOME:
      <input type="text" name="nome" class="form-control" value="<?php echo $info['nome']?>">
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      MAPS:
      <input type="text" name="maps" class="form-control" id="maps" value="<?php echo $info['url_maps']?>" enabled>
    </label>
  </div>
  <div class="form-group row">
    <label for="face" class="col-sm-12 col-form-label">
      FACEBOOK:
      <input type="text" name="face" class="form-control" id="facebook" value="<?php echo $info['facebook']?>">
    </label>
  </div>
  <div class="form-group row">
    <label for="wts" class="col-sm-12 col-form-label">
      WHATSAPP:
      <input type="text" name="wts" class="form-control" id="whatsapp"
       value="<?php if($info['wts'] == ""){echo round($info['wts'], 2)."null";}else{echo $info['wts'];} ?>" enabled>
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      INSTAGRAM:
      <input type="text" name="insta" class="form-control" id="instagram" value="<?php echo $info['instagram']?>" enabled>
    </label>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      SITE/BLOG:
      <input type="text" name="site" class="form-control" id="site" value="<?php echo $info['site']?>" enabled>
    </label>
  </div>
  <input type="submit" value="Enviar" id="botaoSalvar" class="btn btn-primary">
</form>
<div class="resultado"></div>
</body>
</html>
