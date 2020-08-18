<?php
class addComercioController extends controller
{
    public function index()
    {
        $dados = array();
        $local = new Locais();
        $tipo  = $local->tipo();
        $dados['tipo'] = $tipo;
        $this->loadTemplateAdm("addComercio", $dados);
    }
    public function enviarDadosComercio()
    {
        $dados = array();
        $local = new Locais();
        if (isset($_POST['nome']) && !empty($_POST['nome']) && !empty($_POST['id_comercio'])
         && !empty($_POST['face']) && !empty($_POST['wts'])
         && !empty($_POST['insta']) && !empty($_POST['maps'])) {
            $id_comercio = $_POST['id_comercio'];
            $nome = addslashes($_POST['nome']);
            $face = addslashes($_POST['face']);
            $whts = addslashes($_POST['wts']);
            $wts = preg_replace('/[^0-9]/', '', $whts);
            $insta = addslashes($_POST['insta']);
            $maps = addslashes($_POST['maps']);
            $site = addslashes($_POST['site']);
            $local->inserir_dados_comercio($id_comercio, $nome, $face, $wts, $insta, $maps, $site);

            echo "<div class='alert alert-success'> Inserido com Sucesso</div>";
        } else {
            echo "<div class='alert alert-danger'>Preencha todos os campos!</div>";
        }
        echo '<div class="resultado"></div>';
        $dados['fraseAddComercio'] = "";

        $this->loadView("ajax2", $dados);
    }
    
}
