<?php
class tipoComercioController extends controller
{
  public function index()
  {
    $dados = array();

    $this->loadTemplateAdm("tipoComercio", $dados);
  }
  public function enviarTipoComercio()
  {
    $dados = array();
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
      $nome_tipo = $_POST['nome'];
        $local = new Locais();
        $local->inserir_tipo($nome_tipo);

        echo "<div class='alert alert-success'> Inserido com Sucesso</div>";
      // } else {
      //   echo "<div class='alert alert-warning'>Insira a Imagem!</div>";
      // }
    } else {
      echo "<div class='alert alert-danger'>Preencha todos os campos</div>";
    }
    $dados['frase'] = "";
    $this->loadView('ajax', $dados);
  }
  public function edit_comercio($id_comercio)
	{
		$dados = array();
		$local = new Locais();

		if (empty($_SESSION['token'])) {
			header("Location: " . BASE_URL . "login");
			exit;
		}
		if (isset($id_comercio)) {
			$comercio  = $local->getComercio($id_comercio);
		}
	
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			if (isset($_FILES['img']['tmp_name'])) {
        $img = $_FILES['img'];
			}else {
				$img = array();
      }
      
      $local->update_comercio($id_comercio, $nome, $img);
		
    }
    if(isset($id_comercio)) {
			$info = $local->getAnuncio($id_comercio);
      $dados['info'] = $info;

		}else{
			header("Location: ".BASE_URL."tipoComercio");
		}

		$dados['comer'] = $comercio;
		$this->loadTemplateAdm('edit_comercio', $dados);
	}
   public function excluirFoto($id){
    	if(empty($_SESSION['token'])) {
    		header("Location: ".BASE_URL."login");
    		exit;
      }
      
    	$a = new Locais();
    	if(isset($id) && !empty($id)) {
    		$id = addslashes(($id));
        $tipo = $a->excluirFoto($id);
        
    	}
    	if(isset($id)) {

    		header("Location: ".BASE_URL."tipoComercio/edit_comercio/".$tipo);
    	} else {
        header("Location: ".BASE_URL."tipoComercio");

    	}
  
    }
    public function deletar_comercio($id_comercio)
    {
      $deletar = new Locais();
  
      if (isset($id_comercio)) {
        $deletar->deleteTipoComercio($id_comercio);
        header("Location: " . BASE_URL . "comerciosCadastrados");
  
      }
    }
}
