<?php
class dadosRecebidosController extends controller
{
	public function index()
	{
		$dados = array();

		if (empty($_SESSION['token'])) {

			header("Location: " . BASE_URL);
			exit;
		}
		$comercio = new Locais();

		if (isset($_POST['id_tipo_comercio'])	) 
		{
			$id_comercio = $_POST['id_tipo_comercio'];
			$nome = addslashes($_POST['nome']);
			$face = addslashes($_POST['face']);
			$wts = addslashes($_POST['wts']);
			$insta = addslashes($_POST['insta']);
			$maps = addslashes($_POST['maps']);
			$site = addslashes($_POST['site']);
			$comercio->inserir_dados_comercio($id_comercio, $nome, $face, $wts, $insta, $maps, $site);
			echo "<div class='alert alert-success'> Inserido com Sucesso!</div>";
			$comercio->deletar_apos_envio_comercio($id_comercio);
		} 
		$comer = $comercio->pegar_comercio_recebido();
		$dados['dados_comer'] = $comer;
		$this->loadTemplateAdm('dadosRecebidos', $dados);
	}
	public function editar_dados_recebidos($id){
		$dados = array();
		$comercio = new Locais();

		if (empty($_SESSION['token'])) {

			header("Location: " . BASE_URL);
			exit;
		}
		if (isset($_POST['id_tipo_comercio'])	) 
		{
			$id_comercio = $_POST['id_tipo_comercio'];
			$nome = addslashes($_POST['nome']);
			$face = addslashes($_POST['face']);
			$wts = addslashes($_POST['wts']);
			$insta = addslashes($_POST['insta']);
			$maps = addslashes($_POST['maps']);
			$site = addslashes($_POST['site']);
			$comercio->atualizar_comercio_recebido($id_comercio, $nome, $face, $wts, $insta, $maps, $site, $id);
			echo "<div class='alert alert-success'> Inserido com Sucesso!</div>";
		} 

		$todosOsDados  = $comercio->getDadosRecebedos($id);
        $dados['info'] = $todosOsDados;
		$tipo  = $comercio->tipo();
        $dados['tipo'] = $tipo;
		$this->loadTemplateAdm('editar_dados_recebidos', $dados);
	}
}
