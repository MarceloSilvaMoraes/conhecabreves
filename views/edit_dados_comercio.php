<form method="POST" id="editarDadosCome">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">Tipo:<br>
      <select name="id_comercio" class="form-control">
        <option></option>
        <?php foreach ($tipo as $item) : ?>
          <option value="<?php echo $item['id_tipo']?>" 
          <?php echo ($item['id_tipo'] == $info['id_comercio'])?'selected="selected"':''; ?>>
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
      Não tem:
      <input type="checkbox" name="maps" id="mps" value="null">
    </label>
  </div>
  <div class="form-group row">
    <label for="face" class="col-sm-12 col-form-label">
      FACEBOOK:
      <input type="text" name="face" class="form-control" id="facebook" value="<?php echo $info['facebook']?>">
      Não tem:
      <input type="checkbox" name="face" id="face" value="null">
    </label>
  </div>
  <div class="form-group row">
    <label for="wts" class="col-sm-12 col-form-label">
      WHATSAPP:
      <input type="text" name="wts" class="form-control" id="whatsapp"
       value="<?php if($info['wts'] == ""){echo round($info['wts'], 2)."null";}else{echo $info['wts'];} ?>" enabled>
      Não tem:
      <input type="checkbox" name="wts" id="wts" value="null">
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      INSTAGRAM:
      <input type="text" name="insta" class="form-control" id="instagram" value="<?php echo $info['instagram']?>" enabled>
      Não tem:
      <input type="checkbox" name="insta" id="insta" value="null">
    </label>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      SITE/BLOG:
      <input type="text" name="site" class="form-control" id="site" value="<?php echo $info['site']?>" enabled>
      Não tem:
      <input type="checkbox" name="site" id="stbg" value="null">
    </label>
  </div>
  <input type="submit" value="Enviar" id="botaoSalvar" class="btn btn-primary">
</form>
<div class="resultado"></div>
</body>
</html>
<script>
  var chec = document.querySelectorAll("[type='checkbox']");
  var res = chec.forEach(link => {
    $(link).on('click', function() {

    if (document.querySelector("#face").checked) {
      document.querySelector("#facebook").setAttribute('disabled', 'disabled');
      document.querySelector("#facebook").value = '';
    } else {
      document.querySelector("#facebook").removeAttribute('disabled');
      document.querySelector("#facebook").value = '';
    }
    if (document.querySelector("#wts").checked) {
      document.querySelector("#whatsapp").setAttribute('disabled', 'disabled');
      document.querySelector("#whatsapp").value = '';
    } else {
      document.querySelector("#whatsapp").removeAttribute('disabled');
      document.querySelector("#whatsapp").value = '';
    }
    if (document.querySelector("#insta").checked) {
      document.querySelector("#instagram").setAttribute('disabled', 'disabled');
      document.querySelector("#instagram").value = '';
    } else {
      document.querySelector("#instagram").removeAttribute('disabled');
      document.querySelector("#instagram").value = '';
    }
    if (document.querySelector("#mps").checked) {
      document.querySelector("#maps").setAttribute('disabled', 'disabled');
      document.querySelector("#maps").value = '';
    } else {
      document.querySelector("#maps").removeAttribute('disabled');
      document.querySelector("#maps").value = '';
    }
    if (document.querySelector("#stbg").checked) {
      document.querySelector("#site").setAttribute('disabled', 'disabled');
      document.querySelector("#site").value = '';
    } else {
      document.querySelector("#site").removeAttribute('disabled');
      document.querySelector("#site").value = '';
    }
  });
  });
  
</script>