<?php 
class usuariosController extends controller{
public function index(){
    $usuari = new Usuarios();
    $dados = array();

    $user = $usuari->todosUsuarios();
    $dados['usuarios'] = $user;
    $this->loadTemplateAdm("usuarios", $dados);


}
public function cadastrar_usuario(){
    $usuarios = new Usuarios();
    if (empty($_SESSION['token'])) {
        header("Location: ".BASE_URL);
        exit;
    }
    $dados = array();

    if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['senha']) && isset($_POST['senha']) ) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);
        $status = addslashes($_POST['status']);
        $sexo = addslashes($_POST['sexo']);
        $usuarios->cadastrarUsuario($nome, $email, $senha, $status, $sexo);
        // echo $nome, $email, $senha, $status, $sexo;
        header("Location: ".BASE_URL."usuarios");
        // exit;

    }
    $this->loadTemplateAdm('cadastrar_usuario', $dados);
}
}