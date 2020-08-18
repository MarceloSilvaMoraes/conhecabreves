<form method="POST" style="margin-top: 50px;" id="form">
    <h1>Cadastrar usuário</h1>

    <div class="form-group">
        <label for="nome">NOME:</label>
        <input type="nome" name="nome" id="nome" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="email">EMAIL:</label>
        <input type="email" name="email" id="email" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="senha">SENHA:</label>
        <input type="password" name="senha" id="senha" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="senha">Colaborador:</label>
        <select name="status" class="form-control">
            <option></option>
            <option value="1">Administrador</option>
            <option value="2">Usuário</option>
        </select>
    </div>
    <div class="form-group">
        <label for="masculino">MASCULINO
            <input type="radio" name="sexo" class="form-control" value="masculino" required />
        </label>
        <label for="feminino" style="margin-left: 30px">FEMENINO
            <input type="radio" name="sexo" class="form-control" value="feminino" required />
        </label>
    </div>
    <input type="submit" value="Cadastrar" class="btn btn-primary">
</form>