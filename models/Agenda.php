<?php 
class Reservar{
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}
	
	public function MostrarHorarios(){
		$array = array();
		$sql = "SELECT * FROM horarios";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$array=$sql->fetchAll();
		}
		return $array;
	}
	public function InserirReserva($nome, $horarios, $data){
		$sql = "INSERT INTO reservas SET nome = :nome, id_horario = :horarios, data = :data";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":horarios", $horarios);
		$sql->bindValue(":data", $data);
		$sql->execute();
	}
	public function TabelaHorarios(){
		$array = array();
		$sql = "SELECT reservas.*, horarios.horarios FROM reservas INNER JOIN horarios ON reservas.id_horario = horarios.id";
		// ORIGINAL 
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$array=$sql->fetchAll();
		}
		return $array;
	}
	public function Mostrar($mes, $ano){
		$array = array();
		$sql= "SELECT * FROM reservas WHERE month(dataReserva) = '$mes' AND YEAR(dataReserva) = '$ano'  ORDER BY idReserva ASC";

		// $sql= "SELECT reservas.*, horarios.horarios FROM reservas INNER JOIN horarios ON reservas.id_horario = horarios.id WHERE month(data) = '$mes' AND YEAR(data) = '$ano' ";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function BuscarAgendamentoAtual(){
		$array = array();
		$sql= "SELECT reservas.*, categorias.categ FROM reservas INNER JOIN categorias ON reservas.id_servicos = categorias.id WHERE data = DATE_FORMAT(NOW(), '%y-%m-%d') AND horario > NOW() ORDER BY id ASC";

		// semi-original: $sql= "SELECT reservas.*, horarios.horarios, categorias.nome FROM reservas INNER JOIN horarios ON reservas.id_horario = horarios.id INNER JOIN categorias ON reservas.id_servicos = categorias.id WHERE data = DATE_FORMAT(NOW(), '%y-%m-%d') ORDER BY horarios ASC";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function buscarNome($buscar){
		global $pdo;
		$array = array();
		$sql = "SELECT reservas.nome_pessoa, reservas.data, categorias.categ FROM reservas INNER JOIN categorias ON reservas.id_servicos = categorias.id WHERE nome_pessoa LIKE '%$buscar%' ";
		// SELECT reservas.nome_pessoa, reservas.data, categorias.nome FROM reservas INNER JOIN categorias ON reservas.id_servico = categorias.id
		$sql = $pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$array= $sql->fetchAll();
		}
		return $array;

	}
	public function historicoDia($data_atual){
		global $pdo;
		$sql = array();
		// $sql = "SELECT * FROM reservas where year(data) = $data_atual ";
		$sql = "SELECT reservas.*, categorias.categ, horarios.horario FROM reservas INNER JOIN categorias ON reservas.id_servicos = categorias.id INNER JOIN horarios ON horarios.idHora = reservas.idHorario WHERE DATE_FORMAT(dataReserva, '%d-%m') = '$data_atual'";
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}
}

?>