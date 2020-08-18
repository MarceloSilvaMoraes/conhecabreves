<div class="container">
    <a href="<?php echo BASE_URL ?>usuarios/cadastrar_usuario" class="btn btn-primary">Cadastrar Usuário</a><br><br>
    <table class="table">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $item) : ?>
            <tr>
                <td><?php echo $item['nome'] ?></td>
                <td><?php echo $item['email'] ?></td>
                <td>
                    <?php if ($item['status'] == 1) : ?>
                        Ativo
                    <?php elseif ($item['status'] == 0) : ?>
                        Inativo
                    <?php endif; ?>

                </td>
                <td><a href="edit_comencio.php?e=<?php echo $item['id_tipo'] ?>" class="btn btn-primary"> Editar</a>
                    <a href="delete_comercio.php?e=<?php echo $item['id_tipo'] ?>" class="btn btn-danger"> Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>