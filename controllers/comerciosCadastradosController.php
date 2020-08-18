<?php
class comerciosCadastradosController extends controller
{
	public function index()
	{
		$dados = array();

		if (empty($_SESSION['token'])) {

			header("Location: " . BASE_URL . "login");
			exit;
		}
		$local = new Locais();
		$comercio  = $local->tipo();
		$dados['comercio'] = $comercio;

		$this->loadTemplateAdm('comerciosCadastrados', $dados);
	}
	
	

}
