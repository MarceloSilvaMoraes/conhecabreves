<div class="resultado"></div>
<br>
* Dados obrigatórios!
<form method="POST" id="formulario">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">Tipo: *<br>
      <select name="id_comercio" class="form-control">
        <option></option>
        <?php foreach ($tipo as $item) : ?>
          <option value="<?php echo $item['id_tipo'] ?>" required><?php echo $item['nome_tipo'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      NOME: *
      <input type="text" name="nome" class="form-control">
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      MAPS: * 
      <input type="text" name="maps" class="form-control" id="maps" enabled>
      <!-- Não tem: -->
      <!-- <input type="checkbox" name="maps" id="mps" value="null"> -->
    </label>
  </div>
  <div class="form-group row">
    <label for="face" class="col-sm-12 col-form-label">
      FACEBOOK:
      <input type="text" name="face" class="form-control" id="facebook">
      Não tem:
      <input type="checkbox" name="face" id="face" value="null">
    </label>
  </div>
  <div class="form-group row">
    <label for="wts" class="col-sm-12 col-form-label">
      WHATSAPP:
      <input type="text" name="wts" class="form-control" id="whatsapp" placeholder="55(00)00000-0000" enabled>
      Não tem:
      <input type="checkbox" name="wts" id="wts" value="null">
    </label>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      INSTAGRAM:
      <input type="text" name="insta" class="form-control" id="instagram" enabled>
      Não tem:
      <input type="checkbox" name="insta" id="insta" value="null">
    </label>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-12 col-form-label">
      SITE/BLOG:
      <input type="text" name="site" class="form-control" id="site" enabled>
      Não tem:
      <input type="checkbox" name="site" id="stbg" value="null">
    </label>
  </div>
  <input type="submit" value="Enviar" id="botaoSalvar" class="btn btn-primary" onclick='return confirm("Deseja confirmar o envio?")'>
</form>
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
    }
    if (document.querySelector("#wts").checked) {
      document.querySelector("#whatsapp").setAttribute('disabled', 'disabled');
      document.querySelector("#whatsapp").value = '';
    } else {
      document.querySelector("#whatsapp").removeAttribute('disabled');
    }
    if (document.querySelector("#insta").checked) {
      document.querySelector("#instagram").setAttribute('disabled', 'disabled');
      document.querySelector("#instagram").value = '';
    } else {
      document.querySelector("#instagram").removeAttribute('disabled');
    }
    // if (document.querySelector("#mps").checked) {
    //   document.querySelector("#maps").setAttribute('disabled', 'disabled');
    //   document.querySelector("#maps").value = '';
    // } else {
    //   document.querySelector("#maps").removeAttribute('disabled');
    // }
    if (document.querySelector("#stbg").checked) {
      document.querySelector("#site").setAttribute('disabled', 'disabled');
      document.querySelector("#site").value = '';
    } else {
      document.querySelector("#site").removeAttribute('disabled');
    }
  });
  });
 
</script>