<?php
class homeController extends controller
{
	public function index()
	{
		$dados = array();
		$parca = new Parceiros();
		$local = new Locais();
		$l = $parca->localizacao();
		$tipo  = $local->tipo();
		$dados['tipo'] = $tipo;
		$dados['l'] = $l;


		$parceiros = $parca->parceirosCadastrados();
		$dados['parceiros'] = $parceiros;

		$quant = $local->dadosDeEstatistica();

		$this->loadTemplate('home', $dados);
	}
	public function pesquisa()
	{
		$dados = array();
		$busca = new Parceiros();
		if (isset($_GET['nome'])) {
			$nome = addslashes($_GET['nome']);
			$retornoBusca = $busca->buscar($nome);
		}
		$dados['buscando'] = $retornoBusca;

		$this->loadTemplate('pesquisa', $dados);
	}
	public function dadosComerciosRecebidos()
	{
		$local = new Locais();
		if (
			isset($_POST['nome']) && isset($_POST['wts']) && isset($_POST['id_tipo_comercio'])
			&& !empty($_POST['nome']) && !empty($_POST['id_tipo_comercio']) && !empty($_POST['wts'])
		) {
			$id_tipo_comercio = $_POST['id_tipo_comercio'];
			$nome = addslashes($_POST['nome']);
			$face = addslashes($_POST['face']);
			$whts = addslashes($_POST['wts']);
			$wts = preg_replace('/[^0-9]/', '', $whts);
			$insta = addslashes($_POST['insta']);
			$maps = addslashes($_POST['maps']);
			$site = addslashes($_POST['site']);
			$local->inserir_comercio_recebido($id_tipo_comercio, $nome, $face, $wts, $insta, $maps, $site);
			echo "<div class='alert alert-success'> Inserido com Sucesso! Aguarde algumas horas enquanto analisamos seus dados.</div>";
		} else {
			echo "<div class='alert alert-danger'>Preencha todos os campos, obrigatórios!</div>";
		}
		echo '<div class="resultado"></div>';
		// $dados['fraseAddComercioRecebido'] = "";

	}
	public function local($id_tipo)
	{
		$dados = array();

		if (isset($id_tipo)) {
			$localizacao = new Locais();
			$comercio = $localizacao->tipo_comercio($id_tipo);
		}

		$dados['comercio'] = $comercio;
		$dados['id_tipo'] = $id_tipo;

		$tipo  = $localizacao->tipo();
		$dados['tipo'] = $tipo;

		$this->loadTemplate('local', $dados);
	}

	public function footer()
	{
		$dados = array();

		$this->loadView('footer', $dados);
	}
}
