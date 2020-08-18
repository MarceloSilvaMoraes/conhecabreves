<?php
class loginController extends controller{
	public function index(){
		$dados = array();
		$this->loadView('login', $dados);
	}
	
	public function validar(){
			$u = new Usuarios();

		if (isset($_POST['email']) && !empty($_POST['senha'])) {
			$email = addslashes($_POST['email']);
			$senha = md5($_POST['senha']);

			if ($u->validateLogin($email, $senha)) {
				header("Location:".BASE_URL."adm");
			}else{
				header("Location:".BASE_URL."login");
				exit;
			}

		}
		
	}
	
}
// if (isset($_POST['email']) && !empty($_POST['senha'])) {
//     $email = $_POST['email'];
//     $senha = md5($_POST['senha']);

//     $login = new Locais($pdo);
//     if( $login->login($email, $senha)){
//         header("Location:adm2.php");
//     }else {
//         echo "email ou senha errada";
//     }
// }

