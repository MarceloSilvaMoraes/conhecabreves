<div class="container">
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
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
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
                                <form method="POST">
                                    <input type="hidden" name="id_tipo_comercio" value="<?php echo $dados['id_tipo_comercio']; ?>">
                                    <input type="hidden" name="nome" value="<?php echo $dados['nome']; ?>">
                                    <input type="hidden" name="face" value="<?php echo $dados['facebook']; ?>">
                                    <input type="hidden" name="wts" value="<?php echo $dados['wts']; ?>">
                                    <input type="hidden" name="insta" value="<?php echo $dados['instagram']; ?>">
                                    <input type="hidden" name="maps" value="<?php echo $dados['url_maps']; ?>">
                                    <input type="hidden" name="site" value="<?php echo $dados['site']; ?>">
                                    <input type="hidden" name="status" value="1">
                                    <input type="submit" value="Confirmar" class="btn btn-success" onclick='return confirm("Deseja confirmar o envio?")'>
                                </form>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL ?>dadosRecebidos/editar_dados_recebidos/<?php echo $dados['id'] ?>" class="btn btn-primary"> Editar</a>
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