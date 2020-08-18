<?php 
class Usuarios extends model{
	private $uid;
	public function logado(){
		if (!empty($_SESSION['token'])) {
			$token = $_SESSION['token'];
			$sql = "SELECT id FROM usuarios WHERE token = :token";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":token", $token);
			$sql->execute();
			if ($sql->rowCount() > 0) {
				$data = $sql->fetch();
				$this->uid = $data['id'];

				return true;
			}
		}
		return false;
	}
	public function validateLogin($email, $senha){
		$sql = "SELECT id FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		// $sql->bindValue(":status", $status);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			$token = md5(time().rand(0,999).time());
			$sql = "UPDATE usuarios SET token = :token WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":token", $token);
			$sql->bindValue(":id", $data['id']);
			$sql->execute();
			$_SESSION['token'] = $token;
			return true;
		}else{
			return false;
		}
	}
	public function getId(){
		return $this->uid;
	}
	public function todosUsuarios(){
		$data = array();
		$sql = "SELECT * FROM usuarios";
		$sql = $this->pdo->query($sql);
			// $sql->bindValue(":token", $token);
		// $sql->execute();
		if ($sql->rowCount() > 0) {
			$data = $sql->fetchAll();
				// $this->uid = $data['id'];

			return $data;
		}
	}
	public function cadastrarUsuario($nome, $email, $senha, $status, $sexo){
		$sql = "SELECT * FROM usuarios WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			echo "Usuario já existente";
			// return false;
		}else{
			$token = md5(time().rand(999,00));
			$sql = "INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, status = :status, sexo = :sexo, token = :token";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", $senha);
			$sql->bindValue(":status", $status);
			$sql->bindValue(":sexo", $sexo);
			$sql->bindValue(":token", $token);
			$sql->execute();
		}

	}
}