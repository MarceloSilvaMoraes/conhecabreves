<?php
class parceiroController extends controller
{
	public function index()
	{
		$dados = array();
		// $parceiros = new Parceiros();

		$this->loadParceiros('parceiro', $dados);
	}
	public function clickFashion()
	{
		$urEli = str_replace("parceiro/", "", $_GET['url']);
		// echo $url;
		$dados = array();

		$local = new Parceiros();
		$parceiros = $local->parceirosCadastrados();
		$dados['parceiros'] = $parceiros;

		// $par = $local->getTodosAnunciosParceiros();
		$par = $local->getParceiros();
		// print_r($par);
		// $dados['anuncios'] = $parceiros;
		foreach ($par as $parca) {

			$url = str_replace("", "", $_SERVER["REQUEST_URI"]);
			$urlParceiro = '/APIS/projeto-bvs-mvc/parceiro/' . $parca["url"];
			if ($url === $urlParceiro) {
				$parc = $local->getTodosAnunciosParceiros($urEli);
				// print_r($parc);
				$dados['l'] = $parc;
			}
		}
		// $l = $local->localizacao();

		// $dados['l'] = $l;
		$this->loadParceiros('clickFashion', $dados);
	}
	public function teste1()
	{
		$dados = array();
		$local = new Parceiros();
		$l = $local->localizacao();
		$parceiros = $local->parceirosCadastrados();
		$dados['parceiros'] = $parceiros;

		$dados['l'] = $l;
		$this->loadParceiros('teste1', $dados);
	}
}
