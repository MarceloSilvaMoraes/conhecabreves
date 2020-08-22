<?php
$chave = '09ffb939'; // Obtenha sua chave de API gratuitamente em http://hgbrasil.com/weather
// Resgata o IP do usuario
$ip = $_SERVER["REMOTE_ADDR"];

/* 4 - Nome da Cidade (requer chave) */
$dados = hg_request(array(
    'city_name' => 'Breves'
), $chave);
if (!isset($dados)) {
    echo 'Descomente um dos exemplos para visualizar.';
    die();
}
function hg_request($parametros, $chave = null, $endpoint = 'weather')
{
    $url = 'http://api.hgbrasil.com/' . $endpoint . '/?format=json&';
    if (is_array($parametros)) {
        // Insere a chave nos parametros
        if (!empty($chave)) $parametros = array_merge($parametros, array('key' => $chave));

        // Transforma os parametros em URL
        foreach ($parametros as $key => $value) {
            if (empty($value)) continue;
            $url .= $key . '=' . urlencode($value) . '&';
        }

        // Obtem os dados da API
        $resposta = file_get_contents(substr($url, 0, -1));

        return json_decode($resposta, true);
    } else {
        return false;
    }
}
// $dias_semana = ["domingo", "segunda-feira", "terça-feira", "quarta-feira", "quinta-feira", "sexta-feira", "sábado"];
// $dia_atual = date("Y-m-d");
// $semana = date("w", strtotime($dia_atual));
// foreach ($dados['results']['forecast'] as $item) {
//     if ($data_hj == $dt_atual) {
//         echo $item['date'];
//     }
// }
?>
<script data-ad-client="ca-pub-6479601410776276" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<div class="corpo">
</div>
<div class="tes">
    <div class="test">
        .
        <div class="teste">
            .
            <div class="teste1">
                .
                <div class="teste2">
                    .
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
<div class=" texto_explicativo">
    <div class="container" id="clima">
        <div class="climatempo">
            <h1 style="color: #071317cf !important">Conheça Breves</h1>
            <div class='dia_atual active'>
                <div class='cidade_frase_img'>
                    <div class='cidade_frase'>
                        <!-- <div><?php echo $dados['results']['date']; ?></div> -->
                        <div><?php echo $dados['results']['city']; ?></div>
                        <div><?php echo $dados['results']['temp']; ?> ºC</div>
                    </div>
                    <img alt="imagem de clima" src="<?php echo BASE_URL . "clima/previsao/imagens/" . $dados['results']['img_id']; ?>.png" class="imagem-do-tempo"><br>
                </div>
                <div class='frase'> <?php echo $dados['results']['description']; ?></div>
                <div class='dados'>
                    <div class='min_max'>
                        <strong>
                            Nascer do Sol: <?php echo $dados['results']['sunrise']; ?><br>
                            Pôr do Sol: <?php echo $dados['results']['sunset']; ?><br>
                        </strong>
                        <strong>
                            Velocidade do vento: <?php echo $dados['results']['wind_speedy']; ?><br>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
        <article>
            <div class="text">
                <h2> Seja bem-vindo!</h2>
                <strong>
                    Conheça Breves, é um sistema voltado para a publicidade local, com a intenção de divulgar
                    nossos empreendimentos, espaços públicos e culturais, artistas da terra e
                    personalidades. Assim, podem expor seus contatos, mídias sociais como Instagram,
                    Facebook, Site/Blog, endereço no Google Maps e WhatssApp. Se o seu comercio
                    não estiver no site, faça seu cadastro através do botão abaixo.
                </strong>
            </div>
            <div class="cadEmpresa">
                <div class="mensagem"></div>
                <button style="border-radius: 50px; margin-bottom: 100px;" id="reserva" type="button" class="btn btn-warning" data-toggle="modal" data-target="#MCenter">
                    <span>Cadastre Seu Negócio</span>
                </button>
            </div>
            <div class='pesquisar'>
                <div class="card card-default">
                    <div class="card-header">Pesquisar</div>
                    <div class="card card-body">
                        <form method="GET" action="home/pesquisa">
                            <div class="form-group">
                                <label for="categorias">Categoria:</label>
                                <select name="categorias" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($categorias as $cat) : ?>
                                        <option value="<?= $cat['id_tipo'] ?>"><?= $cat['nome_tipo'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="btn btn-primary" value="">Buscar</button>
                        </form>
                    </div>
                </div>

            </div>
        </article>
    </div>
</div>
<div class="fundo">
    <div class="squadis">
        <div class="container" id="containerCorpo">
            <h1>Estabelecimetos</h1>
            <div class="estabelecimentos">
                <?php if (isset($l)) : ?>
                    <?php foreach ($l as $dados) : ?>
                        <a href="<?php BASE_URL ?>home/local/<?php echo $dados['id_tipo']; ?>">
                            <div class=" conteudo">
                                <?php if ($dados['id_tipo']) : ?>
                                    <div class="anime" id="anime<?php echo $dados['id_tipo'] ?>"></div>
                                <?php endif; ?>
                                <div class="rest"><strong><?php echo $dados['nome_tipo']; ?></strong></div>
                                <div><img alt="tipos de empreendimentos" src="<?php echo BASE_URL ?>assets/arquivos/<?php echo $dados['img'] ?>"></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h1>Nenhum Estabelecimento Cadastrado</h1>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<div class="col-sm-12">
    <div style="z-index:999999999999999999; position:relative;">
        <!-- Modal -->
        <div class="modal fade" id="MCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalCenterTitle">Cadastrar Comércio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="resultado"></div>
                        <br>
                        * Dados obrigatórios!
                        <form method="POST" id="formHome">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">CATEGORIA: *<br>
                                    <select name="id_tipo_comercio" class="form-control">
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
                                <label for="wts" class="col-sm-12 col-form-label">
                                    WHATSAPP: *
                                    <input type="text" name="wts" class="form-control" id="whatsapp" placeholder="55(00)00000-0000" enabled>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">
                                    MAPS:
                                    <input type="text" name="maps" class="form-control" id="maps" enabled>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label for="face" class="col-sm-12 col-form-label">
                                    FACEBOOK PESSOAL/EMPRESARIAL:
                                    <input type="text" name="face" class="form-control" id="facebook">
                                </label>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">
                                    INSTAGRAM PESSOAL/EMPRESARIAL:
                                    <input type="text" name="insta" class="form-control" id="instagram" enabled>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">
                                    SITE/BLOG:
                                    <input type="text" name="site" class="form-control" id="site" enabled>
                                </label>
                            </div>
                            <input type="submit" value="Enviar" id="botaoSalvar" class="btn btn-primary" onclick='return confirm("Deseja confirmar o envio?")'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script data-ad-client="ca-pub-6479601410776276" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</body>

</html>