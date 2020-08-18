<?php
class dadosComercioController extends controller
{
    public function index()
    {
        $dados = array();
        $local = new Locais();

        if (empty($_SESSION['token'])) {

            header("Location: " . BASE_URL . "login");
            exit;
        }
        $dados_comer = array();
        if (isset($_GET['id_tipo'])) {
            $id_tipo = $_GET['id_tipo'];
            $dados_comer = $local->pegar_dados_comercio($id_tipo);
            $dados['dados_comer'] = $dados_comer;
        } else {
            $dados['dados_comer'] = $dados_comer;
        }


        $tipo  = $local->tipo();
        $dados['tipo'] = $tipo;

        $this->loadTemplateAdm('dadosComercio', $dados);
    }
    public function edit_dados_comercio($id)
    {
        $dados = array();
        $local = new Locais();
        if (
            isset($_POST['nome']) && !empty($_POST['nome']) && !empty($_POST['id_comercio'])
            && !empty($_POST['face']) && !empty($_POST['wts'])
            && !empty($_POST['insta']) && !empty($_POST['maps'])
        ) {
            $id_comercio = $_POST['id_comercio'];
            $nome = addslashes($_POST['nome']);
            $face = addslashes($_POST['face']);
            $whts = addslashes($_POST['wts']);
            $wts = preg_replace('/[^0-9]/', '', $whts);
            $insta = addslashes($_POST['insta']);
            $maps = addslashes($_POST['maps']);
            $site = addslashes($_POST['site']);
            $local->editarDadosComercio($id_comercio, $nome, $face, $wts, $insta, $maps, $site, $id);

            echo "<div class='alert alert-success'> Inserido com Sucesso</div>";
           
        } else {
            echo "<div class='alert alert-danger'>Preencha todos os campos!</div>";
        }

        $todosOsDados  = $local->getDadosComercio($id);

        $dados['info'] = $todosOsDados;
        $tipo  = $local->tipo();
        $dados['tipo'] = $tipo;

        $this->loadTemplateAdm('edit_dados_comercio', $dados);
    }
    public function delete_dados_comercio($id_comercio)
    {

        $local = new Locais();
        $local->delete_dados_comercio($id_comercio);
        header("Location: " . BASE_URL . "dadosComercio");
    }
    public function addParceria($id_dados_comercio)
    {
        $dados = array();
        $local = new Locais();
        if (isset($_POST['validacao_pareiro']) && !empty($_POST['validacao_pareiro'])) {
            $validacao_pareiro = addslashes($_POST['validacao_pareiro']);
            $url = addslashes($_POST['url']);
            if (isset($_FILES['img_parceiro']['tmp_name'])) {
                $img_parceiro = $_FILES['img_parceiro'];
            } else {
                $img_parceiro = array();
            }
            if (isset($_FILES['img_baner']['tmp_name'])) {
                $img_baner = $_FILES['img_baner'];
            } else {
                $img_baner = array();
            }
            $local->add_parceria($id_dados_comercio, $validacao_pareiro, $img_parceiro, $img_baner, $url);
            //   echo $id_dados_comercio. $validacao_pareiro. $img_parceiro. $img_baner. $url;

        }
        if (isset($id_dados_comercio)) {
            $info = $local->getAnuncio($id_dados_comercio);
            $dados['info'] = $info;
        } else {
            header("Location: " . BASE_URL . "tipoComercio");
        }
        $this->loadTemplateAdm('addParceria', $dados);
    }
}
