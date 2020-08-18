<?php
class admController extends controller
{
	public function index()
	{
		$usuarios = new Usuarios();
		$dados = array();

		if (empty($_SESSION['token'])) {

			header("Location: " . BASE_URL);
			exit;
		}
		$user = $usuarios->todosUsuarios();
		$dados['info'] = $user;
		$this->loadTemplateAdm('homeAdm', $dados);
	}
	public function logout()
	{
		unset($_SESSION['token']);
		header("Location: " . BASE_URL."home");
		exit;
	}
}
