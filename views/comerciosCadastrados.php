<html>
<body>
    <div class="container">
        <a href="<?php echo BASE_URL ?>tipoComercio" class="btn btn-primary">Adicionar Tipo</a>
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            <?php if (count($comercio) > 0) : ?>
            <?php foreach ($comercio as $item) : ?>
                <tr>
                    <td><?php echo $item['nome_tipo'] ?></td>
                    <td id="navEdit">
                        <a href="<?php echo BASE_URL ?>tipoComercio/edit_comercio/<?php echo $item['id_tipo'] ?>" class="btn btn-primary"> Editar</a>
                        <a href="<?php echo BASE_URL ?>tipoComercio/deletar_comercio/<?php echo $item['id_tipo'] ?>" class="btn btn-danger"> Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>