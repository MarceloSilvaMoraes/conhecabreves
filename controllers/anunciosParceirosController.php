<?php
class anunciosParceirosController extends controller
{
	public function index()
	{
		$dados = array();
		$local = new Parceiros();
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$parceiros = $local->getDadosParceiros($id);
			$dados['parceiros'] = $parceiros;
		} else {
			$parceiros = $local->getDadosParceiros(array());
			$dados['parceiros'] = $parceiros;
		}

		$pegarParceiros = $local->getParceiros();
		// print_r($parceiros);

		$dados['pegarParceiros'] = $pegarParceiros;

		$this->loadTemplateAdm('anunciosParceiros', $dados);
	}

	public function addAnuncioParceiro()
	{
		$dados = array();
		$local = new Parceiros();

		if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			$id_parceiro = $_POST['id_parceiro'];
			$descricao = addslashes($_POST['descricao']);
			$valor = addslashes($_POST['valor']);
			$local->inserir_anuncio_parceiro($id_parceiro, $descricao, $valor);

			echo "<div class='alert alert-success'> Inserido com Sucesso</div>";
		} else {
			echo "<div class='alert alert-danger'>Preencha todos os campos!</div>";
		}

		$pegarParceiros = $local->getParceiros();

		$dados['pegarParceiros'] = $pegarParceiros;

		$this->loadTemplateAdm('addAnuncioParceiro', $dados);
	}
	public function edit_dados_parceiro($id_anuncio_parceiro)
	{
		// echo $id_anuncio_parceiro;
		$dados = array();
		$parcaeiro = new Parceiros();
		if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			$descricao = addslashes($_POST['descricao']);
			if (isset($_FILES['img']['tmp_name'])) {
				$img = $_FILES['img'];
			} else {
				$img = array();
			}

			$parcaeiro->update_parceiro($id_anuncio_parceiro, $descricao, $img);
		}

		$dadosParceiro = $parcaeiro->getAnunciosParceiros($id_anuncio_parceiro);
		// print_r($dadosParceiro);
		$dados['info'] = $dadosParceiro;

		// $info = $parcaeiro->getImgsAnunciosParceiros($id_anuncio_parceiro);
		// $dados['info'] = $info;

		$this->loadTemplateAdm('edit_dados_parceiro', $dados);
	}
	public function excluirFoto($id)
	{
		if (empty($_SESSION['token'])) {
			header("Location: " . BASE_URL . "login");
			exit;
		}
		$a = new Parceiros();
		if (isset($id) && !empty($id)) {
			$id = addslashes(($id));
			$tipo = $a->excluirFoto($id);
			// print_r($tipo);


			// $fotoDir = $a->excluirFotoDietorio($id);
			// print_r($fotoDir);
			// $dados['url_img_parceiro'] = $fotoDir;
		}

		if (isset($id)) {
			header("Location: " . BASE_URL . "anunciosParceiros/edit_dados_parceiro/" . $tipo);
			unlink(BASE_URL . "anunciosParceiros/edit_dados_parceiro/.$tipo");
		} else {
			header("Location: " . BASE_URL . "anunciosParceiros");
		}
	}
	public function delete_dados_parceiro()
	{
	}
}
