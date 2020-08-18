<div class="retorno"></div>
  <br>
  <form method="POST" id="form1" >
    <div class="form- row">
      <label for="nome" class="col-sm-12"> NOME:
        <input type="text" name="nome" id="nome" class="form-control">
      </label>
    </div>
    <!-- <div class="form-group row">
      <label for="img" class="col-sm-12">IMAGEM:
        <input type="file" name="img" class="form-control" id="img">
      </label>
    </div> -->
    <input type="submit" value="Enviar" class="btn btn-primary" id="buttton" onclick='return confirm("Deseja confirmar o envio?")' >
  </form>